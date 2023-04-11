<?php
// Voir les erreurs pendant le dev
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "./phpScript/dbConnect.php";

function getEmployeeList() {
    $db = createDbConnection();
    $query = mysqli_query($db, "SELECT id_employe, prenom, nom FROM Employe");
    $employees = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $employeeList = "";
    foreach ($employees as $employee) {
        $employeeList .='<div class="member">'.
                            "<a id=" . $employee['id_employe'] . ">" . $employee['prenom'] . "&nbsp;" . $employee['nom'] . "</a>".
                            '<div>'.           
                                '<hr>'.
                                '<a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z"/></svg></a>'.
                            '</div>'.
                        '</div>';
    }
    return $employeeList;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!--Primary Meta Tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R409 | Gestion RH</title>
    <meta name="title" content="R409 | Gestion RH">
    <meta name="description" content="R409 - Logiciel de gestion">
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/img/favicon/site.webmanifest">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/responsive/responsive-stylesheet.css">
    <link rel="stylesheet" href="css/gestion.css">
    <link rel="stylesheet" href="css/responsive/responsive-gestion.css">
    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="./js/loader.js"></script>
    <script type="text/javascript" src="./js/menu.js"></script>
    <script type="text/javascript" src="./js/gestion.js"></script>
</head>
<body onload="onLoad();">
    <main>        
        <section id="popUp">
            <div>
                <form action="/action_page.php">
                    <div>
                        <label for="fname">Prénom :</label>
                        <input type="text" id="fname" name="fname" placeholder="John">
                    </div>
                    <div>
                        <label for="lname">Nom :</label>
                        <input type="text" id="lname" name="lname" placeholder="Doe">
                    </div>
                    <div>
                        <label for="telPro">Tel (Pro) :</label>
                        <input type="tel" id="telPro" name="telPro" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required>
                    </div>
                    <div>
                        <label for="telPerso">Tel (Perso) :</label>
                        <input type="tel" id="telPerso" name="telPerso" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required>
                    </div>
                    <div>
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div>
                        <label for="address">Adresse :</label>
                        <input type="text" id="address" name="address" placeholder="Adresse">
                    </div>
                    <div>
                        <label for="poste">Poste :</label>
                        <select name="poste" id="poste">
                            <option value="employe">Employé</option>
                            <option value="gerant">Gérant</option>
                        </select>
                    </div>
                    <input type="submit" value="Ajouter">
                </form> 
                <a id="closePopUp">Fermer</a>
            </div>
        </section>
        <section id="menu">
            <a id="menuArrowSVG"><svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M480 711 240 471l43-43 197 198 197-197 43 43-240 239Z"/></svg></a>
            <div>
                <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z"/></svg></a>
                <a href="index.php" id="menuHomeText" class="menuText">Accueil et finances</a>
            </div>
            <div>
                <a href="reapprovisonnement.php"><svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M224.118 895Q175 895 140.5 860.583 106 826.167 106 777H40V316q0-24 18-42t42-18h579v167h105l136 181v173h-71q0 49.167-34.382 83.583Q780.235 895 731.118 895 682 895 647.5 860.583 613 826.167 613 777H342q0 49-34.382 83.5-34.383 34.5-83.5 34.5ZM224 835q24 0 41-17t17-41q0-24-17-41t-41-17q-24 0-41 17t-17 41q0 24 17 41t41 17ZM100 717h22q17-27 43.041-43 26.041-16 58-16t58.459 16.5Q308 691 325 717h294V316H100v401Zm631 118q24 0 41-17t17-41q0-24-17-41t-41-17q-24 0-41 17t-17 41q0 24 17 41t41 17Zm-52-204h186L754 483h-75v148ZM360 527Z"/></svg></a>
                <a href="reapprovisonnement.php" id="menuTransportText" class="menuText">Réapprovisionnement</a>
            </div>
            <div>
                <a href="services.php"><svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M475 916q5 0 11.5-2.5T497 907l337-338q13-13 19.5-29.667Q860 522.667 860 506q0-17-6.5-34T834 442L654 262q-13-13-30-19.5t-34-6.5q-16.667 0-33.333 6.5Q540 249 527 262l-18 18 81 82q13 14 23 32.5t10 40.5q0 38-29.5 67T526 531q-25 0-41.5-7.5t-30.185-21.341L381 429 200 610q-5 5-7 10.526-2 5.527-2 11.842 0 12.632 8.5 21.132 8.5 8.5 21.167 8.5 6.333 0 11.833-3t9.5-7l138-138 42 42-137 137q-5 5-7 11t-2 12q0 12 9 21t21 9q6 0 11.5-2.5t9.5-6.5l138-138 42 42-137 137q-4 4-6.5 10.333Q361 794.667 361 801q0 12 9 21t21 9q6 0 11-2t10-7l138-138 42 42-138 138q-5 5-7 11t-2 11q0 14 8 22t22 8Zm.064 60Q442 976 416 951.5t-31-60.619Q351 886 328 863t-28-57q-34-5-56.5-28.5T216 721q-37-5-61-30t-24-60q0-17 6.724-34.049T157 567l224-224 110 110q8 8 17.333 12.5Q517.667 470 527 470q13 0 24.5-11.5t11.5-24.654q0-5.846-3.5-13.346T548 405L405 262q-13-13-30-19.5t-34-6.5q-16.667 0-33.333 6.5Q291 249 278.059 261.857L126 414q-14 14-19.5 29.5t-6.5 35q-1 19.5 7.5 38T128 550l-43 43q-20-22-32.5-53T40 477q0-30 11.5-57.5T84 371l151-151q22-22 49.793-32.5 27.794-10.5 57-10.5Q371 177 398.5 187.5T448 220l18 18 18-18q22-22 49.793-32.5 27.794-10.5 57-10.5Q620 177 647.5 187.5T697 220l179 179q22 22 33 50.033t11 57Q920 535 909 562.5T876 612L539 949q-13 13-29.532 20t-34.404 7ZM377 430Z"/></svg></a>
                <a href="services.php" id="menuServicesText" class="menuText">Services</a>
            </div>
            <div>
                <a href="gestion.php"><svg class="active" xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M0 816v-53q0-38.567 41.5-62.784Q83 676 150.376 676q12.165 0 23.395.5Q185 677 196 678.652q-8 17.348-12 35.165T180 751v65H0Zm240 0v-65q0-32 17.5-58.5T307 646q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-19.861-3.5-37.431Q773 696 765 678.727q11-1.727 22.171-2.227 11.172-.5 22.829-.5 67.5 0 108.75 23.768T960 763v53H780Zm-480-60h360v-6q0-37-50.5-60.5T480 666q-79 0-129.5 23.5T300 751v5ZM149.567 646Q121 646 100.5 625.438 80 604.875 80 576q0-29 20.562-49.5Q121.125 506 150 506q29 0 49.5 20.5t20.5 49.933Q220 605 199.5 625.5T149.567 646Zm660 0Q781 646 760.5 625.438 740 604.875 740 576q0-29 20.562-49.5Q781.125 506 810 506q29 0 49.5 20.5t20.5 49.933Q880 605 859.5 625.5T809.567 646ZM480 576q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600 456q0 50-34.5 85T480 576Zm.351-60Q506 516 523 498.649t17-43Q540 430 522.851 413t-42.5-17Q455 396 437.5 413.149t-17.5 42.5Q420 481 437.351 498.5t43 17.5ZM480 756Zm0-300Z"/></svg></a>
                <a href="gestion.php" id="menuRHText" class="menuText">Gestion R.H</a>
            </div>
            <div>
                <a href="pompes.php"><svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"/></svg></a>
                <a href="pompes.php" id="menuPompesText" class="menuText">Entretien</a>
            </div>
        </section>
        <section id="content">
            <div id="contentLeft">
                <div id="searchHeader">
                    <input id="searchBar" type="text" placeholder="Rechercher...">
                    <a href="#" id="searchBtn"><svg id="searchIcon" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M80 856v-60h400v60H80Zm0-210v-60h200v60H80Zm0-210v-60h200v60H80Zm758 420L678 696q-26 20-56 30t-62 10q-83 0-141.5-58.5T360 536q0-83 58.5-141.5T560 336q83 0 141.5 58.5T760 536q0 32-10 62t-30 56l160 160-42 42ZM559.765 676Q618 676 659 635.235q41-40.764 41-99Q700 478 659.235 437q-40.764-41-99-41Q502 396 461 436.765q-41 40.764-41 99Q420 594 460.765 635q40.764 41 99 41Z"/></svg></a>
                    <a href="#" id="addMember"><svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M474 570q26-32 38.5-66t12.5-79q0-45-12.5-79T474 280q76-17 133.5 23T665 425q0 82-57.5 122T474 570Zm216 326v-94q0-51-26-95t-90-74q173 22 236.5 64T874 802v94H690Zm110-289V507H700v-60h100V347h60v100h100v60H860v100h-60Zm-485-32q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM0 896v-94q0-35 18.5-63.5T68 696q72-32 128.5-46T315 636q62 0 118 14t128 46q31 14 50 42.5t19 63.5v94H0Zm315-381q39 0 64.5-25.5T405 425q0-39-25.5-64.5T315 335q-39 0-64.5 25.5T225 425q0 39 25.5 64.5T315 515ZM60 836h510v-34q0-16-8-30t-25-22q-69-32-117-43t-105-11q-57 0-104.5 11T92 750q-15 7-23.5 21.5T60 802v34Zm255-411Zm0 411Z"/></svg></a>
                </div>
                <div id="memberList">
                    <?php echo getEmployeeList(); ?>
                </div>
            </div>
            <div id="contentRight">
                <div id="noMember">
                    <img src="./assets/img/illustrations/search_for_member.png" alt="Select a member">
                    <a>Aucun utilisateur n'est séléctionné !</a>
                </div>
                <div id="selectedMember"></div>
            </div>
        </section>
    </main>
</body>
</html>