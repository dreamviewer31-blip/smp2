<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo $page_title ?? 'Concrete Solutions'; ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f56624",
                        "background-light": "#f8f6f5",
                        "background-dark": "#221610",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .glass-header {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
    </style>
</head>
<body class="bg-background-light text-slate-900 transition-colors duration-300">
    <!-- Header -->
    <header class="sticky top-0 z-50 glass-header border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center gap-2">
                    <a href="index.php" class="flex items-center gap-2">
                        <div class="bg-primary p-1.5 rounded-lg text-white">
                            <span class="material-symbols-outlined block">conveyor_belt</span>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight text-slate-900 leading-none">
                            <?php 
                                $name_parts = explode(' ', $settings['site_name'] ?? 'MOSCOW CONCRETE');
                                echo $name_parts[0]; 
                            ?><span class="text-primary"><?php echo $settings['logo_text'] ?? 'CONCRETE'; ?></span>
                        </span>
                    </a>
                </div>
                <nav class="hidden md:flex items-center gap-8">
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="index.php">Главная</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="catalog.php">Каталог</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="about.php">О нас</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="contact.php">Контакты</a>
                </nav>
                <div class="flex items-center gap-4">
                    <div class="hidden lg:flex flex-col items-end">
                        <span class="text-xs text-slate-500 font-medium"><?php echo $settings['opening_hours'] ?? '24/7 (Без выходных)'; ?></span>
                        <a class="text-sm font-bold" href="tel:<?php echo preg_replace('/[^0-9+]/', '', $settings['phone'] ?? ''); ?>">
                            <?php echo $settings['phone'] ?? '+7 (495) 000-00-00'; ?>
                        </a>
                    </div>
                    <a href="contact.php" class="bg-primary text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-primary/90 transition-all shadow-lg shadow-primary/20">
                        Заказать звонок
                    </a>
                </div>
            </div>
        </div>
    </header>
