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

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameOrEmail = $_POST["username"];
    $password = $_POST["password"];

    // Perform client-side validation (if needed)

    $pdo = db_connect();

    // Query the database to retrieve the user's stored password hash
    $query = "SELECT UserID, password FROM Users WHERE username = ? OR email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['UserID'];

        $response["status"] = "success";
        $response["redirect"] = "../afterlogin/dashboard.php";
    } else {
        $response["status"] = "error";
        $response["message"] = "Invalid username/email or password.";
    }

    $pdo = null;
} else {
    http_response_code(405);
    $response["status"] = "error";
    $response["message"] = "Invalid request method";
}

// Send the JSON response
header("Content-Type: application/json");
echo json_encode($response);
?>