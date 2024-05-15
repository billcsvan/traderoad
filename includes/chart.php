<?php

require 'userinfo+.php';

$query = "SELECT DATE(transaction_date) AS transaction_date, SUM(price) AS total_revenue FROM Transactions WHERE user_id = ? GROUP BY DATE(transaction_date)";
$stmt = $pdo->prepare($query);
$chartData = [];
if ($stmt->execute([$userId])) {
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($transactions as $transaction) {
        $timestamp = strtotime($transaction['transaction_date']) * 1000;
        $totalRevenue = floatval($transaction['total_revenue']);
        $chartData[] = [$timestamp, $totalRevenue];
    }

    header('Content-Type: application/json');
    echo json_encode($chartData);
} else {
    echo "Error executing the query: " . implode(" ", $stmt->errorInfo());
}
$pdo = null;
?>