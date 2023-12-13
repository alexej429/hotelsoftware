<?php
//Hilfsklasse für Datenbank Anfragen
class DBHelper {
    
    private $conn;
    private $dbname = "hotel_database";

    function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            // Verbindung zur Datenbank herstellen
            $this->conn = new PDO("mysql:host=$servername", $username, $password);
            // Fehlerausnahmen aktivieren
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    
    //erstellt Datenbank
    function createDatabase() {
        // SQL-Skript zum Erstellen der Tabellen ausführen
        $tablesScript = file_get_contents('./resources/sql/database.sql');
        $this->conn->exec($tablesScript);
        echo "Tabellen erfolgreich erstellt \n";
    }
    
    // fuellt Datenbank mit Beispiel Daten
    function exampleData() {
        // SQL-Skript zum Einfügen von Beispieldaten ausführen
        $dataScript = file_get_contents('./resources/sql/bsp-daten.sql');
        $this->conn->exec($dataScript);
        echo "Beispieldaten erfolgreich hinzugefügt \n";
    }


    function getRooms() {
        $this->conn->query("use {$this->dbname}");
        $query = "SELECT * FROM rooms";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        // Fetch all rows as an associative array
        $rooms = $statement->fetchAll(PDO::FETCH_ASSOC);

        // // Output the results
        // foreach ($rooms as $room) {
        //     echo "Room Number: {$room['room_number']}, Type: {$room['room_type']}, Price: {$room['price']}<br>";
        // }
        return $rooms;
    }

    function getReservations() {
        $this->conn->query("use {$this->dbname}");
        $query = "SELECT * FROM reservations";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        $reservations = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
        
    }

    function getRechnungen() {
        $this->conn->query("use {$this->dbname}");
        $query = "SELECT * FROM invoices";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        $invoices = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $invoices;
    }

    function getSPA() {
        $this->conn->query("use {$this->dbname}");
        $query = "SELECT * FROM spa";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $spa = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $spa[0];
    }


    function addReservation($data) {
        try {
            $guestId = $this->getOrCreateGuest($data["firstName"], $data["lastName"]);  
            
            $stmt = $this->conn->prepare("INSERT INTO reservations (guest_id, room_id, checkin_date, checkout_date, total_price) 
                         VALUES (:guestId, :roomId, :checkin, :checkout, :totalPrice)");
            $stmt->bindParam(":guestId", $guestId);
            $stmt->bindParam(":roomId", $data["roomId"]);
            $stmt->bindParam(":checkin", $data["checkIn"]);
            $stmt->bindParam(":checkout", $data["checkOut"]);
            $stmt->bindParam(":totalPrice", $data["totalPrice"]);
            $stmt->execute();


        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    function addBooking($data) {
        try {
            $guestId = $this->getOrCreateGuest($data["firstName"], $data["lastName"]);                       
            
            $stmt = $this->conn->prepare("INSERT INTO bookings (guest_id, room_id, checkin_date, checkout_date, total_price) 
                         VALUES (:guestId, :roomId, :checkin, :checkout, :totalPrice)");
            $stmt->bindParam(":guestId", $guestId);
            $stmt->bindParam(":roomId", $data["roomId"]);
            $stmt->bindParam(":checkin", $data["checkIn"]);
            $stmt->bindParam(":checkout", $data["checkOut"]);
            $stmt->bindParam(":totalPrice", $data["totalPrice"]);
            $stmt->execute();


        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }

    // if guest exists, return id, if not create and return id
    private function getOrCreateGuest($firstName, $lastName) {
        try {
            $this->conn->query("use {$this->dbname}");

            //check if guest already exists
            $stmt = $this->conn->prepare("SELECT * FROM guests WHERE first_name='{$firstName}' 
                                        AND last_name='{$lastName}'");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) == 0) {
                //create user
                $stmt = $this->conn->prepare("INSERT INTO guests (first_name, last_name) VALUES (:firstName, :lastName)");
                $stmt->bindParam(":firstName", $firstName);
                $stmt->bindParam(":lastName", $lastName);
                $stmt->execute();
                $guestId = $this->conn->lastInsertId();
            } else {
                // user already exists
                $guestId = $result[0]["guest_id"];
            }
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return $guestId;
    }

    //umweltdaten updates
    function updateSPAhumidity($humidity) {
        try {
            $this->conn->query("use {$this->dbname}");
            $query = "UPDATE spa SET humidity = '{$humidity}' WHERE spa_id = 1";
            $statement = $this->conn->prepare($query);
            $statement->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    function updateSPAtemperature($temperature) {
        try {
            $this->conn->query("use {$this->dbname}");
            $query = "UPDATE spa SET water_temperature = '{$temperature}' WHERE spa_id = 1";
            $statement = $this->conn->prepare($query);
            $statement->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}
?>