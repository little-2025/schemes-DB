<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Home';
$page_description = 'Educational resources for Kenyan curriculum - CBC, KCSE, JSS materials';

// Get main categories (parent_id = 0)
$main_categories = get_children(0);

// Get popular documents with real analytics
$popular_docs = get_popular_documents(8);

include 'includes/header.php';
?>

<div class="hero-section">
    <div class="container">
        <h1>Find Quality Educational Resources</h1>
        <p>Access comprehensive learning materials for CBC, KCSE, JSS and more</p>
        
        <!-- Search Bar -->
        <div class="search-container">
            <form action="search.php" method="GET" class="search-form">
                <input type="text" name="q" placeholder="Search for resources..." class="search-input" required>
                <button type="submit" class="search-btn">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<section class="categories-section">
    <div class="container">
        <h2>Find Content by Category</h2>
        
        <div class="categories-grid">
            <?php foreach ($main_categories as $category): ?>
            <a href="browse.php?category=<?php echo e($category['slug']); ?>" class="category-card">
                <div class="category-icon">
                    <?php echo $category['icon']; ?>
                </div>
                <div class="category-content">
                    <h3><?php echo e($category['title']); ?></h3>
                </div>
                <div class="category-arrow">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9,18 15,12 9,6"/>
                    </svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if (!empty($popular_docs)): ?>
<section class="popular-section">
    <div class="container">
        <div class="popular-header">
            <h2>Popular This Week</h2>
            <p class="popular-subtitle">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="22,12 18,12 15,21 9,3 6,12 2,12"/>
                </svg>
                Based on real-time download analytics
            </p>
        </div>
        
        <div class="popular-grid">
            <?php foreach ($popular_docs as $index => $doc): ?>
            <?php $category = get_category_by_id($doc['category_id']); ?>
            <div class="popular-card">
                <div class="popular-rank">
                    <span class="rank-number">#<?php echo $index + 1; ?></span>
                    <?php if ($doc['growth_rate'] > 0): ?>
                    <span class="trending-badge">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                            <polyline points="17 6 23 6 23 12"/>
                        </svg>
                        Trending
                    </span>
                    <?php endif; ?>
                </div>
                
                <div class="doc-info">
                    <h3><a href="item.php?id=<?php echo e($doc['id']); ?>"><?php echo e($doc['title']); ?></a></h3>
                    <?php if ($category): ?>
                    <p class="doc-category"><?php echo e($category['title']); ?></p>
                    <?php endif; ?>
                    <p class="doc-price"><?php echo money_fmt($doc['price']); ?></p>
                </div>
                
                <div class="doc-meta">
                    <div class="meta-stats">
                        <span class="weekly-downloads">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7,10 12,15 17,10"/>
                                <line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            <?php echo number_format($doc['weekly_downloads']); ?> this week
                        </span>
                        <span class="total-downloads">
                            <?php echo number_format($doc['hits']); ?> total downloads
                        </span>
                    </div>
                    <?php if ($doc['growth_rate'] > 0): ?>
                    <div class="growth-indicator">
                        <span class="growth-rate positive">
                            +<?php echo number_format($doc['growth_rate'], 1); ?>% growth
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center">
            <a href="popular.php" class="btn btn-outline">View All Popular Resources</a>
        </div>
    </div>
</section>
<?php endif; ?>

<style>
.popular-header {
    text-align: center;
    margin-bottom: 3rem;
}

.popular-subtitle {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    color: #6b7280;
    font-size: 1rem;
    margin-top: 0.5rem;
}

.popular-subtitle .icon {
    width: 18px;
    height: 18px;
}

.popular-rank {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.rank-number {
    background: #047857;
    color: #ffffff;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
}

.trending-badge {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    background: #fef3c7;
    color: #92400e;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
}

.trending-badge .icon {
    width: 12px;
    height: 12px;
}

.meta-stats {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    font-size: 0.85rem;
}

.weekly-downloads {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    color: #047857;
    font-weight: 500;
}

.weekly-downloads .icon {
    width: 14px;
    height: 14px;
}

.total-downloads {
    color: #6b7280;
}

.growth-indicator {
    margin-top: 0.5rem;
    padding-top: 0.5rem;
    border-top: 1px solid #f3f4f6;
}

.growth-rate.positive {
    color: #059669;
    font-weight: 500;
    font-size: 0.8rem;
}
</style>

<?php include 'includes/footer.php'; ?>
