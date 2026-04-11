const CACHE_NAME = 'manipur-chart-v3';
const STATIC_ASSETS = [
    'assets/css/style.css',
    'assets/images/icon-192.png',
    'assets/images/icon-512.png',
    'assets/images/download.png'
];

// Install Event: Cache Core Assets
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll(STATIC_ASSETS);
        })
    );
});

// Activate Event: Cleanup Old Caches
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.map(key => {
                    if (key !== CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            );
        })
    );
});

// Fetch Event: Mixed Strategy
self.addEventListener('fetch', event => {
    const url = new URL(event.request.url);

    // 1. For Static Assets: Cache-First
    if (STATIC_ASSETS.includes(url.pathname.replace('/manipur%20chart/', ''))) {
        event.respondWith(
            caches.match(event.request).then(response => {
                return response || fetch(event.request);
            })
        );
    }
    // 2. For HTML Pages: Network-First (Ensures Results are always Live)
    else {
        event.respondWith(
            fetch(event.request).catch(() => {
                return caches.match(event.request);
            })
        );
    }
});
