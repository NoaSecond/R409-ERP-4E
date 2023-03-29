function reapprovisionnementOnload() {
    console.log("[reapprovisionnement.js] : chargé");

    const toggleSwitchCarbuProds = document.getElementById("inputCarburantsProduits");

    toggleSwitchCarbuProds.addEventListener('change', function() {
        if (toggleSwitchCarbuProds.checked) {
          console.log("Carburants");
        } else {
          console.log("Produits");
        }
    });
}