-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lis 2023, 15:17
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `moja_strona164434`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_contetnt` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_contetnt`, `status`) VALUES
(1, 'kontakt', '<div class=\"contact\">\r\n				\r\n						<form action=\"mailto:example.projappweblab1@student.uwm.edu.pl\">\r\n							<span style=\"color: red;\">Imię:</span></br>\r\n							<input type=\"text\" name=\"firstname\" placeholder=\"Imię\"></br>\r\n							<span style=\"color: #123442;\">Nazwisko</span></br>\r\n							<input type=\"text\" name=\"lastname\" placeholder=\"Nazwisko\"></br>\r\n							<span>Adres e-mail</span></br>\r\n							<input type=\"email\" name=\"email\" placeholder=\"Adres e-mail\"></br>\r\n							<span>Wiadomość:</span>\r\n							<textarea for=\"message\" placeholder=\"Treść wiadomości:\"></textarea></br>\r\n							<button class=\"send\">Wyślij</button>\r\n							\r\n						</form>\r\n					</div>', 1),
(2, 'cs', '<table class=\'content\'>\r\n			<tr>\r\n				<td class=\"colors\">\r\n					<div class=\"real-content\">\r\n						<h1>O grze:</h1>\r\n						<p>Counter-Strike (skrót CS) – \r\n							gra komputerowa z gatunku first-person shooter, \r\n							stworzona przez Minha \"Gooseman\" Le\'a i Jessa \"Cliffe\" Cliffe\'a 19 czerwca 1999 \r\n							i będąca modyfikacją gry Half-Life. Początkowo Counter-Strike wymagał do działania Half-Life\'a, <img src=\"images/csimg1.jpg\" alt=\"counter strike\" class=\"right-image\">\r\n							jednak z upływem czasu stworzono kolejne wersje, które przekształciły się w samodzielne produkcje, \r\n							korzystające jedynie z silnika oryginalnej gry.\r\n\r\n							Rozgrywka w Counter-Strike\'u opiera się na walce antyterrorystów z terrorystami, \r\n							w której jedna ze stron musi bronić bombsite\'u (miejsca, gdzie ustawiany jest ładunek wybuchowy) \r\n							lub uwolnić zakładników, a druga podłożyć bombę albo pilnować pojmanych.\r\n							\r\n							Gra została stworzona z myślą o grze w sieci. Otrzymała wsparcie od Valve Software, \r\n							dzięki czemu jest ciągle uaktualniania i została włączona do projektu Steam. \r\n							Counter-Strike stosunkowo szybko zyskał popularność i stał się platformą turniejową na imprezach e-sportowych.</p>\r\n\r\n						<h2>Rozgrywka: </h2>\r\n						<p>Każdy gracz rozpoczyna grę w punkcie startowym z pistoletem (USP u antyterrorystów, Glock 18 u terrorystów), \r\n							dwoma magazynkami w zapasie, nożem oraz kwotą ośmiuset dolarów. Za każdą udaną misję drużyna otrzymuje punkty oraz pieniądze. <img src=\"images/csimg2.jpg\" alt=\"counter strike image\" class=\"left-image\">\r\n							W momencie startu następnych rund można za nie kupić broń palną, kamizelki kuloodporne, granaty, \r\n							magazynki i inne potrzebne do wykonania misji przedmioty. Pieniądze otrzymuje się również za wyeliminowanie przeciwnika, \r\n							ale można je również stracić za zabicie zakładnika lub osobę z własnej drużyny (jeżeli włączony jest tzw. friendly fire – przyjacielski ogień).\r\n\r\n							Cele drużyn są zawsze sprzeczne ze sobą – jeżeli celem terrorystów jest wysadzić jakiś obiekt, \r\n							antyterroryści mają nie dopuścić do tego, oraz odwrotnie – jeżeli antyterroryści mają uwolnić zakładników, \r\n							terroryści mają za zadanie im to uniemożliwić.\r\n							\r\n							Drużyna, która zdoła osiągnąć swój cel albo wyeliminuje wszystkich przeciwników z drugiej grupy, wygrywa rundę.\r\n							\r\n							Każda rozgrywka jest dodatkowo ograniczona przez czas. Po upływie tego limitu przegrywa ta drużyna, \r\n							która nie wykonała zadania. W przypadku antyterrorystów jest to nieuwolnienie wszystkich zakładników, \r\n							a w przypadku terrorystów nieustawienie bomby w wyznaczonym miejscu.</p>\r\n						\r\n\r\n\r\n					</div>\r\n					\r\n				</td>\r\n			\r\n			</tr>\r\n		\r\n		</table>', 1),
(3, 'fifa', '<table class=\'content\'>\r\n			<tr>\r\n				<td>\r\n					<div class=\"real-content\">\r\n						<h1>O grze:</h1>\r\n						<p>\r\n							FIFA – seria komputerowych gier sportowych o tematyce piłki nożnej, \r\n							wyprodukowanych przez kanadyjski odłam amerykańskiego przedsiębiorstwa Electronic Arts, EA Sports.\r\n\r\n							Nazwa pochodzi od organizacji FIFA, od której Electronic Arts wykupiło licencję na użycie owej nazwy. <img src=\"images/FIFA_logo.png\" alt=\"FIFA series logo\" class=\"left-image2\">\r\n							Pierwsza wersja (FIFA International Soccer) ujrzała światło dzienne w 1993 roku. \r\n							Od tego czasu powstały liczne kontynuacje i podserie, \r\n							między innymi FIFA Street osadzona w realiach futbolu ulicznego czy menedżer piłkarski FIFA Manager.\r\n\r\n							Od wydania gry FIFA Football 2003 seria jest polonizowana, \r\n							a w grze FIFA 06 po raz pierwszy dodano polski komentarz \r\n							(w rolach komentatorów: Dariusz Szpakowski (od FIFA 06 do FIFA 21) Włodzimierz Szaranowicz \r\n							(od FIFA 06 do FIFA 15), \r\n							Jacek Laskowski (od FIFA 16) i Tomasz Smokowski (od FIFA 22)). \r\n							Dodano polską ekstraklasę, lecz jej licencja wygasła w wersji FIFA 12. \r\n							W FIFA 14 z powrotem pozyskano licencję na polską ekstraklasę i Reprezentację Polski.\r\n						</p>\r\n						<h2>Rozgrywka:</h2>\r\n						<p>Rozgrywka w grach FIFA oferuje emocjonujące doświadczenie piłkarskie dla graczy na różnych platformach. \r\n							Gracze mogą kontrolować swoje ulubione drużyny i zawodników, zarówno klubowych, jak i narodowych, rywalizując w różnych trybach rozgrywki.\r\n\r\n							Głównym celem gry jest zdobycie jak największej liczby bramek przeciwnika. \r\n							Rozgrywka oferuje zaawansowane mechaniki kontroli piłki, umożliwiające precyzyjne podania, strzały i dryblingi. \r\n							Tryby gry obejmują pojedyncze mecze, turnieje, ligi oraz tryby kariery, gdzie można zarządzać drużyną i jej rozwijaniem.\r\n							<img src=\"images/fifa_gameplay.jpg\" alt=\"rozgrywka w grze fifa\" class=\"left-image\">\r\n							FIFA oferuje także rozgrywkę online, gdzie gracze mogą rywalizować z innymi graczami z całego świata. \r\n							Seria ta jest znana z realistycznej grafiki, autentycznych stadionów oraz licencji na wiele drużyn i lig,\r\n							co sprawia, że gra jest wierną reprezentacją piłki nożnej.\r\n							\r\n							Rozgrywka w grach FIFA przyciąga zarówno fanów piłki nożnej, \r\n							jak i miłośników gier sportowych, oferując emocjonujące i autentyczne doświadczenia na wirtualnym boisku.</p>\r\n					</div>\r\n					\r\n				</td>\r\n			\r\n			</tr>\r\n		\r\n		</table>', 1),
(4, 'filmy', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rA27l6nU1a8?si=SfxH4h2Tj5AeDJp8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_BNXjgbQGEY?si=GRO_gBOTQLaRnUMg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FYFMfUU5mzA?si=GGQmLGrOV9wH0Vai\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n        ', 1),
(5, 'glowma', '<table class=\'content\'>\r\n			<tr>\r\n				<td>\r\n					<div class=\"info\">\r\n						<div>\r\n						<h1><u>Witaj użytkowniku!</u></h1>\r\n						<p>Strona ta została poświęcona grom komputerowym</p>\r\n						<b>Autor:</b>\r\n						<i>Maciej Sztabiński</i>\r\n						</div>\r\n					</div>\r\n					\r\n					\r\n					\r\n\r\n					<div class=\"real-content\">\r\n						<h1>Czym jest gra komputerowa?</h1>\r\n						<p>Gra komputerowa – rodzaj oprogramowania komputerowego przeznaczonego do celów rozrywkowych bądź edukacyjnych <img class=\"right-image\" src=\"images/pacman.jpg\" alt=\"pacman\" > \r\n							(rozrywka interaktywna) i zazwyczaj wymagającego od użytkownika (gracza) pokonywania wyzwań wyznaczonych przez jej twórców.\r\n							komputerowe mogą być uruchamiane na komputerach osobistych,\r\n							specjalnych automatach, konsolach do gry, telewizorach, telefonach komórkowych oraz innych mobilnych urządzeniach,\r\n							nazywanych łącznie platformami sprzętowymi.\r\n							Zadania stawiane przed graczem w grach komputerowych różnią się w zależności od gatunku i\r\n							mogą polegać na przykład na rozwiązaniu zadania logicznego,\r\n							eliminacji wirtualnych przeciwników czy też rywalizacji ze sztuczną inteligencją bądź innymi graczami (gra wieloosobowa).\r\n							Interaktywna rozrywka w celach zawodowych nosi nazwę sportu elektronicznego (ang. esports).</p>\r\n						<p>Gry komputerowe wywodzą się z gier planszowych, towarzyskich, fabularnych oraz różnych dyscyplin sportowych.\r\n							Początki elektronicznego oprogramowania przeznaczonego do celów rozrywkowych wiązać należy z prototypami konstruowanymi na amerykańskich uczelniach.\r\n							Gry komputerowe stały się produktem masowym za sprawą popularności konsol telewizyjnych i automatów w latach 70. XX wieku.\r\n							<img class=\"left-image\" src=\"images/minecraft.png\" alt=\"minecraft\" >\r\n							Wraz z postępującą miniaturyzacją platform oraz powstaniem przenośnych urządzeń do grania,\r\n							zyskiwały one coraz większą popularność. Specjalistyczne badania dotyczące gier (ludologia)\r\n							wskazują na znaczący ich wpływ na psychikę gracza – zarówno pozytywny,\r\n							jak i negatywny. Kontrowersje dotyczą także klasyfikowania interaktywnej rozrywki jako dziedziny sztuki.</p>\r\n						<p>Podstawową cechą danej gry komputerowej, jak również innych form zabawy,\r\n							jest cel, który wyznaczany jest przez jej twórców lub odbiorcę (gracza).\r\n							Na drodze gracz napotyka wyzwania, które musi pokonać, \r\n							a sama rozgrywka jest uatrakcyjniona przez formę audiowizualną. \r\n							Kluczową kwestią dotyczącą gier komputerowych jest ich interaktywność, \r\n							co odróżnia je na przykład od medium telewizyjnego,\r\n							gracz wykazuje osobiste zaangażowanie w wydarzenia na ekranie \r\n							i może mieć wpływ na ich przebieg. Postacią lub jednostką organizacyjną w świecie wirtualnym gracz steruje za pomocą kontrolera, \r\n							którym może być klawiatura wraz z myszą, dżojstik, rysik, gamepad, kontrolery ruchu, \r\n							ekran dotykowy (w przypadku smartfonów i tabletów) i inne specjalne urządzenia. \r\n							Gry komputerowe wymagają ponadto odbiornika wyświetlającego wytwarzany przez nie sygnał wideo; \r\n							funkcję tych odbiorników pełnią monitor, wyświetlacz sprzętowy lub telewizor.\r\n							Przebieg akcji gry nazywany jest mechaniką gry (ang. gameplay).</p>\r\n					</div>\r\n				</td>\r\n\r\n				\r\n			\r\n			</tr>\r\n		\r\n		</table>		', 1),
(6, 'rayman', '<table class=\'content\'>\r\n			<tr>\r\n				<td class=\"colors\">\r\n					<div class=\"real-content\">\r\n						<h1>O grze:</h1>\r\n						<p>Rayman Legends jest piątą główną odsłoną serii Rayman, bezpośrednim sequelem Rayman Origins. <img src=\"images/raymanlegends.jpg\" class=\"right-image\" alt=\"rayman legends photo\">\r\n							Światowa premiera produkcji odbyła się 29 sierpnia 2013 na większości platform, \r\n							następnie w udoskonalonej wersji 18 lutego 2014 na konsolę Xbox One i PlayStation 4, a także w 2017 na Nintendo Switch.</p>\r\n						<h1>Fabuła gry:</h1>\r\n						<p>Podczas 100-letniej drzemki Polokusa koszmary mnożyły się, rozprzestrzeniały się, tworzyły nowe, jeszcze gorsze niż wcześniej. \r\n							To stworzenia z legend - smoki, wielkie żaby, potwory morskie. Stworzyły niesamowite światy w Rozdrożach Marzeń i szerzą chaos, \r\n							chwytając wszystkie Małaki, które wpadną im w ręce. Sklonował się też Magik i powstały Mroczne Małaki. Wreszcie, dzięki pomocy Murfy\'ego, \r\n							Rayman i Globox zostają zbudzeni, by zmierzyć się z tymi koszmarami i uratować Małaki. Po przebudzeniu zauważają, \r\n							że ich stary przyjaciel Śniący Bańki wypełnił swój dom magicznymi obrazami, które przedstawiają stworzone przez koszmary światy.</p>\r\n						<h1>Seria gier:</h1>\r\n						<ul>\r\n							<li><i>Rayman 1</i></li>\r\n							<li><i>Rayman 2: The Great Escape</i></li>\r\n							<li><i>Rayman 3: Hoodlum Havoc</i></li>\r\n							<li><i>Rayman Origins</i></li>\r\n							<li><i>Rayman Legends</i></li>\r\n\r\n\r\n						</ul>\r\n						<h1>Garstka informacji o autorze:</h1>\r\n						<p><img src=\"images/michel_ancel.jpg\" alt=\"Michel Ancel - dobroczyńca graczy\" class=\"left-image2\">Michel Ancel − francuski reżyser i projektant gier komputerowych, pracujący w przedsiębiorstwie Ubisoft. \r\n							Kawaler Orderu Sztuki i Literatury.\r\n\r\n							Początkowo pracował w charakterze ilustratora gier komputerowych autorstwa Nicolasa Choukrouna, \r\n							jednak sławę zdobył jako realizator utrzymanej w realiach fantasy gry platformowej Rayman (1995), \r\n							która doczekała się licznych sequeli oraz rebootów, w tym nadzorowanych osobiście przez Ancela utworów Rayman 2: The Great Escape (1999), \r\n							Rayman Origins (2011) oraz Rayman Legends (2013). \r\n							Projektant zasłużył się również jako twórca dziennikarskiej gry Beyond Good & Evil (2004) \r\n							oraz adaptacji filmu Petera Jacksona King Kong (2005).\r\n							\r\n							Gry Ancela, przeważnie pozytywnie odbierane przez krytyków, \r\n							wykazują estetycznie podobieństwo do filmów Walta Disneya oraz Studia Ghibli. \r\n							Projektant dosłużył się miana „francuskiego Shigeru Miyamoto”, choć odrzucał powinowactwa z japońskim twórcą. \r\n							Twórca Raymana starał się w trakcie swojej kariery tworzyć produkcje spokrewnione estetycznie ze sztuką filmową, \r\n							aczkolwiek nie nadużywał przerywników filmowych, sprawę światotwórstwa pozostawiając spontaniczności graczy. </p>\r\n\r\n					</div>\r\n					\r\n				</td>\r\n			\r\n			</tr>\r\n		\r\n		</table>\r\n', 1),
(7, 'wot', '<table class=\'content\'>\r\n			<tr>\r\n				<td>\r\n					<div class=\"real-content\">\r\n						<h1>World Of Tanks</h1>\r\n						<h2>O grze:</h2>\r\n						<p>World of Tanks – komputerowa gra symulacyjna typu MMO wyprodukowana i wydana w 2010 roku przez Wargaming.net. <img src=\"images/wotpicture.jpg\" alt=\"world of tanks picture\" class=\"right-image\">\r\n							Gra oparta jest na modelu płatności free-to-play.\r\n\r\n							Rozgrywka skupia się na bitwach pancernych pomiędzy graczami w interakcji player versus player z wykorzystaniem różnego typu wozów bojowych. \r\n							Gracz ma do dyspozycji ponad 650 pojazdów: czołgów (lekkich, średnich, ciężkich), \r\n							artylerii samobieżnej, pojazdów kołowych oraz niszczycieli czołgów z okresu od I wojny światowej aż po wczesną zimną wojnę, \r\n							pochodzących ze Stanów Zjednoczonych, Czechosłowacji, ZSRR, III Rzeszy, Francji, Wielkiej Brytanii, Chin, Japonii, Szwecji, Włoch i Polski. \r\n							Pojazdy występujące w grze w części są oparte na swoich historycznych odpowiednikach, lecz zmodyfikowane ze względów praktycznych dla rozgrywki, \r\n							zaś w części bazują na wczesnych projektach lub są to czysto fikcyjne pojazdy.\r\n							\r\n							W lutym 2013 roku liczba zarejestrowanych graczy przekroczyła 50 milionów. \r\n							Gra została wpisana do Księgi rekordów Guinnessa w kategorii „największej liczby graczy zalogowanych jednocześnie na jednym serwerze gry MMO” \r\n							(21 stycznia 2013 na jednym z serwerów rosyjskich zalogowanych było 190 541 graczy). Wcześniejszy rekord również należał do tej gry \r\n							– 23 stycznia 2011 na serwerze było 91 311 osób.</p>\r\n						\r\n						<h2>Rozgrywka:</h2>\r\n						<p>Na początku gracz otrzymuje do swojej dyspozycji po jednym czołgu z każdego państwa \r\n							(Niemiec, ZSRR, Stanów Zjednoczonych, Włoch, Francji, Wielkiej Brytanii, Chin, Japonii, Czechosłowacji, Polski i Szwecji). \r\n							W miarę zdobywania doświadczenia i kredytów może kupować ulepszenia do danego czołgu oraz rozwijać drzewo technologiczne, \r\n							które pozwala na odblokowanie kolejnych pojazdów. Ulepszenia pojazdu obejmują silnik, wieżę, układ jezdny, działo oraz radio, \r\n							co pozwala na eksperymenty i zwiększenie potencjału bojowego. Wszystkie modyfikacje mają swoje historyczne uzasadnienie \r\n							– istniały jako prototypy lub zostały wprowadzone w rzeczywistości.<img src=\"images/wot-picture.jpg\"  alt=\"world of tanks game\" class=\"left-image\">\r\n\r\n							Gra posiada również system rozwoju załogi – bardziej doświadczona załoga będzie sprawdzała się lepiej na placu boju; \r\n							załoga z wyszkoleniem 100% będzie szybciej ładowała, \r\n							naprawiała oraz sprawniej obsługiwała czołg gracza w porównaniu do załogi z mniejszym procentowo wyszkoleniem. \r\n							Dodatkowo doświadczeni członkowie załogi mogą uczyć się nowych zdolności tzw. perków \r\n							np. szósty zmysł pozwala dowódcy na określenie czy jego pojazd został wykryty przez wroga. \r\n							Gracz ma także możliwość zamontowania sprzętu dodatkowego do swojego czołgu, począwszy od siatek kamuflażowych, \r\n							które zmniejszają ryzyko zauważenia czołgu przez wroga, a kończąc na nowoczesnych systemach naprowadzania \r\n							(które zwiększają szybkość celowania działa) lub dosyłaczach (które przyspieszają ładowanie działa).\r\n							\r\n							Istnieje także sprzęt eksploatacyjny, na przykład apteczka, \r\n							która leczy rannego członka załogi, czy zestaw naprawczy, który naprawia uszkodzony lub zniszczony moduł czołgu do pełnej wartości, \r\n							w odróżnieniu od automatycznej naprawy, która moduł ciężko uszkodzony naprawia jedynie do stanu lekko uszkodzonego.</p>\r\n					</div>\r\n					\r\n				</td>\r\n			\r\n			</tr>\r\n		\r\n		</table>\r\n', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;