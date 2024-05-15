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
    <div>
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
            <section id="withdraw" class="withdraw-section" style="margin-bottom:100vh">
                <h2>Withdraw Funds</h2>
                <div id="withdrawFormContainer">
                    <form id="withdrawForm" method="post" action="../includes/withdraw.php">
                        <label for="amount">Amount:</label>
                        <input type="number" id="amount" name="amount" required>
                        <label for="email">Paypal:</label>
                        <input type="email" required>
                        <button type="submit">Withdraw</button>
                    </form>
                    <p id="withdrawResponseMessage"></p>
                </div>
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