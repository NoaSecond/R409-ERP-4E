function gestionOnload() {
    console.log("[pompes.js] : chargé");

    const maintenances = document.querySelectorAll("#maintenance");
    const oks = document.querySelectorAll("#ok");
    const hss = document.querySelectorAll("#hs");

    maintenances.forEach((maintenance) => {
        maintenance.addEventListener("click", (event) => {
            $.ajax({
                url: 'phpScript/getPumpListStartingWith.php',
                method: 'POST',
                success: function (response) {
                    const pompeDiv = event.target.closest('.pompe');
                    pompeDiv.classList.remove('ok');
                    pompeDiv.classList.remove('hs');
                    pompeDiv.classList.add('maintenance');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

    oks.forEach((ok) => {
        ok.addEventListener("click", (event) => {
            $.ajax({
                url: 'phpScript/getPumpListStartingWith.php',
                method: 'POST',
                success: function (response) {
                    const pompeDiv = event.target.closest('.pompe');
                    pompeDiv.classList.remove('maintenance');
                    pompeDiv.classList.remove('hs');
                    pompeDiv.classList.add('ok');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });

            $.ajax({
                url: 'phpScript/setPumpOK.php', // le chemin vers votre fichier PHP
                method: 'POST',
                data: {
                    id: 6
                },
                success: function (response) {
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });

        });
    });

    hss.forEach((hs) => {
        hs.addEventListener("click", (event) => {
            $.ajax({
                url: 'phpScript/getPumpListStartingWith.php',
                method: 'POST',
                success: function (response) {
                    const pompeDiv = event.target.closest('.pompe');
                    pompeDiv.classList.remove('maintenance');
                    pompeDiv.classList.remove('ok');
                    pompeDiv.classList.add('hs');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

}
