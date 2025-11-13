<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Get category slug from URL
$cat_slug = $_GET['cat'] ?? '';
if (empty($cat_slug)) {
    header('Location: index.php');
    exit;
}

// Get category details
$category = get_category($cat_slug);
if (!$category) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

$page_title = $category['title'];
$page_description = 'Browse ' . $category['title'] . ' resources';

// Get child categories
$children = get_children($category['id']);

// Get documents if this is a leaf category
$documents = [];
if (empty($children)) {
    $documents = get_documents($category['id']);
}

// Get breadcrumb
$breadcrumb = get_breadcrumb($category['id']);

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
        </nav>
        
        <h1><?php echo e($category['title']); ?></h1>
    </div>
</div>

<div class="container">
    <?php if (!empty($children)): ?>
    <!-- Show subcategories -->
    <section class="subcategories-section">
        <div class="categories-grid">
            <?php foreach ($children as $child): ?>
            <a href="category.php?cat=<?php echo e($child['slug']); ?>" class="category-card">
                <div class="category-icon">
                    <?php echo $child['icon']; ?>
                </div>
                <div class="category-content">
                    <h3><?php echo e($child['title']); ?></h3>
                </div>
                <div class="category-arrow">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9,18 15,12 9,6"/>
                    </svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>
    
    <?php elseif (!empty($documents)): ?>
    <!-- Show documents -->
    <section class="documents-section">
        <div class="documents-header">
            <h2>Available Resources (<?php echo count($documents); ?>)</h2>
        </div>
        
        <div class="documents-table">
            <div class="table-header">
                <div class="col-title">Title</div>
                <div class="col-category">Category</div>
                <div class="col-price">Price</div>
                <div class="col-action">Action</div>
            </div>
            
            <?php foreach ($documents as $doc): ?>
            <div class="table-row">
                <div class="col-title">
                    <div class="doc-title">
                        <div class="file-icon">
                            <?php if (pathinfo($doc['filename'], PATHINFO_EXTENSION) === 'pdf'): ?>
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14,2 14,8 20,8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                                <polyline points="10,9 9,9 8,9"/>
                            </svg>
                            <?php else: ?>
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14,2 14,8 20,8"/>
                                <line x1="12" y1="18" x2="12" y2="12"/>
                                <line x1="9" y1="15" x2="15" y2="15"/>
                            </svg>
                            <?php endif; ?>
                        </div>
                        <div>
                            <a href="item.php?id=<?php echo e($doc['id']); ?>" class="doc-link"><?php echo e($doc['title']); ?></a>
                            <p class="doc-description"><?php echo e(substr($doc['description'], 0, 100)); ?>...</p>
                        </div>
                    </div>
                </div>
                <div class="col-category">
                    <?php echo e($category['title']); ?>
                </div>
                <div class="col-price">
                    <?php echo money_fmt($doc['price']); ?>
                </div>
                <div class="col-action">
                    <a href="item.php?id=<?php echo e($doc['id']); ?>" class="btn btn-sm btn-primary">View</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <?php else: ?>
    <!-- No content -->
    <section class="empty-section">
        <div class="empty-state">
            <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14,2 14,8 20,8"/>
            </svg>
            <h3>No Resources Available</h3>
            <p>There are currently no resources in this category. Please check back later.</p>
            <a href="<?php echo url(); ?>" class="btn btn-primary">Browse Other Categories</a>
        </div>
    </section>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
