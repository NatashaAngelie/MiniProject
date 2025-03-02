<!DOCTYPE html>
<html>
<head>
    <title>Home - Mini Tabungan</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <nav>
        <h1>Mini Tabungan</h1>
        <?php if(isset($_SESSION['user_id'])): ?>
            <div>
                Welcome, <?php echo $_SESSION['user_name']; ?>
                <?php if($_SESSION['user_role'] === 'admin'): ?>
                    <a href="admin">Admin Dashboard</a>
                <?php endif; ?>
                <a href="save">Save</a>
                <a href="logout">Logout</a>
            </div>
        <?php else: ?>
            <div>
                <a href="login">Login</a>
                <a href="register">Register</a>
            </div>
        <?php endif; ?>
    </nav>

    <main>
        <h2>Recent Savings</h2>
        <?php foreach($saving as $saving): ?>
            <div class="saving-card">
                <h3><?php echo htmlspecialchars($saving['name']); ?></h3>
                <p>Amount: Rp<?php echo number_format($saving['amount']); ?></p>
                <p>Message: <?php echo htmlspecialchars($saving['message']); ?></p>
                <small>Date: <?php echo $saving['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>
