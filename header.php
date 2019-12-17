<?php 
session_start();
@$innloggetBruker=$_SESSION["brukernavn"]; 
  
if (!$innloggetBruker)
 {
  print("<meta http-equiv='refresh' content='0;url=innloggning.php'>");
 }
?>

<!DOCTYPE html>
<html lang="no">
<head>
<title>Bjarum Hotels</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    min-height: 100%;
}

input:focus{
  background-color: #caf9b8;
}

header {
    padding: 25px;
    text-align: center;
    font-size: 30px;
    text-transform: uppercase;
    font-family: Calibri, serif;
    color: black;
}
nav {
    float: left;
    width: 10%;
    height: 300px; 
    padding: 5px;
}

nav h1 {
    font-size: 16px;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

li a {
    display: block;
    text-decoration: none;
    padding: 5px 9px;
    color: #514c51;
    font-family: arial;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
    font-size: 16px;
    outline-width: medium;
}

li a.active {
    background-color: grey;
    color: #0d4419;
    font-weight: bold;
    font-size: 18px;
    outline-style: solid;
    border: 6px solid #6fa57a;
    text-shadow: 0.7px 0 0;
}

content {
    float: left;
    padding: 20px;
    width: 70%;
    height: 300px; 
}

section:after {
    content: "";
    display: table;
    clear: both;
}


footer {
    padding: 15px;
    text-align: center;
    bottom: 0;
    height: 10%;
    font-family: helvetica;
}

</style>
</head>
<body>


<header>
  <h2>Obligatorisk oppgave</h2>
</header>

<section>
<nav>
  <ul>
    <h1>Meny</h1>
    <li><a href="index.php">Hjem</a></li>
    <li><a href="hoteller.php">Oversikt over hoteller</a></li>
    <li><a href="romtype.php">Oversikt over hotellrom</a></li><li>
    <li><a href="minside.php">Min side</a></li>
    <li><a href="bestill.php">Bestill</a></li>
    <li><a href="utlogging.php">Logg ut</a></li>
    </ul>
</nav>

 







  <content>