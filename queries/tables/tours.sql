CREATE TABLE wp_tours(
  id INT UNSIGNED PRIMARY KEY,
  title VARCHAR(100),
  description VARCHAR(512),
  slug VARCHAR(256),
  summary TEXT,
  duration_hours INT UNSIGNED,
  price_usd DECIMAL(10, 2),
  price_pen DECIMAL (10, 2),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  url_image VARCHAR(256),
  status ENUM('active', 'inactive') DEFAULT 'active',
  ranking DECIMAL(10, 2),

  -- Foreign Keys
  city_id INT UNSIGNED,

  -- References
  FOREIGN KEY(city_id) REFERENCES wp_cities(id)

); 



