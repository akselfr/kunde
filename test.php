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