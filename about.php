<?php
require_once 'includes/config.php';
$page_title = 'О компании | Moscow Concrete';
include 'includes/header.php';
?>

<main class="flex-1">
    <!-- Hero Section -->
    <section class="px-6 lg:px-40 py-10">
        <div class="bg-cover bg-center flex flex-col justify-end overflow-hidden rounded-[2rem] min-h-[500px] relative shadow-2xl" 
             style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.2) 60%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDAfTkvvUuMFe4BS8NIBY7Ikbsi0MWrDXUn7Po_nBZitiGtiG-jvGn9NzRcKe3JWVToFYqzsqYbwGSIbCRwNusXLqJDMJttPNtfCNQK02Sy4JO4Qol-en9J3PNQg0-Sto_Edq2DHckxJKJ93mI2Y1HmgcneRaYDCbnv-CQqXiFVNd4a1dIqXSccaR_d1qW3idH880nR8ewgVFVck91Dw1ybB9yb8o1Uo-go0YEc8E8FD0uK9zOfosjKXROrpL42MjoE5sjz1FNfHom2");'>
            <div class="p-8 lg:p-16">
                <h1 class="text-white text-5xl lg:text-7xl font-black leading-tight mb-4 max-w-2xl"><?php echo htmlspecialchars($content['about_hero_title'] ?? 'Надежность в каждой партии'); ?></h1>
                <p class="text-slate-200 text-lg lg:text-xl max-w-xl"><?php echo htmlspecialchars($content['about_hero_desc'] ?? 'Лидер отрасли благодаря инновационным технологиям смешивания, экологичным методам работы и неизменной приверженности качеству с 1995 года.'); ?></p>
            </div>
        </div>
    </section>

    <!-- Company History -->
    <section class="px-6 lg:px-40 py-24 bg-white" id="history">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <span class="text-primary font-bold uppercase tracking-widest text-sm">НАШ ПУТЬ</span>
                <h2 class="text-slate-900 text-4xl font-black mt-2"><?php echo htmlspecialchars($content['history_title'] ?? 'Наследие превосходства в бетоне'); ?></h2>
            </div>
            <div class="space-y-12">
                <div class="flex gap-10">
                    <div class="flex flex-col items-center">
                        <div class="size-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="material-symbols-outlined text-3xl">foundation</span>
                        </div>
                        <div class="w-px bg-slate-200 flex-grow mt-6"></div>
                    </div>
                    <div class="pt-2">
                        <h3 class="text-2xl font-bold text-slate-900"><?php echo htmlspecialchars($content['history_1_year'] ?? '1995'); ?>: Основание</h3>
                        <p class="text-slate-500 mt-4 leading-relaxed text-lg"><?php echo htmlspecialchars($content['history_1_text'] ?? 'Создание первого высокоточного бетонного узла в пригороде Москвы, ориентированного на местную инфраструктуру.'); ?></p>
                    </div>
                </div>
                <!-- ... additional history ... -->
                <div class="flex gap-10">
                    <div class="flex flex-col items-center">
                        <div class="size-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="material-symbols-outlined text-3xl">precision_manufacturing</span>
                        </div>
                    </div>
                    <div class="pt-2">
                        <h3 class="text-2xl font-bold text-slate-900"><?php echo htmlspecialchars($content['history_2_year'] ?? 'Настоящее время'); ?>: Лидерсво</h3>
                        <p class="text-slate-500 mt-4 leading-relaxed text-lg"><?php echo htmlspecialchars($content['history_2_text'] ?? 'Сегодня Moscow Concrete — это 5 производственных площадок и 50+ единиц техники, обеспечивающих объекты любой сложности.'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities (Expanded) -->
    <section class="max-w-7xl mx-auto px-4 md:px-10 py-24 bg-white" id="facilities">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-24">
            <div class="order-2 md:order-1">
                <span class="text-primary font-bold uppercase tracking-widest text-xs">ПРОИЗВОДСТВО</span>
                <h2 class="text-slate-900 text-4xl md:text-5xl font-black mt-4 mb-6 leading-tight"><?php echo htmlspecialchars($content['about_prod_title'] ?? 'Автоматизированные узлы Liebherr'); ?></h2>
                <p class="text-slate-500 text-lg leading-relaxed mb-8"><?php echo htmlspecialchars($content['about_prod_desc'] ?? 'Наши заводы оснащены немецким оборудованием последнего поколения, что позволяет минимизировать человеческий фактор и гарантировать стабильную марку бетона в каждой машине.'); ?></p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="text-3xl font-black text-slate-900 mb-1">120м³</div>
                        <div class="text-xs text-slate-400 font-bold uppercase">Объем в час</div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="text-3xl font-black text-slate-900 mb-1">±1%</div>
                        <div class="text-xs text-slate-400 font-bold uppercase">Точность весов</div>
                    </div>
                </div>
            </div>
            <div class="order-1 md:order-2 rounded-[3rem] overflow-hidden shadow-2xl h-[500px]">
                <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDjtTqLboB2SaX4tLeMiUURDbYp-pRO9_t_wPhbWe2s1-EAb6wVTq8EdTx_6FiJn59TSfBI9DenrqN7ZVo-Fh0z5O5Yeg3CIcM8fCXKCanSWsY5ol8lG2POz5ythJOHzTu_2gO03gcWj9-uu_5m9heFNQps_Ifxu7h48a3cRMkKlZnV5LA1S_iBiYjHwdY8_gCK4-k9IaLqCSJWj2WmbuCLTCJA8PyGe7kTyxL_Rgtt-vH6L_LNdjXtfbJjLqaVTqoGmV6x_BltBd6" alt="Facility"/>
            </div>
        </div>
    </section>

    <!-- Laboratory -->
    <section class="bg-slate-900 py-24 text-white overflow-hidden relative" id="lab">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.1)_0,transparent_70%)]"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 md:px-10 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                <div class="lg:col-span-5">
                    <h2 class="text-4xl md:text-5xl font-black mb-8 leading-tight"><?php echo htmlspecialchars($content['about_lab_title'] ?? 'Собственная лаборатория'); ?></h2>
                    <p class="text-slate-400 text-lg leading-relaxed mb-10"><?php echo htmlspecialchars($content['about_lab_desc'] ?? 'Аккредитованный испытательный центр при заводе осуществляет оперативный контроль качества на всех этапах: от входящего сырья до испытаний готовых образцов на сжатие через 28 суток.'); ?></p>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <div><b class="block text-xl">Контроль инертных материалов</b><span class="text-slate-500 text-sm">Проверка песка и щебня на наличие примесей.</span></div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <div><b class="block text-xl">Испытания разрушающим методом</b><span class="text-slate-500 text-sm">Лабораторные прессы для определения предела прочности.</span></div>
                        </li>
                    </ul>
                </div>
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="bg-white/5 border border-white/10 p-8 rounded-3xl backdrop-blur-sm">
                        <div class="size-14 bg-primary rounded-xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-3xl">biotech</span>
                        </div>
                        <h4 class="text-2xl font-black mb-4">ISO 9001</h4>
                        <p class="text-slate-400 text-sm">Международный стандарт системы менеджмента качества на производстве.</p>
                    </div>
                    <div class="bg-white/5 border border-white/10 p-8 rounded-3xl backdrop-blur-sm">
                        <div class="size-14 bg-primary rounded-xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-3xl">verified</span>
                        </div>
                        <h4 class="text-2xl font-black mb-4">Паспорт качества</h4>
                        <p class="text-slate-400 text-sm">Выдается на каждую партию бетона с указанием всех характеристик.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Logistics & Fleet -->
    <section class="max-w-7xl mx-auto px-4 md:px-10 py-24 bg-white" id="logistics">
        <div class="text-center mb-16">
            <span class="text-primary font-bold uppercase tracking-widest text-xs">ЛОГИСТИКА</span>
            <h2 class="text-slate-900 text-4xl md:text-5xl font-black mt-4">Весь цикл доставки под контролем</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-slate-50 p-10 rounded-[2.5rem] border border-slate-100 hover:shadow-2xl transition-all group">
                <div class="size-16 bg-white rounded-2xl flex items-center justify-center mb-8 shadow-sm group-hover:bg-primary group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-3xl">explore</span>
                </div>
                <h4 class="text-2xl font-black text-slate-900 mb-4">GPS Навигация</h4>
                <p class="text-slate-500 leading-relaxed font-inter">Отслеживание каждой единицы транспорта в реальном времени. Диспетчер видит положение машин 24/7.</p>
            </div>
            <div class="bg-slate-50 p-10 rounded-[2.5rem] border border-slate-100 hover:shadow-2xl transition-all group">
                <div class="size-16 bg-white rounded-2xl flex items-center justify-center mb-8 shadow-sm group-hover:bg-primary group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-3xl">local_shipping</span>
                </div>
                <h4 class="text-2xl font-black text-slate-900 mb-4">Свой автопарк</h4>
                <p class="text-slate-500 leading-relaxed font-inter">50+ автобетоносмесителей (миксеров) объемом от 6 до 12 м³. Всегда в наличии свободная техника.</p>
            </div>
            <div class="bg-slate-50 p-10 rounded-[2.5rem] border border-slate-100 hover:shadow-2xl transition-all group">
                <div class="size-16 bg-white rounded-2xl flex items-center justify-center mb-8 shadow-sm group-hover:bg-primary group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-3xl">schedule</span>
                </div>
                <h4 class="text-2xl font-black text-slate-900 mb-4">Точный график</h4>
                <p class="text-slate-500 leading-relaxed font-inter">Поставка бетона строго по согласованному графику. Мы понимаем цену простоя бригады на объекте.</p>
            </div>
        </div>
    </section>

    <!-- Certificates Gallery -->
    <section class="bg-slate-50 py-24 mb-24 rounded-[4rem] mx-4 overflow-hidden border border-slate-200">
        <div class="max-w-7xl mx-auto px-4 md:px-10">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-16">
                <div>
                    <span class="text-primary font-bold uppercase tracking-widest text-xs">ГАРАНТИИ</span>
                    <h2 class="text-slate-900 text-4xl font-black mt-4">Сертификаты и дипломы</h2>
                </div>
                <a href="#" class="text-primary font-black flex items-center gap-2 hover:gap-4 transition-all">Смотреть все документы <span class="material-symbols-outlined">arrow_forward</span></a>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:-translate-y-2 transition-transform cursor-zoom-in group">
                    <div class="aspect-[3/4] bg-slate-100 rounded-lg overflow-hidden mb-4 relative">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDss1LxPemr8o1bHiRaLr-31OXCe_UBlBpLopJ9IRQXYJivvU7acSUfdOtMZ3kg7Z6UiUg3S1GhmrKixtH5UHCRJ_K4WzG48Nkj-GzWECvTiIgpmyAKcB3oIgbJI2CQb2-bPR4MP0I-4rPPwUZmybZhRfRWVprpL1aG9iZJu1VY8deUP-wTO3TIcMfZCigb8tUePmh7-sbOUgYZ-mDiK6-3h7gg-b5V7MmboVx2gFAEegrBrGfm_cUJjzhzRDjpkhjWydfeo6UweZdN" alt="Cert"/>
                        <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-4xl">zoom_in</span>
                        </div>
                    </div>
                    <p class="text-sm font-bold text-slate-900 text-center">Сертификат ГОСТ Р</p>
                </div>
                <!-- Repeating for demo -->
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:-translate-y-2 transition-transform cursor-zoom-in group">
                    <div class="aspect-[3/4] bg-slate-100 rounded-lg overflow-hidden mb-4 relative">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDss1LxPemr8o1bHiRaLr-31OXCe_UBlBpLopJ9IRQXYJivvU7acSUfdOtMZ3kg7Z6UiUg3S1GhmrKixtH5UHCRJ_K4WzG48Nkj-GzWECvTiIgpmyAKcB3oIgbJI2CQb2-bPR4MP0I-4rPPwUZmybZhRfRWVprpL1aG9iZJu1VY8deUP-wTO3TIcMfZCigb8tUePmh7-sbOUgYZ-mDiK6-3h7gg-b5V7MmboVx2gFAEegrBrGfm_cUJjzhzRDjpkhjWydfeo6UweZdN" alt="Cert"/>
                    </div>
                    <p class="text-sm font-bold text-slate-900 text-center">Протокол испытаний</p>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include 'includes/footer.php'; ?>
