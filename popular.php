<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Popular Resources';
$page_description = 'Most downloaded educational resources this week';

// Get popular documents with real analytics
$popular_docs = get_popular_documents(50);

include 'includes/header.php';
?>

<div class="page-header">
    <div class="container">
        <h1>Popular This Week</h1>
        <p>Most downloaded resources based on real-time analytics</p>
    </div>
</div>

<div class="container">
    <?php if (!empty($popular_docs)): ?>
    <section class="documents-section">
        <div class="documents-header">
            <h2>Top <?php echo count($popular_docs); ?> Resources</h2>
            <p class="analytics-note">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="22,12 18,12 15,21 9,3 6,12 2,12"/>
                </svg>
                Rankings based on downloads, growth rate, and user engagement over the last 7 days
            </p>
        </div>
        
        <div class="documents-table">
            <div class="table-header">
                <div class="col-rank">#</div>
                <div class="col-title">Title</div>
                <div class="col-category">Category</div>
                <div class="col-analytics">Weekly Stats</div>
                <div class="col-price">Price</div>
                <div class="col-action">Action</div>
            </div>
            
            <?php foreach ($popular_docs as $index => $doc): ?>
            <?php $category = get_category_by_id($doc['category_id']); ?>
            <div class="table-row">
                <div class="col-rank">
                    <span class="rank-badge rank-<?php echo $index < 3 ? $index + 1 : 'other'; ?>">
                        <?php echo $index + 1; ?>
                    </span>
                </div>
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
                            <p class="doc-description"><?php echo e(substr($doc['description'], 0, 80)); ?>...</p>
                        </div>
                    </div>
                </div>
                <div class="col-category">
                    <?php echo $category ? e($category['title']) : 'N/A'; ?>
                </div>
                <div class="col-analytics">
                    <div class="analytics-stats">
                        <div class="stat-item">
                            <span class="stat-label">Weekly:</span>
                            <span class="stat-value"><?php echo number_format($doc['weekly_downloads']); ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Total:</span>
                            <span class="stat-value"><?php echo number_format($doc['hits']); ?></span>
                        </div>
                        <?php if ($doc['growth_rate'] != 0): ?>
                        <div class="stat-item">
                            <span class="stat-label">Growth:</span>
                            <span class="stat-value growth-<?php echo $doc['growth_rate'] > 0 ? 'positive' : 'negative'; ?>">
                                <?php echo $doc['growth_rate'] > 0 ? '+' : ''; ?><?php echo number_format($doc['growth_rate'], 1); ?>%
                            </span>
                        </div>
                        <?php endif; ?>
                    </div>
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
    <!-- No popular documents -->
    <section class="empty-section">
        <div class="empty-state">
            <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14,2 14,8 20,8"/>
            </svg>
            <h3>No Popular Resources Yet</h3>
            <p>Popular resources will appear here as users download them.</p>
            <a href="<?php echo url(); ?>" class="btn btn-primary">Browse All Categories</a>
        </div>
    </section>
    <?php endif; ?>
</div>

<style>
.analytics-note {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
    font-size: 0.9rem;
    margin-top: 0.5rem;
}

.analytics-note .icon {
    width: 16px;
    height: 16px;
}

.col-analytics {
    min-width: 150px;
}

.analytics-stats {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.stat-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8rem;
}

.stat-label {
    color: #6b7280;
}

.stat-value {
    font-weight: 600;
    color: #374151;
}

.stat-value.growth-positive {
    color: #059669;
}

.stat-value.growth-negative {
    color: #dc2626;
}

.rank-badge {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
    color: #ffffff;
}

.rank-1 {
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    color: #92400e;
    box-shadow: 0 2px 8px rgba(255, 215, 0, 0.3);
}

.rank-2 {
    background: linear-gradient(135deg, #c0c0c0, #e5e7eb);
    color: #374151;
    box-shadow: 0 2px 8px rgba(192, 192, 192, 0.3);
}

.rank-3 {
    background: linear-gradient(135deg, #cd7f32, #d97706);
    color: #ffffff;
    box-shadow: 0 2px 8px rgba(205, 127, 50, 0.3);
}

.rank-other {
    background: #047857;
    color: #ffffff;
}

@media (max-width: 768px) {
    .table-header,
    .table-row {
        grid-template-columns: 1fr;
    }
    
    .analytics-stats {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .stat-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.1rem;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
