<?php
require 'userinfo+.php';

$withdrawResponseMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount'])) {
    $withdrawAmount = floatval($_POST['amount']);
    $userId = $_SESSION['user_id'];

    // Calculate new balances
    $newMoneyBalance = $userData['money'] - $withdrawAmount;
    $newAssetsBalance = $newMoneyBalance + $userData['assets'];

    // Check if withdrawal amount is valid
    if ($newMoneyBalance >= 0) {
        try {
            $query = "UPDATE Users SET money = ?, assets = ? WHERE UserID = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$newMoneyBalance, $newAssetsBalance, $userId]);

            $withdrawResponseMessage = "Funds withdrawn successfully. New balance: $" . $newMoneyBalance;
        } catch (PDOException $e) {
            $withdrawResponseMessage = "Error withdrawing funds: " . $e->getMessage();
        }
    } else {
        $withdrawResponseMessage = "Insufficient funds for withdrawal.";
    }
}

$pdo = null;

echo json_encode(array('message' => $withdrawResponseMessage));
?>