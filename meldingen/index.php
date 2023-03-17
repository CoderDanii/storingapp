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

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php   

            require_once '../backend/conn.php';
            $query = "SELECT * FROM meldingen";
            $statement = $conn -> prepare($query);
            $statement -> execute();
            $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($meldingen as $melding)
        ?>

        <table>
            <tr>    
                <th>Attractie</th>
                <th>prio-melding</th>
                <th>Type</th>
                <th>Melder</th> 
                <th>capaciteit</th>
                <th>gemeld op</th>
            </tr>
            <?php foreach($meldingen as $melding): ?>
                <tr>    
                    <td><?php echo $melding['attractie']; ?></td>
                    
                    <td><?php 
                    if ($melding['prioriteit'] == 1){
                        echo "ja";
                    } else {
                        echo "nee";
                    };
                    ?></td>

                    <td><?php echo $melding['type']; ?></td>
                    <td><?php echo $melding['melder']; ?></td>
                    <td><?php echo $melding['capaciteit']; ?></td>
                    <td><?php echo $melding['gemeld_op']; ?></td>

                </tr>
                <?php endforeach; ?>
    </table>
    </div>  

</body>

</html>
