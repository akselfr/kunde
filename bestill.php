<?php include 'header.php';?>

<h3>Registrer bestilling</h3>
<form method="post" action="" id="regStudentSkjema" name="regStudentSkjema">
hotell <select name="hotellnavn" id="hotellnavn" required />
 	 <option value="">Velg hotell </option>
 <?php include("dynamiske-funksjoner.php"); listeboksHotell(); ?>
 </select> <br/>
 innsjekk <input type="date" id="innsjekk" name="innsjekk" required><br/>
 utsjekk <input type="date" id="utsjekk" name="utsjekk" required><br/>
 velg romnr <select name="romnr" id="romnr" required />
	 romnr<option value="">Velg rom</option>
	 <?php listeboksRomNr(); ?>
</select><br/>
brukernavn <input type="text" name="brukernavn" id="brukernavn" required />
 <input type="submit" value="bestill hotellrom" id="regBestillingKnapp" name="regBestillingKnapp" />
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br/>
</form>

<?php
 	if (isset($_POST ["regBestillingKnapp"]))
 	{
 		$hotellnavn=$_POST ["hotellnavn"];
 		$innsjekk=$_POST ["innsjekk"];
 		$utsjekk=$_POST ["utsjekk"];
 		$romnr=$_POST ["romnr"];
 		$brukernavn=$_POST ["brukernavn"];
 	if (!$hotellnavn || !$innsjekk || !$utsjekk || !$romnr || !$brukernavn)
 	{
 		print ("Alle felt må fylles ut");
 	}
 	/*else
 	{
 		include("db-tilkobling.php"); 

 		$sqlSetning="SELECT * FROM kunde WHERE brukernavn='$brukernavn';";
 		$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 		$antallRader=mysqli_num_rows($sqlResultat);
 	if ($antallRader!=1) 
 		{
 		print ("Studenten er allerede registrert");
 		} */
 	else
 		{
 		include("db-tilkobling.php");

 		$sqlSetning="INSERT INTO bestilling (hotellnavn,innsjekk,utsjekk,romnr,brukernavn) VALUES('$hotellnavn','$innsjekk','$utsjekk','$romnr','$brukernavn');";
 		mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere data i databasen");

 		print ("Følgende student er registrert: $hotellnavn $innsjekk $utsjekk $romnr $brukernavn");
 		}
}

?>
<h3>Søk</h3>
<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
 Søk:<input type="text" id="sok" name="sok" required /> <br/>
 
 <input type="submit" value="Fortsett" id="sokeKnapp" name="sokeKnapp" />
 
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["sokeKnapp"]))
 {
 $sok=$_POST ["sok"];
 include("db-tilkobling.php"); 
 print ("Treff for søket ditt: <strong>$sok</strong> <br /> <br />");

$sqlSetning="SELECT * FROM bestilling WHERE brukernavn LIKE '%$sok%';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);
 
 if ($antallRader==0)
 {
 print ("Ingen treff");
 }
 else
 {
 print ("Treff i klasse-tabellen: <br />");
 print ("<table border=1");
 print ("<tr><th align=left>hotellnavn</th> <th align=left>innsjekk</th> <th align=left>utsjekk</th> <th align=left>romnr</th> <th align=left>brukernavn</th> </tr>");
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $innsjekk=$rad["innsjekk"];
 $utsjekk=$rad["utsjekk"];
 $romnr=$rad["romnr"];
 $brukernavn=$rad["brukernavn"];
 $sokelengde=strlen($sok); 


 $tekst="<tr> <td> $hotellnavn </td> <td> $innsjekk </td> <td> $utsjekk </td> <td> $romnr </td> <td> $brukernavn </td> </tr>"; 
 $startpos=stripos($tekst,$sok); 
 
 while ($startpos!==false)
 {
 $tekstlengde=strlen($tekst); 
 
 $hode=substr($tekst,0,$startpos);

 $sok=substr($tekst,$startpos,$sokelengde);
 
 $hale=substr($tekst,$startpos+$sokelengde,$tekstlengde-$startpos-$sokelengde);
 print("$hode<strong><font color='blue'>$sok</font></strong>"); 
 $tekst=$hale;
 $startpos=stripos($tekst,$sok); 
 }
 print("$hale</td></tr>"); 
 }
 print ("</table> </br />");
 }

 }

 ?>
<h3>Endre Bestilling</h3>
<form method="post" action="" id="endreBestillingSkjema" name="endreBestillingSkjema">
	brukernavn
	<select name="brukernavn" id="brukernavn">
	<?php listeboksBestilling(); ?> 
</select>  <br/>
<input type="submit"  value="Finn bestilling" name="finnBestillingKnapp" id="finnBestillingKnapp"> </form>

<?php
	if (isset($_POST ["finnBestillingKnapp"])) 
	{
		include("db-tilkobling.php");  
	$brukernavn=$_POST ["brukernavn"]; 

	$sqlSetning="SELECT * FROM bestilling WHERE brukernavn='$brukernavn';";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

	$rad=mysqli_fetch_array($sqlResultat);  
	$hotellnavn=$rad["hotellnavn"];
	 $innsjekk=$rad["innsjekk"];
	 $utsjekk=$rad["utsjekk"];
	 $romnr=$rad["romnr"];
	 $brukernavn=$rad["brukernavn"];

	print("<br />");
	print ("<form method='post' action='' id='endreBestillingSkjema' name='endreBestillingSkjema'>");
	print ("romnr <select name='hotellnavn' id='hotellnavn'> <br />");
	listeboksHotell(); print (" </select> <br />");
	listeboksInnsjekk($innsjekk); print ("Innsjekk <input type='date' value='$innsjekk' name='innsjekk' id='innsjekk' required /> <br />");
	listeboksUtsjekk($utsjekk); print ("Utsjekk <input type='date' value='$utsjekk' name='utsjekk' id='utsjekk' required /> <br />");
	print ("romnr <select name='romnr' id='romnr'> <br />");
	listeboksRomNrBestilling(); print (" </select> <br />"); 
	print ("brukernavn <input type='text' value='$brukernavn' name='brukernavn' id='brukernavn' readonly /> <br />");
	print ("<input type='submit' value='Endre bestilling' name='endreBestillingKnapp' id='endreBestillingKnapp'>");
	print ("</form>");
	}
if (isset($_POST ["endreBestillingKnapp"]))
{
$hotellnavn=$_POST["hotellnavn"];
$innsjekk=$_POST["innsjekk"];
$utsjekk=$_POST["utsjekk"];
$romnr=$_POST["romnr"];
$brukernavn=$_POST["brukernavn"];

if (!$hotellnavn || !$innsjekk || !$utsjekk || !$romnr || !$brukernavn)
{
print ("Alle felt m&aring; fylles ut");
}
else
{
include("db-tilkobling.php");  
$sqlSetning="UPDATE bestilling SET hotellnavn='$hotellnavn',innsjekk='$innsjekk',utsjekk='$utsjekk',romnr='$romnr',brukernavn='$brukernavn' WHERE brukernavn='$brukernavn';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen"); 
print ("bestilling på $brukernavn er n&aring; endret <br />");
}
}
?>

<script src="java.js"> </script>

<h3>Slett bestilling</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
 Student <select name="brukernavn" id="brukernavn" required>
 	 <option value="">Velg bestilling </option>
 <?php listeboksBestilling(); ?>
 </select> <br/>
 <input type="submit" value="Slett bestilling" name="slettBestillingKnapp" id="slettBestillingKnapp" />
</form>
<?php
 if (isset($_POST ["slettBestillingKnapp"]))
 {
 include("db-tilkobling.php"); 
 
 $brukernavn=$_POST ["brukernavn"];
 
 $sqlSetning="DELETE FROM bestilling WHERE brukernavn='$brukernavn';";
 
 mysqli_query($db,$sqlSetning) or die ("kan ikke slette student fra databasen");

 print ("Student er nå slettet");
 }

?>