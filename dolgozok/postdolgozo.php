<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["dolgozoid"]) && ($_POST["nev"]) && isset($_POST["neme"]) && isset($_POST["reszleg"]) && isset($_POST["belepesev"]) && isset($_POST["ber"])) {
        require_once 'databaseconnection.php';
        if ($conn->connect_error) {
            die("Sikertelen kapcsolódás az adatbázishoz: " . $conn->connect_error);
        }
        $sql = "INSERT INTO dolgozok (dolgozoid, nev, neme, reszleg, belepesev, ber) VALUES (?,?,?,?,?,?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("isssii", $dolgozoid, $nev, $neme, $reszleg, $belepesev, $ber);
            $dolgozoid = $_POST["dolgozoid"];
            $nev = $_POST["nev"];
            $neme = $_POST["neme"];
            $reszleg = $_POST["reszleg"];
            $belepesev = $_POST["belepesev"];
            $ber = $_POST["ber"];
            if ($stmt->execute()) {
                http_response_code(201);
                echo "Sikeresen lett hozzáadva";
            } else {
                http_response_code(404);
                echo 'Sikertelen hozzáadás';
            }
            $stmt->close();
        } else {
            echo "Hiba a lekérés előkészítésekor: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "Hiányzó mezők!";
    }
} else {
    echo "Érvénytelen kérés!";
}