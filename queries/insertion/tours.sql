INSERT INTO wp_tours (
  id, title, description, slug, summary, duration_days,
  price_usd, price_pen, created_at, udpated_at, url_image,
  status, ranking, city_id, category_id
)
VALUES
-- CUSCO -------------------------------------------------------------------------
(5,
 'Rainbow Mountain Trek Full Day',
 'Full-day trekking adventure to Vinicunca, known for its colorful striped mountain landscapes.',
 'rainbow-mountain-trek',
 'Experience one of Peru’s most iconic natural wonders.',
 1, 55.00, 210.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/rainbow_mountain.jpg',
 'active', 4.41, 1
),

(6,
 'Moray & Maras Salt Mines Tour',
 'Visit the circular Inca terraces of Moray and the impressive Maras salt ponds.',
 'moray-maras-tour',
 'A cultural and photographic journey through unique Inca engineering.',
 1, 40.00, 150.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/maras_moray.jpg',
 'active', 4.36, 1
),

(7,
 'Cusco City Tour & Sacsayhuamán',
 'Guided tour through the historic center of Cusco and the Sacsayhuamán archaeological complex.',
 'cusco-city-tour',
 'Discover the heritage and history of the ancient Inca capital.',
 1, 35.00, 130.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/cusco_citytour.jpg',
 'active', 4.18, 1
),

-- LIMA --------------------------------------------------------------------------
(8,
 'Barranco Bohemian Walking Tour',
 'Explore the artistic district of Barranco, its murals, bridge of sighs, and galleries.',
 'barranco-walking-tour',
 'A colorful tour filled with art, culture, and history.',
 1, 30.00, 115.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/barranco_lima.jpg',
 'active', 4.12, 2
),

(9,
 'Pachacamac Archaeological Complex Tour',
 'Discover the ancient sanctuary of Pachacamac located south of Lima.',
 'pachacamac-tour',
 'Learn about pre-Inca and Inca religious history.',
 1, 45.00, 170.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/pachacamac_lima.jpg',
 'active', 4.22, 2
),

(10,
 'Lima Gastronomic Experience',
 'Taste Peruvian cuisine through a guided culinary tour including local markets and traditional dishes.',
 'lima-gastronomic-experience',
 'Experience Peru’s world-renowned food culture.',
 1, 85.00, 320.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/lima_gastronomy.jpg',
 'active', 4.55, 2
),

-- AREQUIPA -----------------------------------------------------------------------
(11,
 'Misti Volcano Climbing Expedition',
 'Two-day climbing adventure to the summit of the Misti volcano near Arequipa.',
 'misti-volcano-climb',
 'A challenging ascent for adventure enthusiasts.',
 2, 180.00, 690.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/misti_volcano.jpg',
 'active', 4.33, 3
),

(12,
 'Santa Catalina Monastery Tour',
 'Guided visit to the iconic blue-and-red monastery of Santa Catalina.',
 'santa-catalina-tour',
 'A peaceful and historical walk inside the city’s most famous monastery.',
 1, 25.00, 95.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/santa_catalina.jpg',
 'active', 4.44, 3
),

(13,
 'Sillar Route Quarry Tour',
 'Visit the Añashuayco quarries where the iconic white volcanic stone of Arequipa is extracted.',
 'sillar-route-tour',
 'Discover the origin of the White City’s architecture.',
 1, 35.00, 130.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/sillar_arequipa.jpg',
 'active', 4.28, 3
),

-- IQUITOS -----------------------------------------------------------------------
(14,
 'Pacaya Samiria Reserve Expedition',
 'Multi-day Amazon exploration inside the Pacaya Samiria National Reserve.',
 'pacaya-samiria-expedition',
 'Explore untouched rainforest and diverse wildlife.',
 3, 260.00, 985.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/pacaya_samiria.jpg',
 'active', 4.61, 4
),

(15,
 'Belén Floating Market Tour',
 'Boat tour through the Belén neighborhood and its floating Amazonian market.',
 'belen-floating-market',
 'A unique cultural visit into Iquitos’ daily river life.',
 1, 35.00, 135.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/belen_iquitos.jpg',
 'active', 4.07, 4
),

(16,
 'Night Safari in the Amazon',
 'Nocturnal exploration by boat to spot caimans, birds, and wildlife.',
 'amazon-night-safari',
 'An exciting nighttime adventure in the Amazon rainforest.',
 1, 45.00, 170.00,
 NOW(), NOW(),
 'http://192.168.1.58/uploads/night_safari.jpg',
 'active', 4.48, 4
);