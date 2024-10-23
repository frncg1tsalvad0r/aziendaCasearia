<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Cliente</title>
</head>
<body>
    <h1>Modifica Cliente</h1>
    <?php
    require_once("connetti.php");

    if(isset($_POST['conferma'])) {
        // Ho selezionato modifica
        $sql = "UPDATE clienti SET 
            denominazione='$_POST[denominazione]',
            indirizzo='$_POST[indirizzo]',
            regione='$_POST[regione]' WHERE codice = $_POST[codice];
        ";
        mysqli_query($conn, $sql);
        header("Location: visualizzaClienti.php");
    }

    
    $sql = "SELECT * FROM clienti WHERE codice=$_POST[selezione]";
    $clienti = mysqli_query($conn, $sql);
    $cliente = mysqli_fetch_assoc($clienti);
    ?>

    <form action="modificaCliente.php" method="POST">
        CODICE: <input type="number" readonly name="codice" value="<?php echo $cliente['codice']; ?>"><br><br>
        DENOMINAZIONE: <input type="text" name="denominazione" value="<?php echo $cliente['denominazione']; ?>"><br><br>
        INDIRIZZO: <input type="text" name="indirizzo" value="<?php echo $cliente['indirizzo'] ;?>"><br><br>
        REGIONE: <input type="text" name="regione" value="<?php echo $cliente['regione']; ?>"><br><br>
        <input type="submit" name="conferma" value="Conferma">
    </form>
</body>
</html>