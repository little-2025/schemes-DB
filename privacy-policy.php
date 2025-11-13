<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Privacy Policy';
$page_description = 'Learn how we collect, use, and protect your personal information';

include 'includes/header.php';
?>

<div class="page-header">
    <div class="container">
        <h1>Privacy Policy</h1>
        <p>Last updated: <?php echo date('F j, Y'); ?></p>
    </div>
</div>

<div class="container">
    <div class="legal-content">
        <section class="legal-section">
            <h2>1. Information We Collect</h2>
            <p>We collect information you provide directly to us, such as when you:</p>
            <ul>
                <li>Browse and download educational resources</li>
                <li>Make payments for premium content</li>
                <li>Contact us for support</li>
                <li>Subscribe to our newsletter</li>
            </ul>
            
            <h3>Types of Information:</h3>
            <ul>
                <li><strong>Personal Information:</strong> Name, email address, phone number</li>
                <li><strong>Payment Information:</strong> Mpesa transaction details</li>
                <li><strong>Usage Data:</strong> Download history, preferences, device information</li>
                <li><strong>Analytics Data:</strong> Page views, time spent, popular content</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>2. How We Use Your Information</h2>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Provide and maintain our educational platform</li>
                <li>Process payments and deliver purchased content</li>
                <li>Send you updates about new resources and features</li>
                <li>Improve our services based on usage analytics</li>
                <li>Respond to your comments and questions</li>
                <li>Detect and prevent fraud or abuse</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>3. Information Sharing</h2>
            <p>We do not sell, trade, or otherwise transfer your personal information to third parties except:</p>
            <ul>
                <li><strong>Service Providers:</strong> Payment processors (Mpesa), hosting providers</li>
                <li><strong>Legal Requirements:</strong> When required by law or to protect our rights</li>
                <li><strong>Business Transfers:</strong> In case of merger, acquisition, or asset sale</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>4. Data Security</h2>
            <p>We implement appropriate security measures to protect your personal information:</p>
            <ul>
                <li>Secure file storage and transmission</li>
                <li>Regular security audits and updates</li>
                <li>Limited access to personal data</li>
                <li>Encryption of sensitive information</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>5. Your Rights</h2>
            <p>You have the right to:</p>
            <ul>
                <li>Access your personal information</li>
                <li>Correct inaccurate data</li>
                <li>Request deletion of your data</li>
                <li>Opt-out of marketing communications</li>
                <li>Data portability</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>6. Cookies and Tracking</h2>
            <p>We use cookies and similar technologies to:</p>
            <ul>
                <li>Remember your preferences and settings</li>
                <li>Analyze site traffic and usage patterns</li>
                <li>Improve user experience</li>
                <li>Provide personalized content recommendations</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>7. Children's Privacy</h2>
            <p>Our service is intended for educational use by students of all ages. We do not knowingly collect personal information from children under 13 without parental consent. If you believe we have collected such information, please contact us immediately.</p>
        </section>

        <section class="legal-section">
            <h2>8. Changes to This Policy</h2>
            <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date.</p>
        </section>

        <section class="legal-section">
            <h2>9. Contact Us</h2>
            <p>If you have any questions about this Privacy Policy, please contact us:</p>
            <div class="contact-info">
                <p><strong>Email:</strong> info@schemes.co.ke</p>
                <p><strong>Phone:</strong> +254 710 178 7242</p>
                <p><strong>Address:</strong> Nairobi, Kenya</p>
            </div>
        </section>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
