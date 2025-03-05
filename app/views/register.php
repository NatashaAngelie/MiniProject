<!DOCTYPE html>
<html>
<head>
    <title>Register - Mini Tabungan</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="pink-body">
    <nav class="pink-nav">
        <h1>Mini Tabungan</h1>
        <a class="pink-nav-a" href="home">Home</a>
    </nav>

    <main class="pink-main">
        <h2>Register</h2>
        <form method="POST" action="register">
            <div>
                <label>Name</label>
                <input class="pink-input" type="text" name="name" required>
            </div>
            <div>
                <label>Email</label>
                <input class="pink-input" type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input class="pink-input" type="password" name="password" required>
            </div>
            <button class="pink-button" type="submit">Register</button>
        </form>
        <p>Already have an account? <a class="pink-main-a" href="login">Login</a></p>
    </main>
</body>
</html>