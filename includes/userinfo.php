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
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
$userId = $_SESSION['user_id'];
$pdo = db_connect();

$query = "SELECT * FROM Users WHERE UserID = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$userId]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
$pdo = null;
?>