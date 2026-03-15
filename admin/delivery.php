<?php
require_once '../includes/config.php';
$title = 'Тарифы на доставку';
include 'includes/header.php';

// Handle Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $stmt = $pdo->prepare("UPDATE delivery_rates SET range_text=?, price_small=?, price_medium=?, price_large=? WHERE id=?");
        $stmt->execute([$_POST['range_text'], $_POST['price_small'], $_POST['price_medium'], $_POST['price_large'], $_POST['id']]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO delivery_rates (range_text, price_small, price_medium, price_large) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['range_text'], $_POST['price_small'], $_POST['price_medium'], $_POST['price_large']]);
    }
    header('Location: delivery.php');
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM delivery_rates WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header('Location: delivery.php');
    exit;
}

$rates = $pdo->query("SELECT * FROM delivery_rates")->fetchAll();
$edit_rate = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM delivery_rates WHERE id = ?");
    $stmt->execute([$_GET['edit']]);
    $edit_rate = $stmt->fetch();
}
?>

<div class="space-y-10">
    <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
        <h3 class="text-xl font-black text-slate-900 mb-6"><?php echo $edit_rate ? 'Редактировать интервал' : 'Добавить интервал'; ?></h3>
        <form method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <?php if ($edit_rate): ?>
                <input type="hidden" name="id" value="<?php echo $edit_rate['id']; ?>">
            <?php endif; ?>
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Расстояние (км)</label>
                <input name="range_text" required value="<?php echo $edit_rate['range_text'] ?? ''; ?>" placeholder="напр. до 10 км" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">до 5 м³</label>
                <input name="price_small" required value="<?php echo $edit_rate['price_small'] ?? ''; ?>" placeholder="3500 ₽" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">от 6 до 10 м³</label>
                <input name="price_medium" required value="<?php echo $edit_rate['price_medium'] ?? ''; ?>" placeholder="4500 ₽" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-slate-400 uppercase ml-1">Свыше 10 м³</label>
                <input name="price_large" required value="<?php echo $edit_rate['price_large'] ?? ''; ?>" placeholder="Договорная" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="md:col-span-4 flex gap-4">
                <button type="submit" class="flex-1 bg-primary text-white font-bold py-4 rounded-xl shadow-lg shadow-primary/20">
                    <?php echo $edit_rate ? 'Обновить интервал' : 'Добавить интервал'; ?>
                </button>
                <?php if ($edit_rate): ?>
                    <a href="delivery.php" class="bg-slate-100 text-slate-600 font-bold py-4 px-8 rounded-xl">Отмена</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50">
            <h3 class="text-xl font-black text-slate-900">Текущие тарифы</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-[10px] font-black uppercase tracking-widest">
                        <th class="px-8 py-4">Интервал</th>
                        <th class="px-8 py-4">до 5 м³</th>
                        <th class="px-8 py-4">от 6 до 10 м³</th>
                        <th class="px-8 py-4">Свыше 10 м³</th>
                        <th class="px-8 py-4 text-right">Действия</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php foreach ($rates as $rate): ?>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6 font-bold text-slate-900"><?php echo htmlspecialchars($rate['range_text']); ?></td>
                        <td class="px-8 py-6 text-slate-600"><?php echo htmlspecialchars($rate['price_small']); ?></td>
                        <td class="px-8 py-6 text-slate-600"><?php echo htmlspecialchars($rate['price_medium']); ?></td>
                        <td class="px-8 py-6 text-slate-600"><?php echo htmlspecialchars($rate['price_large']); ?></td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="?edit=<?php echo $rate['id']; ?>" class="text-slate-400 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </a>
                                <a href="?delete=<?php echo $rate['id']; ?>" class="text-slate-400 hover:text-red-600 transition-colors" onclick="return confirm('Удалить?')">
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
