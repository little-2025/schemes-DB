<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = '404 - Page Not Found';
http_response_code(404);

include 'includes/header.php';
?>

<div class="container">
    <section class="empty-section">
        <div class="empty-state">
            <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/>
            </svg>
            <h1>404 - Page Not Found</h1>
            <p>The page you're looking for doesn't exist or has been moved.</p>
            <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem;">
                <a href="<?php echo url(); ?>" class="btn btn-primary">Go Home</a>
                <button onclick="history.back()" class="btn btn-outline">Go Back</button>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
