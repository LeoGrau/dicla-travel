CREATE TABLE
  wp_tours_categories (
    id INT UNSIGNED PRIMARY KEY,
    tour_id INT UNSIGNED,
    category_id INT UNSIGNED,
    -- Foreign Key
    FOREIGN KEY (tour_id) REFERENCES wp_tours (id),
    FOREIGN KEY (category_id) REFERENCES wp_categories (id)
  );