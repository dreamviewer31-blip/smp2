<?php
require_once 'includes/config.php';
$page_title = 'Каталог продукции | Moscow Concrete';
include 'includes/header.php';

// Handle Filtering
$category = $_GET['category'] ?? 'all';
$search = $_GET['search'] ?? '';

$conditions = [];
$params = [];

if ($category !== 'all') {
    $conditions[] = "category = ?";
    $params[] = $category;
}

if (!empty($search)) {
    $conditions[] = "(name LIKE ? OR description LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

$query = "SELECT * FROM products";
if (!empty($conditions)) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}
$query .= " ORDER BY id DESC";

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$products = $stmt->fetchAll();

// Get unique categories for the filters
$categories = $pdo->query("SELECT DISTINCT category FROM products")->fetchAll(PDO::FETCH_COLUMN);

// If no products, let's seed some for demonstration
if (empty($products) && $category === 'all') {
    $seed_data = [
        ['Бетон М100 (В7.5)', 'Бетонные смеси', 3500, 'м³', 'Для подготовительных работ и стяжек.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCIdZCbUvhIfLmstUJnnrq5uJ8G_qyi-ec6PsaqmJMWAVQUdgzwmfQX6Cy_eSPO0qBXxzdxjV067df4SCRZmhhyfsOBDwMwCjpfO71oeyVcYQN4UZN6Z654apa-kuhMRATLZZoWQyl57Om5hz7_5xyfh_LE2OfUBKt2BD7Br5MFrrKVILNuTpYcKKod27PyhOLmwqylbwwSa8a29TDTnPzbPm1ifzMySA6s3hv_Wq2OewX5ppB9nRByEKzP_nlCevBZGt7kPx2zK2ws', 'B7.5'],
        ['Бетон М200 (В15)', 'Бетонные смеси', 3800, 'м³', 'Для фундаментов и отмосток.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDuryZ1W9r3F7OaHq8n...Placeholder', 'B15'],
        ['Бетон М300 (В22.5)', 'Бетонные смеси', 4250, 'м³', 'Универсальный бетон для несущих стен.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuD9w82fsroClxvgxq-w1lPP4AtQtUc0pNceM7veInf1Ryfn2VUr35QZ44NRyhK21Hnk2ghqzAlDhdg4ueAFQF15ihJUHoxt4cw-CaTVTVilE6jrOExIZuweJ3LqcCBBut5nf0Cp52x6s1Zh8IA3sAxFxfU1u_bvHlDxa_qhKrhvE3iGSjM6IFLcpZAaNU7m0k04uhO5J2GgCV_Dm_7XjyJJ5mVzW_ECAWQMn6p5G7WB6xrOCZS_qZUQQK4eNP8QKt2yV-N4uWJeKo1Y', 'B22.5'],
        ['ФБС блок 24.4.6', 'Блоки', 3100, 'шт', 'Фундаментный блок стеновой.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDss1LxPemr8o1bHiRaLr-31OXCe_UBlBpLopJ9IRQXYJivvU7acSUfdOtMZ3kg7Z6UiUg3S1GhmrKixtH5UHCRJ_K4WzG48Nkj-GzWECvTiIgpmyAKcB3oIgbJI2CQb2-bPR4MP0I-4rPPwUZmybZhRfRWVprpL1aG9iZJu1VY8deUP-wTO3TIcMfZCigb8tUePmh7-sbOUgYZ-mDiK6-3h7gg-b5V7MmboVx2gFAEegrBrGfm_cUJjzhzRDjpkhjWydfeo6UweZdN', 'N/A'],
        ['Аренда насоса 32м', 'Аренда', 18000, 'смена', 'Вылет стрелы 32м для подачи бетона.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDe3u1mvHejKNHBWGVNmedYVy5g0SvPVmBcaMI_Jnrae_dMvm74TUU36wSIwleDyhtfVKF-HFWsZfpehOmbY1XLcvI4jxH_rmYx5_uL3YqeUEBdaH_G9OJozVA4tqSu7h852SEpjPJXqZOhylTlZCnYph_aLYb0Om3CmxFIRKe_zi55mmnigHPgidORU8J28pmYSaH7oRHrAF5yHddj_XKmzBPzcxhXdNXC2iE1Gn3aD1iCIqs0VOvifS8BUacchiTGiQpmhKnXjPKd', 'N/A'],
    ];
    $stmt = $pdo->prepare("INSERT INTO products (name, category, price, unit, description, image_url, strength_class) VALUES (?, ?, ?, ?, ?, ?, ?)");
    foreach ($seed_data as $row) {
        $stmt->execute($row);
    }
    // Refresh
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll();
}
?>

<main class="container mx-auto px-4 md:px-10 py-12">
    <div class="flex flex-col gap-10">
        <!-- Header & Search -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
            <div class="space-y-2">
                <nav class="flex text-sm text-slate-400 gap-2 mb-4 font-medium font-inter">
                    <a class="hover:text-primary transition-colors" href="index.php">Главная</a>
                    <span>/</span>
                    <span class="text-slate-600">Каталог</span>
                </nav>
                <h1 class="text-4xl lg:text-6xl font-black tracking-tight text-slate-900">Продукция и <span class="text-primary">цены</span></h1>
            </div>
            <form action="catalog.php" method="GET" class="relative w-full md:w-[400px]">
                <?php if ($category !== 'all'): ?>
                    <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
                <?php endif; ?>
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input name="search" value="<?php echo htmlspecialchars($search); ?>" class="w-full rounded-2xl border-0 bg-white pl-12 pr-6 py-5 shadow-2xl focus:ring-2 focus:ring-primary/20 transition-all font-inter" placeholder="Поиск по названию..."/>
            </form>
        </div>

        <!-- Filters & Sorting -->
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6 border-b border-slate-100 pb-8">
            <div class="flex flex-wrap gap-2">
                <a href="catalog.php?category=all&search=<?php echo urlencode($search); ?>" class="px-6 py-3 rounded-xl font-bold text-sm transition-all <?php echo $category === 'all' ? 'bg-slate-900 text-white shadow-xl' : 'bg-white text-slate-600 hover:bg-slate-50'; ?>">Все товары</a>
                <?php foreach ($categories as $cat): ?>
                    <a href="catalog.php?category=<?php echo urlencode($cat); ?>&search=<?php echo urlencode($search); ?>" class="px-6 py-3 rounded-xl font-bold text-sm transition-all <?php echo $category === $cat ? 'bg-slate-900 text-white shadow-xl' : 'bg-white text-slate-600 hover:bg-slate-50'; ?>">
                        <?php echo htmlspecialchars($cat); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Сортировка:</span>
                <select class="bg-transparent border-0 font-bold text-slate-900 focus:ring-0 cursor-pointer font-inter">
                    <option>По умолчанию</option>
                    <option>Сначала дешевые</option>
                    <option>Сначала дорогие</option>
                </select>
            </div>
        </div>

        <!-- Catalog Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($products as $product): ?>
            <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-500 flex flex-col">
                <div class="h-56 overflow-hidden relative">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>"/>
                    <div class="absolute top-5 left-5">
                        <span class="bg-white/95 backdrop-blur px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm text-slate-900"><?php echo htmlspecialchars($product['category']); ?></span>
                    </div>
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <h3 class="font-black text-xl mb-3 text-slate-900 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="text-sm text-slate-500 mb-8 line-clamp-2 leading-relaxed font-inter"><?php echo htmlspecialchars($product['description']); ?></p>
                    <div class="mt-auto flex justify-between items-end">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Цена за <?php echo htmlspecialchars($product['unit']); ?></span>
                            <span class="text-2xl font-black text-slate-900"><?php echo number_format($product['price'], 0, '.', ' '); ?> <span class="text-primary">₽</span></span>
                        </div>
                        <button onclick="openOrderModal('<?php echo addslashes($product['name']); ?>')" class="size-12 bg-slate-900 text-white rounded-xl hover:bg-primary transition-all shadow-lg flex items-center justify-center group-hover:-translate-y-1">
                            <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA Section -->
        <div class="mt-20 bg-slate-900 rounded-[3rem] p-10 md:p-20 relative overflow-hidden shadow-2xl">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(245,102,36,0.15),transparent)]"></div>
            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-12">
                <div class="max-w-2xl text-center lg:text-left">
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-6"><?php echo htmlspecialchars($content['catalog_cta_title'] ?? 'Не нашли нужную марку?'); ?></h2>
                    <p class="text-slate-400 text-lg"><?php echo htmlspecialchars($content['catalog_cta_desc'] ?? 'Свяжитесь с нашим технологом. Мы изготовим бетонную смесь по вашему индивидуальному рецепту.'); ?></p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                    <button class="bg-primary text-white px-10 py-5 rounded-2xl font-black text-lg shadow-xl shadow-primary/20 hover:scale-105 transition-transform">Консультация эксперта</button>
                    <button class="bg-white/10 text-white border border-white/10 px-10 py-5 rounded-2xl font-black text-lg hover:bg-white/20 transition-all">Скачать прайс PDF</button>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include 'includes/order_modal.php'; ?>
<?php include 'includes/footer.php'; ?>
