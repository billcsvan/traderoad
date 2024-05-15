<?php

require 'userinfo+.php';

$depositResponse = [
    'success' => false,
    'message' => 'Error depositing funds.',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount'])) {
    $depositAmount = floatval($_POST['amount']);
    $userId = $_SESSION['user_id'];

    // Calculate new balances
    $newMoneyBalance = $userData['money'] + $depositAmount;
    $newAssetsBalance = $newMoneyBalance + $userData['assets'];

    try {
        $query = "UPDATE Users SET money = ?, assets = ? WHERE UserID = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$newMoneyBalance, $newAssetsBalance, $userId]);

        $depositResponse['success'] = true;
        $depositResponse['message'] = "Funds deposited successfully. New balance: $" . $newMoneyBalance;
    } catch (PDOException $e) {
        $depositResponse['message'] = "Error depositing funds: " . $e->getMessage();
    }
}

$pdo = null;

header('Content-Type: application/json');
echo json_encode($depositResponse);
?>