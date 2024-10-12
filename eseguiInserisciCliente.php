<?php

    $conn = mysqli_connect("127.0.0.1", "root", "", "aziendaCasearia");
    $sql = "INSERT INTO clienti (codice, denominazione, indirizzo, regione) 
            VALUES ('$_POST[codice]', $_POST[denominazione], 
            $_POST[indirizzo], $_POST[regione])";
    mysqli_query($conn, $sql);

?>