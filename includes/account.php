<?php
require 'userinfo+.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['changeInfo'])) {
        $newFirstName = $_POST['newFirstName'];
        $newLastName = $_POST['newLastName'];
        $newEmail = $_POST['newEmail'];

        $updateQuery = "UPDATE Users SET first_name = ?, last_name = ?, email = ? WHERE UserID = ?";
        $updateStmt = $pdo->prepare($updateQuery);
        if ($updateStmt->execute([$newFirstName, $newLastName, $newEmail, $userId])) {
            echo "Account information updated successfully!";
        } else {
            echo "Error updating account information.";
        }
    } elseif (isset($_POST['changePassword'])) {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];

        $query = "SELECT password FROM Users WHERE UserID = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userId]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($oldPassword, $userData['password'])) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE Users SET password = ? WHERE UserID = ?";
            $updateStmt = $pdo->prepare($updateQuery);
            if ($updateStmt->execute([$hashedPassword, $userId])) {
                echo "Password changed successfully!";
            } else {
                echo "Error updating password.";
            }
        } else {
            echo "Old password is incorrect.";
        }
    }
}
$pdo = null;
?>