<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Cliente</title>
</head>
<body>
    <h1>Inserisci Cliente</h1>
    <form action="eseguiInserisciCliente.php" method="POST">
        CODICE: <input type="number" name="codice"><br><br>
        DENOMINAZIONE: <input type="text" name="denominazione"><br><br>
        INDIRIZZO: <input type="text" name="indirizzo"><br><br>
        REGIONE: <input type="text" name="regione"><br><br>
        <input type="submit" value="Inserisci">
    </form>
</body>
</html>