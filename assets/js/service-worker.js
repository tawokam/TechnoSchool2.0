self.addEventListener('install', event => {
    event.waitUntil(
    caches.open('v1').then(cache => {
    return cache.addAll([
    '/',
    './index2.html',
    './css/styles.css',
    '/script.js',
    './img/bgIMG.png'
    ]);
    })
    );
    });
    
    self.addEventListener('fetch', event => {
    event.respondWith(
    caches.match(event.request).then(response => {
    return response || fetch(event.request);
    })
    );
    });