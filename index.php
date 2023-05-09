<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $msg = "Je moet eerst inloggen!";
    header("location: session/login.php?msg=$msg");
    exit;
} ?>

<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp</title>
    <?php require_once 'head.php'; ?>
</head>

<body>

    <?php require_once 'header.php'; ?>

    <div class="container home">

        <h1>Welkom bij de technische dienst</h1>
        <img src="img/logo-big-fill-only.png" alt="logo">

    </div>

</body>

</html>