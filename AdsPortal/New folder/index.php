<?php
session_start();
require_once 'includes/db.php';

// Fetch all approved ads from the database
$query = "SELECT * FROM ads WHERE status = 'approved'";
$result = mysqli_query($conn, $query);

// Fetch logged-in user data if any
$user_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement Portal - Home</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if ($user_logged_in): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="place_ad.php">Place an Ad</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Approved Ads</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="ads-list">
                <?php while ($ad = mysqli_fetch_assoc($result)): ?>
                    <div class="ad">
                        <h2><?php echo htmlspecialchars($ad['title']); ?></h2>
                        <p><strong>Dimension:</strong> <?php echo htmlspecialchars($ad['ad_dimension']); ?></p>
                        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($ad['description'])); ?></p>
                        <p><strong>Price:</strong> $<?php echo number_format($ad['price'], 2); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No approved ads available at the moment.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Ad Portal. All rights reserved.</p>
    </footer>
</body>
</html>
