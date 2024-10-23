<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Prodotti</title>
    <!--<link rel="stylesheet" href="style.css">-->
    <style>
    table {
        border:1px solid black; 
        width:100%;
    }
    td {
        border:1px solid black;
    }
    </style>
</head>
<body>
    <?php
    require_once("connetti.php");
    if(isset($_POST['elimina'])) {
        // Ho schiacciato il tasto elimina
        $sql = "DELETE FROM clienti WHERE codice=$_POST[selezione]";
        mysqli_query($conn, $sql);
        
    }
    ?>
    <h1>Visualizza Clienti</h1>
    <?php
        
        $sql = "SELECT * FROM clienti";
        $clienti = mysqli_query($conn, $sql);
        $cliente = mysqli_fetch_assoc($clienti);
        echo "<form>";
        echo "<table>";
        echo "<tr><th>🖋️</th><th>CODICE</th><th>DENOMINAZIONE</th><th>INDIRIZZO</th><th>REGIONE</th></tr>";
        while($cliente) {
            echo "<tr>";
            echo "<td><input type='radio' name='selezione' value='$cliente[codice]'></td>";
            echo "<td>$cliente[codice]</td>";
            echo "<td>$cliente[denominazione]</td>";
            echo "<td>$cliente[indirizzo]</td>";
            echo "<td>$cliente[regione]</td>";
            echo "</tr>";
            $cliente = mysqli_fetch_assoc($clienti);
        }
        echo "</table>";
        echo "<input type='submit' name='elimina' value='Elimina' formmethod='POST' formaction='visualizzaClienti.php'>";
        echo "<input type='submit' name='modifica' value='Modifica' formmethod='POST' formaction='modificaCliente.php'>";
        echo "</form>";
    ?>
</body>
</html>