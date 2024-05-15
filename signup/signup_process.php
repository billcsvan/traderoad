<?php
require '../config/config.php';

function db_connect()
{
    try {
        $pdo = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function handle_form_submission()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["emailReg"];
        $password = $_POST["passwordReg"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $dob = $_POST["dob"];

        // Perform client-side validation
        if (empty($username) || empty($email) || empty($password) || empty($fname) || empty($lname) || empty($dob)) {
            echo "All fields are required.";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Please enter a valid email address.";
            return;
        }

        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters.";
            return;
        }

        // Hash the password securely
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $pdo = db_connect();

        $query = "INSERT INTO Users(username, email, password, first_name, last_name, dob, assets, money) VALUES (?,?,?,?,?,?,0,0)";

        try {
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $hashedPassword);
            $stmt->bindParam(4, $fname);
            $stmt->bindParam(5, $lname);
            $stmt->bindParam(6, $dob);

            if ($stmt->execute()) {
                echo "User registered successfully!";
            } else {
                echo "Error: Unable to register user.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Close the database connection
            $pdo = null;
        }
    } else {
        http_response_code(405);
        echo "Invalid request method";
    }
}

handle_form_submission();
?>