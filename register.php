<!doctype html>
<html lang="nl">

<head>
    <title>registreren</title>
    <?php require_once 'head.php'; ?>
</head>

<body>
    <?php require_once 'header.php'; ?>
    <div class="container-home">
        <form action="backend/registerController.php" method="POST">
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <input type="password" name="password_check" placeholder="password_check">
            <input type="submit" value="register">
        </form>
    </div>
</body>
</html>