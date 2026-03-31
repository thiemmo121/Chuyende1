CREATE DATABASE IF NOT EXISTS laravel_assignment CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE laravel_assignment;

DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS enrollments;
DROP TABLE IF EXISTS appointments;
DROP TABLE IF EXISTS courses;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS students;

CREATE TABLE students (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    major VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(12,2) NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    category VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE courses (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    credits TINYINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE enrollments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id BIGINT UNSIGNED NOT NULL,
    course_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY enrollments_student_course_unique (student_id, course_id),
    CONSTRAINT enrollments_student_id_foreign FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE,
    CONSTRAINT enrollments_course_id_foreign FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    status ENUM('pending', 'processing', 'completed') NOT NULL DEFAULT 'pending',
    total_amount DECIMAL(12,2) NOT NULL DEFAULT 0,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE order_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NULL,
    product_name VARCHAR(255) NOT NULL,
    unit_price DECIMAL(12,2) NOT NULL,
    quantity INT NOT NULL,
    line_total DECIMAL(12,2) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT order_items_order_id_foreign FOREIGN KEY (order_id) REFERENCES orders (id) ON DELETE CASCADE,
    CONSTRAINT order_items_product_id_foreign FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE customers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE appointments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id BIGINT UNSIGNED NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    status ENUM('scheduled', 'canceled') NOT NULL DEFAULT 'scheduled',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    UNIQUE KEY appointments_date_time_status_unique (appointment_date, appointment_time, status),
    CONSTRAINT appointments_customer_id_foreign FOREIGN KEY (customer_id) REFERENCES customers (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO students (name, major, email, created_at, updated_at) VALUES
('Nguyen Van A', 'Cong nghe thong tin', 'a@example.com', NOW(), NOW()),
('Tran Thi B', 'Ke toan', 'b@example.com', NOW(), NOW()),
('Le Van C', 'Quan tri kinh doanh', 'c@example.com', NOW(), NOW());

INSERT INTO products (name, price, quantity, category, created_at, updated_at) VALUES
('Ban phim co', 450000, 12, 'Phu kien', NOW(), NOW()),
('Chuot khong day', 250000, 3, 'Phu kien', NOW(), NOW()),
('Laptop Dell', 18500000, 0, 'May tinh', NOW(), NOW()),
('Tai nghe', 180000, 7, 'Am thanh', NOW(), NOW());

INSERT INTO courses (name, credits, created_at, updated_at) VALUES
('Lap trinh Web', 3, NOW(), NOW()),
('Co so du lieu', 4, NOW(), NOW()),
('Phan tich du lieu', 3, NOW(), NOW());

INSERT INTO enrollments (student_id, course_id, created_at, updated_at) VALUES
(1, 1, NOW(), NOW()),
(1, 2, NOW(), NOW()),
(2, 1, NOW(), NOW()),
(3, 3, NOW(), NOW());

INSERT INTO orders (customer_name, status, total_amount, created_at, updated_at) VALUES
('Pham Van D', 'pending', 1150000, NOW(), NOW()),
('Tran Thi E', 'processing', 18680000, NOW(), NOW());

INSERT INTO order_items (order_id, product_id, product_name, unit_price, quantity, line_total, created_at, updated_at) VALUES
(1, 1, 'Ban phim co', 450000, 2, 900000, NOW(), NOW()),
(1, 4, 'Tai nghe', 180000, 1, 180000, NOW(), NOW()),
(2, 3, 'Laptop Dell', 18500000, 1, 18500000, NOW(), NOW()),
(2, 2, 'Chuot khong day', 250000, 1, 250000, NOW(), NOW());

INSERT INTO customers (name, created_at, updated_at) VALUES
('Nguyen Van F', NOW(), NOW()),
('Le Thi G', NOW(), NOW()),
('Pham Van H', NOW(), NOW());

INSERT INTO appointments (customer_id, appointment_date, appointment_time, status, created_at, updated_at) VALUES
(1, '2026-04-01', '09:00:00', 'scheduled', NOW(), NOW()),
(2, '2026-04-01', '10:30:00', 'scheduled', NOW(), NOW()),
(3, '2026-04-02', '14:00:00', 'canceled', NOW(), NOW());

