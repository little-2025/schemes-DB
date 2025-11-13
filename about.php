<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'About Us - Quality Educational Resources';
$page_description = 'Learn about Schemes.co.ke, Kenya\'s leading platform for educational resources, schemes of work, and teaching materials.';

include 'includes/header.php';
?>

<div class="page-container">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header animate-fade-in">
            <div class="breadcrumb">
                <a href="<?= url() ?>">Home</a>
                <span class="separator">/</span>
                <span class="current">About Us</span>
            </div>
            <h1 class="page-title animate-slide-up">
                <i class="fas fa-graduation-cap header-icon"></i>
                About Schemes.co.ke
            </h1>
            <p class="page-subtitle animate-slide-up-delay">Empowering Education in Kenya Through Quality Resources</p>
        </div>

        <!-- About Content -->
        <div class="about-content">
            <div class="content-grid">
                <div class="content-main">
                    <!-- Mission Section -->
                    <section class="about-section animate-slide-in-left" data-delay="0.1s">
                        <div class="section-icon pulse-animation">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h2><i class="fas fa-bullseye section-title-icon"></i> Our Mission</h2>
                        <p class="lead">At Schemes.co.ke, we are dedicated to transforming education in Kenya by providing high-quality, accessible educational resources to teachers, students, and educational institutions across the country.</p>
                        
                        <p>We believe that every educator deserves access to comprehensive, well-structured teaching materials that align with the Competency Based Curriculum (CBC) and traditional education systems. Our mission is to bridge the gap between curriculum requirements and practical classroom implementation.</p>
                    </section>

                    <!-- What We Offer Section -->
                    <section class="about-section animate-slide-in-right" data-delay="0.2s">
                        <div class="section-icon pulse-animation">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h2><i class="fas fa-graduation-cap section-title-icon"></i> What We Offer</h2>
                        <div class="offerings-grid">
                            <div class="offering-item animate-float" data-delay="0.1s">
                                <div class="offering-icon rotate-on-hover">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <h3>Schemes of Work</h3>
                                <p>Comprehensive schemes covering all subjects from Grade 1 to Form 4, meticulously aligned with CBC requirements and KICD guidelines.</p>
                            </div>
                            
                            <div class="offering-item animate-float" data-delay="0.2s">
                                <div class="offering-icon rotate-on-hover">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <h3>Lesson Plans</h3>
                                <p>Ready-to-use, detailed lesson plans that save teachers time while ensuring quality instruction delivery and learning outcomes.</p>
                            </div>
                            
                            <div class="offering-item animate-float" data-delay="0.3s">
                                <div class="offering-icon rotate-on-hover">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                                <h3>Assessment Tools</h3>
                                <p>Comprehensive assessment materials including tests, exams, rubrics, and evaluation tools for continuous assessment.</p>
                            </div>
                            
                            <div class="offering-item animate-float" data-delay="0.4s">
                                <div class="offering-icon rotate-on-hover">
                                    <i class="fas fa-sticky-note"></i>
                                </div>
                                <h3>Revision Materials</h3>
                                <p>Targeted revision notes and materials for KCPE, KCSE, and other national examinations to boost student performance.</p>
                            </div>

                            <div class="offering-item animate-float" data-delay="0.5s">
                                <div class="offering-icon rotate-on-hover">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <h3>Records of Work</h3>
                                <p>Professional record-keeping templates and documentation tools to help teachers maintain proper academic records.</p>
                            </div>

                            <div class="offering-item animate-float" data-delay="0.6s">
                                <div class="offering-icon rotate-on-hover">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h3>Teacher Support</h3>
                                <p>Ongoing professional development resources and support materials to enhance teaching effectiveness.</p>
                            </div>
                        </div>
                    </section>

                    <!-- Our Commitment Section -->
                    <section class="about-section animate-slide-in-left" data-delay="0.3s">
                        <div class="section-icon pulse-animation">
                            <i class="fas fa-star"></i>
                        </div>
                        <h2><i class="fas fa-star section-title-icon"></i> Our Commitment to Quality</h2>
                        <p>Every resource on our platform undergoes rigorous review by experienced educators to ensure the highest standards of quality and relevance.</p>
                        
                        <div class="quality-features">
                            <div class="quality-item animate-slide-in-bottom" data-delay="0.1s">
                                <i class="fas fa-check-circle quality-check-icon bounce-on-hover"></i>
                                <span>Alignment with current curriculum standards</span>
                            </div>
                            <div class="quality-item animate-slide-in-bottom" data-delay="0.2s">
                                <i class="fas fa-check-circle quality-check-icon bounce-on-hover"></i>
                                <span>Age-appropriate content and methodology</span>
                            </div>
                            <div class="quality-item animate-slide-in-bottom" data-delay="0.3s">
                                <i class="fas fa-check-circle quality-check-icon bounce-on-hover"></i>
                                <span>Clear learning objectives and outcomes</span>
                            </div>
                            <div class="quality-item animate-slide-in-bottom" data-delay="0.4s">
                                <i class="fas fa-check-circle quality-check-icon bounce-on-hover"></i>
                                <span>Practical applicability in classroom settings</span>
                            </div>
                            <div class="quality-item animate-slide-in-bottom" data-delay="0.5s">
                                <i class="fas fa-check-circle quality-check-icon bounce-on-hover"></i>
                                <span>Regular updates to reflect curriculum changes</span>
                            </div>
                            <div class="quality-item animate-slide-in-bottom" data-delay="0.6s">
                                <i class="fas fa-check-circle quality-check-icon bounce-on-hover"></i>
                                <span>Peer-reviewed by experienced educators</span>
                            </div>
                        </div>
                    </section>

                    <!-- Why Choose Us Section -->
                    <section class="about-section animate-slide-in-right" data-delay="0.4s">
                        <div class="section-icon pulse-animation">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <h2><i class="fas fa-thumbs-up section-title-icon"></i> Why Choose Schemes.co.ke?</h2>
                        <div class="why-choose-grid">
                            <div class="reason-item animate-zoom-in" data-delay="0.1s">
                                <div class="reason-icon wiggle-on-hover">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h4>Trusted by Thousands</h4>
                                <p>Over 15,000 educators across Kenya trust our platform for their daily teaching needs and professional development.</p>
                            </div>
                            
                            <div class="reason-item animate-zoom-in" data-delay="0.2s">
                                <div class="reason-icon wiggle-on-hover">
                                    <i class="fas fa-download"></i>
                                </div>
                                <h4>Instant Access</h4>
                                <p>Download your resources immediately after purchase - no waiting, no delays, just instant access to quality materials.</p>
                            </div>
                            
                            <div class="reason-item animate-zoom-in" data-delay="0.3s">
                                <div class="reason-icon wiggle-on-hover">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <h4>Affordable Pricing</h4>
                                <p>Quality education resources at prices that won't strain your budget, with flexible payment options including M-Pesa.</p>
                            </div>
                            
                            <div class="reason-item animate-zoom-in" data-delay="0.4s">
                                <div class="reason-icon wiggle-on-hover">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h4>24/7 Support</h4>
                                <p>Our dedicated support team is always ready to help with any questions or technical assistance you may need.</p>
                            </div>
                        </div>
                    </section>

                    <!-- Our Story Section -->
                    <section class="about-section animate-slide-in-left" data-delay="0.5s">
                        <div class="section-icon pulse-animation">
                            <i class="fas fa-history"></i>
                        </div>
                        <h2><i class="fas fa-history section-title-icon"></i> Our Story</h2>
                        <p class="lead">Founded with a passion for educational excellence, Schemes.co.ke emerged from the recognition that Kenyan educators needed better access to quality teaching resources.</p>
                        
                        <p>Our journey began when we noticed the challenges teachers faced in adapting to the new Competency-Based Curriculum (CBC). Many educators were struggling to find comprehensive, well-structured materials that aligned with the new curriculum requirements.</p>
                        
                        <p>We set out to create a platform that would serve as a one-stop resource center for all educational needs - from schemes of work and lesson plans to assessment tools and revision materials. Today, we proudly serve thousands of teachers, students, and parents across Kenya, providing them with the tools they need to succeed in their educational endeavors.</p>
                        
                        <p>Our commitment extends beyond just providing resources; we aim to build a community of educators who can share experiences, learn from each other, and collectively improve the quality of education in Kenya.</p>
                    </section>
                </div>

                <!-- Sidebar -->
                <div class="content-sidebar">
                    <!-- Stats Card -->
                    <div class="stats-card animate-slide-in-right" data-delay="0.2s">
                        <h3><i class="fas fa-chart-line sidebar-title-icon pulse-icon"></i> Our Impact</h3>
                        <div class="stat-item counter-animation" data-target="15000">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-users stat-icon"></i>
                            </div>
                            <span class="stat-number">0+</span>
                            <span class="stat-label">Teachers Served</span>
                        </div>
                        <div class="stat-item counter-animation" data-target="75000">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-download stat-icon"></i>
                            </div>
                            <span class="stat-number">0+</span>
                            <span class="stat-label">Resources Downloaded</span>
                        </div>
                        <div class="stat-item counter-animation" data-target="1500">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-school stat-icon"></i>
                            </div>
                            <span class="stat-number">0+</span>
                            <span class="stat-label">Schools Reached</span>
                        </div>
                        <div class="stat-item counter-animation" data-target="47">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-map-marker-alt stat-icon"></i>
                            </div>
                            <span class="stat-number">0</span>
                            <span class="stat-label">Counties Covered</span>
                        </div>
                        <div class="stat-item counter-animation" data-target="2000">
                            <div class="stat-icon-wrapper">
                                <i class="fas fa-file-alt stat-icon"></i>
                            </div>
                            <span class="stat-number">0+</span>
                            <span class="stat-label">Quality Resources</span>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="contact-card animate-slide-in-right" data-delay="0.3s">
                        <h3><i class="fas fa-envelope sidebar-title-icon pulse-icon"></i> Get in Touch</h3>
                        <p>Have questions about our resources or need custom materials for your institution?</p>
                        <div class="contact-info">
                            <p class="contact-item animate-slide-in-left" data-delay="0.1s">
                                <i class="fas fa-phone contact-icon"></i> +254 710 178 7242
                            </p>
                            <p class="contact-item animate-slide-in-left" data-delay="0.2s">
                                <i class="fas fa-envelope contact-icon"></i> info@schemes.co.ke
                            </p>
                            <p class="contact-item animate-slide-in-left" data-delay="0.3s">
                                <i class="fas fa-mobile-alt contact-icon"></i> M-Pesa Till: 5272865
                            </p>
                        </div>
                        <a href="<?= url('contact') ?>" class="btn btn-primary btn-animated">
                            <i class="fas fa-paper-plane btn-icon"></i> Contact Us
                        </a>
                    </div>

                    <!-- Quick Links Card -->
                    <div class="quick-links-card animate-slide-in-right" data-delay="0.4s">
                        <h3><i class="fas fa-link sidebar-title-icon pulse-icon"></i> Quick Links</h3>
                        <ul class="quick-links-list">
                            <li class="animate-slide-in-left" data-delay="0.1s">
                                <a href="https://www.schemes.co.ke/browse.php?category=lesson-plans" class="quick-link-item">
                                    <i class="fas fa-chalkboard-teacher quick-link-icon"></i> 
                                    <span>Lesson Plans</span>
                                    <i class="fas fa-arrow-right arrow-icon"></i>
                                </a>
                            </li>
                            <li class="animate-slide-in-left" data-delay="0.2s">
                                <a href="https://www.schemes.co.ke/browse.php?category=schemes-of-work" class="quick-link-item">
                                    <i class="fas fa-book-open quick-link-icon"></i> 
                                    <span>Schemes of Work</span>
                                    <i class="fas fa-arrow-right arrow-icon"></i>
                                </a>
                            </li>
                            <li class="animate-slide-in-left" data-delay="0.3s">
                                <a href="https://www.schemes.co.ke/browse.php?category=assessment-tools" class="quick-link-item">
                                    <i class="fas fa-clipboard-list quick-link-icon"></i> 
                                    <span>Assessment Tools</span>
                                    <i class="fas fa-arrow-right arrow-icon"></i>
                                </a>
                            </li>
                            <li class="animate-slide-in-left" data-delay="0.4s">
                                <a href="https://schemes.co.ke/browse.php?category=kcse-revision" class="quick-link-item">
                                    <i class="fas fa-sticky-note quick-link-icon"></i> 
                                    <span>KCSE Revision Materials</span>
                                    <i class="fas fa-arrow-right arrow-icon"></i>
                                </a>
                            </li>
                            <li class="animate-slide-in-left" data-delay="0.5s">
                                <a href="https://www.schemes.co.ke/browse.php?category=records-of-work" class="quick-link-item">
                                    <i class="fas fa-file-alt quick-link-icon"></i> 
                                    <span>Records of Work</span>
                                    <i class="fas fa-arrow-right arrow-icon"></i>
                                </a>
                            </li>
                            <li class="animate-slide-in-left" data-delay="0.6s">
                                <a href="https://www.schemes.co.ke/browse.php?category=textbooks" class="quick-link-item">
                                    <i class="fas fa-book quick-link-icon"></i> 
                                    <span>Textbooks</span>
                                    <i class="fas fa-arrow-right arrow-icon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Base Styles */
.page-container {
    min-height: calc(100vh - 200px);
    padding: 2rem 0;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
    padding: 2rem 0;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
    border-radius: var(--border-radius);
    overflow: hidden;
    position: relative;
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
    animation: shimmer 3s infinite;
}

/* Header Icon */
.header-icon {
    font-size: 3rem;
    color: white;
    margin-right: 1rem;
    vertical-align: middle;
}

.breadcrumb {
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.breadcrumb a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb a:hover {
    color: white;
}

.separator {
    margin: 0 0.5rem;
    opacity: 0.6;
}

.current {
    opacity: 0.8;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

.page-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.about-content {
    max-width: 1200px;
    margin: 0 auto;
}

.content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 3rem;
}

.about-section {
    margin-bottom: 4rem;
    background: white;
    padding: 2.5rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-light);
    position: relative;
    transition: all 0.3s ease;
}

.about-section:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.section-icon {
    position: absolute;
    top: -20px;
    left: 2.5rem;
    width: 50px;
    height: 50px;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    z-index: 2;
}

/* Section Title Icons */
.section-title-icon {
    font-size: 1.8rem;
    color: var(--primary-color);
    margin-right: 1rem;
    vertical-align: middle;
}

.about-section h2 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    font-size: 1.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

.lead {
    font-size: 1.1rem;
    font-weight: 500;
    color: var(--text-dark);
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.offerings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.offering-item {
    text-align: center;
    padding: 2.5rem 2rem;
    background: var(--light-bg);
    border-radius: var(--border-radius);
    border: 2px solid transparent;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.offering-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.offering-item:hover::before {
    left: 100%;
}

.offering-item:hover {
    border-color: var(--primary-light);
    transform: translateY(-10px) scale(1.02);
    box-shadow: var(--shadow-medium);
}

.offering-icon {
    width: 90px;
    height: 90px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin: 0 auto 1.5rem;
    font-size: 2.2rem;
    transition: all 0.3s ease;
}

.offering-item h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-size: 1.3rem;
    font-weight: 600;
}

.quality-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.quality-item {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    background: var(--light-bg);
    border-radius: var(--border-radius);
    border-left: 4px solid var(--primary-color);
    transition: all 0.3s ease;
}

.quality-item:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-light);
}

/* Quality Check Icons */
.quality-check-icon {
    color: var(--primary-color);
    margin-right: 1.5rem;
    font-size: 1.8rem;
    min-width: 30px;
}

.why-choose-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.reason-item {
    text-align: center;
    padding: 2.5rem 2rem;
    background: var(--light-bg);
    border-radius: var(--border-radius);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.reason-item::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, var(--primary-color), var(--primary-light));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.reason-item:hover::after {
    opacity: 0.1;
}

.reason-item:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: var(--shadow-medium);
}

.reason-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    position: relative;
    z-index: 2;
}

.reason-item h4 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-weight: 600;
    position: relative;
    z-index: 2;
    font-size: 1.2rem;
}

.reason-item p {
    position: relative;
    z-index: 2;
}

.content-sidebar {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.stats-card,
.contact-card,
.quick-links-card {
    background: white;
    padding: 2rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-light);
    border-top: 4px solid var(--primary-color);
    transition: all 0.3s ease;
}

.stats-card:hover,
.contact-card:hover,
.quick-links-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

/* Sidebar Title Icons */
.sidebar-title-icon {
    font-size: 1.5rem;
    color: var(--primary-color);
    margin-right: 0.8rem;
    vertical-align: middle;
}

.stats-card h3,
.contact-card h3,
.quick-links-card h3 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    font-size: 1.3rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

.stat-item {
    text-align: center;
    margin-bottom: 1.5rem;
    padding: 1.5rem;
    background: var(--light-bg);
    border-radius: var(--border-radius);
    transition: all 0.3s ease;
    position: relative;
}

.stat-item:hover {
    transform: scale(1.05);
    background: var(--primary-light);
}

/* Stat Icons */
.stat-icon-wrapper {
    margin-bottom: 1rem;
}

.stat-icon {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
    display: block;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-muted);
    font-weight: 500;
}

.contact-info {
    margin: 1.5rem 0;
}

.contact-item {
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    font-size: 1rem;
    transition: all 0.3s ease;
    padding: 0.5rem;
    border-radius: var(--border-radius);
}

.contact-item:hover {
    transform: translateX(5px);
    color: var(--primary-color);
    background: var(--light-bg);
}

/* Contact Icons */
.contact-icon {
    color: var(--primary-color);
    margin-right: 1rem;
    font-size: 1.3rem;
    min-width: 25px;
}

/* Button Icons */
.btn-icon {
    font-size: 1.1rem;
    margin-right: 0.5rem;
}

.quick-links-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.quick-links-list li {
    margin-bottom: 1rem;
}

.quick-link-item {
    color: var(--text-dark);
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 1rem;
    border-radius: var(--border-radius);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
    justify-content: space-between;
}

.quick-link-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: var(--primary-light);
    transition: left 0.3s ease;
    z-index: -1;
}

.quick-link-item:hover::before {
    left: 0;
}

.quick-link-item:hover {
    color: var(--primary-color);
    transform: translateX(10px);
    box-shadow: var(--shadow-light);
}

/* Quick Link Icons */
.quick-link-icon {
    color: var(--primary-color);
    margin-right: 1rem;
    font-size: 1.3rem;
    min-width: 25px;
}

.arrow-icon {
    color: var(--primary-color);
    font-size: 1rem;
    transition: transform 0.3s ease;
}

.quick-link-item:hover .arrow-icon {
    transform: translateX(5px);
}

.quick-link-item span {
    flex: 1;
    font-weight: 500;
}

.btn-animated {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    padding: 0.8rem 1.5rem;
    font-size: 1rem;
}

.btn-animated::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

.btn-animated:hover::before {
    left: 100%;
}

.btn-animated:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Animation Classes */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { 
        opacity: 0;
        transform: translateY(30px);
    }
    to { 
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInBottom {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

@keyframes wiggle {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-5deg); }
    75% { transform: rotate(5deg); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

/* Animation Triggers */
.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-slide-up {
    animation: slideUp 0.8s ease-out;
}

.animate-slide-up-delay {
    animation: slideUp 0.8s ease-out 0.2s both;
}

.animate-slide-in-left {
    animation: slideInLeft 0.8s ease-out;
}

.animate-slide-in-right {
    animation: slideInRight 0.8s ease-out;
}

.animate-slide-in-bottom {
    animation: slideInBottom 0.6s ease-out;
}

.animate-zoom-in {
    animation: zoomIn 0.6s ease-out;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

/* Hover Animations */
.pulse-animation {
    animation: pulse 2s infinite;
}

.pulse-icon {
    animation: pulse 2s infinite;
}

.rotate-on-hover {
    transition: transform 0.3s ease;
}

.offering-item:hover .rotate-on-hover {
    transform: rotate(360deg);
}

.wiggle-on-hover {
    transition: transform 0.3s ease;
}

.reason-item:hover .wiggle-on-hover {
    animation: wiggle 0.5s ease-in-out;
}

.bounce-on-hover {
    transition: transform 0.3s ease;
}

.quality-item:hover .bounce-on-hover {
    animation: bounce 0.5s ease-in-out;
}

/* Counter Animation */
.counter-animation {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease;
}

.counter-animation.animate {
    opacity: 1;
    transform: translateY(0);
}

/* Mobile Responsive Design */
@media (max-width: 768px) {
    .content-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .page-title {
        font-size: 2rem;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .header-icon {
        font-size: 2.5rem;
        margin-right: 0;
        margin-bottom: 0.5rem;
    }
    
    .page-subtitle {
        font-size: 1rem;
    }
    
    .about-section {
        padding: 2rem 1.5rem;
    }
    
    .section-icon {
        left: 1.5rem;
        width: 45px;
        height: 45px;
        font-size: 1.3rem;
    }
    
    .section-title-icon {
        font-size: 1.5rem;
        margin-right: 0.8rem;
    }
    
    .about-section h2 {
        font-size: 1.5rem;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .offering-icon {
        width: 80px;
        height: 80px;
        font-size: 2rem;
    }
    
    .reason-icon {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
    }
    
    .quality-check-icon {
        font-size: 1.5rem;
        margin-right: 1rem;
    }
    
    .stat-icon {
        font-size: 2rem;
    }
    
    .contact-icon {
        font-size: 1.2rem;
    }
    
    .quick-link-icon {
        font-size: 1.2rem;
    }
    
    .sidebar-title-icon {
        font-size: 1.3rem;
    }
    
    .offerings-grid,
    .why-choose-grid,
    .quality-features {
        grid-template-columns: 1fr;
    }
    
    .quality-features {
        grid-template-columns: 1fr;
    }
    
    .quality-item {
        padding: 1.2rem;
    }
    
    .offering-item,
    .reason-item {
        padding: 2rem 1.5rem;
    }
    
    .stats-card,
    .contact-card,
    .quick-links-card {
        margin-bottom: 1.5rem;
        padding: 1.5rem;
    }
    
    .quick-link-item {
        padding: 0.8rem;
        font-size: 0.95rem;
    }
    
    .contact-item {
        font-size: 0.95rem;
    }
}

@media (max-width: 480px) {
    .header-icon {
        font-size: 2rem;
    }
    
    .page-title {
        font-size: 1.8rem;
    }
    
    .offering-icon {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
    }
    
    .reason-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .stat-icon {
        font-size: 1.8rem;
    }
    
    .section-icon {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
    }
}

/* Delay animations based on data-delay attribute */
[data-delay="0.1s"] { animation-delay: 0.1s; animation-fill-mode: both; }
[data-delay="0.2s"] { animation-delay: 0.2s; animation-fill-mode: both; }
[data-delay="0.3s"] { animation-delay: 0.3s; animation-fill-mode: both; }
[data-delay="0.4s"] { animation-delay: 0.4s; animation-fill-mode: both; }
[data-delay="0.5s"] { animation-delay: 0.5s; animation-fill-mode: both; }
[data-delay="0.6s"] { animation-delay: 0.6s; animation-fill-mode: both; }
</style>

<script>
// Counter Animation
function animateCounters() {
    const counters = document.querySelectorAll('.counter-animation');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.dataset.target);
                const numberElement = counter.querySelector('.stat-number');
                
                counter.classList.add('animate');
                
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    
                    if (target >= 1000) {
                        numberElement.textContent = Math.floor(current).toLocaleString() + '+';
                    } else {
                        numberElement.textContent = Math.floor(current);
                    }
                }, 20);
                
                observer.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
}

// Initialize animations when page loads
document.addEventListener('DOMContentLoaded', function() {
    animateCounters();
    
    // Add stagger animation to elements with data-delay
    const delayedElements = document.querySelectorAll('[data-delay]');
    delayedElements.forEach(element => {
        const delay = element.dataset.delay;
        element.style.animationDelay = delay;
    });
});

// Smooth scroll for internal links
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
</script>

<?php include 'includes/footer.php'; ?>