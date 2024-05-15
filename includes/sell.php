<?php
require 'userinfo+.php';

$sellResponseMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['symbol']) && isset($_POST['amount'])) {
    $symbol = $_POST['symbol'];
    $amountToSell = floatval($_POST['amount']);
    $userId = $_SESSION['user_id'];

    try {
        $query = "SELECT * FROM Transactions WHERE user_id = ? AND symbol = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userId, $symbol]);
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($transactions as $transaction) {
            if ($amountToSell > 0) {
                $sellAmount = min($transaction['quantity'], $amountToSell);

                if ($transaction['quantity'] === $sellAmount) {
                    $deleteQuery = "DELETE FROM Transactions WHERE user_id = ? AND symbol = ? AND transaction_id = ?";
                    $deleteStmt = $pdo->prepare($deleteQuery);
                    $deleteStmt->execute([$userId, $symbol, $transaction['transaction_id']]);
                } else {
                    $updateQuery = "UPDATE Transactions SET quantity = quantity - ? WHERE transaction_id = ?";
                    $updateStmt = $pdo->prepare($updateQuery);
                    $updateStmt->execute([$sellAmount, $transaction['transaction_id']]);
                }

                $amountToSell -= $sellAmount;
            } else {
                break;
            }
        }

        $sellResponseMessage = "Asset sold successfully.";
    } catch (PDOException $e) {
        $sellResponseMessage = "Error selling asset: " . $e->getMessage();
    }
}

$pdo = null;

echo json_encode(array('message' => $sellResponseMessage));
?>