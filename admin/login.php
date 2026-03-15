<?php
session_start();
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_auth'] = true;
        $_SESSION['admin_user'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = "Неверное имя пользователя или пароль";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Вход в админ-панель</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen p-4">
    <div class="max-w-md w-full">
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-[2rem] p-10 shadow-2xl">
            <div class="flex flex-col items-center mb-10">
                <div class="bg-primary p-3 rounded-2xl text-white mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h1 class="text-white text-3xl font-black tracking-tight">MOSCOW<span class="text-[#f56624]">CONCRETE</span></h1>
                <p class="text-slate-400 mt-2 text-sm">Управление контентом</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="bg-red-500/10 border border-red-500/50 text-red-500 p-4 rounded-xl text-sm mb-6 text-center">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Логин</label>
                    <input type="text" name="username" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-[#f56624] focus:ring-1 focus:ring-[#f56624] transition-all outline-none" placeholder="admin"/>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Пароль</label>
                    <input type="password" name="password" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-[#f56624] focus:ring-1 focus:ring-[#f56624] transition-all outline-none" placeholder="••••••••"/>
                </div>
                <button type="submit" class="w-full bg-[#f56624] hover:bg-[#f56624]/90 text-white font-black py-4 rounded-xl transition-all shadow-xl shadow-[#f56624]/20 mt-4 outline-none">
                    Войти в систему
                </button>
            </form>
            
            <p class="text-center text-slate-500 text-xs mt-8">© 2024 Moscow Concrete CMS</p>
        </div>
    </div>
</body>
</html>
