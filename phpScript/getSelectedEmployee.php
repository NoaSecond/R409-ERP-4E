<?php
require_once('dbConnect.php');

function getSelectedEmployee($id) {
    $db = createDbConnection();
    $query = mysqli_query($db, "SELECT prenom, nom FROM Employe WHERE id_employe = '$id'");
    $employee = mysqli_fetch_assoc($query);
    $employeeInfo = '<div id="rightHeader">
                        <div id="nameStatusWrap">
                            <a>' . $employee['prenom'] . '&nbsp;' . $employee['nom'] . '</a>
                            <div id="statusWrap">
                                <svg version="1.1" id="statusSVG" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" xml:space="preserve"><path d="M24,44c-2.7,0-5.3-0.5-7.8-1.6c-2.4-1-4.6-2.5-6.4-4.3s-3.2-3.9-4.3-6.4S4,26.7,4,24c0-2.8,0.5-5.4,1.6-7.8s2.5-4.6,4.3-6.4s3.9-3.2,6.4-4.3S21.3,4,24,4c2.8,0,5.4,0.5,7.8,1.6s4.6,2.5,6.4,4.3s3.2,3.9,4.3,6.4c1.1,2.4,1.6,5,1.6,7.8c0,2.7-0.5,5.3-1.6,7.8c-1,2.4-2.5,4.6-4.3,6.4s-3.9,3.2-6.4,4.3C29.4,43.5,26.8,44,24,44z"/></svg>                                
                                <a>Status</a>
                            </div>
                        </div>
                        <select name="poste">
                            <option value="employe">Employé</option>
                            <option value="gerant">Gérant</option>
                        </select>
                    </div>
                    <div id="contactWrap">
                        <div class="contactElement">
                            <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M795 936q-122 0-242.5-60T336 720q-96-96-156-216.5T120 261q0-19.286 12.857-32.143T165 216h140q13.611 0 24.306 9.5Q340 235 343 251l27 126q2 14-.5 25.5T359 422L259 523q56 93 125.5 162T542 802l95-98q10-11 23-15.5t26-1.5l119 26q15.312 3.375 25.156 15.188Q840 740 840 756v135q0 19.286-12.857 32.143T795 936ZM229 468l81-82-23-110H180q0 39 12 85.5T229 468Zm369 363q41 19 89 31t93 14V769l-103-21-79 83ZM229 468Zm369 363Z"/></svg>
                            <a href="tel:0695983762">(Perso) 06 95 98 37 62</a>
                        </div>
                        <div class="contactElement">
                            <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M795 936q-122 0-242.5-60T336 720q-96-96-156-216.5T120 261q0-19.286 12.857-32.143T165 216h140q13.611 0 24.306 9.5Q340 235 343 251l27 126q2 14-.5 25.5T359 422L259 523q56 93 125.5 162T542 802l95-98q10-11 23-15.5t26-1.5l119 26q15.312 3.375 25.156 15.188Q840 740 840 756v135q0 19.286-12.857 32.143T795 936ZM229 468l81-82-23-110H180q0 39 12 85.5T229 468Zm369 363q41 19 89 31t93 14V769l-103-21-79 83ZM229 468Zm369 363Z"/></svg>
                            <a href="tel:0798956237">(Pro) 07 98 95 62 37</a>
                        </div>
                        <div class="contactElement">
                            <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm340-302L140 371v465h680V371L480 594Zm0-60 336-218H145l335 218ZM140 371v-55 520-465Z"/></svg>
                            <a href="mailto:daniel.lesang@entreprise.com">daniel.lesang@entreprise.com</a>
                        </div>
                        <div class="contactElement">
                            <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z"/></svg>
                            <a href="https://www.google.fr/maps/search/25+archipel+salade,+98012+NekoLand/@43.7652783,7.0584745,11z/data=!3m1!4b1">25 archipel salade,<br>98012 NekoLand</a>
                        </div>
                    </div>
                    <hr>
                    <img src="./assets/img/emploieDuTemps.jpg" alt="emploie Du Temps">
                    <div id="buttonWrap">
                        <a href="./README.md" download="Contrat d\'embauche" target="_blank">Contrat d\'embauche</a>
                        <hr id="btnHr">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M220 896q-24 0-42-18t-18-42V693h60v143h520V693h60v143q0 24-18 42t-42 18H220Zm260-153L287 550l43-43 120 120V256h60v371l120-120 43 43-193 193Z"/></svg>
                    </div>';
    return $employeeInfo;
}

if (isset($_POST['employeeId'])) {
    $employeeInfo = getSelectedEmployee($_POST['employeeId']);
    echo $employeeInfo;
} else {
    echo "AAAAAAAAAAA";
}
?>