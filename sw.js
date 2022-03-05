var staticCacheName = "pwa-v" + new Date().getTime();
let filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/assets/img/icons/favicon-16x16.png',
    '/assets/img/icons/favicon-32x32.png',
    '/assets/img/icons/apple-touch-icon.png',
    '/assets/img/android-chrome-192x192.png',
    '/assets/img/icons/android-chrome-512x512.png',
];

// install
self.addEventListener("install", e =>{
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll(filesToCache);
        })
    )
});

// Clear cache on activate
self.addEventListener('activate', e => {
    e.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", e => {
    e.respondWith(
        caches.match(e.request)
            .then(response => {
                return response || fetch(e.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});