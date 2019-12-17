<?php 

?>

<h3>Innlogging </h3>

<form action="" id="innloggingSkjema" name="innloggingSkjema" method="post">
  Brukernavn <input name="brukernavn" type="text" id="brukernavn" required> <br />
  Passord <input name="passord" type="password" id="passord" required>  <br />
  <input type="submit" name="logginnKnapp" value="Logg inn">
  <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>

Ny bruker ? <br />
<a href="registrer-bruker.php">Registrer deg her</a> <br /> <br />

<?php
  if (isset($_POST ["logginnKnapp"]))
    {
      include("sjekk.php");

      $brukernavn=$_POST ["brukernavn"];
      $passord=$_POST["passord"]; 

      if (!sjekkBrukernavnPassord($brukernavn,$passord))
        {
          print("Feil brukernavn/passord <br />");
        }
      else  		
        {
          session_start();
          $_SESSION["brukernavn"]=$brukernavn;  
          print("<meta http-equiv='refresh' content='0;url=minside.php'>");
            
        }
    }
?>