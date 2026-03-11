<?php
require_once '/application/include/DBConnection.php';

$db = new Database_Connection();
$connection = $db->connect();

$query = $connection->prepare("SELECT * FROM Categories ORDER BY Name ASC");
$query->execute();

$categories = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="/include/components/categories/CategoryStyle.css">

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