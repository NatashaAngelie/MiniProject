<!DOCTYPE html>
<html>
<head>
    <title>Saving - Mini Tabungan</title>
    <link rel="stylesheet" href="public/css/style.css">
    <!-- <style>
        body{
            background-image: url(background3.jpeg);
            background-size: cover;
            overflow: hidden;
        }
        main{
            background-color: rgba(209, 255, 199, 0.5);
            margin-top: 20px;
            border-radius: 30px;
        }
        nav{
            background: rgb(183, 255, 169);
            font-weight: bold;
            color: black;
        }
        nav a{
            font-weight: bold;
            color: black;
        }
        nav a:hover{
            color: rgb(121, 121, 121); 
        }
        input, textarea{
            border-radius: 10px;
            border: 2px solid rgb(121, 255, 94); 
        }
        input:focus, textarea:focus{
            border: 2px solid rgb(121, 255, 94); 
            background-color:rgb(209, 241, 255); 
            border-radius: 10px;
            outline: none;
        }
        button{
            background: rgb(158, 255, 138);
            font-weight: bold;
            color: black;
            border-radius: 10px;
        }
        button:hover{
            background: rgb(209, 241, 255); 
        }
    </style> -->
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