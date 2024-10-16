<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Prodotto</title>
</head>
<body>
    <h1>Inserisci Prodotto</h1>
    <form action="eseguiInserisciProdotto.php" method="POST">
        CODICE: <input type="number" name="codice" placeholder="codice"><br><br>
        DESCRIZIONE: <input type="text" name="descrizione" placeholder="descrizione" ><br><br>
        PREZZO: <input type="text" name="prezzo" pattern="[0-9]+" placeholder="indiprezzorizzo" ><br><br>
        TIPO: <input type="text" name="tipo" placeholder="tipo" ><br><br>
        <input type="submit" value="Inserisci">
    </form>
</body>
</html>