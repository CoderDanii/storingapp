<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];
if(isset($_POST['prioriteit']))
{
    $prioriteit = 1;
}
else
{
    $prioriteit = 0;
}
$prioriteit = $_POST['prioriteit'];
$capaciteit = $_POST['capaciteit']; 
$melder = $_POST['melder'];

echo $attractie . " / " . $type . " / " . $prioriteit .  " / " . $capaciteit . " / " . $melder;
// var_dump($_POST);
// die;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, prioriteit, capaciteit, melder)
VALUES(:attractie, :type, :prioriteit, :capaciteit, :melder)";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":prioriteit" => $prioriteit,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
]);

header("Location:../meldingen/index.php?msg=Meldingopgeslagen");