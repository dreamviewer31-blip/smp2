<?php
require_once 'includes/config.php';
$page_title = 'Moscow Concrete | Премиальное производство и доставка бетона';
include 'includes/header.php';
?>

<!-- Premium Hero Section -->
<section class="relative bg-white pt-10 lg:pt-24 pb-16 lg:pb-32 overflow-hidden">
    <!-- Mobile background glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-64 bg-primary/5 blur-[120px] lg:hidden"></div>
    <div class="absolute top-0 right-0 w-1/2 h-full bg-slate-50 skew-x-[-12deg] translate-x-20 hidden lg:block"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:grid lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            
            <!-- Content -->
            <div class="lg:col-span-7 text-center lg:text-left order-2 lg:order-1">
                <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-slate-900 text-white text-[10px] font-bold uppercase tracking-[0.2em] mb-6 lg:mb-8 shadow-xl animate-fadeIn">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    Прямые поставки от производителя
                </div>
                
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-slate-900 leading-[1.1] lg:leading-[1.05] mb-6 lg:mb-8 tracking-tight animate-fadeIn opacity-0 delay-100">
                    <?php echo $content['hero_title'] ?? 'Премиальный бетон'; ?> <br/>
                    <span class="text-primary" id="city-name"><?php echo $content['hero_subtitle'] ?? 'в Москве и области'; ?></span>
                </h1>
                
                <p class="text-base lg:text-xl text-slate-600 mb-8 lg:mb-12 max-w-xl mx-auto lg:mx-0 leading-relaxed animate-fadeIn opacity-0 delay-200">
                    <?php echo $content['hero_desc'] ?? 'Сертифицированные бетонные смеси для объектов любого уровня сложности. Собственная лаборатория и гарантированная доставка в течение 2 часов.'; ?>
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 lg:gap-5 justify-center lg:justify-start animate-fadeIn opacity-0 delay-300">
                    <a class="bg-primary text-white px-8 lg:px-10 py-4 lg:py-5 rounded-2xl text-base lg:text-lg font-black hover:bg-primary/90 hover:-translate-y-1 active:translate-y-0 transition-all flex items-center justify-center gap-3 shadow-2xl shadow-primary/40 group" href="#calculator">
                        <span class="material-symbols-outlined text-2xl group-hover:rotate-12 transition-transform">calculate</span>
                        Рассчитать стоимость
                    </a>
                    <a href="catalog.php" class="bg-white border-2 border-slate-100 lg:border-slate-200 text-slate-900 px-8 lg:px-10 py-4 lg:py-5 rounded-2xl text-base lg:text-lg font-black hover:border-slate-900 hover:bg-slate-900 hover:text-white transition-all flex items-center justify-center">
                        Прайс-лист
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="mt-12 lg:mt-16 flex justify-around lg:justify-start lg:gap-16 border-t border-slate-100 pt-8 lg:pt-10">
                    <div class="text-center lg:text-left">
                        <div class="text-xl lg:text-2xl font-black text-slate-900">ГОСТ</div>
                        <div class="text-[10px] lg:text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Сертификация</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-xl lg:text-2xl font-black text-slate-900">2 часа</div>
                        <div class="text-[10px] lg:text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Доставка</div>
                    </div>
                    <div class="hidden sm:block text-center lg:text-left">
                        <div class="text-xl lg:text-2xl font-black text-slate-900">24/7</div>
                        <div class="text-[10px] lg:text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Отгрузка</div>
                    </div>
                </div>
            </div>
            
            <!-- Image Area -->
            <div class="lg:col-span-5 relative order-1 lg:order-2 w-full max-w-[400px] lg:max-w-none mx-auto lg:mx-0">
                <div class="relative z-20">
                    <div class="aspect-square lg:aspect-[4/5] rounded-[2.5rem] lg:rounded-[2rem] overflow-hidden shadow-2xl border-[8px] lg:border-[12px] border-white">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDx0soBrf-MEX9c4GceON4Cldv4iU0_IaiLJMOTmctwcK0m9XN_UqzsP589Rxqke_D_14p-sbege7R-xXZxcLo33QS0w62Xd5kQgCE0vnkpfMgYsmMt8jZqR7em8LC9DUI8mfvhHTLghqAlz3Zz5VrByEkmAy7lByBwbH1sIk5G3h4tBftNP0gP3dyY9XxeQGu_wja7JpkytL0x9G2Ekjt9NmRMYaURb2kbgQJWpDlwylg0BDSB_i-5Po4ZVRzu7HM6NsPzSWjoQqYg" alt="Hero Image"/>
                    </div>
                    <div class="absolute -bottom-6 -left-4 lg:-bottom-8 lg:-left-8 bg-white/80 backdrop-blur-md p-4 lg:p-6 rounded-2xl shadow-xl border border-white/20 max-w-[160px] lg:max-w-[200px]">
                        <div class="flex items-center gap-2 mb-1 lg:mb-2">
                            <span class="material-symbols-outlined text-primary font-bold text-sm lg:text-base">verified_user</span>
                            <span class="text-[10px] lg:text-xs font-bold uppercase tracking-wider text-slate-500">Гарантия</span>
                        </div>
                        <p class="text-xs lg:text-sm font-bold text-slate-800 leading-tight">100% соответствие марке</p>
                    </div>
                </div>
                <!-- Background decor for lg -->
                <div class="absolute -top-10 -right-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl hidden lg:block"></div>
            </div>
            
        </div>
    </div>
</section>

<!-- Trust Bar -->
<section class="bg-slate-50 border-y border-slate-200 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex items-center gap-6 p-6 bg-white rounded-2xl shadow-sm border border-slate-100">
                <div class="size-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">factory</span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 leading-tight">1500+ м³</div>
                    <div class="text-sm font-medium text-slate-500">В сутки</div>
                </div>
            </div>
            <!-- ... more trust items ... -->
            <div class="flex items-center gap-6 p-6 bg-white rounded-2xl shadow-sm border border-slate-100">
                <div class="size-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">verified</span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 leading-tight">12 лет</div>
                    <div class="text-sm font-medium text-slate-500">Опыта работы</div>
                </div>
            </div>
            <div class="flex items-center gap-6 p-6 bg-white rounded-2xl shadow-sm border border-slate-100">
                <div class="size-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">local_shipping</span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 leading-tight">50+ машин</div>
                    <div class="text-sm font-medium text-slate-500">Собственный парк</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="py-24 bg-white" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-5xl font-black text-slate-900 mb-4"><?php echo htmlspecialchars($content['benefit_1_title'] ?? 'Бескомпромиссная надежность'); ?></h2>
        <p class="text-slate-500 text-lg max-w-2xl mx-auto mb-16"><?php echo htmlspecialchars($content['benefit_1_desc'] ?? 'Мы обеспечиваем полный цикл поддержки вашего проекта: от замеса до финальной заливки.'); ?></p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="group p-8 rounded-3xl border border-slate-100 hover:border-primary/20 hover:bg-slate-50 transition-all text-left">
                <div class="size-16 rounded-2xl bg-slate-100 group-hover:bg-primary transition-colors flex items-center justify-center text-slate-900 group-hover:text-white mb-6">
                    <span class="material-symbols-outlined text-4xl">local_shipping</span>
                </div>
                <h3 class="text-2xl font-bold mb-4">Доставка за 2 часа</h3>
                <p class="text-slate-500 leading-relaxed">Стратегическое расположение заводов позволяет нам добраться до любого объекта в Москве и области в течение 120 минут.</p>
            </div>
            <div class="group p-8 rounded-3xl border border-slate-100 hover:border-primary/20 hover:bg-slate-50 transition-all text-left">
                <div class="size-16 rounded-2xl bg-slate-100 group-hover:bg-primary transition-colors flex items-center justify-center text-slate-900 group-hover:text-white mb-6">
                    <span class="material-symbols-outlined text-4xl">biotech</span>
                </div>
                <h3 class="text-2xl font-bold mb-4">Лабораторный контроль</h3>
                <p class="text-slate-500 leading-relaxed">Собственная аккредитованная лаборатория проверяет каждую партию. Паспорт качества предоставляется с каждой поставкой.</p>
            </div>
            <div class="group p-8 rounded-3xl border border-slate-100 hover:border-primary/20 hover:bg-slate-50 transition-all text-left">
                <div class="size-16 rounded-2xl bg-slate-100 group-hover:bg-primary transition-colors flex items-center justify-center text-slate-900 group-hover:text-white mb-6">
                    <span class="material-symbols-outlined text-4xl">gps_fixed</span>
                </div>
                <h3 class="text-2xl font-bold mb-4">GPS Мониторинг</h3>
                <p class="text-slate-500 leading-relaxed">Полная прозрачность с отслеживанием в реальном времени. Получайте уведомления, когда миксер приближается к объекту.</p>
            </div>
        </div>
    </div>
</section>

<!-- Calculator Section -->
<section class="py-24 bg-slate-900 text-white rounded-[3rem] mx-4 my-24 overflow-hidden relative" id="calculator">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(245,102,36,0.1),transparent)]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row gap-16 items-start">
            <div class="flex-1">
                <h2 class="text-4xl lg:text-5xl font-black mb-6"><?php echo htmlspecialchars($content['calc_title'] ?? 'Рассчитайте стоимость'); ?></h2>
                <p class="text-slate-400 text-lg mb-10"><?php echo htmlspecialchars($content['calc_desc'] ?? 'Получите мгновенную оценку вашего заказа на основе объема, марки бетона и расстояния от производства.'); ?></p>
                <div class="space-y-8 bg-white/5 p-8 rounded-3xl border border-white/10 backdrop-blur-sm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-300">Марка бетона</label>
                            <select id="concrete-grade" class="w-full bg-white/10 border-white/20 rounded-xl px-4 py-3 focus:ring-primary focus:border-primary text-white appearance-none outline-none">
                                <option class="bg-slate-900" value="3500">М100 (В7.5) - 3500 ₽</option>
                                <option class="bg-slate-900" value="3800">М200 (В15) - 3800 ₽</option>
                                <option class="bg-slate-900" value="4250" selected>М300 (В22.5) - 4250 ₽</option>
                                <option class="bg-slate-900" value="4800">М400 (В30) - 4800 ₽</option>
                                <option class="bg-slate-900" value="5500">М500 (В40) - 5500 ₽</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-300">Объем (м³)</label>
                            <input id="volume" type="number" class="w-full bg-white/10 border-white/20 rounded-xl px-4 py-3 focus:ring-primary focus:border-primary text-white outline-none" value="10" placeholder="Напр. 10"/>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-300">Расстояние доставки (км): <span id="distance-val">25</span> км</label>
                        <input id="distance" class="w-full h-2 bg-white/10 rounded-lg appearance-none cursor-pointer accent-primary" max="100" min="1" step="1" type="range" value="25" oninput="document.getElementById('distance-val').innerText = this.value"/>
                        <div class="flex justify-between text-xs text-slate-400">
                            <span>1 км</span>
                            <span>50 км</span>
                            <span>100 км</span>
                        </div>
                    </div>
                    <div class="pt-6 border-t border-white/10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div>
                            <span class="text-slate-400 text-sm block mb-1">Предварительная стоимость</span>
                            <span id="total-price" class="text-4xl font-black text-white">0 ₽</span>
                        </div>
                        <button onclick="const select = document.getElementById('concrete-grade'); openOrderModal(select.options[select.selectedIndex].text.split(' - ')[0])" class="bg-primary text-white px-10 py-4 rounded-xl font-black text-lg hover:bg-primary/90 transition-all shadow-xl shadow-primary/30">
                            Получить точную смету
                        </button>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 space-y-6">
                <div class="bg-white/5 p-6 rounded-2xl border border-white/10">
                    <h4 class="font-bold text-lg mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">info</span>
                        Оптовые скидки
                    </h4>
                    <p class="text-slate-400 text-sm">Заказываете более 100 м³? Свяжитесь с нами для получения специальных корпоративных тарифов.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Production Section -->
<section class="py-24 bg-slate-50" id="production">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <div class="absolute -bottom-6 -left-6 w-full h-full border-4 border-primary rounded-3xl -z-10"></div>
                <img class="rounded-3xl shadow-2xl w-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-NuBC2ZyQdmsowQQO9ykIzbjFzZU-T1SEjzBiVtFhGC9XhqkpU6pqnEieTmgoo7SR20N_EvFFVdOMmarID3WWnFloVPp7bSDBcFhPKysLQZ6PLbDoX9hIi91pIstIiE-xzoGV-8YHEkb5VfIwSMJ3Vwv34lUCkveELO2Gd9fIz15IphaRjGAwD8ZOV23jZZNjPIko31-mendwWQ4wppnJ_N6J2s-gcbKL9Hk3U3q741CA19CldoRMWV7d-u1fp1gNWPn4b5SwQNXu" alt="Production"/>
                <div class="absolute top-8 right-8 bg-white p-4 rounded-xl shadow-lg">
                    <p class="text-slate-900 font-black text-2xl">Liebherr</p>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Партнер по оборудованию</p>
                </div>
            </div>
            <div>
                <h2 class="text-4xl font-black text-slate-900 mb-6"><?php echo htmlspecialchars($content['production_title'] ?? 'Передовое производство'); ?></h2>
                <p class="text-slate-600 text-lg mb-8 leading-relaxed"><?php echo htmlspecialchars($content['production_desc'] ?? 'Наше предприятие использует полностью автоматизированные узлы смешивания Liebherr, что гарантирует точность дозировки и стабильное качество.'); ?></p>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3 font-bold text-slate-700"><span class="material-symbols-outlined text-primary">check_circle</span> Автоматическая система дозирования</li>
                    <li class="flex items-center gap-3 font-bold text-slate-700"><span class="material-symbols-outlined text-primary">check_circle</span> Подогрев для зимнего бетонирования</li>
                    <li class="flex items-center gap-3 font-bold text-slate-700"><span class="material-symbols-outlined text-primary">check_circle</span> Прямой ж/д доступ для материалов</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-24 bg-white" id="delivery">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-slate-900 mb-4"><?php echo htmlspecialchars($content['map_title'] ?? 'Зоны доставки'); ?></h2>
            <p class="text-slate-500"><?php echo htmlspecialchars($content['map_desc'] ?? 'Быстрая доставка по Москве и всей Московской области.'); ?></p>
        </div>
        <div class="rounded-3xl overflow-hidden shadow-2xl h-[600px] border border-slate-200 relative">
            <div id="delivery-map" class="w-full h-full z-0"></div>
            <!-- Interactive Legend overlay -->
            <div class="absolute bottom-10 left-10 z-10 bg-white/90 backdrop-blur p-6 rounded-2xl shadow-xl border border-slate-100 max-w-xs">
                <h4 class="font-bold text-slate-900 mb-4">Наши мощности</h4>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <span class="w-3 h-3 rounded-full bg-primary"></span>
                        <span class="text-sm text-slate-600 font-medium font-inter">РБУ - Север (г. Мытищи)</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-3 h-3 rounded-full bg-primary"></span>
                        <span class="text-sm text-slate-600 font-medium font-inter">РБУ - Юг (г. Видное)</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-3 h-3 rounded-full bg-primary"></span>
                        <span class="text-sm text-slate-600 font-medium font-inter">РБУ - Запад (г. Одинцово)</span>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-200">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest mb-1">Время доставки</p>
                    <p class="text-sm font-black text-slate-900">от 1.5 до 3-х часов</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leaflet CSS/JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


<!-- How it Works -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-black text-slate-900 mb-16"><?php echo htmlspecialchars($content['how_works_title'] ?? 'Как мы работаем'); ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="size-20 bg-white border-2 border-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-6 text-primary shadow-sm">
                    <span class="material-symbols-outlined text-4xl">add_task</span>
                </div>
                <h4 class="font-bold mb-2">1. Заявка</h4>
                <p class="text-sm text-slate-500">Оставьте заявку или позвоните нам для уточнения.</p>
            </div>
            <div class="text-center">
                <div class="size-20 bg-white border-2 border-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-6 text-primary shadow-sm">
                    <span class="material-symbols-outlined text-4xl">contract</span>
                </div>
                <h4 class="font-bold mb-2">2. Договор</h4>
                <p class="text-sm text-slate-500">Подтверждаем объем и фиксируем стоимость.</p>
            </div>
            <div class="text-center">
                <div class="size-20 bg-white border-2 border-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-6 text-primary shadow-sm">
                    <span class="material-symbols-outlined text-4xl">engineering</span>
                </div>
                <h4 class="font-bold mb-2">3. Производство</h4>
                <p class="text-sm text-slate-500">Изготовление бетона строго по ГОСТ.</p>
            </div>
            <div class="text-center">
                <div class="size-20 bg-white border-2 border-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-6 text-primary shadow-sm">
                    <span class="material-symbols-outlined text-4xl">local_shipping</span>
                </div>
                <h4 class="font-bold mb-2">4. Доставка</h4>
                <p class="text-sm text-slate-500">Отгрузка на объекте с GPS-сопровождением.</p>
            </div>
        </div>
    </div>
</section>

<!-- Fleet — Premium Redesign -->
<section class="py-24 lg:py-32 bg-slate-950 relative overflow-hidden" id="fleet">
    <!-- Background decoration -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,rgba(245,102,36,0.12),transparent_60%)]"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary text-xs font-bold uppercase tracking-widest mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    50+ единиц техники
                </div>
                <h2 class="text-4xl lg:text-6xl font-black text-white leading-tight">
                    <?php echo htmlspecialchars($content['fleet_title'] ?? 'Наш автопарк'); ?>
                </h2>
                <p class="text-slate-400 text-lg mt-4 max-w-xl">Современный парк спецтехники для доставки и укладки бетона любой сложности — от миксеров до автобетононасосов.</p>
            </div>
            <div class="flex gap-4 shrink-0">
                <div class="text-center px-6 py-4 rounded-2xl bg-white/5 border border-white/10">
                    <div class="text-3xl font-black text-white">50+</div>
                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1">Машин</div>
                </div>
                <div class="text-center px-6 py-4 rounded-2xl bg-white/5 border border-white/10">
                    <div class="text-3xl font-black text-white">24/7</div>
                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1">Работа</div>
                </div>
                <div class="text-center px-6 py-4 rounded-2xl bg-white/5 border border-white/10">
                    <div class="text-3xl font-black text-white">GPS</div>
                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1">Трекинг</div>
                </div>
            </div>
        </div>

        <!-- Fleet Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-5">

            <!-- Card 1: Миксеры MAN -->
            <div class="group relative rounded-3xl overflow-hidden bg-slate-900 border border-white/5 hover:border-primary/40 transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                <div class="relative h-52 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="Миксер MAN"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full bg-primary text-white text-xs font-black uppercase tracking-wider">Доставка</span>
                    </div>
                    <div class="absolute top-4 right-4 size-10 rounded-xl bg-white/10 backdrop-blur flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-xl">local_shipping</span>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-black text-white mb-1">Автобетоносмесители MAN</h4>
                    <p class="text-slate-400 text-sm mb-4">Объём барабана 7–9 м³. Доставка бетона на объект с сохранением подвижности смеси.</p>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-white/5 rounded-xl p-3">
                            <div class="text-white font-black text-lg">9 м³</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">Объём</div>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3">
                            <div class="text-white font-black text-lg">20 ед.</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">В парке</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Автобетоносмесители КАМАЗ -->
            <div class="group relative rounded-3xl overflow-hidden bg-slate-900 border border-white/5 hover:border-primary/40 transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                <div class="relative h-52 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=80" alt="КАМАЗ миксер"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full bg-primary text-white text-xs font-black uppercase tracking-wider">Доставка</span>
                    </div>
                    <div class="absolute top-4 right-4 size-10 rounded-xl bg-white/10 backdrop-blur flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-xl">local_shipping</span>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-black text-white mb-1">Автобетоносмесители КАМАЗ</h4>
                    <p class="text-slate-400 text-sm mb-4">Отечественная надёжность для городских объектов. Высокая проходимость в условиях стройплощадки.</p>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-white/5 rounded-xl p-3">
                            <div class="text-white font-black text-lg">7 м³</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">Объём</div>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3">
                            <div class="text-white font-black text-lg">15 ед.</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">В парке</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Стационарный бетононасос -->
            <div class="group relative rounded-3xl overflow-hidden bg-slate-900 border border-white/5 hover:border-primary/40 transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                <div class="relative h-52 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         src="https://images.unsplash.com/photo-1590496793929-36417d3117de?w=600&q=80" alt="Бетононасос"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full bg-orange-500 text-white text-xs font-black uppercase tracking-wider">Насос</span>
                    </div>
                    <div class="absolute top-4 right-4 size-10 rounded-xl bg-white/10 backdrop-blur flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-xl">plumbing</span>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-black text-white mb-1">Стационарные бетононасосы</h4>
                    <p class="text-slate-400 text-sm mb-4">Подача бетона по трубопроводу до 200 м по горизонтали и 80 м по вертикали.</p>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-white/5 rounded-xl p-3">
                            <div class="text-white font-black text-lg">80 м³/ч</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">Подача</div>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3">
                            <div class="text-white font-black text-lg">5 ед.</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">В парке</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Second row: wider cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- Card 4: Автобетононасос со стрелой -->
            <div class="group relative rounded-3xl overflow-hidden bg-slate-900 border border-white/5 hover:border-primary/40 transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10 lg:col-span-2">
                <div class="relative h-52 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=700&q=80" alt="Автобетононасос"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full bg-blue-500 text-white text-xs font-black uppercase tracking-wider">Стрела</span>
                    </div>
                    <div class="absolute top-4 right-4 size-10 rounded-xl bg-white/10 backdrop-blur flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-xl">construction</span>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-black text-white mb-1">Автобетононасосы со стрелой</h4>
                    <p class="text-slate-400 text-sm mb-4">Стрела 36–52 м для высотного строительства. Подача бетона в труднодоступные места без ручного труда.</p>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="bg-white/5 rounded-xl p-3 text-center">
                            <div class="text-white font-black text-lg">52 м</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">Стрела</div>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3 text-center">
                            <div class="text-white font-black text-lg">160 м³/ч</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">Подача</div>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3 text-center">
                            <div class="text-white font-black text-lg">8 ед.</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">В парке</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5: Самосвалы -->
            <div class="group relative rounded-3xl overflow-hidden bg-slate-900 border border-white/5 hover:border-primary/40 transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                <div class="relative h-52 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?w=600&q=80" alt="Самосвал"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full bg-slate-600 text-white text-xs font-black uppercase tracking-wider">Сыпучие</span>
                    </div>
                    <div class="absolute top-4 right-4 size-10 rounded-xl bg-white/10 backdrop-blur flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-xl">airport_shuttle</span>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-black text-white mb-1">Самосвалы VOLVO / MAN</h4>
                    <p class="text-slate-400 text-sm mb-4">Доставка щебня, песка, ПГС и других сыпучих материалов на объект.</p>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-white/5 rounded-xl p-3">
                            <div class="text-white font-black text-lg">20 т</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">Грузоподъём.</div>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3">
                            <div class="text-white font-black text-lg">7 ед.</div>
                            <div class="text-slate-500 text-xs font-bold uppercase tracking-wider">В парке</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom CTA -->
        <div class="mt-12 flex flex-col sm:flex-row items-center justify-between gap-6 p-8 rounded-3xl bg-white/5 border border-white/10">
            <div>
                <p class="text-white font-black text-xl mb-1">Нужна аренда техники?</p>
                <p class="text-slate-400 text-sm">Предоставляем технику с оператором. Почасовая и посменная аренда.</p>
            </div>
            <a href="contact.php" class="shrink-0 bg-primary text-white px-8 py-4 rounded-2xl font-black hover:bg-primary/90 transition-all shadow-xl shadow-primary/30 flex items-center gap-2">
                <span class="material-symbols-outlined">phone_in_talk</span>
                Запросить технику
            </a>
        </div>

    </div>
</section>

<!-- Partners & Testimonials -->
<section class="py-24 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-black text-center mb-16"><?php echo htmlspecialchars($content['partners_title'] ?? 'Нам доверяют лидеры отрасли'); ?></h2>
        <div class="flex flex-wrap justify-center gap-12 opacity-50 mb-20 grayscale">
            <?php 
            $partners = explode(',', $content['partners_list'] ?? 'РОСС-СТРОЙ, МОС-ДОМ, КАПИТАЛ-Г, РЕГИОН-КОНСТ');
            foreach ($partners as $partner): 
            ?>
            <div class="text-xl font-black"><?php echo htmlspecialchars(trim($partner)); ?></div>
            <?php endforeach; ?>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="p-10 rounded-3xl bg-white/5 border border-white/10 relative">
                <p class="text-lg italic text-slate-300 mb-6">"Moscow Concrete — основной поставщик для наших ЖК. Контроль качества безупречен."</p>
                <div class="flex items-center gap-4">
                    <div class="size-12 rounded-full bg-slate-700"></div>
                    <div><p class="font-bold">Андрей Волков</p><p class="text-xs text-slate-500 uppercase tracking-widest font-bold">Capital-G</p></div>
                </div>
            </div>
            <div class="p-10 rounded-3xl bg-white/5 border border-white/10 relative">
                <p class="text-lg italic text-slate-300 mb-6">"Профессиональный подход к логистике. Рекомендуем для сложных городских проектов."</p>
                <div class="flex items-center gap-4">
                    <div class="size-12 rounded-full bg-slate-700"></div>
                    <div><p class="font-bold">Елена Соколова</p><p class="text-xs text-slate-500 uppercase tracking-widest font-bold">MOS-HOUSE</p></div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    // Geolocation detection
    async function detectLocation() {
        try {
            const response = await fetch('http://ip-api.com/json/?fields=city,regionName');
            const data = await response.json();
            
            const cityNameElement = document.getElementById('city-name');
            
            // Check if it's Moscow or Moscow Region
            // Note: Region names depend on the API, usually 'Moscow' and 'Moscow Oblast'
            const isMoscowRegion = data.regionName === 'Moscow' || data.regionName === 'Moscow Oblast';
            
            if (isMoscowRegion && data.city) {
                cityNameElement.innerText = 'в г. ' + data.city;
                console.log('Location detected:', data.city);
            }
        } catch (error) {
            console.error('Geolocation failed:', error);
        }
    }

    function calculate() {
        const gradePrice = parseFloat(document.getElementById('concrete-grade').value);
        const volume = parseFloat(document.getElementById('volume').value) || 0;
        const distance = parseFloat(document.getElementById('distance').value);
        
        const basePrice = gradePrice * volume;
        const factor = <?php echo floatval($content['calc_delivery_factor'] ?? 50); ?>;
        const deliveryPrice = distance * factor * (volume / 5); // Dynamic factor
        const total = basePrice + deliveryPrice;
        
        document.getElementById('total-price').innerText = new Intl.NumberFormat('ru-RU').format(Math.round(total)) + ' ₽';
    }

    document.querySelectorAll('#concrete-grade, #volume, #distance').forEach(el => {
        el.addEventListener('input', calculate);
    });
    
    // Map initialization
    function initMap() {
        const map = L.map('delivery-map').setView([55.7558, 37.6173], 9);
        
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>'
        }).addTo(map);

        const factories = [
            { name: "РБУ - Север", lat: 55.9126, lng: 37.7303, color: '#f56624' },
            { name: "РБУ - Юг", lat: 55.5583, lng: 37.7011, color: '#f56624' },
            { name: "РБУ - Запад", lat: 55.6784, lng: 37.2713, color: '#f56624' }
        ];

        factories.forEach(f => {
            const marker = L.circleMarker([f.lat, f.lng], {
                radius: 10,
                fillColor: f.color,
                color: "#fff",
                weight: 2,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);
            
            marker.bindPopup(`<b class="font-inter">${f.name}</b><br>Готовность к отгрузке: 24/7`);
            
            // Pulse circle
            L.circle([f.lat, f.lng], {
                radius: 30000,
                color: f.color,
                fillColor: f.color,
                fillOpacity: 0.1,
                weight: 1
            }).addTo(map);
        });
    }

    try {
        initMap();
    } catch(e) { console.error(e); }

    detectLocation();
    calculate();
</script>

<?php include 'includes/order_modal.php'; ?>
<?php include 'includes/footer.php'; ?>
