<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Get document ID from URL
$doc_id = $_GET['id'] ?? '';
if (empty($doc_id)) {
    header('Location: index.php');
    exit;
}

// Get document details
$document = get_document($doc_id);
if (!$document) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Get category details
$category = get_category_by_id($document['category_id']);

$page_title = $document['title'];
$page_description = $document['description'];

// Get breadcrumb
$breadcrumb = [];
if ($category) {
    $breadcrumb = get_breadcrumb($category['id']);
}

include 'includes/header.php';
?>

<div class="page-header">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="<?php echo url(); ?>">Home</a>
            <?php foreach ($breadcrumb as $crumb): ?>
            <span class="breadcrumb-separator">/</span>
            <a href="category.php?cat=<?php echo e($crumb['slug']); ?>"><?php echo e($crumb['title']); ?></a>
            <?php endforeach; ?>
            <span class="breadcrumb-separator">/</span>
            <span><?php echo e($document['title']); ?></span>
        </nav>
    </div>
</div>

<div class="container">
    <div class="item-layout">
        <div class="item-main">
            <div class="item-header">
                <div class="file-type-badge">
                    <?php 
                    $ext = strtoupper(pathinfo($document['filename'], PATHINFO_EXTENSION));
                    echo $ext;
                    ?>
                </div>
                <h1><?php echo e($document['title']); ?></h1>
                <div class="item-meta">
                    <?php if ($category): ?>
                    <span class="meta-item">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2v11z"/>
                        </svg>
                        <?php echo e($category['title']); ?>
                    </span>
                    <?php endif; ?>
                    <span class="meta-item">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10z"/>
                        </svg>
                        <?php echo number_format($document['hits']); ?> downloads
                    </span>
                    <span class="meta-item">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <?php echo date('M j, Y', strtotime($document['date_uploaded'])); ?>
                    </span>
                </div>
            </div>
            
            <div class="item-content">
                <div class="item-description">
                    <h2>Description</h2>
                    <p><?php echo nl2br(e($document['description'])); ?></p>
                </div>
                
                <div class="item-details">
                    <h3>File Details</h3>
                    <ul class="details-list">
                        <li><strong>File Type:</strong> <?php echo strtoupper(pathinfo($document['filename'], PATHINFO_EXTENSION)); ?></li>
                        <li><strong>Category:</strong> <?php echo $category ? e($category['title']) : 'N/A'; ?></li>
                        <li><strong>Downloads:</strong> <?php echo number_format($document['hits']); ?></li>
                        <li><strong>Uploaded:</strong> <?php echo date('F j, Y', strtotime($document['date_uploaded'])); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="item-sidebar">
            <div class="purchase-card">
                <div class="price-display">
                    <span class="price"><?php echo money_fmt($document['price']); ?></span>
                </div>
                
<form id="userContactForm" onsubmit="event.preventDefault(); initiateDownload(<?php echo e($document['id']); ?>, '<?php echo e($document['title']); ?>', <?php echo e($document['price']); ?>)">
    <div class="input-group">
        <input type="email" id="customerEmail" class="input-field" placeholder="Enter your email" required>
    </div>
    <div class="input-group mt-2">
        <input type="tel" id="customerPhone" class="input-field" placeholder="Enter your phone number" required>
    </div>

    <button type="submit" class="btn btn-primary btn-large mt-3">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
            <polyline points="7,10 12,15 17,10"/>
            <line x1="12" y1="15" x2="12" y2="3"/>
        </svg>
        Pay & Download
    </button>

    <p class="text-xs mt-2 text-gray-600">Your phone and email will be used for sending download links and updates.</p>
</form>
           
                <div class="payment-info">
                    <p><small>Pay via Mpesa Till: <strong><?php echo MPESA_TILL; ?></strong></small></p>
                </div>
            </div>
            
            <div class="share-card">
                <h4>Share this resource</h4>
                <div class="share-buttons">
                    <button class="share-btn" onclick="shareResource('<?php echo e($document['title']); ?>', '<?php echo url('item.php?id=' . $document['id']); ?>')">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="18" cy="5" r="3"/>
                            <circle cx="6" cy="12" r="3"/>
                            <circle cx="18" cy="19" r="3"/>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                        </svg>
                        Share
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function initiateDownload(docId, title, price) {
    openPaymentModal(docId, title, price);
}

function shareResource(title, url) {
    if (navigator.share) {
        navigator.share({
            title: title,
            url: url
        });
    } else {
        // Fallback - copy to clipboard
        navigator.clipboard.writeText(url).then(() => {
            alert('Link copied to clipboard!');
        });
    }
}
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
function payWithPaystack(id, title, amount) {
    var handler = PaystackPop.setup({
        key: '<?php echo PAYSTACK_PUBLIC_KEY; ?>',
        email: 'guest@schemes.co.ke', // Replace with user's email if available
        amount: amount,
        currency: "KES",
        ref: 'DOC-' + Math.floor((Math.random() * 1000000000) + 1),
        metadata: {
            custom_fields: [
                {
                    display_name: "Document Title",
                    variable_name: "title",
                    value: title
                }
            ]
        },
        callback: function(response) {
            // Redirect to download.php after successful payment
            window.location.href = 'download.php?id=' + id + '&ref=' + response.reference;
        },
        onClose: function() {
            alert('Payment window closed. Document not downloaded.');
        }
    });
    handler.openIframe();
}
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
function initiateDownload(docId, title, price) {
    const email = document.getElementById('customerEmail').value.trim();
    const phone = document.getElementById('customerPhone').value.trim();

    if (!email || !phone) {
        alert("Please provide both your email and phone number.");
        return;
    }

    const amountKobo = Math.round(price * 100); // Convert KES to Kobo

    PaystackPop.setup({
        key: '<?php echo PAYSTACK_PUBLIC_KEY; ?>',
        email: email,
        amount: amountKobo,
        currency: 'KES',
        metadata: {
            custom_fields: [
                {
                    display_name: "Phone Number",
                    variable_name: "phone_number",
                    value: phone
                },
                {
                    display_name: "Document Title",
                    variable_name: "document_title",
                    value: title
                }
            ]
        },
        callback: function(response) {
            window.location.href = "download.php?id=" + docId +
                                   "&paid=1" +
                                   "&ref=" + response.reference +
                                   "&email=" + encodeURIComponent(email) +
                                   "&phone=" + encodeURIComponent(phone);
        },
        onClose: function() {
            alert('Payment popup closed.');
        }
    }).openIframe();
}
</script>
<?php include 'includes/footer.php'; ?>
