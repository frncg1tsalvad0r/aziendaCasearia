<?php

    $conn = mysqli_connect("127.0.0.1", "root", "", "aziendaCasearia");
    $sql = "INSERT INTO prodotti (codice, descrizione, prezzo, tipo) 
            VALUES ('$_POST[codice]', '$_POST[descrizione]', 
            $_POST[prezzo], '$_POST[tipo]')";
    mysqli_query($conn, $sql);

?>