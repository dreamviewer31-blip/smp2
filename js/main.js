// Mobile menu
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    if (menu) menu.classList.toggle('hidden');
}

// Calculator
function calculate() {
    const grade = parseFloat(document.getElementById('concrete-grade')?.value || 0);
    const volume = parseFloat(document.getElementById('volume')?.value || 0);
    const distance = parseFloat(document.getElementById('distance')?.value || 0);
    const total = grade * volume + distance * 50 * (volume / 5);
    const el = document.getElementById('total-price');
    if (el) el.innerText = new Intl.NumberFormat('ru-RU').format(Math.round(total)) + ' ₽';
}

document.addEventListener('DOMContentLoaded', () => {
    ['concrete-grade', 'volume', 'distance'].forEach(id => {
        document.getElementById(id)?.addEventListener('input', calculate);
    });
    calculate();
});

// Order Modal
function openOrderModal(productName) {
    const modal = document.getElementById('order-modal');
    if (!modal) return;
    document.getElementById('modal-product-name').innerText = 'Выбрано: ' + productName;
    const inp = document.getElementById('modal-product-input');
    if (inp) inp.value = productName;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeOrderModal() {
    const modal = document.getElementById('order-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}

// Delivery Map (index page)
function initDeliveryMap() {
    const el = document.getElementById('delivery-map');
    if (!el) return;
    const map = L.map('delivery-map').setView([55.7558, 37.6173], 9);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '© OpenStreetMap © CARTO'
    }).addTo(map);
    const factories = [
        { name: "РБУ — Север", lat: 55.9126, lng: 37.7303 },
        { name: "РБУ — Юг",   lat: 55.5583, lng: 37.7011 },
        { name: "РБУ — Запад", lat: 55.6784, lng: 37.2713 }
    ];
    factories.forEach(f => {
        L.circleMarker([f.lat, f.lng], { radius: 10, fillColor: '#f56624', color: '#fff', weight: 2, fillOpacity: 0.9 })
            .addTo(map).bindPopup(`<b>${f.name}</b><br>Готовность: 24/7`);
        L.circle([f.lat, f.lng], { radius: 30000, color: '#f56624', fillColor: '#f56624', fillOpacity: 0.07, weight: 1 }).addTo(map);
    });
}

// Contact Map
function initContactMap() {
    const el = document.getElementById('contact-map');
    if (!el) return;
    const map = L.map('contact-map').setView([55.6234, 37.6200], 14);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '© OpenStreetMap © CARTO'
    }).addTo(map);
    L.circleMarker([55.6234, 37.6200], { radius: 12, fillColor: '#f56624', color: '#fff', weight: 3, fillOpacity: 1 })
        .addTo(map).bindPopup('<b>Moscow Concrete HQ</b>');
}

// Geolocation
async function detectLocation() {
    try {
        const r = await fetch('https://ip-api.com/json/?fields=city,regionName');
        const d = await r.json();
        const el = document.getElementById('city-name');
        if (el && (d.regionName === 'Moscow' || d.regionName === 'Moscow Oblast') && d.city) {
            el.innerText = 'в г. ' + d.city;
        }
    } catch(e) {}
}

try { initDeliveryMap(); } catch(e) {}
try { initContactMap(); } catch(e) {}
detectLocation();
