<?php
// Inclure le fichier qui contient la fonction createDbConnection()
require_once('dbConnect.php');

// Définir la fonction getEmployeeListStartingWith
function getEmployeeListStartingWith($search) {
    $db = createDbConnection();
    // Échapper la valeur de recherche pour éviter les injections SQL
    $search = mysqli_real_escape_string($db, $search);
    $query = mysqli_query($db, "SELECT prenom, nom FROM Employe WHERE prenom LIKE '$search%' OR nom LIKE '$search%'");
    $employees = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $employeeList = "";
    foreach ($employees as $employee) {
        $employeeList .= '<div class="member">'.
                            '<a href="#">' . $employee['prenom'] . "&nbsp;" . $employee['nom'] . "</a>".
                            '<div>'.           
                                '<hr>'.
                                '<a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 96 960 960" width="35"><path d="M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z"/></svg></a>'.
                            '</div>'.
                        '</div>';
    }
    return $employeeList;
}

// Vérifier si la valeur de recherche est définie
if (isset($_POST['search'])) {
    // Appeler la fonction getEmployeeListStartingWith avec la valeur de recherche
    $employeeList = getEmployeeListStartingWith($_POST['search']);
    // Retourner la liste des employés sous forme de chaîne de caractères
    echo $employeeList;
}
?>