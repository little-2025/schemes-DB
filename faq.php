<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Frequently Asked Questions';
$page_description = 'Common questions and answers about our educational platform';

include 'includes/header.php';
?>

<div class="page-header">
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <p>Find answers to common questions about our platform</p>
    </div>
</div>

<div class="container">
    <div class="faq-content">
        <div class="faq-search">
            <input type="text" id="faqSearch" placeholder="Search FAQs..." class="search-input">
        </div>

        <div class="faq-categories">
            <button class="faq-category-btn active" data-category="all">All Questions</button>
            <button class="faq-category-btn" data-category="payment">Payment</button>
            <button class="faq-category-btn" data-category="download">Downloads</button>
            <button class="faq-category-btn" data-category="content">Content</button>
            <button class="faq-category-btn" data-category="technical">Technical</button>
        </div>

        <div class="faq-sections">
            <!-- Payment Questions -->
            <div class="faq-section" data-category="payment">
                <h2>Payment & Billing</h2>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How do I pay for resources?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We accept payments through Mpesa. Simply send the amount to our Till Number <strong>5272685</strong>, then click "Mark as Paid" on the download page to access your content.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What payment methods do you accept?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Currently, we only accept Mpesa payments. This ensures fast, secure transactions for all users in Kenya. We're working on adding more payment options in the future.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Are there any transaction fees?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We don't charge additional fees. You only pay the listed price for each resource plus standard Mpesa transaction charges from your mobile provider.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can I get a refund?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Due to the digital nature of our products, refunds are limited. However, we offer refunds for technical issues, duplicate purchases, or corrupted files within 7 days. See our <a href="refund-policy.php">Refund Policy</a> for details.</p>
                    </div>
                </div>
            </div>

            <!-- Download Questions -->
            <div class="faq-section" data-category="download">
                <h2>Downloads & Access</h2>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How do I download resources after payment?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>After making payment via Mpesa, return to the resource page and click "Mark as Paid". Once verified, you'll be able to download the file immediately.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What file formats are available?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Our resources are available in various formats including PDF, DOC, DOCX, PPT, PPTX, XLS, and XLSX. The format is clearly indicated on each resource page.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can I download the same file multiple times?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, once you've purchased a resource, you can download it multiple times. We recommend saving a backup copy to your device or cloud storage.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What if my download fails or the file is corrupted?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Contact us immediately at info@schemes.co.ke with your transaction details. We'll resend the file or provide a refund if the issue cannot be resolved.</p>
                    </div>
                </div>
            </div>

            <!-- Content Questions -->
            <div class="faq-section" data-category="content">
                <h2>Content & Curriculum</h2>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What curriculum do you cover?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We cover the Kenyan education system including CBC (Competency Based Curriculum), KCSE preparation materials, JSS (Junior Secondary School) resources, and traditional 8-4-4 system materials.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Are your materials up-to-date with current curriculum?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we regularly update our content to align with the latest curriculum changes from the Ministry of Education. All CBC materials follow the current competency-based approach.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can teachers use these materials in their classrooms?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Our resources are designed for both teachers and students. Teachers can use lesson plans, schemes of work, and assessment tools in their classrooms.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do you have resources for all grade levels?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we have materials from Pre-Primary to Form 4, including college-level resources. Our hierarchical system makes it easy to find content for specific grades and terms.</p>
                    </div>
                </div>
            </div>

            <!-- Technical Questions -->
            <div class="faq-section" data-category="technical">
                <h2>Technical Support</h2>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What devices can I use to access the platform?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Our platform works on all modern devices including computers, tablets, and smartphones. You just need an internet connection and a web browser.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do I need special software to open the files?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Most files can be opened with common software: PDF files with any PDF reader, Office documents with Microsoft Office or free alternatives like LibreOffice or Google Docs.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Why can't I see some categories or resources?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Some categories may not have content yet, or you might be experiencing a temporary loading issue. Try refreshing the page or contact support if the problem persists.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How do I report a technical problem?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Contact us at info@schemes.co.ke or call +254 710 178 7242. Please include details about the problem, your device type, and browser for faster resolution.</p>
                    </div>
                </div>
            </div>

            <!-- General Questions -->
            <div class="faq-section" data-category="all">
                <h2>General Questions</h2>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Is registration required to browse resources?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>No, you can browse all available resources without registration. However, you'll need to make payment to download and access the actual content.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How often do you add new content?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We add new resources regularly, typically several times per week. Popular and trending content is highlighted on our homepage.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can I suggest content or request specific resources?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We welcome suggestions. Contact us at info@schemes.co.ke with your requests, and we'll do our best to source or create the content you need.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do you offer bulk discounts for schools?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We're working on institutional packages for schools and educational organizations. Contact us directly to discuss your specific needs and potential discounts.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-contact">
            <h3>Still have questions?</h3>
            <p>Can't find what you're looking for? Our support team is here to help!</p>
            <div class="contact-options">
                <a href="mailto:info@schemes.co.ke" class="btn btn-primary">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    Email Support
                </a>
                <a href="tel:+254710178742" class="btn btn-outline">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    Call Us
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.faq-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem 0;
}

.faq-search {
    margin-bottom: 2rem;
}

.faq-search .search-input {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 1rem;
}

.faq-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 3rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.faq-category-btn {
    padding: 8px 16px;
    border: 1px solid #d1d5db;
    background: #ffffff;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.25s ease;
    font-size: 0.9rem;
}

.faq-category-btn:hover,
.faq-category-btn.active {
    background: #047857;
    color: #ffffff;
    border-color: #047857;
}

.faq-section {
    margin-bottom: 3rem;
}

.faq-section h2 {
    color: #047857;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #e7f9f4;
}

.faq-item {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    margin-bottom: 1rem;
    overflow: hidden;
}

.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    cursor: pointer;
    background: #ffffff;
    transition: background 0.25s ease;
}

.faq-question:hover {
    background: #f9fafb;
}

.faq-question h3 {
    margin: 0;
    font-size: 1.1rem;
    color: #374151;
}

.faq-toggle {
    font-size: 1.5rem;
    font-weight: bold;
    color: #047857;
    transition: transform 0.25s ease;
}

.faq-item.active .faq-toggle {
    transform: rotate(45deg);
}

.faq-answer {
    padding: 0 1.5rem;
    max-height: 0;
    overflow: hidden;
    transition: all 0.25s ease;
    background: #f9fafb;
}

.faq-item.active .faq-answer {
    padding: 1.5rem;
    max-height: 500px;
}

.faq-answer p {
    margin: 0;
    color: #6b7280;
    line-height: 1.6;
}

.faq-answer a {
    color: #047857;
    text-decoration: underline;
}

.faq-contact {
    background: #e7f9f4;
    padding: 2rem;
    border-radius: 12px;
    text-align: center;
    margin-top: 3rem;
}

.faq-contact h3 {
    color: #047857;
    margin-bottom: 0.5rem;
}

.faq-contact p {
    color: #6b7280;
    margin-bottom: 1.5rem;
}

.contact-options {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .faq-categories {
        justify-content: center;
    }
    
    .contact-options {
        flex-direction: column;
        align-items: center;
    }
    
    .contact-options .btn {
        width: 200px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Toggle functionality
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    });

    // Category filtering
    const categoryBtns = document.querySelectorAll('.faq-category-btn');
    const faqSections = document.querySelectorAll('.faq-section');
    
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const category = btn.dataset.category;
            
            // Update active button
            categoryBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Show/hide sections
            faqSections.forEach(section => {
                if (category === 'all' || section.dataset.category === category) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });

    // Search functionality
    const searchInput = document.getElementById('faqSearch');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer p').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
