<?php
require 'userinfo+.php';

$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$limit = 100;

$query = "SELECT * FROM Transactions WHERE user_id = ? LIMIT $offset, $limit";
$stmt = $pdo->prepare($query);

if ($stmt->execute([$userId])) {
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($transactions as $transaction) {
        echo '<tr>';
        echo '<td>' . $transaction['transaction_date'] . '</td>';
        echo '<td>' . $transaction['transaction_type'] . '</td>';
        echo '<td>' . $transaction['symbol'] . '</td>';
        echo '<td>' . $transaction['quantity'] . '</td>';
        echo '<td>$' . $transaction['price'] . '</td>';
        echo '</tr>';
    }
} else {
    echo "Error fetching portfolio data.";
}

$pdo = null;
?>