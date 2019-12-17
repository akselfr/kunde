<?php


function sjekkBrukernavnPassord($brukernavn,$passord)
{

  include("db-tilkobling.php");

  $lovligBruker=true;

  $sqlSetning="SELECT * FROM kunde WHERE brukernavn='$brukernavn';";
  $sqlResultat=mysqli_query($db,$sqlSetning);  

  if (!$sqlResultat)  
    {
      $lovligBruker=false;
    }
  else
   {
      $rad=mysqli_fetch_array($sqlResultat);  
      $lagretPassord=$rad["passord"];  

      if($passord!=$lagretPassord) 
        {
          $lovligBruker=false;  
        }
    }
  return $lovligBruker;
}
?>