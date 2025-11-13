<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Support & Help Center';
$success_message = '';
$error_message = '';

// Handle contact form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {
    $name = sanitize_input($_POST['name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $subject = sanitize_input($_POST['subject'] ?? '');
    $message = sanitize_input($_POST['message'] ?? '');
    $priority = sanitize_input($_POST['priority'] ?? 'medium');
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        // Save support ticket to CSV
        $ticket_data = [
            'id' => uniqid(),
            'date' => date('Y-m-d H:i:s'),
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'priority' => $priority,
            'status' => 'open',
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        // Create support tickets file if it doesn't exist
        $tickets_file = 'data/support_tickets.csv';
        if (!file_exists($tickets_file)) {
            $header = ['id', 'date', 'name', 'email', 'subject', 'message', 'priority', 'status', 'ip_address'];
            file_put_contents($tickets_file, implode(',', $header) . "\n");
        }
        
        // Append ticket data
        $csv_line = '"' . implode('","', array_map('str_replace', array_fill(0, count($ticket_data), '"'), array_fill(0, count($ticket_data), '""'), $ticket_data)) . '"' . "\n";
        file_put_contents($tickets_file, $csv_line, FILE_APPEND | LOCK_EX);
        
        $success_message = 'Your support request has been submitted successfully! We will get back to you within 24 hours.';
        
        // Clear form data
        $name = $email = $subject = $message = '';
    }
}

include 'includes/header.php';
?>

<div class="container">
    <!-- Hero Section -->
    <div class="support-hero">
        <div class="hero-content">
            <h1><i class="fas fa-life-ring"></i> Support & Help Center</h1>
            <p>Get help with downloads, payments, technical issues, and more. We're here to assist you!</p>
        </div>
    </div>

    <!-- Quick Help Section -->
    <div class="quick-help-section">
        <h2>Quick Help</h2>
        <div class="help-grid">
            <div class="help-card">
                <div class="help-icon">
                    <i class="fas fa-download"></i>
                </div>
                <h3>Download Issues</h3>
                <p>Having trouble downloading files? Check our download troubleshooting guide.</p>
                <a href="#download-help" class="help-link">Learn More</a>
            </div>
            
            <div class="help-card">
                <div class="help-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h3>Payment Help</h3>
                <p>Questions about payments, refunds, or M-Pesa transactions?</p>
                <a href="#payment-help" class="help-link">Get Help</a>
            </div>
            
            <div class="help-card">
                <div class="help-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h3>Account Support</h3>
                <p>Need help with your account, login issues, or profile settings?</p>
                <a href="#account-help" class="help-link">Account Help</a>
            </div>
            
            <div class="help-card">
                <div class="help-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h3>Content Questions</h3>
                <p>Questions about our educational materials or curriculum alignment?</p>
                <a href="#content-help" class="help-link">Content Info</a>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="contact-section">
        <div class="contact-grid">
            <div class="contact-form-container">
                <h2>Contact Support</h2>
                <p>Can't find what you're looking for? Send us a message and we'll help you out!</p>
                
                <?php if ($success_message): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($error_message): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-triangle"></i>
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($subject ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <select id="priority" name="priority">
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="6" required placeholder="Please describe your issue or question in detail..."><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                    </div>
                    
                    <button type="submit" name="submit_contact" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Send Message
                    </button>
                </form>
            </div>
            
            <div class="contact-info">
                <h3>Other Ways to Reach Us</h3>
                
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <h4>Phone Support</h4>
                        <p><?php echo SITE_PHONE; ?></p>
                        <small>Monday - Friday, 8AM - 6PM EAT</small>
                    </div>
                </div>
                
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <h4>Email Support</h4>
                        <p><?php echo SITE_EMAIL; ?></p>
                        <small>We respond within 24 hours</small>
                    </div>
                </div>
                
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h4>M-Pesa Support</h4>
                        <p>Till Number: <?php echo MPESA_TILL; ?></p>
                        <small>For payment-related issues</small>
                    </div>
                </div>
                
                <div class="response-time">
                    <h4><i class="fas fa-clock"></i> Response Times</h4>
                    <ul>
                        <li><span class="priority urgent">Urgent:</span> Within 2 hours</li>
                        <li><span class="priority high">High:</span> Within 4 hours</li>
                        <li><span class="priority medium">Medium:</span> Within 24 hours</li>
                        <li><span class="priority low">Low:</span> Within 48 hours</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-section" id="faq">
        <h2>Frequently Asked Questions</h2>
        
        <div class="faq-category" id="download-help">
            <h3><i class="fas fa-download"></i> Download & Technical Issues</h3>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Why can't I download files?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Common download issues and solutions:</p>
                        <ul>
                            <li><strong>Browser Issues:</strong> Try clearing your browser cache or using a different browser</li>
                            <li><strong>Internet Connection:</strong> Ensure you have a stable internet connection</li>
                            <li><strong>File Size:</strong> Large files may take time to download</li>
                            <li><strong>Pop-up Blockers:</strong> Disable pop-up blockers for our site</li>
                        </ul>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>What file formats do you provide?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We provide educational materials in various formats:</p>
                        <ul>
                            <li><strong>PDF:</strong> Most documents and textbooks</li>
                            <li><strong>DOC/DOCX:</strong> Editable lesson plans and worksheets</li>
                            <li><strong>PPT/PPTX:</strong> Presentation materials</li>
                            <li><strong>XLS/XLSX:</strong> Records of work and tracking sheets</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="faq-category" id="payment-help">
            <h3><i class="fas fa-credit-card"></i> Payment & Billing</h3>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>How do I make payments?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We accept payments through:</p>
                        <ul>
                            <li><strong>M-Pesa:</strong> Send to Till Number <?php echo MPESA_TILL; ?></li>
                            <li><strong>Bank Transfer:</strong> Contact us for bank details</li>
                            <li><strong>Mobile Money:</strong> Airtel Money and other providers</li>
                        </ul>
                        <p>After payment, send us the transaction code for verification.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>What is your refund policy?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We offer refunds under the following conditions:</p>
                        <ul>
                            <li>Technical issues preventing download within 7 days</li>
                            <li>Duplicate payments</li>
                            <li>Content not as described</li>
                        </ul>
                        <p><a href="refund-policy.php">View full refund policy</a></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="faq-category" id="content-help">
            <h3><i class="fas fa-book"></i> Content & Curriculum</h3>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Are your materials aligned with the Kenyan curriculum?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! All our educational materials are:</p>
                        <ul>
                            <li>Aligned with the current Kenyan curriculum (CBC and 8-4-4)</li>
                            <li>Reviewed by qualified teachers</li>
                            <li>Updated regularly to match curriculum changes</li>
                            <li>Organized by education level, grade, and term</li>
                        </ul>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Can I request specific content?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We welcome content requests:</p>
                        <ul>
                            <li>Use the contact form above to request specific materials</li>
                            <li>Provide details about grade level, subject, and topic</li>
                            <li>We'll notify you when the content becomes available</li>
                            <li>Priority given to frequently requested materials</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Help Resources -->
    <div class="resources-section">
        <h2>Additional Resources</h2>
        <div class="resources-grid">
            <div class="resource-card">
                <i class="fas fa-video"></i>
                <h3>Video Tutorials</h3>
                <p>Watch step-by-step guides on how to navigate and use our platform effectively.</p>
                <a href="#" class="btn btn-outline">Coming Soon</a>
            </div>
            
            <div class="resource-card"> 
    <i class="fas fa-file-alt"></i>
    <h3>User Guide</h3>
    <p>Comprehensive documentation covering all features and functionalities.</p>
    <a href="https://www.schemes.co.ke/downloads/user-guide.pdf" class="btn btn-outline" download>Download PDF</a>
</div>

            <div class="resource-card">
                <i class="fas fa-comments"></i>
                <h3>Community Forum</h3>
                <p>Connect with other educators and share experiences and tips.</p>
                <a href="#" class="btn btn-outline">Join Forum</a>
            </div>
        </div>
    </div>
</div>

<style>
.support-hero {
    background: linear-gradient(135deg, #2e7d32 0%, #388e3c 100%);
    color: white;
    padding: 60px 0;
    text-align: center;
    margin-bottom: 40px;
}

.hero-content h1 {
    font-size: 2.5rem;
    margin-bottom: 15px;
    font-weight: 700;
}

.hero-content p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.quick-help-section {
    margin-bottom: 50px;
}

.quick-help-section h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
    font-size: 2rem;
}

.help-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.help-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.help-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.help-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #2e7d32, #388e3c);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 1.5rem;
}

.help-card h3 {
    margin-bottom: 15px;
    color: #333;
    font-size: 1.3rem;
}

.help-card p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
}

.help-link {
    color: #2e7d32;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.help-link:hover {
    color: #1b5e20;
}

.contact-section {
    background: #f8f9fa;
    padding: 50px 0;
    margin: 50px 0;
}

.contact-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 50px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.contact-form-container {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.contact-form-container h2 {
    margin-bottom: 10px;
    color: #333;
    font-size: 1.8rem;
}

.contact-form-container p {
    color: #666;
    margin-bottom: 30px;
}

.alert {
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #e1e5e9;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #2e7d32;
}

.contact-info {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    height: fit-content;
}

.contact-info h3 {
    margin-bottom: 25px;
    color: #333;
    font-size: 1.4rem;
}

.contact-method {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.contact-method:last-of-type {
    border-bottom: none;
}

.contact-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #2e7d32, #388e3c);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.contact-details h4 {
    margin-bottom: 5px;
    color: #333;
    font-size: 1.1rem;
}

.contact-details p {
    margin-bottom: 5px;
    color: #2e7d32;
    font-weight: 600;
}

.contact-details small {
    color: #666;
    font-size: 0.9rem;
}

.response-time {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.response-time h4 {
    margin-bottom: 15px;
    color: #333;
    display: flex;
    align-items: center;
    gap: 8px;
}

.response-time ul {
    list-style: none;
    padding: 0;
}

.response-time li {
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.priority {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 600;
    min-width: 60px;
    text-align: center;
}

.priority.urgent { background: #fee; color: #c53030; }
.priority.high { background: #fef5e7; color: #dd6b20; }
.priority.medium { background: #edf2f7; color: #4a5568; }
.priority.low { background: #f0fff4; color: #38a169; }

.faq-section {
    margin: 50px 0;
}

.faq-section h2 {
    text-align: center;
    margin-bottom: 40px;
    color: #333;
    font-size: 2rem;
}

.faq-category {
    margin-bottom: 40px;
}

.faq-category h3 {
    color: #333;
    margin-bottom: 20px;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    gap: 10px;
}

.faq-grid {
    display: grid;
    gap: 20px;
}

.faq-item {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
}

.faq-question {
    padding: 20px;
    background: #f8f9fa;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.3s ease;
}

.faq-question:hover {
    background: #e9f5e9;
}

.faq-question h4 {
    margin: 0;
    color: #333;
    font-size: 1.1rem;
}

.faq-answer {
    padding: 20px;
    display: none;
}

.faq-answer.active {
    display: block;
}

.faq-answer ul {
    margin: 10px 0;
    padding-left: 20px;
}

.faq-answer li {
    margin-bottom: 8px;
    line-height: 1.6;
}

.resources-section {
    margin: 50px 0;
    text-align: center;
}

.resources-section h2 {
    margin-bottom: 30px;
    color: #333;
    font-size: 2rem;
}

.resources-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.resource-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.resource-card:hover {
    transform: translateY(-5px);
}

.resource-card i {
    font-size: 2.5rem;
    color: #2e7d32;
    margin-bottom: 20px;
}

.resource-card h3 {
    margin-bottom: 15px;
    color: #333;
    font-size: 1.3rem;
}

.resource-card p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

.btn-primary {
    background: linear-gradient(135deg, #2e7d32, #388e3c);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.3);
}

.btn-outline {
    background: transparent;
    color: #2e7d32;
    border: 2px solid #2e7d32;
}

.btn-outline:hover {
    background: #2e7d32;
    color: white;
}

@media (max-width: 768px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .hero-content h1 {
        font-size: 2rem;
    }

    .help-grid {
        grid-template-columns: 1fr;
    }
}
</style>


<script>
// FAQ Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Close all other answers
            faqQuestions.forEach(otherQuestion => {
                if (otherQuestion !== this) {
                    const otherAnswer = otherQuestion.nextElementSibling;
                    const otherIcon = otherQuestion.querySelector('i');
                    otherAnswer.classList.remove('active');
                    otherIcon.style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current answer
            answer.classList.toggle('active');
            
            // Rotate icon
            if (answer.classList.contains('active')) {
                icon.style.transform = 'rotate(180deg)';
            } else {
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
