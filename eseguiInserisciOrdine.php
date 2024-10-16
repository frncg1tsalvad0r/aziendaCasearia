<?php
    //print_r($_POST);
    //die();
    $conn = mysqli_connect("127.0.0.1", "root", "", "aziendaCasearia");
    $sql = "INSERT INTO ordini (codice, codice_cliente, data, importo) 
            VALUES ($_POST[codice], $_POST[codice_cliente], 
            '$_POST[data]', $_POST[importo])";
    mysqli_query($conn, $sql);
?>