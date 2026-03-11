<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/DBConnection.php';

class Rank
{
    private $conn;

    public function __construct()
    {
        $db = new Database_Connection();
        $this->conn = $db->connect();
    }

    public function getAllRanks(): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM Packages ORDER BY Price ASC");
        $stmt->execute();
        return array_map([$this, 'mapRank'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function getRankById(int $id): ?array
    {
        $stmt = $this->conn->prepare("SELECT * FROM Packages WHERE ID = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $this->mapRank($result) : null;
    }

    public function getRanksByCategory(int $category): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM Packages WHERE `Category` = :category ORDER BY Price ASC");
        $stmt->execute(['category' => $category]);
        return array_map([$this, 'mapRank'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    private function mapRank(array $rank): array
    {
        $name = $rank['Name'] ?? '';

        return [
            'id' => (int) ($rank['ID'] ?? 0),
            'name' => $name,
            'description' => $rank['Description'] ?? null,
            'price' => (float) ($rank['Price'] ?? 0),
            'category_index' => (int) ($rank['Category'] ?? 0),
            'image_url' => $this->buildImageUrl($name),
            'slug' => $this->slugify($name)
        ];
    }

    private function slugify(string $value): string
    {
        $value = strtolower(trim($value));
        $value = preg_replace('/[^a-z0-9]+/', '-', $value);

        return trim($value, '-');
    }

    private function buildImageUrl(string $name): string
    {
        return self::imagePathForName($name);
    }

    /**
     * Build the image path for a package/rank name. Image filename is the slug of the name + .png
     * e.g. "Orchid Rank" -> /images/orchid-rank.png
     */
    public static function imagePathForName(string $name): string
    {
        $slug = strtolower(trim($name));
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = trim($slug, '-');

        return '/include/images/' . $slug . '.png';
    }
}
