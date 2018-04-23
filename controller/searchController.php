<?php
    if(isset($_POST['restoData'])){
        $restoData = "restoData.json";
        $fh = fopen($restoData, 'w') or die("can't open file");
        $jsonData = json_decode($_POST['restoData']);
        fwrite($fh, json_encode($jsonData, JSON_PRETTY_PRINT));
        fclose($fh);
    }
?>