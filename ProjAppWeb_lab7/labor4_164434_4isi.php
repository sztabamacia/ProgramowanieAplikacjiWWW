<?php
$nr_indeksu='1234567';
$nrGrupy='X';


?>

<form method="get">
    <input type ="text" name="name" />
    <input type ="submit" value="submit" />
</form>

<form method="post">
    <input type ="text" name="name" />
    <input type ="submit" value="submit" />
</form>



<?php
echo 'witaj<br/>';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    echo 'HELLO '.$_POST["name"].'<br/>';
    
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION["favcolor"] = "blue";
$_SESSION["favanimal"] = "horse";
echo $nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
echo 'Zastosowanie metody include() <br />';
echo 'Zadanie 2<br/>';
echo 'podpunkt a) include i require_once<br/>';
echo 'Samochód '.$car.' koloru '.$color.'<br/>';
include('test.php'); // w razie niezgodności tylko wyrzuca ostrzeżenia 

// require_once('tests.php'); // powoduje fatal error jeżeli w () podamy coś niewłaściwego
echo 'Samochód '.$car.' koloru '.$color.'<br/><br/>';

echo 'podpunkt b) if, else, elseif, switch<br/>';
$liczba = 42;
if($liczba > 50){
    echo 'liczba wieksza od 50<br/>';
}
elseif($liczba < 50){
    echo 'liczba mniejsza od 50<br/>';
}
else{
    echo 'liczba równa 50<br/>';
}
switch($liczba){
    case 10:
        echo 'liczba ma wartosc 10<br/>';
        break;
    case 20:
        echo 'liczba ma wartosc 20<br/>';
        break;
    case 30:
        echo 'liczba ma wartosc 30<br/>';
        break;
    case 40:
        echo 'liczba ma wartosc 40<br/>';
        break;
    default:
    echo 'liczba inna niż 10, 20, 30, 40<br/>';
    }
echo '<br/>';
echo 'podpunkt c) for i while<br/>';
echo 'petla for która wypisuje liczby od 0 do 10<br/>';
for ($i=0; $i<10; $i++ ){
    echo ' '.$i.' ';


}
echo '<br/> teraz pętla while która wypisuje jak jest wartość liczby jeżeli jest ona mniejsza od 100 i ciągle ją zwiększa o 1';
while($liczba < 100){
    echo 'liczba jest równa: '.$liczba.'<br/>';
    $liczba++;
}

echo 'podpunkt d)  $_GET, $_POST, $_SESSION<br/>';

echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';

echo "Ustawiono zmienne sesji.";
echo "<br/>";
echo "Zmienna sesji favcolor: " . $_SESSION["favcolor"];
echo "<br/>";
echo "Zmienna sesji favanimal: " . $_SESSION["favanimal"];
echo "<br/>";
echo "Zawartość zmiennej sesji: ";
print_r($_SESSION);
echo "<br/>";
echo "kończę sesje";
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}

?>
