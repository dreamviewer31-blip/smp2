    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-16 mb-24">
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="bg-primary p-1.5 rounded-lg text-white">
                            <span class="material-symbols-outlined block">conveyor_belt</span>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight text-slate-900 uppercase">
                            <?php 
                                $name_parts = explode(' ', $settings['site_name'] ?? 'MOSCOW CONCRETE');
                                echo $name_parts[0]; 
                            ?><span class="text-primary"><?php echo $settings['logo_text'] ?? 'CONCRETE'; ?></span>
                        </span>
                    </div>
                    <p class="text-slate-500 text-sm mb-6 leading-relaxed">
                        Ведущий производитель высококачественного бетона и ЖБИ в Московском регионе. Совершенство в инженерии и логистике.
                    </p>
                    <div class="flex gap-4">
                        <a class="size-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-600 hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined text-lg">share</span></a>
                        <a class="size-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-600 hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined text-lg">alternate_email</span></a>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <h5 class="font-black text-slate-900 mb-6 uppercase tracking-widest text-xs">Разделы</h5>
                    <ul class="space-y-4 text-sm font-semibold text-slate-500">
                        <li><a class="hover:text-primary transition-colors" href="catalog.php">Прайс-лист</a></li>
                        <li><a class="hover:text-primary transition-colors" href="index.php#calculator">Калькулятор</a></li>
                        <li><a class="hover:text-primary transition-colors" href="about.php#certificates">Сертификаты</a></li>
                        <li><a class="hover:text-primary transition-colors" href="catalog.php?cat=pumps">Аренда техники</a></li>
                    </ul>
                </div>
                <div class="lg:col-span-1">
                    <h5 class="font-black text-slate-900 mb-6 uppercase tracking-widest text-xs">Помощь</h5>
                    <ul class="space-y-4 text-sm font-semibold text-slate-500">
                        <li><a class="hover:text-primary transition-colors" href="about.php">Зимняя заливка?</a></li>
                        <li><a class="hover:text-primary transition-colors" href="contact.php">Минимальный объем?</a></li>
                        <li><a class="hover:text-primary transition-colors" href="contact.php">Способы оплаты?</a></li>
                    </ul>
                </div>
                <div class="lg:col-span-1">
                    <h5 class="font-black text-slate-900 mb-6 uppercase tracking-widest text-xs">Контакты</h5>
                    <div class="space-y-6">
                        <div>
                            <p class="text-xs font-bold text-slate-400 mb-1">Центральный офис</p>
                            <p class="text-sm font-bold text-slate-800"><?php echo htmlspecialchars($settings['address'] ?? 'Москва, Варшавское шоссе, 125'); ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 mb-1">E-mail</p>
                            <p class="text-sm font-bold text-slate-800"><?php echo htmlspecialchars($settings['email'] ?? 'info@mosconcrete.ru'); ?></p>
                        </div>
                        <div>
                            <a class="text-2xl font-black text-primary" href="tel:<?php echo preg_replace('/[^0-9+]/', '', $settings['phone'] ?? ''); ?>"><?php echo htmlspecialchars($settings['phone'] ?? '+7 (495) 000-00-00'); ?></a>
                            <p class="text-xs font-bold text-slate-400 mt-1"><?php echo htmlspecialchars($settings['opening_hours'] ?? 'Доступно 24/7'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-12 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">© <?php echo date('Y'); ?> <?php echo htmlspecialchars($settings['site_name'] ?? 'Moscow Concrete Production Group'); ?></p>
                <div class="flex gap-8 text-xs font-bold text-slate-500 uppercase tracking-widest">
                    <a class="hover:text-slate-900 transition-colors" href="/admin/login.php">Для персонала</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
