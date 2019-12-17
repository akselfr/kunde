<?php include 'head.html';?>

<h3>Søk</h3>
<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
 Søkeord<input type="text" id="sok" name="sok" required /> <br/>
 <input type="submit" value="Fortsett" id="sokeKnapp" name="sokeKnapp" />
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["sokeKnapp"]))
 {
 	
 $sok=$_POST ["sok"];
 include("db-tilkobling.php"); 
 print ("Treff for søket ditt: <strong> $sok </strong> <br /><br />");

$sqlSetning="SELECT * FROM hotell WHERE hotellnavn LIKE '%$sok%' OR sted LIKE '%$sok%';";
 
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);
 if ($antallRader==0)
 {

 print ("Ingen treff");

 }
 else
 {
 print ("Treff blant hoteller: <br />");
 print ("<table border=1");
 print ("<tr><th align=left>hotellnavn</th> <th align=left>sted</th> </tr>");
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $sted=$rad["sted"];
 $sokelengde=strlen($sok); 

 $tekst="<tr> <td> $hotellnavn </td> <td> $sted </td> </tr>"; 
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


<?php   

 include("db-tilkobling.php");
 $sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 
 $antallRader=mysqli_num_rows($sqlResultat); 
 print ("<h3>hoteller </h3>");
 print ("<table border=1>");
 print ("<tr><th align=left>hotellnavn</th> <th align=left>sted</th> </tr>");
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $hotellnavn=$rad["hotellnavn"];
 $sted=$rad["sted"];
 print ("<tr> <td> $hotellnavn </td> <td> $sted </td> </tr>");
 }
 print ("</table>"); 
?>