<?php
require_once '../includes/config.php';
$title = 'Настройки сайта';
include 'includes/header.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updates = [
        'site_name' => $_POST['site_name'] ?? '',
        'logo_text' => $_POST['logo_text'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'email' => $_POST['email'] ?? '',
        'address' => $_POST['address'] ?? '',
        'opening_hours' => $_POST['opening_hours'] ?? '',
    ];

    foreach ($updates as $key => $value) {
        $stmt = $pdo->prepare("UPDATE site_settings SET value = ? WHERE key = ?");
        $stmt->execute([$value, $key]);
    }
    
    // Refresh global settings
    $settings_raw = $pdo->query("SELECT * FROM site_settings")->fetchAll();
    foreach ($settings_raw as $row) {
        $settings[$row['key']] = $row['value'];
    }
    
    $message = 'Настройки успешно сохранены!';
}
?>

<div class="max-w-4xl mx-auto py-10">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="text-3xl font-black text-slate-900">Общие настройки</h1>
            <p class="text-slate-500">Управление контактными данными и брендингом проекта</p>
        </div>
        <?php if ($message): ?>
            <div class="bg-green-100 text-green-700 px-6 py-3 rounded-2xl flex items-center gap-2 animate-bounce">
                <span class="material-symbols-outlined">check_circle</span>
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>

    <form method="POST" class="space-y-8 bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-400 uppercase tracking-widest ml-1">Название сайта</label>
                <input type="text" name="site_name" value="<?php echo htmlspecialchars($settings['site_name'] ?? ''); ?>" class="w-full bg-slate-50 border-0 rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary/20 outline-none" placeholder="MOSCOW CONCRETE"/>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-400 uppercase tracking-widest ml-1">Текст логотипа</label>
                <input type="text" name="logo_text" value="<?php echo htmlspecialchars($settings['logo_text'] ?? ''); ?>" class="w-full bg-slate-50 border-0 rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary/20 outline-none" placeholder="CONCRETE"/>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-400 uppercase tracking-widest ml-1">Телефон</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($settings['phone'] ?? ''); ?>" class="w-full bg-slate-50 border-0 rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary/20 outline-none" placeholder="+7 (495) 000-00-00"/>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-400 uppercase tracking-widest ml-1">E-mail</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($settings['email'] ?? ''); ?>" class="w-full bg-slate-50 border-0 rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary/20 outline-none" placeholder="info@mosconcrete.ru"/>
            </div>
            <div class="space-y-2 md:col-span-2">
                <label class="text-sm font-bold text-slate-400 uppercase tracking-widest ml-1">Адрес офиса</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($settings['address'] ?? ''); ?>" class="w-full bg-slate-50 border-0 rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary/20 outline-none" placeholder="г. Москва, Варшавское ш., 125"/>
            </div>
            <div class="space-y-2 md:col-span-2">
                <label class="text-sm font-bold text-slate-400 uppercase tracking-widest ml-1">Часы работы</label>
                <input type="text" name="opening_hours" value="<?php echo htmlspecialchars($settings['opening_hours'] ?? ''); ?>" class="w-full bg-slate-50 border-0 rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary/20 outline-none" placeholder="24/7 (Без выходных)"/>
            </div>
        </div>

        <div class="pt-8 border-t border-slate-50 flex justify-end">
            <button type="submit" class="bg-primary text-white px-10 py-5 rounded-2xl font-black text-lg shadow-xl shadow-primary/30 hover:scale-105 transition-transform">
                Сохранить изменения
            </button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
