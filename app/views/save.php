<!DOCTYPE html>
<html>
<head>
    <title>Saving - Mini Tabungan</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="green-body">
    <nav class="green-nav">
        <h1>Mini Tabungan</h1>
        <a class="yellow-green-nav-a" href="home">Home</a>
    </nav>

    <main class="green-main">
        <h2>Make a Saving</h2>
        <form method="POST" action="save">
            <div>
                <label>Amount (Rp)</label>
                <input class="green-input" type="number" name="amount" required>
            </div>
            <div>
                <label>Message</label>
                <textarea name="message" required></textarea>
            </div>
            <button class="green-button" type="submit">Save</button>
        </form>
    </main>
</body>
</html>