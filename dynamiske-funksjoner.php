<?php
function listeboksKlasseliste()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $hotellnavn=$rad["hotellnavn"];
 print("<option value='$hotellnavn'>$hotellnavn</option>");

 }
}

function listeboksHotell()
{
 include("db-tilkobling.php");

 $sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("får ikke hentet data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 print("<option value='$hotellnavn'>$hotellnavn</option>");
 
 }
}
function listeboksRomtype()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT romtype.romtype
FROM romtype
    LEFT JOIN bestill ON romtype.romtype =bestilling.romtype
WHERE bestilling.romtype IS NULL;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $romtype=$rad["romtype"];

 print("<option value='$romtype'>$romtype </option>"); 
 }
}

function listeboksRom()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT rom.romnr
FROM rom
    LEFT JOIN bestill ON rom.romnr =bestilling.romnr
WHERE bestilling.romnr IS NULL;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $romnr=$rad["romnr"];

 print("<option value='$romnr'>$romnr </option>"); 
 }
}

function listeboksRomNr()
{
 include("db-tilkobling.php");

 $sqlSetning="SELECT * FROM rom ORDER BY romnr;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("får ikke hentet data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $romnr=$rad["romnr"];
 print("<option value='$romnr'>$romnr</option>");
 
 }
}
function listeboksBestilling ()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM bestilling ORDER BY brukernavn;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $innsjekk=$rad["innsjekk"];
 $utsjekk=$rad["utsjekk"];
 $romnr=$rad["romnr"];
 $brukernavn=$rad["brukernavn"];
 print("<option value='$brukernavn'>$hotellnavn $innsjekk $utsjekk $romnr $brukernavn </option>");
 
 }
}
function listeboksInnsjekk()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM bestilling ORDER BY brukernavn;"; /* brukernavn*/
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $innsjekk=$rad["innsjekk"];
 print("<option value='$innsjekk'> </option>");

 }
}
function listeboksUtsjekk()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM bestilling ORDER BY utsjekk;"; /* brukernavn*/
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $utsjekk=$rad["utsjekk"];
 print("<option value='$utsjekk'> </option>");

 }
}
function listeboksRomNrBestilling()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM rom ORDER BY romnr;"; /* brukernavn*/
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $romnr=$rad["romnr"];
 print("<option value='$romnr'> $romnr </option>");

 }
}
?>