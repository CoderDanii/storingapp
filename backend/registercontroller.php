<?php

session_start();

if(isset($_SESSION['user_id']))
{
    die("kan niet registreren - je bent al ingelogd");
}

$username = $_POST['username'];
$password = $_POST['password'];
$password_check = $_POST['password_check'];
if($password != $password_check)
{
    die("wachtwoorden zijn niet gelijk aan elkaar");
}

require_once 'conn.php';
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([":username" => $username]);
$username = $statement -> fetch(PDO::FETCH_ASSOC);
if ($statement->rowCount() > 0)
{
    die;
}

if (empty($password))
{
    die("wachtwoord mag niet leeg zijn");
}
$hash = $hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (username, password) VALUES (:username, :hash)";
$statement = $conn ->prepare($query);
$statement -> execute([

    ":username" => $username,
    ":hash" => $hash
]);

    header("location: ../session/login.php? msg=account succesvol aangemaakt!");
    exit;