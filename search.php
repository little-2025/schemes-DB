<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$query = $_GET['q'] ?? '';
$page_title = 'Search Results';

if (!empty($query)) {
    $page_title = 'Search Results for "' . $query . '"';
    $results = search_documents($query);
} else {
    $results = [];
}

include 'includes/header.php';
?>

<div class="page-header">
    <div class="container">
        <h1>Search Results</h1>
        <?php if (!empty($query)): ?>
        <p>Showing results for: <strong>"<?php echo e($query); ?>"</strong></p>
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <!-- Search Form -->
    <div class="search-section">
        <form action="search.php" method="GET" class="search-form">
            <input type="text" name="q" value="<?php echo e($query); ?>" placeholder="Search for resources..." class="search-input" required>
            <button type="submit" class="search-btn">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>
                </svg>
            </button>
        </form>
    </div>

    <?php if (!empty($query)): ?>
        <?php if (!empty($results)): ?>
        <!-- Search Results -->
        <section class="search-results">
            <div class="results-header">
                <h2>Found <?php echo count($results); ?> result<?php echo count($results) !== 1 ? 's' : ''; ?></h2>
            </div>
            
            <div class="documents-table">
                <div class="table-header">
                    <div class="col-title">Title</div>
                    <div class="col-category">Category</div>
                    <div class="col-price">Price</div>
                    <div class="col-action">Action</div>
                </div>
                
                <?php foreach ($results as $doc): ?>
                <?php $category = get_category_by_id($doc['category_id']); ?>
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
                        <?php echo $category ? e($category['title']) : 'N/A'; ?>
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
        <!-- No Results -->
        <section class="empty-section">
            <div class="empty-state">
                <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>
                </svg>
                <h3>No Results Found</h3>
                <p>We couldn't find any resources matching "<?php echo e($query); ?>". Try different keywords or browse our categories.</p>
                <a href="<?php echo url(); ?>" class="btn btn-primary">Browse Categories</a>
            </div>
        </section>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
