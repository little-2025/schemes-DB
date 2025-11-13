<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/mailer_config.php';

if (!is_admin()) {
    header("Location: login.php");
    exit;
}

// === Input Parameters ===
$category = $_POST['category'] ?? '';
$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : null;
$preview = isset($_POST['preview']);

// === Validate Category ===
if (!$category) {
    die("Category is required.");
}

// === Load Emails CSV ===
$emails_file = DATA_DIR . 'emails.csv';
$emails = [];

if (file_exists($emails_file)) {
    $handle = fopen($emails_file, 'r');
    while (($row = fgetcsv($handle)) !== false) {
        if (stripos($row[2], $category) !== false) { // Check document field
            $emails[] = [
                'email' => $row[0] ?? '',
                'phone' => $row[1] ?? '',
                'document' => $row[2] ?? '',
                'date' => $row[3] ?? ''
            ];
        }
    }
    fclose($handle);
}

if (empty($emails)) {
    die("No emails found for selected category.");
}

// === Apply Limit ===
if ($limit !== null && $limit > 0) {
    $emails = array_slice($emails, 0, $limit);
}

// === Load Random Documents from Category ===
$documents = [];
$doc_file = DATA_DIR . 'documents.csv';

if (file_exists($doc_file)) {
    $handle = fopen($doc_file, 'r');
    while (($row = fgetcsv($handle)) !== false) {
        if (stripos($row[0], $category) !== false) { // Assuming 1st column is category
            $documents[] = $row;
        }
    }
    fclose($handle);
}

// Pick 3 random documents
shuffle($documents);
$sample_docs = array_slice($documents, 0, 3);

// === Build Message ===
function build_email_content($recipient_email, $category, $sample_docs) {
    $content = "<h2>🔥 New {$category} Documents Just for You</h2>";
    $content .= "<ul>";
    foreach ($sample_docs as $doc) {
        $title = $doc[3] ?? basename($doc[5] ?? $doc[3] ?? 'Document');
        $file = urlencode($doc[5] ?? '');
        $utm = "utm_source=campaign&utm_medium=email&utm_campaign=" . urlencode($category);
        $link = SITE_URL . "/item.php?file={$file}&{$utm}";
        $content .= "<li><a href='{$link}' target='_blank'>{$title}</a></li>";
    }
    $content .= "</ul>";

    $unsubscribe = SITE_URL . "/unsubscribe.php?email=" . urlencode($recipient_email);
    $content .= "<p style='font-size: 12px; margin-top: 20px;'>Don't want to receive updates? <a href='{$unsubscribe}'>Unsubscribe here</a>.</p>";

    return $content;
}

// === Preview Mode ===
if ($preview) {
    echo "<h1>Preview Mode: No emails will be sent</h1>";
    echo "<h2>Sending to: " . count($emails) . " recipients</h2>";
    foreach ($emails as $e) {
        echo "<hr>";
        echo "<strong>To:</strong> " . e($e['email']) . "<br>";
        echo build_email_content($e['email'], $category, $sample_docs);
    }
    exit;
}

// === Send Emails ===
$mail = setupMailer();

$success_count = 0;
$fail_count = 0;

foreach ($emails as $e) {
    $to = $e['email'];
    $mail->clearAllRecipients();
    $mail->addAddress($to);
    $mail->Subject = "Latest {$category} Resources for You";
    $mail->isHTML(true);
    $mail->Body = build_email_content($to, $category, $sample_docs);

    if ($mail->send()) {
        $success_count++;
    } else {
        $fail_count++;
        error_log("Failed to send to {$to}: " . $mail->ErrorInfo);
    }
}

echo "<h2>✅ Campaign Sent</h2>";
echo "<p>Successfully sent to {$success_count} recipients. Failed: {$fail_count}</p>";
echo "<a href='send_campaign_ui.php'>← Back to Campaign UI</a>";
