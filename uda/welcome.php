<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F5EDE0;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 100px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header, .btn-primary {
            background-color: #D2B48C;
            color: #fff;
        }
        .card-header {
            font-size: 1.5rem;
            text-align: center;
            padding: 20px 0;
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 30px;
            text-align: center;
        }
        .btn-primary {
            border-radius: 5px;
            padding: 10px;
        }
        .btn-primary:hover {
            background-color: sienna;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Welcome</div>
                    <div class="card-body">
                        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
                        <form method="POST">
                            <button type="submit" name="logout" class="btn btn-primary btn-block">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
