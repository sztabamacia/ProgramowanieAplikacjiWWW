<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
/* po tym komentarzu będzie kod do dynamicznego ładowania stron */
?>
<!DOCTYPE HTML>
<html>
   <head>
      <link rel="stylesheet" href="css/style.css">
      <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
      <meta http-equiv="Content-Language" content="pl" />
      <meta name="Author" content="Maciej Sztabiński" />
      
      <title>Moje hobby to gry komputerowe</title>
   </head>
   <body >
      <table class="menu">
         <tr>
            <td><a href="index.php?idp=glowma"><img class="icon" src="images/home.png" alt="strona domowa"></a></td>
            <td><a href="index.php?idp=contact"><img class="icon" src="images/contact.png" alt="kontakt"></a></td>
            <td><a href="index.php?idp=rayman"><img class="icon" src="images/rayman.png" alt="rayman legends"></a></td>
            <td><a href="index.php?idp=wot"><img class="icon" src="images/wot.png" alt="world of tanks"></a></td>
            <td><a href="index.php?idp=cs"><img class="icon" src="images/cs.png" alt="counter strike"></a></td>
            <td><a href="index.php?idp=fifa"><img class="icon" src="images/fifa.png" alt="FIFA"></a></td>
         </tr>
      </table>
      <table class='content'>
         <tr>
            <td>
               <div class="real-content">
                <?php
                     include('cfg.php');
                     include('showpage.php');
                     
                     if ($_GET['idp'] == '') {
                         echo PokazPodstrone(5);
                     }
                     if ($_GET['idp'] == 'glowma') {
                         echo PokazPodstrone(5);
                     }
                     if ($_GET['idp'] == 'contact') {
                         echo PokazPodstrone(1);
                     }
                     if ($_GET['idp'] == 'rayman') {
                         echo PokazPodstrone(6);
                     }
                     if ($_GET['idp'] == 'wot') {
                         echo PokazPodstrone(7);
                     }
                     if ($_GET['idp'] == 'cs') {
                         echo PokazPodstrone(2);
                     }
                     if ($_GET['idp'] == 'fifa') {
                         echo PokazPodstrone(3);
                     }
                     
                     
                     




                  ?>
               </div>
            </td>
         </tr>
      </table>
   </body>
</html>
