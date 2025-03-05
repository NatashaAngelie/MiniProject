<!DOCTYPE html>
<html>
<head>
    <title>Login - Mini Tabungan</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="pink-body">
    <nav class="pink-nav">
        <h1>Mini Tabungan</h1>
        <a class="pink-nav-a" href="home">Home</a>
    </nav>

    <main class="pink-main">
        <h2>Login</h2>
        <form method="POST" action="login">
            <div>
                <label>Email</label>
                <input class="pink-input" type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input class="pink-input" type="password" name="password" required>
            </div>
            <button class="pink-button" type="submit">Login</button>
        </form>
        <p>Don't have an account? <a class="pink-main-a" href="register">Register!</a></p>
    </main>
</body>
</html>