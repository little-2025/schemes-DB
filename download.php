<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$doc_id = $_GET['id'] ?? '';
$ref = $_GET['ref'] ?? '';  // Paystack transaction reference

if (empty($doc_id) || empty($ref)) {
    header('Location: index.php');
    exit;
}

// Verify the payment with Paystack
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/transaction/verify/' . urlencode($ref));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . PAYSTACK_SECRET_KEY
]);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

// If verification fails
if (!$result || !$result['status'] || $result['data']['status'] !== 'success') {
    header('HTTP/1.0 403 Forbidden');
    echo "Payment verification failed. Please try again.";
    exit;
}

// Fetch document
$document = get_document($doc_id);
if (!$document) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Increment download counter
increment_hits($doc_id);

// ✅ Log user email and phone for marketing
$user_email = $_GET['email'] ?? '';
$user_phone = $_GET['phone'] ?? '';

if ($user_email || $user_phone) {
    $email_file = DATA_DIR . 'emails.csv';
    $date = date('Y-m-d H:i:s');
    $title = $document['title'];

    $entry = [$user_email, $user_phone, $title, $date];

    if ($fp = fopen($email_file, 'a')) {
        fputcsv($fp, $entry);
        fclose($fp);
    }
}

// ✅ Send receipt via email
if (!empty($user_email)) {
    $subject = "Your Receipt - " . $document['title'];
    $headers = "From: Schemes.co.ke <" . SITE_EMAIL . ">\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    $message = "Thank you for your payment!\n\n";
    $message .= "Document: " . $document['title'] . "\n";
    $message .= "Download link: " . SITE_URL . "/download.php?id=$doc_id&ref=$ref\n";
    $message .= "Date: " . date('F j, Y g:i A') . "\n\n";
    $message .= "If you need assistance, contact us at " . SITE_EMAIL . "\n\n";
    $message .= "Regards,\nSchemes.co.ke Team";

    mail($user_email, $subject, $message, $headers);
}

// Serve file
$file_path = DOCS_DIR . $document['filename'];
if (!file_exists($file_path)) {
    $old_file_path = DOCS_DIR . basename($document['filename']);
    if (file_exists($old_file_path)) {
        $file_path = $old_file_path;
    }
}

if (!file_exists($file_path)) {
    header('HTTP/1.0 404 Not Found');
    echo 'File not found.';
    exit;
}

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($document['filename']) . '"');
header('Content-Length: ' . filesize($file_path));
header('Cache-Control: no-cache, must-revalidate');
header('Expires: 0');

readfile($file_path);
exit;
?>
