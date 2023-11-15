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
                  <!-- <?php
                     $nr_indeksu = '1234567';
                     $nrGrupy = 'X';
                     echo 'Autor: Jan Kowalski '. $nr_indeksu .' grupa '. $nrGrupy.'<br /><br />';
                  ?> -->
                  <?php
                     // Dynamiczne ładowanie treści strony
                     $strona = isset($_GET['idp']) ? $_GET['idp'] : '';
                     if ($strona == '') {
                        $strona = 'html/glowma.html';
                     }
                     elseif ($strona == 'glowma') {
                        $strona = 'html/glowma.html';
                     } elseif ($strona == 'contact') {
                        $strona = 'html/contact.html';
                     } elseif ($strona == 'rayman') {
                        $strona = 'html/rayman.html';
                     } elseif ($strona == 'wot') {
                        $strona = 'html/wot.html';
                     } elseif ($strona == 'cs') {
                        $strona = 'html/cs.html';
                     } elseif ($strona == 'fifa') {
                        $strona = 'html/fifa.html';
                     }
                     elseif ($strona == 'filmy') {
                        $strona = 'html/filmy.html';
                     } else {
                        echo 'strony nie ma';
                     }

                     if (file_exists($strona)) {
                        include($strona);
                     } else {
                        echo 'Podstrona nie istnieje.';
                     }
                     
                  ?>
               </div>
            </td>
         </tr>
      </table>
   </body>
</html>
