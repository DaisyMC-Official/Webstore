<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/DBConnection.php';

$db = new Database_Connection();
$connection = $db->connect();

$query = $connection->prepare("SELECT * FROM Categories ORDER BY ID ASC");
$query->execute();

$categories = $query->fetchAll(PDO::FETCH_ASSOC);

ob_start();
?>
<?php $b = $GLOBALS['base_url'] ?? ''; ?>
<link rel="stylesheet" href="<?php echo htmlspecialchars($b, ENT_QUOTES, 'UTF-8'); ?>/include/components/categories/CategoryStyle.css">

<nav class="category-dropdown" id="category-dropdown">
    <button type="button" class="category-dropdown-trigger" aria-expanded="false" aria-controls="category-dropdown-content" id="category-dropdown-trigger">
        <span class="category-dropdown-label">Click to navigate</span>
        <i class="fa-solid fa-chevron-down category-dropdown-chevron" aria-hidden="true"></i>
    </button>
    <div class="category-dropdown-content" id="category-dropdown-content">
        <aside class="category">
            <h3 class="category-title">START SHOPPING</h3>
            <a href="/home/" class="category-item active">
                <img src="https://mc-heads.net/head/879e54cbe87867d14b2fbdf3f1870894352048dfecd962846dea893b2154c85/40">
                <span class="category-text">Home</span>
            </a>

            <?php foreach ($categories as $category): ?>
                <?php
                // This is needed to replace all spaces from the database's fetched Category with a valid URL slug.
                // IMPORTANT: Make sure if a url contains a space, you replace the space with a hyphen -
                // e.g "rank upgrades" -> "rank-upgrades"
                $slug = strtolower(trim(preg_replace('/\s+/', '-', $category['Name'])));
                ?>

                <a href="/categories/<?php echo $slug; ?>/" class="category-item">
                    <img src="https://mc-heads.net/head/<?php echo $category['Icon']; ?>/40">
                    <span class="category-text"><?php echo $category['Name']; ?></span>
                </a>
            <?php endforeach; ?>
        </aside>
    </div>
</nav>
<script>
(function() {
    var dropdown = document.getElementById('category-dropdown');
    var trigger = document.getElementById('category-dropdown-trigger');
    var content = document.getElementById('category-dropdown-content');
    if (!dropdown || !trigger || !content) return;
    trigger.addEventListener('click', function() {
        var expanded = dropdown.classList.toggle('category-dropdown--expanded');
        trigger.setAttribute('aria-expanded', expanded ? 'true' : 'false');
    });
})();
</script>
<?php return ob_get_clean(); ?>