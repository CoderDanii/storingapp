<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $msg = "Je moet eerst inloggen!";
    header("location: ../session/login.php?msg=$msg");
    exit;
} ?>

<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <!-- filteren attractie        -->
        <form action="" method="GET">
            <select name="type">
                <option value=""> - Kies soort om te filteren - </option>
                <option value="Achtbaan">Achtbaan</option>
                <option value="Water">Water</option>
                <option value="Darkride">Darkride</option>
                <option value="Draaiend">Draaiend</option>
                <option value="Kinder">Kinder</option>
                <option value="Horeca">Horeca</option>
                <option value="Show">Show</option>
                <option value="Overig">Overig</option>
            </select>
            <input type="submit" value="filter">
        </form>
        <?php

        // $type = $_POST['type'];

        require_once '../backend/conn.php';
        if(empty($_GET['type'])) 

        {
   
            $query = "SELECT * FROM meldingen ORDER BY gemeld_op DESC";
            $statement = $conn->prepare($query);
            $statement->execute([

            ]);
        } 
        else {
        //    print_r($_SESSION['user_id']);
        //    print_r($_GET['type']);
        //    die;
            $query = "SELECT * FROM meldingen WHERE type = :type ORDER BY gemeld_op DESC";
            $statement = $conn->prepare($query);
            $statement->execute([
                ":type" => $_GET['type']
            ]);
        }
        $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($meldingen as $melding)
        ?>





        <?php if (isset($_GET['msg'])) {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php
        // require_once '../backend/conn.php';
        // $query = "SELECT * FROM meldingen";
        // $statement = $conn->prepare($query);
        // $statement->execute();
        // $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
        // foreach ($meldingen as $melding)
        ?>

        <table>
            <tr>
                <th>Attractie</th>
                <th>prio-melding</th>
                <th>Type</th>
                <th>Melder</th>
                <th>capaciteit</th>
                <th>gemeld op</th>
                <th>overige info</th>
                <th>aanpasssen</th>
            </tr>
            <?php foreach ($meldingen as $melding): ?>
                <tr>
                    <td>
                        <?php echo $melding['attractie']; ?>
                    </td>

                    <td>
                        <?php
                        if ($melding['prioriteit'] == 1) {
                            echo "ja";
                        } else {
                            echo "nee";
                        }
                        ;
                        ?>
                    </td>

                    <td>
                        <?php echo $melding['type']; ?>
                    </td>
                    <td>
                        <?php echo $melding['melder']; ?>
                    </td>
                    <td>
                        <?php echo $melding['capaciteit']; ?>
                    </td>
                    <td>
                        <?php echo $melding['gemeld_op']; ?>
                    </td>
                    <td>
                        <?php echo $melding['overige_info']; ?>
                    </td>
                    <td><a href="edit.php?id=<?php echo $melding['id']; ?>">aanpassen</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>