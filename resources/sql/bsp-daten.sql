-- Datenbank verwenden
USE hotel_database;

-- Beispieldaten für die Gästetabelle einfügen
INSERT IGNORE INTO guests (guest_id, first_name, last_name, email, phone_number) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', '+123456789'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', '+987654321');

-- Beispieldaten für die Zimmertabelle einfügen
INSERT IGNORE INTO rooms (room_id, room_number, room_type, price) VALUES
(1, 101, 'Standard', 100.00),
(2, 102, 'Standard', 120.27),
(3, 201, 'Suite', 200.00),
(4, 202, 'Suite', 220.33),
(5, 301, 'Business', 333.33);

-- Beispieldaten für die Reservierungstabelle einfügen
INSERT IGNORE INTO reservations (reservation_id, guest_id, room_id, checkin_date, checkout_date, total_price) VALUES
(1, 1, 1, '2023-01-01', '2023-01-05', 400.00),
(2, 2, 2, '2023-02-01', '2023-02-10', 1800.00);

-- Beispieldaten für die Rechnungstabelle einfügen
INSERT IGNORE INTO invoices (invoice_id, reservation_id, issue_date, due_date, amount_due, paid) VALUES
(1, 1, '2023-01-05', '2023-01-12', 400.00, TRUE),
(2, 2, '2023-02-10', '2023-02-17', 1800.00, FALSE);

-- Beispieldaten für die Buchungstabelle einfügen
INSERT IGNORE INTO bookings (booking_id, guest_id, room_id, checkin_date, checkout_date, total_price) VALUES
(1, 1, 1, '2023-03-01', '2023-03-05', 400.00),
(2, 2, 2, '2023-04-01', '2023-04-10', 1800.00);

-- Beispieldaten für Umwelt
INSERT IGNORE INTO spa (spa_id, water_temperature, humidity) VALUES 
(1, 18, 20);