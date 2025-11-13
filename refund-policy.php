<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Refund Policy';
$page_description = 'Our refund and return policy for digital educational resources';

include 'includes/header.php';
?>

<div class="page-header">
    <div class="container">
        <h1>Refund Policy</h1>
        <p>Last updated: <?php echo date('F j, Y'); ?></p>
    </div>
</div>

<div class="container">
    <div class="legal-content">
        <section class="legal-section">
            <h2>1. Digital Products Policy</h2>
            <p>Due to the nature of digital educational resources, all sales are generally final. However, we understand that sometimes issues may arise, and we're committed to customer satisfaction.</p>
        </section>

        <section class="legal-section">
            <h2>2. Eligible Refund Scenarios</h2>
            <p>Refunds may be considered in the following situations:</p>
            <ul>
                <li><strong>Technical Issues:</strong> If you cannot access or download the purchased content due to technical problems on our end</li>
                <li><strong>Duplicate Purchase:</strong> If you accidentally purchased the same item multiple times</li>
                <li><strong>Incorrect Content:</strong> If the delivered content significantly differs from what was described</li>
                <li><strong>Corrupted Files:</strong> If the downloaded files are corrupted and cannot be opened</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>3. Non-Refundable Situations</h2>
            <p>Refunds will not be provided for:</p>
            <ul>
                <li>Change of mind after successful download</li>
                <li>Compatibility issues with your device or software</li>
                <li>Content that doesn't meet your personal expectations</li>
                <li>Purchases made more than 7 days ago</li>
                <li>Content that has been successfully accessed and used</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>4. Refund Process</h2>
            <p>To request a refund:</p>
            <ol>
                <li>Contact us within 7 days of purchase</li>
                <li>Provide your transaction details (Mpesa confirmation)</li>
                <li>Explain the reason for the refund request</li>
                <li>Allow 3-5 business days for review</li>
                <li>If approved, refunds will be processed within 7-10 business days</li>
            </ol>
        </section>

        <section class="legal-section">
            <h2>5. Refund Methods</h2>
            <p>Approved refunds will be processed using the same payment method:</p>
            <ul>
                <li><strong>Mpesa Payments:</strong> Refunded directly to your Mpesa account</li>
                <li><strong>Processing Time:</strong> 3-7 business days depending on your mobile money provider</li>
                <li><strong>Refund Amount:</strong> Full purchase price minus any applicable transaction fees</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>6. Partial Refunds</h2>
            <p>In some cases, we may offer partial refunds:</p>
            <ul>
                <li>When only part of a bundle is affected by technical issues</li>
                <li>For content that is partially accessible</li>
                <li>As a goodwill gesture for minor inconveniences</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>7. Alternative Solutions</h2>
            <p>Before processing a refund, we may offer alternative solutions:</p>
            <ul>
                <li>Re-sending corrupted or missing files</li>
                <li>Providing technical support for access issues</li>
                <li>Offering equivalent content as replacement</li>
                <li>Account credit for future purchases</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>8. Fraudulent Purchases</h2>
            <p>If we detect fraudulent activity:</p>
            <ul>
                <li>The transaction will be reversed immediately</li>
                <li>Access to content will be revoked</li>
                <li>The account may be suspended or terminated</li>
                <li>We may report the incident to relevant authorities</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>9. Contact for Refunds</h2>
            <p>To request a refund or discuss any payment issues:</p>
            <div class="contact-info">
                <p><strong>Email:</strong> info@schemes.co.ke</p>
                <p><strong>Phone:</strong> +254 710 178 7242</p>
                <p><strong>Mpesa Till:</strong> 5272685</p>
                <p><strong>Response Time:</strong> Within 24 hours</p>
            </div>
        </section>

        <section class="legal-section">
            <h2>10. Policy Updates</h2>
            <p>This refund policy may be updated from time to time. Any changes will be posted on this page with an updated revision date. Continued use of our service after changes constitutes acceptance of the new policy.</p>
        </section>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
