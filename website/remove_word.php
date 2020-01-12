<?php
include "db.php";
$DAO = new DatabaseAccessObject();

$word = $_GET["w"];
$rs = $DAO->execute('INSERT INTO filtering_words(word) VALUES ("'.$word.'")');

if($DAO -> getErrorMessage() != ""){
    echo "<script>alert('Error! Try again later.');</script>";
}else{
    echo "<script>alert('The word has been successfully added to white list!');</script>";
}

$t = $_GET["t"];
if($t == "t"){
    echo "<script>location.href='trending.php';</script>";
}
if($t == "i"){
    echo "<script>location.href='insight.php';</script>";
}

