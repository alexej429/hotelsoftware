-- Datenbank erstellen
CREATE DATABASE IF NOT EXISTS hotel_database;

-- Auf die Datenbank zugreifen
USE hotel_database;

-- Gästetabelle erstellen
CREATE TABLE IF NOT EXISTS guests (
    guest_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    phone_number VARCHAR(20)
    -- Weitere relevante Felder
);

-- Zimmertabelle erstellen
CREATE TABLE IF NOT EXISTS rooms (
    room_id INT PRIMARY KEY AUTO_INCREMENT,
    room_number INT,
    room_type VARCHAR(50),
    price DECIMAL(10, 2)
    -- Weitere relevante Felder
);

-- Reservierungstabelle erstellen
CREATE TABLE IF NOT EXISTS reservations (
    reservation_id INT PRIMARY KEY AUTO_INCREMENT,
    guest_id INT,
    room_id INT,
    checkin_date DATE,
    checkout_date DATE,
    total_price DECIMAL(10, 2),
    FOREIGN KEY (guest_id) REFERENCES guests(guest_id),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
);

-- Rechnungstabelle erstellen
CREATE TABLE IF NOT EXISTS invoices (
    invoice_id INT PRIMARY KEY AUTO_INCREMENT,
    reservation_id INT,
    issue_date DATE,
    due_date DATE,
    amount_due DECIMAL(10, 2),
    paid BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (reservation_id) REFERENCES reservations(reservation_id)
);

-- Buchungstabelle erstellen
CREATE TABLE IF NOT EXISTS bookings (
    booking_id INT PRIMARY KEY AUTO_INCREMENT,
    guest_id INT,
    room_id INT,
    checkin_date DATE,
    checkout_date DATE,
    total_price DECIMAL(10, 2),
    FOREIGN KEY (guest_id) REFERENCES guests(guest_id),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
);

-- SPA Tabelle erstellen
CREATE TABLE IF NOT EXISTS spa (
    spa_id INT PRIMARY KEY AUTO_INCREMENT,
    water_temperature INT,
    humidity INT
);