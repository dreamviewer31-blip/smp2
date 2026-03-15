<?php
require_once '../includes/config.php';
$title = 'Управление контентом';
include 'includes/header.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids = $_POST['block_id'] ?? [];
    $contents = $_POST['block_content'] ?? [];
    
    foreach ($ids as $index => $id) {
        $stmt = $pdo->prepare("UPDATE content_blocks SET block_content = ? WHERE block_id = ?");
        $stmt->execute([$contents[$index], $id]);
    }
    
    // Refresh global content
    $content_raw = $pdo->query("SELECT * FROM content_blocks")->fetchAll();
    foreach ($content_raw as $row) {
        $content[$row['block_id']] = $row['block_content'];
    }
    
    $message = 'Контент успешно обновлен!';
}

$all_blocks = $pdo->query("SELECT * FROM content_blocks")->fetchAll();
?>

<div class="max-w-6xl mx-auto py-10">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="text-3xl font-black text-slate-900">Редактор страниц</h1>
            <p class="text-slate-500">Изменение текстов на главной и внутренних страницах</p>
        </div>
        <?php if ($message): ?>
            <div class="bg-green-100 text-green-700 px-6 py-3 rounded-2xl flex items-center gap-2">
                <span class="material-symbols-outlined">done_all</span>
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>

    <form method="POST" class="space-y-6">
        <div class="grid grid-cols-1 gap-6">
            <?php foreach ($all_blocks as $block): ?>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                <input type="hidden" name="block_id[]" value="<?php echo htmlspecialchars($block['block_id']); ?>"/>
                <div class="flex justify-between items-center mb-4">
                    <label class="text-xs font-black text-primary uppercase tracking-widest"><?php echo htmlspecialchars($block['block_title']); ?></label>
                    <code class="text-[10px] bg-slate-100 px-2 py-1 rounded text-slate-400"><?php echo htmlspecialchars($block['block_id']); ?></code>
                </div>
                
                <?php if (str_contains($block['block_id'], 'desc') || str_contains($block['block_id'], 'json')): ?>
                    <textarea name="block_content[]" class="w-full bg-slate-50 border-0 rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary/20 outline-none min-h-[120px] font-inter text-slate-700"><?php echo htmlspecialchars($block['block_content']); ?></textarea>
                <?php else: ?>
                    <input type="text" name="block_content[]" value="<?php echo htmlspecialchars($block['block_content']); ?>" class="w-full bg-slate-50 border-0 rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary/20 outline-none font-bold text-slate-900"/>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="sticky bottom-10 flex justify-end">
            <button type="submit" class="bg-slate-900 text-white px-12 py-5 rounded-2xl font-black text-lg shadow-2xl hover:scale-105 transition-transform flex items-center gap-3">
                <span class="material-symbols-outlined">save</span>
                Сохранить всё
            </button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
