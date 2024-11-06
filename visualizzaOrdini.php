<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Ordini</title>
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
    <h1>Visualizza Ordini</h1>
    <?php
        $conn = mysqli_connect("127.0.0.1", "root", "", "aziendacasearia");
        $sql = "SELECT * FROM ordini";
        $ordini = mysqli_query($conn, $sql);
        $ordine = mysqli_fetch_assoc($ordini);
        echo "<table>";
        echo "<tr><th>CODICE</th>
        <th>CODICE CLIENTE</th>
        <th>DATA</th>
        <th>IMPORTO</th>
        <th>🔧</th>
        </tr>";
        while($ordine) {
            echo "<tr>";
            echo "<td>$ordine[codice]</td>";

            /*echo "<td>$ordine[codice_cliente]</td>";*/
            $sql = "SELECT * FROM clienti WHERE codice=$ordine[codice_cliente]";
            $clienti = mysqli_query($conn, $sql);
            $cliente = mysqli_fetch_assoc($clienti);
            echo "<td>$ordine[codice_cliente]-$cliente[denominazione]</td>";

            echo "<td>$ordine[data]</td>";
            echo "<td>$ordine[importo]</td>";
            echo "<form method='POST' action='modificaOrdine.php'>";
            echo "<input type='hidden' name='codice_ordine' value='$ordine[codice]'>";
            echo "<td><input type='submit' name='modifica' value='Modifica'</td>";
            echo "</form>";
            echo "</tr>";
            $ordine = mysqli_fetch_assoc($ordini);
        }
        echo "</table>";
    ?>
</body>
</html>