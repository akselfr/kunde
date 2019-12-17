<?php 

?>

<h3>Registrer bruker </h3>

<form action="" id="registrerBrukerSkjema" name="registrerBrukerSkjema" method="post">
  Brukernavn <input name="brukernavn" type="text" id="brukernavn" required> <br />
  Passord <input name="passord" type="password" id="passord" required>  <br />
  Fornavn <input name="fornavn" type="text" id="fornavn" required> <br />
  Etternavn <input name="etternavn" type="text" id="etternavn" required> <br />
  <input type="submit" name="registrerBrukerKnapp" value="Registrer bruker">
  <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>

<?php
  if (isset($_POST ["registrerBrukerKnapp"]))
    {
      include("db-tilkobling.php");

      $brukernavn=$_POST ["brukernavn"];
      $passord=$_POST["passord"];
      $fornavn=$_POST["fornavn"];
      $etternavn=$_POST["etternavn"]; 

      if (!$brukernavn || !$passord || !$fornavn || !$etternavn) 
        {
          print ("Brukernavn, passord, fornavn og etternavn m&aring; fylles ut <br />");
        }
      else
        {
          $sqlSetning="SELECT * FROM kunde WHERE brukernavn ='$brukernavn';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

          if (mysqli_num_rows($sqlResultat)!=0)
            {
              print ("Brukernavnet er registrert fra f&oslash;r <br />");
            }
          else
            {
              $sqlSetning="INSERT INTO kunde VALUES('$brukernavn','$passord','$fornavn','$etternavn');";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");

              print ("F&oslash; lgende data er n&aring; registrert: <br /> ");
              print ("Brukernavn: $brukernavn <br /> Passord: $passord <br /> fornavn: $fornavn <br /> etternavn: $etternavn <br /> <br />");
              print ("<a href='index.php'>G&aring; til innloggingsside </a>");
            }

        }
    }
?>