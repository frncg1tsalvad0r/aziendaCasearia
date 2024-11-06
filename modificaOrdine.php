<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ordine numero: <?php echo $_POST['codice_ordine']?></h1>

<form>
    <input type="hidden" name="codice_ordine" value="<?php echo $_POST['codice_ordine']?>">
    NOME PRODOTTO:
    <?php    
        $conn = mysqli_connect("127.0.0.1", "root", "", "aziendacasearia");
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
    <input type="submit" value="Inserisci" formaction="confermaModifica.php" formmethod="POST"><br><br>
</form>
<table width="100%" border="1px">
    <tr><th>Quantità</th><th>Descrizione</th></tr>
    <tr><td>3</td><td>Latte</td></tr>
    <tr><td>2</td><td>Fontina</td></tr>
    <tr><td>1</td><td>Gorgonzola</td></tr>
    <tr><td>5</td><td>Asiago</td></tr>
</table>
<?php

    
?>    
</body>
</html>


