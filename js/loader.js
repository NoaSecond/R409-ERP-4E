function onLoad() {
    try {
        menuOnload();
    } catch (error) {
    console.log("[menu.js] : non-chargé")
    }
    try {
        reapprovisionnementOnload();
    } catch (error) {
    console.log("[reapprovisionnement.js] : non-chargé")
    }
    try {
        gestionOnload();
    } catch (error) {
    console.log("[gestion.js] : non-chargé")
    }
    try {
        indexOnload();
    } catch (error) {
    console.log("[index.js] : non-chargé")
    }
}