<?php include_once "../includes/userinfo+.php" ?>
<?php include_once "../includes/head.php" ?>
<link rel="stylesheet" href="../css/logstyle.css">
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>
<script src="../js/dashboard.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Account</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#charts">Charts</a></li>
                    <li><a href="#history">History</a></li>
                    <li><a href="#" id="logout">Logout</a></li>
                </ul>
            </nav>
        </header>

        <!-- Sidebar Section -->
        <aside class="sidebar">
            <div>
                <h2>Welcome
                    <?php echo $userData['first_name'] . " " . $userData['last_name']; ?>!
                </h2>
                <p>Balance: $
                    <?php echo $userData['assets']; ?>
                </p>
                <p>Available: $
                    <?php echo $userData['money']; ?>
                </p>
            </div>

            <ul>
                <li><a href="account.php">Account Settings</a></li>
                <li><a href="deposit.php">Deposit Funds</a></li>
                <li><a href="withdraw.php">Withdraw Funds</a></li>
                <li><a href="support.php">Customer Support</a></li>
            </ul>
        </aside>


        <!-- Main Content Section -->
        <main class="main-content">
            <section id="charts" class="charts-section">
                <div id="charts1"></div>
            </section>
            <!-- Trading Portfolio Section -->
            <section id="portfolio" class="portfolio-section">
                <h2>Trading Portfolio</h2>
                <div class="portfolio-content">
                    <?php
                    $limit = 5;
                    $count = 0;
                    $groupedTransactions = [];

                    // Group transactions by symbol
                    foreach ($userTransactions as $transaction) {
                        $symbol = $transaction['symbol'];
                        if (!isset($groupedTransactions[$symbol])) {
                            $groupedTransactions[$symbol] = [];
                        }
                        $groupedTransactions[$symbol][] = $transaction;
                    }

                    foreach ($groupedTransactions as $symbol => $symbolTransactions) {
                        if ($count >= $limit) {
                            break;
                        }

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

                        $count++;
                    }
                    ?>
                </div>
                <a href="#" class="see-more-link1">See More</a>
            </section>

            <!-- Transaction History Section -->
            <section id="history" class="history-section">
                <h2>Transaction History</h2>
                <div class="history-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Symbol</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>

                        <tbody class="more-history">
                            <?php
                            $limit = 5;
                            $count = 0;
                            foreach ($userTransactions as $transaction) {
                                if ($count < $limit) {
                                    echo '<tr>';
                                    echo '<td>' . $transaction['transaction_date'] . '</td>';
                                    echo '<td>' . $transaction['transaction_type'] . '</td>';
                                    echo '<td>' . $transaction['symbol'] . '</td>';
                                    echo '<td>' . $transaction['quantity'] . '</td>';
                                    echo '<td>$' . $transaction['price'] . '</td>';
                                    echo '</tr>';
                                    $count++;
                                } else {
                                    break;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="#" class="see-more-link2">See More</a>
            </section>
        </main>
        <div id="footer2">
            <ul>
                <li>
                    <h4>Contact Us</h4>
                </li>
                <li>Address: 123 Main Street, City, State, Zip Code</li>
                <li>Phone: (555) 555-5555</li>
                <li>Email: test@test.test</li>
                <li>Website: www.lorem5.com</li>
            </ul>
            <ul>
                <li>
                    <h4>Resources</h4>
                </li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Quidem ea delectus odio nam.</li>
                <li>Praesentium culpa expedita doloremque sit!</li>
                <li>Nisi facere dolores quos necessitatibus!</li>
            </ul>
            <ul>
                <li>
                    <h4 style="margin-bottom: 5%;">Social</h4>
                </li>
                <li><img src="./images/blackfacebook.png" alt="Facebook' page" style="width: 30px; height:30px;">
                </li>
                <li><img src="./images/blackinstagram.png" alt="Instagram's page" style="width: 30px; height:30px;">
                </li>
                <li><img src="./images/blacktwitter.png" alt="Twitter's page" style="width: 30px; height:30px;">
                </li>
                <li>
                    <img src="./images/github.png" alt="Github's page" style="width: 30px; height:30px;">
                </li>
            </ul>

        </div>
        <footer>
            <p>&copy; 2023, Lorem ipsum dolor. All Rights Reserved.</p>
        </footer>
    </div>
</body>

</html>