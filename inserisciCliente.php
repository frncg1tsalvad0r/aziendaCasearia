<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Cliente</title>
</head>
<body>
    <h1>Inserisci Cliente</h1>
    <?php
    if(isset($_POST["inserisci"])) {
        require_once("connetti.php");
        $sql = "INSERT INTO clienti (codice, denominazione, indirizzo, regione) 
                VALUES ('$_POST[codice]', $_POST[denominazione], 
                $_POST[indirizzo], $_POST[regione])";
        mysqli_query($conn, $sql);
        header("Location: visualizzaClienti.php");
    }

    ?>
    <form action="inserisciCliente.php" method="POST">
        CODICE: <input type="number" name="codice"><br><br>
        DENOMINAZIONE: <input type="text" name="denominazione"><br><br>
        INDIRIZZO: <input type="text" name="indirizzo"><br><br>
        REGIONE: <input type="text" name="regione"><br><br>
        <input type="submit" name="inserisci" value="Inserisci">
    </form>
</body>
</html>