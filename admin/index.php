<?php
require_once '../includes/config.php';
$title = 'Дашборд';
include 'includes/header.php';

// Fetch stats
$product_count = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$new_leads_count = $pdo->query("SELECT COUNT(*) FROM leads WHERE status = 'Новый'")->fetchColumn();
$latest_leads = $pdo->query("SELECT * FROM leads ORDER BY created_at DESC LIMIT 5")->fetchAll();
?>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:translate-y-[-2px] transition-transform">
        <div class="size-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">inventory_2</span>
        </div>
        <div class="text-3xl font-black text-slate-900"><?php echo $product_count; ?></div>
        <div class="text-sm font-medium text-slate-500">Товаров в каталоге</div>
    </div>
    
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:translate-y-[-2px] transition-transform">
        <div class="size-12 bg-blue-500/10 text-blue-500 rounded-xl flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">description</span>
        </div>
        <div class="text-3xl font-black text-slate-900"><?php echo $new_leads_count; ?></div>
        <div class="text-sm font-medium text-slate-500">Новых заявок</div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm opacity-50">
        <div class="size-12 bg-green-500/10 text-green-500 rounded-xl flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">payments</span>
        </div>
        <div class="text-3xl font-black text-slate-900">N/A</div>
        <div class="text-sm font-medium text-slate-500">Выручка (в разработке)</div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm opacity-50">
        <div class="size-12 bg-purple-500/10 text-purple-500 rounded-xl flex items-center justify-center mb-4">
            <span class="material-symbols-outlined">trending_up</span>
        </div>
        <div class="text-3xl font-black text-slate-900">N/A</div>
        <div class="text-sm font-medium text-slate-500">Аналитика</div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10">
    <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-slate-900">Последние заявки</h3>
            <a href="leads.php" class="text-xs font-bold text-primary hover:underline">Все заявки</a>
        </div>
        <div class="space-y-4">
            <?php foreach ($latest_leads as $lead): ?>
            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                <div>
                    <div class="font-bold text-slate-900"><?php echo htmlspecialchars($lead['name']); ?></div>
                    <div class="text-xs text-slate-500"><?php echo htmlspecialchars($lead['phone']); ?> • <?php echo htmlspecialchars($lead['type']); ?></div>
                </div>
                <?php 
                $status_color = $lead['status'] == 'Новый' ? 'bg-blue-500/10 text-blue-600' : 'bg-slate-200 text-slate-500';
                ?>
                <span class="px-3 py-1 <?php echo $status_color; ?> text-[10px] font-bold uppercase rounded-full"><?php echo $lead['status']; ?></span>
            </div>
            <?php endforeach; ?>
            <?php if (empty($latest_leads)): ?>
                <p class="text-center text-slate-400 py-4">Нет новых заявок</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
