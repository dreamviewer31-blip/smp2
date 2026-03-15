<?php
// Database configuration
// Use /tmp for writable storage in containerized environments (Railway, Render, etc.)
$db_file = getenv('DB_PATH') ?: (__DIR__ . '/../database.sqlite');
if (!is_writable(dirname($db_file))) {
    $db_file = '/tmp/database.sqlite';
}

try {
    $pdo = new PDO("sqlite:$db_file");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Create tables if they don't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE,
        password TEXT
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS site_settings (
        key TEXT PRIMARY KEY,
        value TEXT
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS leads (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        phone TEXT,
        type TEXT DEFAULT 'Запрос',
        message TEXT,
        address TEXT,
        status TEXT DEFAULT 'Новый',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // Migration for address column in leads if it doesn't exist
    try {
        $pdo->exec("ALTER TABLE leads ADD COLUMN address TEXT");
    } catch (Exception $e) {}

    // Delivery Rates table
    $pdo->exec("CREATE TABLE IF NOT EXISTS delivery_rates (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        range_text TEXT,
        price_small TEXT,
        price_medium TEXT,
        price_large TEXT
    )");

    // Products table
    $pdo->exec("CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        category TEXT,
        price REAL,
        unit TEXT,
        description TEXT,
        image_url TEXT,
        strength_class TEXT
    )");

    // Content Blocks table
    $pdo->exec("CREATE TABLE IF NOT EXISTS content_blocks (
        block_id TEXT PRIMARY KEY,
        block_content TEXT,
        block_title TEXT
    )");

    // Seed default settings
    $default_settings = [
        'site_name' => 'MOSCOW CONCRETE',
        'logo_text' => 'CONCRETE',
        'phone' => '+7 (495) 123-45-67',
        'email' => 'info@mosconcrete.ru',
        'address' => 'г. Москва, ул. Промышленная, 10',
        'opening_hours' => '24/7 (Без выходных)'
    ];

    $stmt = $pdo->prepare("INSERT OR IGNORE INTO site_settings (key, value) VALUES (?, ?)");
    foreach ($default_settings as $key => $value) {
        $stmt->execute([$key, $value]);
    }

    // Seed default content
    $default_content = [
        'hero_title' => ['Премиальный бетон', 'Главный заголовок'],
        'hero_subtitle' => ['в Москве и области', 'Подзаголовок Hero'],
        'hero_desc' => ['Сертифицированные бетонные смеси для объектов любого уровня сложности. Собственная лаборатория и гарантированная доставка в течение 2 часов.', 'Описание Hero'],
        'production_title' => ['Передовое производство', 'Заголовок производства'],
        'production_desc' => ['Наше предприятие использует полностью автоматизированные узлы смешивания Liebherr, что гарантирует точность дозировки и стабильное качество.', 'Описание производства'],
        'fleet_title' => ['Наш автопарк', 'Заголовок автопарка'],
        'how_works_title' => ['Как мы работаем', 'Заголовок "Как мы работаем"'],
        'benefit_1_title' => ['Бескомпромиссная надежность', 'Преимущество 1 - Заголовок'],
        'benefit_1_desc' => ['Каждая партия проходит строгий лабораторный контроль перед отгрузкой.', 'Преимущество 1 - Описание'],
        'partners_title' => ['Нам доверяют лидеры отрасли', 'Заголовок партнеров'],
        'partners_list' => ['РОСС-СТРОЙ, МОС-ДОМ, КАПИТАЛ-Г, РЕГИОН-КОНСТ', 'Список партнеров (через запятую)'],
        'calc_title' => ['Рассчитайте стоимость', 'Заголовок калькулятора'],
        'calc_desc' => ['Получите мгновенную оценку вашего заказа на основе объема, марки бетона и расстояния от производства.', 'Описание калькулятора'],
        'calc_delivery_factor' => ['50', 'Коэффициент доставки (руб за км/м³)'],
        'map_title' => ['Зоны доставки', 'Заголовок карты'],
        'map_desc' => ['Быстрая доставка по Москве и всей Московской области. Мы охватываем радиус до 100 км от наших узлов.', 'Описание под картой'],
        'about_hero_title' => ['Надежность в каждой партии', 'О компании: Заголовок'],
        'about_hero_desc' => ['Лидер отрасли благодаря инновационным технологиям смешивания, экологичным методам работы и неизменной приверженности качеству с 1995 года.', 'О компании: Описание'],
        'history_title' => ['Наследие превосходства в бетоне', 'О компании: Заголовок истории'],
        'history_1_year' => ['1995', 'История 1: Год'],
        'history_1_text' => ['Создание первого высокоточного бетонного узла в пригороде Москвы, ориентированного на местную инфраструктуру.', 'История 1: Текст'],
        'history_2_year' => ['Настоящее время', 'История 2: Год'],
        'history_2_text' => ['Сегодня Moscow Concrete — это 5 производственных площадок и 50+ единиц техники, обеспечивающих объекты любой сложности.', 'История 2: Текст'],
        'about_prod_title' => ['Автоматизированные узлы Liebherr', 'О компании: Заголовок производства'],
        'about_prod_desc' => ['Наши заводы оснащены немецким оборудованием последнего поколения, что позволяет минимизировать человеческий фактор и гарантировать стабильную марку бетона в каждой машине.', 'О компании: Описание производства'],
        'about_lab_title' => ['Собственная лаборатория', 'О компании: Заголовок лаборатории'],
        'about_lab_desc' => ['Аккредитованный испытательный центр при заводе осуществляет оперативный контроль качества на всех этапах: от входящего сырья до испытаний готовых образцов на сжатие через 28 суток.', 'О компании: Описание лаборатории'],
        'catalog_cta_title' => ['Не нашли нужную марку?', 'Каталог: Заголовок CTA'],
        'catalog_cta_desc' => ['Свяжитесь с нашим технологом. Мы изготовим бетонную смесь по вашему индивидуальному рецепту.', 'Каталог: Описание CTA'],
    ];

    $stmt = $pdo->prepare("INSERT OR IGNORE INTO content_blocks (block_id, block_content, block_title) VALUES (?, ?, ?)");
    foreach ($default_content as $id => $data) {
        $stmt->execute([$id, $data[0], $data[1]]);
    }

    // Seed delivery rates if empty
    $count = $pdo->query("SELECT COUNT(*) FROM delivery_rates")->fetchColumn();
    if ($count == 0) {
        $rates = [
            ['до 10 км', '3500 ₽ / рейс', '4500 ₽ / рейс', 'Договорная'],
            ['11 - 25 км', '4800 ₽ / рейс', '5800 ₽ / рейс', 'От 600 ₽/м³'],
            ['26 - 50 км', '6500 ₽ / рейс', '8000 ₽ / рейс', 'От 850 ₽/м³']
        ];
        $stmt = $pdo->prepare("INSERT INTO delivery_rates (range_text, price_small, price_medium, price_large) VALUES (?, ?, ?, ?)");
        foreach ($rates as $rate) {
            $stmt->execute($rate);
        }
    }

    // Refresh all settings/content for global use
    $settings_raw = $pdo->query("SELECT * FROM site_settings")->fetchAll();
    $settings = [];
    foreach ($settings_raw as $row) { $settings[$row['key']] = $row['value']; }

    $content_raw = $pdo->query("SELECT * FROM content_blocks")->fetchAll();
    $content = [];
    foreach ($content_raw as $row) { $content[$row['block_id']] = $row['block_content']; }

    // Seed admin if not exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = 'admin'");
    $stmt->execute();
    if (!$stmt->fetch()) {
        $hashed_password = password_hash('admin123', PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES ('admin', ?)");
        $stmt->execute([$hashed_password]);
    }

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
