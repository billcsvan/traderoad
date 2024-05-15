<?php
require "userinfo+.php";

$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$limit = 100;

$query = "SELECT * FROM Transactions WHERE user_id = ? LIMIT $offset, $limit";
$stmt = $pdo->prepare($query);

if ($stmt->execute([$userId])) {
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Group transactions by symbol
    $groupedTransactions = [];
    foreach ($transactions as $transaction) {
        $symbol = $transaction['symbol'];
        if (!isset($groupedTransactions[$symbol])) {
            $groupedTransactions[$symbol] = [];
        }
        $groupedTransactions[$symbol][] = $transaction;
    }

    // Display grouped assets
    foreach ($groupedTransactions as $symbol => $symbolTransactions) {
        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($symbolTransactions as $transaction) {
            $totalQuantity += $transaction['quantity'];
            $totalPrice += $transaction['price'];
        }

        echo '<div class="asset">';
        echo '<div class="theThing">';
        echo '<h3>' . $symbol . '</h3>';
        echo '<p>Quantity: ' . $totalQuantity . '</p>';
        echo '<p>Price: $' . $totalPrice . '</p>';
        echo '</div>';
        echo '<div class="sell-button-container">';
        echo '<input class="sell-amount" type="number" min="1" max="' . $totalQuantity . '" placeholder="Enter amount to sell">';
        echo '<button class="sell-button" data-symbol="' . $symbol . '">Sell</button>';
        echo '<button class="cancel-sell-button">Cancel</button>';

        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Error fetching portfolio data.";
}
$pdo = null;
?>