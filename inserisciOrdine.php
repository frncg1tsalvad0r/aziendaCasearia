<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Ordine</title>
</head>
<body>
    <h1>Inserisci Ordine</h1>
    <?php
        require_once("connetti.php");
    
        if(isset($_POST["inserisci"])) {
            
            $sql = "INSERT INTO ordini (codice, codice_cliente, data, importo) 
                VALUES ($_POST[codice], $_POST[codice_cliente], 
                '$_POST[data]', $_POST[importo])";
            //print_r($sql);die();
            mysqli_query($conn, $sql);
            header("Location: visualizzaOrdini.php");
            die();
        }
    ?>
    
    
    <!--<form action="eseguiInserisciOrdine.php" method="POST">-->
    <form action="inserisciOrdine.php" method="POST">   
        CODICE: <input type="number" name="codice" placeholder="codice"><br><br>
        CLIENTE:
        <?php
            $sql = "SELECT * FROM clienti";
            $clienti = mysqli_query($conn, $sql);
            $cliente = mysqli_fetch_assoc($clienti);
            echo "<select name='codice_cliente'>";
            while($cliente) {
                echo "<option value='$cliente[codice]'>$cliente[codice] $cliente[denominazione]</option>";
                $cliente = mysqli_fetch_assoc($clienti);
            }
            echo "</select>";
        ?><br><br>
        DATA: <input type="date" name="data" placeholder="data" ><br><br>
        IMPORTO: <input type="text" name="importo" pattern="[0-9]+" placeholder="importo" required><br><br>
        <input type="submit" name="inserisci" value="Inserisci">
    </form>
</body>
</html>