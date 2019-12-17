<?php include 'head.html';?>

<h3>Velg hotell</h3>
<form method="post" action="" id="hotellliste" name="hotellliste">
Klassekode <select name="sok" id="sok" required>
 	 <option value="">Velg klasse </option>
 <?php include("dynamiske-funksjoner.php"); listeboksHotell(); ?>
 </select> <br/>
 <input type="submit" value="Vis liste" id="sokeKnapp" name="sokeKnapp" />
</form>

<?php
 if (isset($_POST ["sokeKnapp"]))
 {
 $sok=$_POST ["sok"];
 include("db-tilkobling.php"); 
 print ("Studenter i <strong>$sok</strong> <br /><br />");

$sqlSetning="SELECT * FROM rom WHERE hotellnavn LIKE '%$sok%';";

 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);
 if ($antallRader==0)
 {
 print ("Ingen oppføringer");
 }
 else
 {
 print ("rom informasjon: <br />");
 print ("<table border=1");
 print ("<tr> <th align=left>hotellnavn</th> <th align=left>romtype</th> <th align=left>romnr</th> </tr>");
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 


 $hotellnavn=$rad["hotellnavn"];
 $romtype=$rad["romtype"];
 $romnr=$rad["romnr"];

 $soklengde=strlen($sok); 

 print ("<tr> <td> $hotellnavn </td> <td> $romtype </td> <td> $romnr</td> </tr>"); 
 
 }
 print ("</table> </br />");
 }

 }

 ?>