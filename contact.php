<?php
require_once 'includes/config.php';

$success_msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $type = $_POST['type'] ?? 'Запрос';
    $message = $_POST['message'] ?? '';
    $address = $_POST['address'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO leads (name, phone, type, message, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $phone, $type, $message, $address]);
    $success_msg = 'Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.';
}

$page_title = 'Контакты | Moscow Concrete';
include 'includes/header.php';
?>

<main class="max-w-7xl mx-auto w-full px-4 md:px-10 py-16 space-y-12">
    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center gap-12 bg-white p-10 rounded-[3rem] border border-slate-100 shadow-2xl">
        <div class="flex-1 space-y-6">
            <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider rounded-full">Контакты и поддержка</span>
            <h1 class="text-5xl md:text-6xl font-black text-slate-900 leading-tight">Мы на связи <br/><span class="text-primary">24 часа в сутки</span></h1>
            <p class="text-xl text-slate-500 leading-relaxed">Наши эксперты готовы проконсультировать вас по любым вопросам производства и доставки бетона в режиме реального времени.</p>
        </div>
        <div class="flex-1 w-full h-[400px] rounded-[2rem] overflow-hidden relative shadow-xl">
            <img alt="Office" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAl8PhiMLA3qluA47nmGFlIZoHcivYWLCIwUvwTfWI92M-NR9PLRePJW0oginaRjFWJwlCkSJMzRb-sMXJHVqz2ntam173fEebMWH0r3BiNRodhjVuVASYLhh8WSxshnzeMudjMoqvoE5_8q4Heh95J8SuQK5iACX4dwxJUlHkVYj99fsuOv2RO_E-voyHWZEcKLTcAKWZHi64kT1PlAi5G_ZUmHL5TKzMrMoBsgO4gMXys6tMcIYkXK_dy82dJvRUofjQKHDp3W-Gl"/>
        </div>
    </section>

    <!-- Cards -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-10 rounded-[2rem] border border-slate-100 shadow-xl hover:-translate-y-2 transition-all">
            <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-6">
                <span class="material-symbols-outlined text-3xl">call</span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Звоните нам</h3>
            <p class="text-slate-500 mb-4"><?php echo $settings['opening_hours'] ?? 'Бесплатная линия 24/7'; ?></p>
            <p class="text-xl font-black text-primary"><?php echo $settings['phone'] ?? '+7 (495) 000-00-00'; ?></p>
        </div>
        <div class="bg-white p-10 rounded-[2rem] border border-slate-100 shadow-xl hover:-translate-y-2 transition-all">
            <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-6">
                <span class="material-symbols-outlined text-3xl">mail</span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Пишите нам</h3>
            <p class="text-slate-500 mb-4">Ответ в течение 15 минут</p>
            <p class="text-xl font-black text-primary"><?php echo $settings['email'] ?? 'info@mosconcrete.ru'; ?></p>
        </div>
        <div class="bg-white p-10 rounded-[2rem] border border-slate-100 shadow-xl hover:-translate-y-2 transition-all">
            <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-6">
                <span class="material-symbols-outlined text-3xl">location_on</span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Наш офис</h3>
            <p class="text-slate-500 mb-4">Приезжайте в гости</p>
            <p class="text-lg font-bold text-slate-800"><?php echo $settings['address'] ?? 'Москва, Варшавское ш., 125'; ?></p>
        </div>
    </section>

    <!-- Delivery Rates Table -->
    <section class="bg-white rounded-[3rem] border border-slate-100 shadow-xl overflow-hidden">
        <div class="p-10 border-b border-slate-50 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h2 class="text-3xl font-black text-slate-900">Стоимость доставки</h2>
                <p class="text-slate-500 mt-1">Тарифы зависят от удаленности вашего объекта от РБУ</p>
            </div>
            <div class="px-6 py-3 bg-primary/10 rounded-xl text-primary font-black">Цены указаны за 1 м³</div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left font-inter">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-xs font-black uppercase tracking-widest">
                        <th class="px-10 py-6">Расстояние (км)</th>
                        <th class="px-10 py-6">Стоимость до 5 м³</th>
                        <th class="px-10 py-6">Стоимость от 6 до 10 м³</th>
                        <th class="px-10 py-6">Свыше 10 м³</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php 
                    $delivery_rates = $pdo->query("SELECT * FROM delivery_rates")->fetchAll();
                    foreach ($delivery_rates as $rate): 
                    ?>
                    <tr class="hover:bg-slate-50/50 transition-all">
                        <td class="px-10 py-6 font-black text-slate-900"><?php echo htmlspecialchars($rate['range_text']); ?></td>
                        <td class="px-10 py-6 text-slate-600"><?php echo htmlspecialchars($rate['price_small']); ?></td>
                        <td class="px-10 py-6 text-slate-600"><?php echo htmlspecialchars($rate['price_medium']); ?></td>
                        <td class="px-10 py-6 font-bold text-primary"><?php echo htmlspecialchars($rate['price_large']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Map & Form -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-5 bg-slate-900 p-12 rounded-[3rem] text-white shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 rounded-full blur-3xl"></div>
            <h2 class="text-4xl font-black mb-8 relative z-10">Быстрая заявка</h2>
            
            <?php if ($success_msg): ?>
                <div class="bg-green-500/10 text-green-400 p-6 rounded-2xl border border-green-500/20 mb-8 animate-bounce flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span>
                    <?php echo $success_msg; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-6 relative z-10">
                <input type="hidden" name="contact_form" value="1"/>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Имя</label>
                        <input type="text" name="name" required placeholder="Иван Иванов" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 focus:border-primary outline-none transition-all text-white"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Телефон</label>
                        <input type="tel" name="phone" required placeholder="+7 (999) 000-00-00" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 focus:border-primary outline-none transition-all text-white"/>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Тип запроса</label>
                    <select name="type" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 focus:border-primary outline-none transition-all text-white appearance-none cursor-pointer">
                        <option class="bg-slate-900" value="Консультация">Интересует бетон</option>
                        <option class="bg-slate-900" value="Аренда">Аренда бетононасоса</option>
                        <option class="bg-slate-900" value="Партнерство">Сотрудничество</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Адрес доставки (если есть)</label>
                    <input type="text" name="address" placeholder="Укажите адрес строительной площадки" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 focus:border-primary outline-none transition-all text-white"/>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Сообщение</label>
                    <textarea name="message" placeholder="Опишите ваши требования или детали объекта..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-4 focus:border-primary outline-none transition-all text-white min-h-[120px]"></textarea>
                </div>
                <button type="submit" class="w-full bg-primary text-white font-black py-5 rounded-2xl text-lg hover:bg-primary/90 transition-all shadow-xl shadow-primary/20 flex items-center justify-center gap-3">
                    <span class="material-symbols-outlined">send</span>
                    Отправить сообщение
                </button>
            </form>
        </div>
        <div class="lg:col-span-7 rounded-[3rem] overflow-hidden border border-slate-200 shadow-2xl h-[600px] relative">
            <div id="contact-map" class="w-full h-full"></div>
            <!-- Floating Address Card -->
            <div class="absolute top-8 left-8 z-10 bg-white/95 backdrop-blur shadow-2xl rounded-2xl p-6 border border-slate-100 max-w-[200px]">
                <p class="text-[10px] font-black uppercase text-primary tracking-widest mb-2">Главный офис</p>
                <p class="text-sm font-bold text-slate-900 leading-tight"><?php echo $settings['address'] ?? 'Москва, Варшавское ш., 125'; ?></p>
            </div>
        </div>
    </div>
</main>

<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    function initContactMap() {
        const map = L.map('contact-map').setView([55.6234, 37.6200], 14);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: 'CARTO'
        }).addTo(map);

        const icon = L.divIcon({
            className: 'custom-div-icon',
            html: `<div class='size-10 bg-primary rounded-full border-4 border-white shadow-2xl flex items-center justify-center text-white'><span class='material-symbols-outlined'>location_on</span></div>`,
            iconSize: [40, 40],
            iconAnchor: [20, 20]
        });

        L.marker([55.6234, 37.6200], {icon: icon}).addTo(map)
            .bindPopup('<b class="font-inter">Moscow Concrete HQ</b><br>Пн-Пт: 09:00 - 18:00');
    }
    
    try { initContactMap(); } catch(e) { console.error(e); }
</script>


<?php include 'includes/footer.php'; ?>
