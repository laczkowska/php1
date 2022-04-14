<?php

include "6.1FUNKCJE.php";
include '6.1DANE.php';

?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Jedzonko</title>
</head>
<body>
<form action = "6.1INDEX.php" method = "get">
    <label for = "jedzenie">wybierz danie:</label>
    <select name = "jedzenie" id= "jedzenie"><br><br>
        <?php
        $i = 0;
        foreach ($tablicaDanie as $a){
            echo '<option value="'.$i.'">'.$a["danie"].", cena: ". $a["cena"].'</option>';
            $i++;
        }
        ?>
    </select><br><br>
    <label for = "ilosc">wybierz ilosc:</label>
    <input type = "number" name = "ilosc" id = "ilosc" required>
    <br>
    <h3>dodatki: </h3>
    <?php
    $i = 0;
    foreach ($tablicaDodatki as $a){
        echo '<label for = "addon'.$i.'">'.$a['dodatek']." ".$a['cena'].'zł</label>';
        echo '<input type = "checkbox" name = "'.$i.'" id = "addon'.$i.'" value = "1"><br>';
        $i++;
    }
    ?>
    <input type="submit" name="submit" value="submit">
</form>
<?php
if (isset($_GET['submit'])) {
    echo "<h3>cena</h3>";
    $rodzaj = $_GET['jedzenie'];
    $ilosc = $_GET['ilosc'];

    for ($i = 0; $i < count($tablicaDodatki); $i++) {
        if ($_GET[$i] == 1)
            $dodatki[$i] = $tablicaDodatki[$i];
    }
    $rodzaj = (int)$rodzaj;
    $ilosc = (int)$ilosc;
    echo oblicz($rodzaj, $ilosc, $dodatki);
}?>
</body>
</html>