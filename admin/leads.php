<?php
require_once '../includes/config.php';
$title = 'Заявки клиентов';
include 'includes/header.php';

// Handle Status Update
if (isset($_GET['id']) && isset($_GET['status'])) {
    $stmt = $pdo->prepare("UPDATE leads SET status = ? WHERE id = ?");
    $stmt->execute([$_GET['status'], $_GET['id']]);
    header('Location: leads.php');
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM leads WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header('Location: leads.php');
    exit;
}

$leads = $pdo->query("SELECT * FROM leads ORDER BY created_at DESC")->fetchAll();
?>

<div class="max-w-6xl mx-auto py-10">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="text-3xl font-black text-slate-900">Входящие заявки</h1>
            <p class="text-slate-500">Управление лидами и заказами с сайта</p>
        </div>
        <div class="bg-primary/10 text-primary px-4 py-2 rounded-xl font-bold text-sm">
            Всего: <?php echo count($leads); ?>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-xl overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100 italic">
                    <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Клиент</th>
                    <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Тип</th>
                    <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Сообщение</th>
                    <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Статус</th>
                    <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Действия</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <?php foreach ($leads as $lead): ?>
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-8 py-6">
                        <div class="font-bold text-slate-900"><?php echo htmlspecialchars($lead['name']); ?></div>
                        <div class="text-xs text-slate-500 font-medium"><?php echo htmlspecialchars($lead['phone']); ?></div>
                        <?php if ($lead['address']): ?>
                            <div class="text-[10px] text-slate-400 mt-1"><span class="material-symbols-outlined text-[12px] align-middle">location_on</span> <?php echo htmlspecialchars($lead['address']); ?></div>
                        <?php endif; ?>
                        <div class="text-[10px] text-slate-400 mt-1 uppercase font-bold"><?php echo date('d.m.Y H:i', strtotime($lead['created_at'])); ?></div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-bold uppercase tracking-widest"><?php echo htmlspecialchars($lead['type']); ?></span>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-sm text-slate-600 max-w-xs truncate" title="<?php echo htmlspecialchars($lead['message']); ?>">
                            <?php echo htmlspecialchars($lead['message'] ?: 'Без сообщения'); ?>
                        </p>
                    </td>
                    <td class="px-8 py-6">
                        <?php 
                        $status_class = match($lead['status']) {
                            'Новый' => 'bg-blue-100 text-blue-700',
                            'В обработке' => 'bg-amber-100 text-amber-700',
                            'Завершен' => 'bg-green-100 text-green-700',
                            'Отменен' => 'bg-red-100 text-red-700',
                            default => 'bg-slate-100 text-slate-700'
                        };
                        ?>
                        <span class="px-3 py-1 <?php echo $status_class; ?> rounded-full text-xs font-bold"><?php echo $lead['status']; ?></span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-2">
                             <div class="relative group">
                                <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors"><span class="material-symbols-outlined text-slate-400">more_vert</span></button>
                                <div class="absolute right-0 top-full mt-2 w-48 bg-white border border-slate-100 shadow-2xl rounded-xl hidden group-hover:block z-50 py-2">
                                    <a href="?id=<?php echo $lead['id']; ?>&status=В обработке" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">В обработке</a>
                                    <a href="?id=<?php echo $lead['id']; ?>&status=Завершен" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">Завершен</a>
                                    <a href="?id=<?php echo $lead['id']; ?>&status=Отменен" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">Отменен</a>
                                    <div class="border-t border-slate-50 mt-2"></div>
                                    <a href="?delete=<?php echo $lead['id']; ?>" onclick="return confirm('Вы уверены?')" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Удалить</a>
                                </div>
                             </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($leads)): ?>
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="text-slate-300 mb-2"><span class="material-symbols-outlined text-6xl italic">inbox</span></div>
                        <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">Заявок пока нет</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
