<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && $email && $subject && $message && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save to CSV (optional)
        $logFile = DATA_DIR . 'contact_submissions.csv';
        $entry = [$name, $email, $subject, $message, date('Y-m-d H:i:s')];
        $fp = fopen($logFile, 'a');
        fputcsv($fp, $entry);
        fclose($fp);

        // Send email to admin
        $to = SITE_EMAIL;
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body = "New message from $name <$email>\n\nSubject: $subject\n\n$message";
        mail($to, $subject, $body, $headers);

        $success = "Thank you! Your message has been sent successfully.";
    } else {
        $error = "Please fill all fields correctly.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="max-w-4xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-green-700 mb-6">Contact Us</h2>

    <?php if ($success): ?>
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
            <?= htmlspecialchars($success) ?>
        </div>
    <?php elseif ($error): ?>
        <div class="bg-red-100 text-red-800 p-4 mb-6 rounded">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

   <form action="submit_contact.php" method="POST" class="space-y-4 bg-white p-6 rounded shadow-md">
  <div>
    <label for="name" class="block text-gray-700 font-medium mb-1">Your Name</label>
    <input type="text" name="name" id="name" required
      class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
  </div>

  <div>
    <label for="email" class="block text-gray-700 font-medium mb-1">Your Email</label>
    <input type="email" name="email" id="email" required
      class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
  </div>

  <div>
    <label for="message" class="block text-gray-700 font-medium mb-1">Your Message</label>
    <textarea name="message" id="message" rows="5" required
      class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
  </div>

  <div>
    <button type="submit"
      class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded transition duration-200">
      Send Message
    </button>
  </div>
</form>
<!-- Contact Action Buttons -->
<div class="flex justify-center gap-4 mt-6">
  <a href="tel:0101787242" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center transition">
    📞 Call Us Now
  </a>
  <a href="https://wa.me/254101787242" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center transition">
    💬 WhatsApp Us
  </a>
</div>

</div>

<?php include 'includes/footer.php'; ?>
