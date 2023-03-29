function menuOnload() {
    console.log("[menu.js] : chargé");
    
    const menu = document.querySelector('#menu');
    const menuArrowSVG = document.querySelector('#menuArrowSVG');
    const menuHomeText = document.querySelector('#menuHomeText');
    const menuTransportText = document.querySelector('#menuTransportText');
    const menuServicesText = document.querySelector('#menuServicesText');
    const menuRHText = document.querySelector('#menuRHText');
    const menuPompesText = document.querySelector('#menuPompesText');

    menuArrowSVG.addEventListener('click', () => {
        if (menuArrowSVG.classList.contains('menuExtanded')) {
            //Fermer le menu
            menuArrowSVG.classList.remove('menuExtanded');
            menuHomeText.classList.remove('menuExtanded');
            menuTransportText.classList.remove('menuExtanded');
            menuServicesText.classList.remove('menuExtanded');
            menuRHText.classList.remove('menuExtanded');
            menuPompesText.classList.remove('menuExtanded');

            document.getElementById("menu").style.width = "335px";
            menu.classList.remove('menuExtanded');
            menu.classList.add('menuCloseSmooth');
        } else {
            //Ouvrir le menu
            menuArrowSVG.classList.add('menuExtanded');
            menuHomeText.classList.add('menuExtanded');
            menuTransportText.classList.add('menuExtanded');
            menuServicesText.classList.add('menuExtanded');
            menuRHText.classList.add('menuExtanded');
            menuPompesText.classList.add('menuExtanded');
            
            document.getElementById("menu").style.width = "";
            menu.classList.remove('menuCloseSmooth');
            menu.classList.add('menuExtanded');
        }
    });
}