<style>
@keyframes modal-scale {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-modal {
    animation: modal-scale 0.3s ease-out forwards;
}
</style>
<div id="order-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeOrderModal()"></div>
    
    <!-- Modal Content -->
    <div class="relative w-full max-w-lg bg-white/10 backdrop-blur-xl border border-white/20 rounded-[2.5rem] shadow-2xl overflow-hidden animate-modal">
        <div class="p-8 md:p-12">
            <button onclick="closeOrderModal()" class="absolute top-6 right-6 size-10 rounded-full bg-white/5 flex items-center justify-center text-white hover:bg-white/10 transition-all">
                <span class="material-symbols-outlined">close</span>
            </button>
            
            <div class="mb-8">
                <span class="inline-block px-4 py-1.5 bg-primary/20 text-primary text-[10px] font-black uppercase tracking-widest rounded-full mb-4">Быстрый заказ</span>
                <h2 class="text-3xl font-black text-white mb-2">Оформить <span class="text-primary">заявку</span></h2>
                <div id="modal-product-name" class="text-slate-300 font-bold text-lg">Выбрано: Бетон М300</div>
            </div>
            
            <form id="order-form" method="POST" action="contact.php" class="space-y-5">
                <input type="hidden" name="contact_form" value="1"/>
                <input type="hidden" name="type" id="modal-type-input" value="Заказ"/>
                <input type="hidden" name="message" id="modal-message-input" value=""/>
                
                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Ваше имя</label>
                    <input type="text" name="name" required placeholder="Иван Иванов" 
                           class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 focus:border-primary outline-none transition-all text-white placeholder:text-slate-500"/>
                </div>
                
                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Телефон</label>
                    <input type="tel" name="phone" required placeholder="+7 (999) 000-00-00" 
                           class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 focus:border-primary outline-none transition-all text-white placeholder:text-slate-500"/>
                </div>
                
                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Адрес доставки</label>
                    <textarea name="address" required placeholder="Город, улица, номер дома..." 
                              class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 focus:border-primary outline-none transition-all text-white min-h-[100px] placeholder:text-slate-500"></textarea>
                </div>
                
                <button type="submit" class="w-full bg-primary text-white font-black py-5 rounded-2xl text-lg hover:scale-[1.02] active:scale-[0.98] transition-all shadow-xl shadow-primary/20 flex items-center justify-center gap-3 mt-4">
                    <span class="material-symbols-outlined">shopping_cart_checkout</span>
                    Подтвердить заказ
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function openOrderModal(productName) {
    const modal = document.getElementById('order-modal');
    const nameDisplay = document.getElementById('modal-product-name');
    const messageInput = document.getElementById('modal-message-input');
    const typeInput = document.getElementById('modal-type-input');
    
    nameDisplay.innerText = 'Выбрано: ' + productName;
    messageInput.value = 'Заказ товара: ' + productName;
    typeInput.value = 'Заказ: ' + productName;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeOrderModal() {
    const modal = document.getElementById('order-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}
</script>
