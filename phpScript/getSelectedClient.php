<?php
require_once('dbConnect.php');

function getSelectedClient($id) {
    $db = createDbConnection();
    $query = mysqli_query($db, "SELECT nom, id_CarteMembre, id_CarteEnergie, addresse, tel FROM Client WHERE id_client = '$id'");
    $client = mysqli_fetch_assoc($query);


    $cm = '<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve"><path d="M24,44c-2.7,0-5.3-0.5-7.8-1.6c-2.4-1-4.6-2.5-6.4-4.3s-3.2-3.9-4.3-6.4S4,26.7,4,24c0-2.8,0.5-5.4,1.6-7.8s2.5-4.6,4.3-6.4s3.9-3.2,6.4-4.3S21.3,4,24,4c2.8,0,5.4,0.5,7.8,1.6s4.6,2.5,6.4,4.3s3.2,3.9,4.3,6.4c1.1,2.4,1.6,5,1.6,7.8c0,2.7-0.5,5.3-1.6,7.8c-1,2.4-2.5,4.6-4.3,6.4s-3.9,3.2-6.4,4.3C29.4,43.5,26.8,44,24,44z"/></svg>';
    $ce = '<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve"><path d="M24,44c-2.7,0-5.3-0.5-7.8-1.6c-2.4-1-4.6-2.5-6.4-4.3s-3.2-3.9-4.3-6.4S4,26.7,4,24c0-2.8,0.5-5.4,1.6-7.8s2.5-4.6,4.3-6.4s3.9-3.2,6.4-4.3S21.3,4,24,4c2.8,0,5.4,0.5,7.8,1.6s4.6,2.5,6.4,4.3s3.2,3.9,4.3,6.4c1.1,2.4,1.6,5,1.6,7.8c0,2.7-0.5,5.3-1.6,7.8c-1,2.4-2.5,4.6-4.3,6.4s-3.9,3.2-6.4,4.3C29.4,43.5,26.8,44,24,44z"/></svg>';

    if($client['id_CarteMembre'] == null){
        $cm = '<svg version="1.1" id="Calque_1" style="fill:var(--Vivid-Auburn);" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve"><path d="M24,44c-2.7,0-5.3-0.5-7.8-1.6c-2.4-1-4.6-2.5-6.4-4.3s-3.2-3.9-4.3-6.4S4,26.7,4,24c0-2.8,0.5-5.4,1.6-7.8s2.5-4.6,4.3-6.4s3.9-3.2,6.4-4.3S21.3,4,24,4c2.8,0,5.4,0.5,7.8,1.6s4.6,2.5,6.4,4.3s3.2,3.9,4.3,6.4c1.1,2.4,1.6,5,1.6,7.8c0,2.7-0.5,5.3-1.6,7.8c-1,2.4-2.5,4.6-4.3,6.4s-3.9,3.2-6.4,4.3C29.4,43.5,26.8,44,24,44z"/></svg>';
    };

    if($client['id_CarteEnergie'] == null){
        $ce = '<svg version="1.1" id="Calque_1" style="fill:var(--Vivid-Auburn);" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve"><path d="M24,44c-2.7,0-5.3-0.5-7.8-1.6c-2.4-1-4.6-2.5-6.4-4.3s-3.2-3.9-4.3-6.4S4,26.7,4,24c0-2.8,0.5-5.4,1.6-7.8s2.5-4.6,4.3-6.4s3.9-3.2,6.4-4.3S21.3,4,24,4c2.8,0,5.4,0.5,7.8,1.6s4.6,2.5,6.4,4.3s3.2,3.9,4.3,6.4c1.1,2.4,1.6,5,1.6,7.8c0,2.7-0.5,5.3-1.6,7.8c-1,2.4-2.5,4.6-4.3,6.4s-3.9,3.2-6.4,4.3C29.4,43.5,26.8,44,24,44z"/></svg>';
    };

    $clientInfo = '
                        <a>'. $client['nom'] .'</a>
                        <div>'.
                            $cm
                            .'<a>Carte membre</a>
                        </div>
                        <div>'.
                            $ce
                            .'<a>Carte énergie</a>
                        </div>
                        <a>Coordonnées</a>
                        <p>
                            <a>'. $client['tel'] .'</a>
                            <a>'. $client['addresse'].'</a>
                        </p>';
    return $clientInfo; 
}

if (isset($_POST['clientId'])) {
    $clientInfo = getSelectedClient($_POST['clientId']);
    echo $clientInfo;
} else {
    echo "AAAAAAAAAAA";
}
?>