<?php
session_start();
function changeTurn(){
    if($_SESSION['turn'] == "X"){
        $_SESSION['turn'] = "O";}

    else{
        $_SESSION['turn'] = "X";}

    $_SESSION['countTurn']++;

    /*POZIOMO*/
    if(($_SESSION['board'][0][0] == "X" and $_SESSION['board'][0][1] == "X" and $_SESSION['board'][0][2] == "X") or ($_SESSION['board'][1][0] == "X" and $_SESSION['board'][1][1] == "X" and $_SESSION['board'][1][2] == "X") or ($_SESSION['board'][2][0] == "X" and $_SESSION['board'][2][1] == "X" and $_SESSION['board'][2][2] == "X")) {
        $_SESSION['WINNER'] = "X";
    }
    if(($_SESSION['board'][0][0] == "O" and $_SESSION['board'][0][1] == "O" and $_SESSION['board'][0][2] == "O") or ($_SESSION['board'][1][0] == "O" and $_SESSION['board'][1][1] == "O" and $_SESSION['board'][1][2] == "O") or ($_SESSION['board'][2][0] == "O" and $_SESSION['board'][2][1] == "O" and $_SESSION['board'][2][2] == "O")) {
        $_SESSION['WINNER'] = "O";
    }
    /*PIONOWO*/
    if(($_SESSION['board'][0][0] == "X" and $_SESSION['board'][1][0] == "X" and $_SESSION['board'][2][0] == "X") or ($_SESSION['board'][0][1] == "X" and $_SESSION['board'][1][1] == "X" and $_SESSION['board'][2][1] == "X") or ($_SESSION['board'][0][2] == "X" and $_SESSION['board'][1][2] == "X" and $_SESSION['board'][2][2] == "X")) {
        $_SESSION['WINNER'] = "X";
    }
    if(($_SESSION['board'][0][0] == "O" and $_SESSION['board'][1][0] == "O" and $_SESSION['board'][2][0] == "O") or ($_SESSION['board'][0][1] == "O" and $_SESSION['board'][1][1] == "O" and $_SESSION['board'][2][1] == "O") or ($_SESSION['board'][0][2] == "O" and $_SESSION['board'][1][2] == "O" and $_SESSION['board'][2][2] == "O")) {
        $_SESSION['WINNER'] = "O";
    }
    /*UKOS*/
    if(($_SESSION['board'][0][0] == "X" and $_SESSION['board'][1][1] == "X" and $_SESSION['board'][2][2] == "X") or ($_SESSION['board'][0][2] == "X" and $_SESSION['board'][1][1] == "X" and $_SESSION['board'][2][0] == "X")) {
        $_SESSION['WINNER'] = "X";
    }
    if(($_SESSION['board'][0][0] == "O" and $_SESSION['board'][1][1] == "O" and $_SESSION['board'][2][2] == "O") or ($_SESSION['board'][0][2] == "O" and $_SESSION['board'][1][1] == "O" and $_SESSION['board'][2][0] == "O")) {
        $_SESSION['WINNER'] = "O";
    }
}
if(isset($_GET['clear'])){
    unset($_SESSION['board']);
    unset($_SESSION['turn']);
    unset($_SESSION['WINNER']);
    unset($_SESSION['countTurn']);
}

if(empty($_SESSION['board'])){
    for($i = 0; $i < 3; $i++){
        for($j = 0;$j < 3; $j++){
            $_SESSION['board'][$i][$j] = "";
        }
    }
    $_SESSION['WINNER'] = "none";
    $_SESSION['turn'] = "X";
    $_SESSION['countTurn'] = 0;
}
if(!empty($_SESSION['board'])){
    /*1*/
    if(isset($_GET['box00'])){
        $_SESSION['board'][0][0] = $_SESSION['turn'];
        changeTurn();
    }if(isset($_GET['box01'])){
        $_SESSION['board'][0][1] = $_SESSION['turn'];
        changeTurn();
    }if(isset($_GET['box02'])){
        $_SESSION['board'][0][2] = $_SESSION['turn'];
        changeTurn();
    }
    /*2*/
    if(isset($_GET['box10'])){
        $_SESSION['board'][1][0]=$_SESSION['turn'];
        changeTurn();
    }if(isset($_GET['box11'])){
        $_SESSION['board'][1][1]=$_SESSION['turn'];
        changeTurn();
    }if(isset($_GET['box12'])){
        $_SESSION['board'][1][2]=$_SESSION['turn'];
        changeTurn();
    }
    /*3*/
    if(isset($_GET['box20'])){
        $_SESSION['board'][2][0]=$_SESSION['turn'];
        changeTurn();
    }if(isset($_GET['box21'])){
        $_SESSION['board'][2][1]=$_SESSION['turn'];
        changeTurn();
    }if(isset($_GET['box22'])){
        $_SESSION['board'][2][2]=$_SESSION['turn'];
        changeTurn();
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <style>
        table,td{
            border-collapse: collapse;
            border: 3px solid black;
            font-size: 70px;
            text-align: center;}
        td{
            height: 100px;
            width: 100px;}
    </style>
    <meta charset = "UTF-8">
    <title>KÓŁKO & KRZYŻYK</title>
</head>
<body>
<form method = "get">
    <table>
        <?php
        for($i = 0;$i < 3; $i++){
            echo '<tr>';
            for($j = 0; $j < 3; $j++){
                if(!$_SESSION['board'][$i][$j]!=""&&$_SESSION['WINNER'] == "none") {
                    echo '<td>';
                    echo '<input type = "submit" name = "box'.$i.$j.'"value = "PLACE">';
                    echo '</td>';
                }
                else{
                    echo '<td>' . $_SESSION['board'][$i][$j] . '</td>';
                }
            }
            echo '</tr>';
        }
        if($_SESSION['WINNER']<>"none"){
            echo '<h1>'.$_SESSION['WINNER'].' wygrał</h1>';
        }
        if($_SESSION['countTurn'] == 9){
            echo '<h1> REMIS</h1>';
        }
        ?>
    </table>
</form>

<form>
    <input type = "submit" name = "clear" value = "RESET">
</form>
</body>
</html>