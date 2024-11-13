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
    <h1>Visualizza Prodotti</h1>
    <?php
        $conn = mysqli_connect("127.0.0.1", "root", "", "aziendacasearia");
        $sql = "SELECT * FROM clienti";
        $clienti = mysqli_query($conn, $sql);
        $cliente = mysqli_fetch_assoc($clienti);
        echo "<table>";
        echo "<tr><th>CODICE</th><th>DENOMINAZIONE</th><th>INDIRIZZO</th><th>REGIONE</th></tr>";
        while($cliente) {
            echo "<tr>";
            echo "<td>$cliente[codice]</td>";
            echo "<td>$cliente[denominazione]</td>";
            echo "<td>$cliente[indirizzo]</td>";
            echo "<td>$cliente[regione]</td>";
            echo "</tr>";
            $cliente = mysqli_fetch_assoc($clienti);
        }
        echo "</table>";
    ?>
</body>
</html>