<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ordine numero: <?php echo $_POST['codice_ordine']?></h1>
<?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "aziendacasearia");
    mysqli_report (MYSQLI_REPORT_ERROR);
    
    if(isset($_POST['inserisci'])) {
        // Inserire un nuovo prodotto nell'ordine
        // che consiste nell'inserire una riga ordine nella
        // tabella righeOrdine
        $sql = "INSERT INTO righeOrdine (
                                codice_ordine,
                                codice_prodotto,
                                quantita,
                                dataScadenza) VALUES (
                                $_POST[codice_ordine],
                                $_POST[codice_prodotto],
                                $_POST[quantita],
                                '$_POST[dataScadenza]'
                            )";
        @mysqli_query($conn, $sql);
    }
?>
<form>
    <input type="hidden" name="codice_ordine" value="<?php echo $_POST['codice_ordine']?>">
    NOME PRODOTTO:
    <?php    
        
        $sql = "SELECT * FROM prodotti";
        $prodotti = mysqli_query($conn, $sql);
        $prodotto = mysqli_fetch_assoc($prodotti);
        
        echo "<select name='codice_prodotto'>";
        while ($prodotto) {
            echo "<option value='$prodotto[codice]'>$prodotto[codice]-$prodotto[descrizione]</option>";
            $prodotto = mysqli_fetch_assoc($prodotti);
        }
        echo "</select>";
    ?>
    <br><br>
    QUANTITA: <input type="number" min="1" value="1" name="quantita"><br><br>
    DATA SCADENZA: <input type="date" name="dataScadenza" required><br><br>
    <input type="submit" name="inserisci" value="Inserisci" formaction="modificaOrdine.php" formmethod="POST"><br><br>
</form>
<table width="100%" border="1px">
    <tr><th>Quantità</th><th>Data Scadenza</th><th>Codice Prodotto</th></tr>
    <?php
    $sql = "SELECT * FROM righeOrdine WHERE codice_ordine=$_POST[codice_ordine]";
    $righeOrdine = mysqli_query($conn, $sql);
    $rigaOrdine = mysqli_fetch_assoc($righeOrdine);
    while($rigaOrdine) {
        echo"<tr>";
        echo"<td>$rigaOrdine[quantita]</td>";
        echo"<td>$rigaOrdine[dataScadenza]</td>";
        
        $sql = "SELECT * FROM prodotti WHERE codice=$rigaOrdine[codice_prodotto]";
        $prodotti = mysqli_query($conn, $sql);
        // Il risultato è uno solo
        $prodotto = mysqli_fetch_assoc($prodotti);
        echo"<td>$rigaOrdine[codice_prodotto]-$prodotto[descrizione]</td>";
        echo"</tr>";
        $rigaOrdine = mysqli_fetch_assoc($righeOrdine);
    }
    ?>
</table>
<?php

    
?>    
</body>
</html>


