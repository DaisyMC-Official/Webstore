<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/Models/Rank.php';

class BasketSession {
    
    private static ?BasketSession $instance = null;
    private static bool $sessionStarted = false;
    
    private function __construct() {
        self::startSession();
    }
    
    public static function getInstance(): BasketSession {
        if (self::$instance === null) {
            self::$instance = new BasketSession();
        }
        return self::$instance;
    }
    
    private static function startSession(): void {
        if (self::$sessionStarted) {
            return;
        }
        
        if (session_status() === PHP_SESSION_NONE) {
            session_name('DAISYMC_BASKET');
            session_start([
                'cookie_httponly' => 1,
                'cookie_secure' => isset($_SERVER['HTTPS']),
                'use_strict_mode' => 1
            ]);
            self::$sessionStarted = true;
        } elseif (session_status() === PHP_SESSION_ACTIVE) {
            self::$sessionStarted = true;
        }
    }
    
    public static function start(): void {
        self::getInstance();

        if (!isset($_SESSION['basket_csrf_token'])) {
            $_SESSION['basket_csrf_token'] = bin2hex(random_bytes(32));
        }
    }
    
    public static function isLoggedIn(): bool {
        return isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
    }
    
    public static function getUsername(): ?string {
        return $_SESSION['username'] ?? null;
    }

    public static function getCsrfToken(): string {
        self::start();

        return $_SESSION['basket_csrf_token'];
    }

    public static function isValidCsrfToken(?string $token): bool {
        if (!is_string($token) || $token === '') {
            return false;
        }

        return hash_equals(self::getCsrfToken(), $token);
    }
    
    public static function login(string $username): void {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = htmlspecialchars(trim($username), ENT_QUOTES, 'UTF-8');
        $_SESSION['login_time'] = time();
        
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = [];
        }
    }
    
    public static function logout(): void {
        $_SESSION['user_logged_in'] = false;
        unset($_SESSION['username']);
        unset($_SESSION['basket']);
        unset($_SESSION['login_time']);
    }
    
    public static function addItem(string $name, float $price, ?string $type = 'rank', ?int $productId = null): array {
        if (!self::isLoggedIn()) {
            return ['success' => false, 'error' => 'Not logged in'];
        }
        
        $item = [
            'id' => uniqid('item_', true),
            'product_id' => $productId,
            'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
            'price' => (float) $price,
            'type' => htmlspecialchars($type, ENT_QUOTES, 'UTF-8'),
            'added_at' => time()
        ];
        
        $_SESSION['basket'][] = $item;
        
        return [
            'success' => true, 
            'item' => $item,
            'count' => count($_SESSION['basket'])
        ];
    }

    public static function addRankItemById(int $rankId): array {
        if (!self::isLoggedIn()) {
            return ['success' => false, 'error' => 'Not logged in'];
        }

        foreach (self::getBasket() as $item) {
            if (($item['type'] ?? null) === 'rank') {
                return ['success' => false, 'error' => 'You can only have one rank in your basket at a time'];
            }
        }

        $rankModel = new Rank();
        $rank = $rankModel->getRankById($rankId);

        if ($rank === null) {
            return ['success' => false, 'error' => 'Rank not found'];
        }

        return self::addItem($rank['name'], $rank['price'], 'rank', $rank['id']);
    }
    
    public static function removeItem(string $itemId): array {
        if (!self::isLoggedIn()) {
            return ['success' => false, 'error' => 'Not logged in'];
        }
        
        $basket = &$_SESSION['basket'];
        
        foreach ($basket as $key => $item) {
            if ($item['id'] === $itemId) {
                unset($basket[$key]);
                $_SESSION['basket'] = array_values($basket);
                return ['success' => true, 'count' => count($_SESSION['basket'])];
            }
        }
        
        return ['success' => false, 'error' => 'Item not found'];
    }
    
    public static function getBasket(): array {
        if (!self::isLoggedIn()) {
            return [];
        }
        
        return $_SESSION['basket'] ?? [];
    }
    
    public static function getBasketCount(): int {
        if (!self::isLoggedIn()) {
            return 0;
        }
        
        return count($_SESSION['basket'] ?? []);
    }
    
    public static function getBasketTotal(): float {
        if (!self::isLoggedIn()) {
            return 0.0;
        }
        
        $basket = $_SESSION['basket'] ?? [];
        return array_sum(array_column($basket, 'price'));
    }
    
    public static function clearBasket(): void {
        if (self::isLoggedIn()) {
            $_SESSION['basket'] = [];
        }
    }
    
    public static function toJson(): string {
        return json_encode([
            'logged_in' => self::isLoggedIn(),
            'username' => self::getUsername(),
            'basket' => self::getBasket(),
            'count' => self::getBasketCount(),
            'total' => self::getBasketTotal()
        ]);
    }
    
    public static function handleApiRequest(): void {
        header('Content-Type: application/json');
        
        $action = $_POST['action'] ?? $_GET['action'] ?? '';
        
        $result = match($action) {
            'login' => self::handleLogin(),
            'logout' => self::handleLogout(),
            'add' => self::handleAdd(),
            'remove' => self::handleRemove(),
            'get' => self::handleGet(),
            'clear' => self::handleClear(),
            'check' => self::handleCheck(),
            default => ['success' => false, 'error' => 'Invalid action']
        };
        
        echo json_encode($result);
        exit;
    }
    
    private static function handleLogin(): array {
        $username = $_POST['username'] ?? '';
        
        if (empty($username)) {
            return ['success' => false, 'error' => 'Username required'];
        }
        
        self::login($username);
        
        return [
            'success' => true,
            'username' => self::getUsername(),
            'basket_count' => self::getBasketCount(),
            'csrf_token' => self::getCsrfToken()
        ];
    }
    
    private static function handleLogout(): array {
        self::logout();
        return ['success' => true];
    }
    
    private static function handleAdd(): array {
        if (!self::isValidCsrfToken($_POST['csrf_token'] ?? null)) {
            return ['success' => false, 'error' => 'Invalid basket token'];
        }

        $rankId = (int) ($_POST['rank_id'] ?? 0);
        $name = $_POST['name'] ?? '';
        $price = (float) ($_POST['price'] ?? 0);
        $type = $_POST['type'] ?? 'rank';

        if ($type === 'rank' && $rankId > 0) {
            return self::addRankItemById($rankId);
        }
        
        if (empty($name) || $price <= 0) {
            return ['success' => false, 'error' => 'Invalid item data'];
        }
        
        return self::addItem($name, $price, $type);
    }
    
    private static function handleRemove(): array {
        if (!self::isValidCsrfToken($_POST['csrf_token'] ?? null)) {
            return ['success' => false, 'error' => 'Invalid basket token'];
        }

        $itemId = $_POST['item_id'] ?? '';
        
        if (empty($itemId)) {
            return ['success' => false, 'error' => 'Item ID required'];
        }
        
        return self::removeItem($itemId);
    }
    
    private static function handleGet(): array {
        return [
            'success' => true,
            'logged_in' => self::isLoggedIn(),
            'username' => self::getUsername(),
            'basket' => self::getBasket(),
            'count' => self::getBasketCount(),
            'total' => self::getBasketTotal()
        ];
    }
    
    private static function handleClear(): array {
        if (!self::isValidCsrfToken($_POST['csrf_token'] ?? null)) {
            return ['success' => false, 'error' => 'Invalid basket token'];
        }

        self::clearBasket();
        return ['success' => true, 'count' => 0];
    }
    
    private static function handleCheck(): array {
        return [
            'logged_in' => self::isLoggedIn(),
            'username' => self::getUsername(),
            'count' => self::getBasketCount(),
            'csrf_token' => self::getCsrfToken()
        ];
    }
}

function basket_add_to_cart(string $name, float $price, ?string $type = 'rank', ?int $productId = null): array {
    return BasketSession::addItem($name, $price, $type, $productId);
}

function basket_is_logged_in(): bool {
    return BasketSession::isLoggedIn();
}

function basket_get_username(): ?string {
    return BasketSession::getUsername();
}

function basket_get_count(): int {
    return BasketSession::getBasketCount();
}

function basket_get_total(): float {
    return BasketSession::getBasketTotal();
}

function basket_render_add_button(string $itemName, float $price, string $label = '+ Add to Cart', ?int $productId = null): string {
    $encodedName = htmlspecialchars($itemName, ENT_QUOTES, 'UTF-8');
    $attributes = ' class="cart-btn" type="button" data-name="' . $encodedName . '" data-price="' . htmlspecialchars((string) $price, ENT_QUOTES, 'UTF-8') . '"';

    if ($productId !== null) {
        $attributes .= ' data-rank-id="' . $productId . '"';
    }

    if (!BasketSession::isLoggedIn()) {
        $attributes .= ' data-requires-login="true"';
    }

    return '<button' . $attributes . '>' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</button>';
}
