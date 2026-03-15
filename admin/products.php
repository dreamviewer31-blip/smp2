<?php
require_once '../includes/config.php';
$title = 'Управление продукцией';
include 'includes/header.php';

// Handle delete
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header('Location: products.php');
    exit;
}

// Handle add / edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Edit
        $stmt = $pdo->prepare("UPDATE products SET name=?, category=?, price=?, unit=?, description=?, image_url=? WHERE id=?");
        $stmt->execute([
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $_POST['unit'],
            $_POST['description'],
            $_POST['image_url'],
            $_POST['id']
        ]);
    } else {
        // Add
        $stmt = $pdo->prepare("INSERT INTO products (name, category, price, unit, description, image_url) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $_POST['unit'],
            $_POST['description'],
            $_POST['image_url']
        ]);
    }
    header('Location: products.php');
    exit;
}

$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
$edit_product = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET['edit']]);
    $edit_product = $stmt->fetch();
}
?>

<div class="space-y-10">
    <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
        <h3 class="text-xl font-black text-slate-900 mb-6"><?php echo $edit_product ? 'Редактировать товар' : 'Добавить новый товар'; ?></h3>
        <form method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if ($edit_product): ?>
                <input type="hidden" name="id" value="<?php echo $edit_product['id']; ?>">
            <?php endif; ?>
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Название</label>
                <input name="name" required value="<?php echo $edit_product['name'] ?? ''; ?>" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Категория</label>
                <select name="category" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20">
                    <option <?php echo ($edit_product['category'] ?? '') == 'Бетонные смеси' ? 'selected' : ''; ?>>Бетонные смеси</option>
                    <option <?php echo ($edit_product['category'] ?? '') == 'Блоки' ? 'selected' : ''; ?>>Блоки</option>
                    <option <?php echo ($edit_product['category'] ?? '') == 'Аренда' ? 'selected' : ''; ?>>Аренда</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Цена (₽)</label>
                <input name="price" type="number" required value="<?php echo $edit_product['price'] ?? ''; ?>" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Ед. измерения</label>
                <input name="unit" placeholder="м³, шт, смена" value="<?php echo $edit_product['unit'] ?? ''; ?>" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="md:col-span-2 space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Ссылка на фото</label>
                <input name="image_url" value="<?php echo $edit_product['image_url'] ?? ''; ?>" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="md:col-span-3 space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Описание</label>
                <textarea name="description" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"><?php echo $edit_product['description'] ?? ''; ?></textarea>
            </div>
            <div class="md:col-span-3 flex gap-4">
                <button type="submit" class="flex-1 bg-primary text-white font-bold py-4 rounded-xl shadow-lg shadow-primary/20">
                    <?php echo $edit_product ? 'Обновить товар' : 'Сохранить товар'; ?>
                </button>
                <?php if ($edit_product): ?>
                    <a href="products.php" class="bg-slate-100 text-slate-600 font-bold py-4 px-8 rounded-xl">Отмена</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50">
            <h3 class="text-xl font-black text-slate-900">Список товаров</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-[10px] font-black uppercase tracking-widest">
                        <th class="px-8 py-4">Товар</th>
                        <th class="px-8 py-4">Категория</th>
                        <th class="px-8 py-4">Цена</th>
                        <th class="px-8 py-4 text-right">Действия</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php foreach ($products as $product): ?>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" class="size-12 rounded-xl object-cover bg-slate-100"/>
                                <div class="font-bold text-slate-900"><?php echo htmlspecialchars($product['name']); ?></div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-slate-100 rounded-full text-[10px] font-bold text-slate-500 uppercase"><?php echo htmlspecialchars($product['category']); ?></span>
                        </td>
                        <td class="px-8 py-6 font-black text-slate-900"><?php echo number_format($product['price'], 0, '.', ' '); ?> ₽</td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="?edit=<?php echo $product['id']; ?>" class="text-slate-400 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </a>
                                <a href="?delete=<?php echo $product['id']; ?>" class="text-slate-400 hover:text-red-600 transition-colors" onclick="return confirm('Удалить?')">
                                    <span class="material-symbols-outlined text-xl">delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
