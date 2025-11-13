<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Get URL parameters
$category_slug = $_GET['category'] ?? '';
$level_slug = $_GET['level'] ?? '';
$grade_slug = $_GET['grade'] ?? '';
$term_slug = $_GET['term'] ?? '';

// Get category
$category = get_category($category_slug);
if (!$category) {
    header('Location: index.php');
    exit;
}

$page_title = $category['title'];
$level = null;
$grade = null;
$term = null;

if ($term_slug) {
    $term = get_term_by_id($_GET['term_id'] ?? 0);
    $grade = get_grade_by_id($_GET['grade_id'] ?? 0);
    $level = get_level_by_id($_GET['level_id'] ?? 0);
    $documents = get_documents_by_hierarchy($category['id'], $level['id'], $grade['id'], $term['id']);
    $page_title .= ' - ' . $level['title'] . ' - ' . $grade['title'] . ' - ' . $term['title'];
} elseif ($grade_slug) {
    $grade = get_grade_by_id($_GET['grade_id'] ?? 0);
    $level = get_level_by_id($_GET['level_id'] ?? 0);
    $terms = get_terms($grade['id']);
    if (empty($terms)) {
        $documents = get_documents_by_hierarchy($category['id'], $level['id'], $grade['id']);
    }
    $page_title .= ' - ' . $level['title'] . ' - ' . $grade['title'];
} elseif ($level_slug) {
    $level = get_level_by_id($_GET['level_id'] ?? 0);
    $grades = get_grades($level['id']);
    $page_title .= ' - ' . $level['title'];
} else {
    $levels = get_education_levels($category['id']);
}

// Get breadcrumb
$breadcrumb = get_hierarchical_breadcrumb(
    $category['id'], 
    $level['id'] ?? null, 
    $grade['id'] ?? null, 
    $term['id'] ?? null
);

include 'includes/header.php';
?>

<div class="page-header">
    <div class="container">
        <nav class="breadcrumb">
            <a href="<?php echo url(); ?>">Home</a>
            <?php foreach ($breadcrumb as $crumb): ?>
            <span class="breadcrumb-separator">/</span>
            <a href="<?php echo e($crumb['url']); ?>"><?php echo e($crumb['title']); ?></a>
            <?php endforeach; ?>
        </nav>
        <h1><?php echo e($page_title); ?></h1>
    </div>
</div>

<div class="container">
<?php if (isset($levels) && !empty($levels)): ?>
    <!-- Education Levels -->
    <section class="hierarchy-section">
        <h2>Select Education Level</h2>
        <div class="hierarchy-grid">
            <?php foreach ($levels as $level): ?>
            <a href="browse.php?category=<?php echo e($category['slug']); ?>&level=<?php echo e($level['slug']); ?>&level_id=<?php echo e($level['id']); ?>" class="hierarchy-card">
                <div class="hierarchy-icon">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <div class="hierarchy-content">
                    <h3><?php echo e($level['title']); ?></h3>
                    <p><?php echo e($level['description']); ?></p>
                </div>
                <div class="hierarchy-arrow">
                    <svg class="icon" viewBox="0 0 24 24"><polyline points="9,18 15,12 9,6"/></svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>

<?php elseif (isset($grades) && !empty($grades)): ?>
    <!-- Grades -->
    <section class="hierarchy-section">
        <h2>Select Grade</h2>
        <div class="hierarchy-grid">
            <?php foreach ($grades as $grade): ?>
            <a href="browse.php?category=<?php echo e($category['slug']); ?>&level=<?php echo e($level['slug']); ?>&grade=<?php echo e($grade['slug']); ?>&level_id=<?php echo e($level['id']); ?>&grade_id=<?php echo e($grade['id']); ?>" class="hierarchy-card">
                <div class="hierarchy-icon">
                    <svg class="icon" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <div class="hierarchy-content">
                    <h3><?php echo e($grade['title']); ?></h3>
                    <p><?php echo e($grade['description']); ?></p>
                </div>
                <div class="hierarchy-arrow">
                    <svg class="icon" viewBox="0 0 24 24"><polyline points="9,18 15,12 9,6"/></svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>

<?php elseif (isset($terms) && !empty($terms)): ?>
    <!-- Terms -->
    <section class="hierarchy-section">
        <h2>Select Term</h2>
        <div class="hierarchy-grid">
            <?php foreach ($terms as $term): ?>
            <a href="browse.php?category=<?php echo e($category['slug']); ?>&level=<?php echo e($level['slug']); ?>&grade=<?php echo e($grade['slug']); ?>&term=<?php echo e($term['slug']); ?>&level_id=<?php echo e($level['id']); ?>&grade_id=<?php echo e($grade['id']); ?>&term_id=<?php echo e($term['id']); ?>" class="hierarchy-card">
                <div class="hierarchy-icon">
                    <svg class="icon" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <div class="hierarchy-content">
                    <h3><?php echo e($term['title']); ?></h3>
                    <p><?php echo e($term['description']); ?></p>
                </div>
                <div class="hierarchy-arrow">
                    <svg class="icon" viewBox="0 0 24 24"><polyline points="9,18 15,12 9,6"/></svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>

<?php elseif (isset($documents) && !empty($documents)): ?>
    <!-- Search + Documents -->
    <section class="documents-section">
        <div class="documents-header">
            <h2>Available Resources (<?php echo count($documents); ?>)</h2>
        </div>

        <!-- Search Box -->
        <div class="search-box" style="margin-bottom: 1rem;">
            <input type="text" id="liveSearchInput" placeholder="Search documents..." style="padding: 0.5rem; width: 100%; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <!-- Document List -->
        <div class="file-cards-grid" id="documentList">
            <?php foreach ($documents as $doc): ?>
            <div class="file-card document-card">
                <div class="file-card-header">
                    <div class="file-icon"><?php echo get_file_icon($doc['filename']); ?></div>
                    <div class="file-type-badge"><?php echo strtoupper(pathinfo($doc['filename'], PATHINFO_EXTENSION)); ?></div>
                </div>
                <div class="file-card-content">
                    <h3><a href="item.php?id=<?php echo e($doc['id']); ?>"><?php echo e($doc['title']); ?></a></h3>
                    <p class="file-description"><?php echo e(substr($doc['description'], 0, 100)); ?>...</p>
                    <div class="file-meta">
                        <div class="file-hierarchy">
                            <span class="meta-badge category"><?php echo e($category['title']); ?></span>
                            <?php if ($level): ?><span class="meta-badge level"><?php echo e($level['title']); ?></span><?php endif; ?>
                            <?php if ($grade): ?><span class="meta-badge grade"><?php echo e($grade['title']); ?></span><?php endif; ?>
                            <?php if ($term): ?><span class="meta-badge term"><?php echo e($term['title']); ?></span><?php endif; ?>
                        </div>
                        <div class="file-stats">
                            <span class="file-downloads"><?php echo number_format($doc['hits']); ?> downloads</span>
                            <span class="file-price"><?php echo money_fmt($doc['price']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="file-card-actions">
                    <a href="item.php?id=<?php echo e($doc['id']); ?>" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

<?php else: ?>
    <!-- Empty -->
    <section class="empty-section">
        <div class="empty-state">
            <h3>No Resources Available</h3>
            <p>There are currently no resources in this section. Please check back later.</p>
            <a href="<?php echo url(); ?>" class="btn btn-primary">Browse Other Categories</a>
        </div>
    </section>
<?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('liveSearchInput');
    const cards = document.querySelectorAll('#documentList .document-card');

    input.addEventListener('input', function () {
        const search = this.value.toLowerCase();
        cards.forEach(card => {
            const text = card.innerText.toLowerCase();
            card.style.display = text.includes(search) ? 'block' : 'none';
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
