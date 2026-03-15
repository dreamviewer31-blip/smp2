<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Админ-панель | Moscow Concrete</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#f56624',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-gray-50 flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col fixed h-full z-50">
        <div class="p-6">
            <div class="flex items-center gap-2 font-black text-lg tracking-tight">
                <div class="bg-primary p-1.5 rounded-lg">
                    <span class="material-symbols-outlined block text-sm">conveyor_belt</span>
                </div>
                <span>MOSCOW<span class="text-primary">CONCRETE</span></span>
            </div>
        </div>
        <nav class="flex-1 px-4 py-4 space-y-1">
            <a href="index.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'bg-white/10 text-primary' : 'text-slate-400'; ?>">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-medium">Дашборд</span>
            </a>
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'bg-white/10 text-primary' : 'text-slate-400'; ?>">
                <span class="material-symbols-outlined">inventory_2</span>
                <span class="font-medium">Продукция</span>
            </a>
            <a href="content.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'content.php' ? 'bg-white/10 text-primary' : 'text-slate-400'; ?>">
                <span class="material-symbols-outlined">edit_note</span>
                <span class="font-medium">Контент</span>
            </a>
            <a href="leads.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'leads.php' ? 'bg-white/10 text-primary' : 'text-slate-400'; ?>">
                <span class="material-symbols-outlined">description</span>
                <span class="font-medium">Заявки</span>
            </a>
            <a href="delivery.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'delivery.php' ? 'bg-white/10 text-primary' : 'text-slate-400'; ?>">
                <span class="material-symbols-outlined">local_shipping</span>
                <span class="font-medium">Доставка</span>
            </a>
            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'bg-white/10 text-primary' : 'text-slate-400'; ?>">
                <span class="material-symbols-outlined">settings</span>
                <span class="font-medium">Настройки</span>
            </a>
        </nav>
        <div class="p-4 border-t border-white/5">
            <a href="logout.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-500/10 text-slate-400 hover:text-red-500 transition-colors">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-medium">Выйти</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-8">
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-2xl font-black text-slate-900"><?php echo $title ?? 'Дашборд'; ?></h1>
                <p class="text-slate-500 text-sm">Добро пожаловать, <?php echo $_SESSION['admin_user']; ?></p>
            </div>
            <div class="flex items-center gap-4">
                <a href="../index.php" target="_blank" class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-bold text-slate-600 hover:bg-slate-50 transition-colors">
                    На сайт
                </a>
            </div>
        </header>
