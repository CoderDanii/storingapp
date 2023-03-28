<?php

// var_dump($_POST);
// die;

$action = $_POST['action'];
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
$capaciteit = $_POST['capaciteit']; 
$melder = $_POST['melder'];
$overige_info = $_POST['overige_info'];




//CREATE

if ($action == "create")
{

    //1. Verbinding
    require_once 'conn.php';

    //2. Query
    $query = "INSERT INTO meldingen (attractie, type, prioriteit, capaciteit, melder, overige_info)
    VALUES(:attractie, :type, :prioriteit, :capaciteit, :melder, :overige_info)";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([
        ":attractie" => $attractie,
        ":type" => $type,
        ":prioriteit" => $prioriteit,
        ":capaciteit" => $capaciteit,
        ":melder" => $melder,
        ":overige_info" => $overige_info,
    ]);

    header("Location:../meldingen/index.php?msg=Melding opgeslagen");

}


//EDIT

if ($action == "edit")
{

    require_once 'conn.php';
    $query = "UPDATE meldingen SET capaciteit = :capaciteit, melder = :melder, attractie = :attractie, type = :type, prioriteit = :prioriteit, overige_info = :overige_info WHERE id = :id";
    $statement = $conn ->prepare($query);
    $statement -> execute([
        ":capaciteit" => $capaciteit,
        ":melder" => $melder,
        ":attractie" => $attractie,
        ":type" => $type,
        ":prioriteit" => $prioriteit,
        ":overige_info" => $overige_info,
        ":id" => $id
    ]);

    header("Location:../meldingen/index.php?msg=Melding opgeslagen");

}

//echo $attractie . " / " . $type . " / " . $prioriteit .  " / " . $capaciteit . " / " . $melder;


?>