function reapprovisionnementOnload() {
    headerOnScroll();
    toggleSwitchLeft();
    toggleSwitchRight();
    changeStockColor();
    console.log("[reapprovisionnement.js] : chargé");
}

function headerOnScroll() {
  const headerLeft = document.getElementById("headerLeft");
  const contentLeft = document.getElementById("contentLeft");

  contentLeft.addEventListener("scroll", function() {
    if (contentLeft.scrollTop > 0) {
      headerLeft.style.backgroundColor = "var(--Gray)";
      $(headerLeft).blurjs({
        customClass: 'blurjs',
        radius: 5,
        persist: false
      });
    } else {
      headerLeft.style.backgroundColor = "transparent";
    }
  });
}

function toggleSwitchLeft() {  
  const toggleSwitchCarbuProds = document.getElementById("inputCarburantsProduits");
  const produitsWrap = document.getElementById("produitsWrap");
  const produitsList = document.querySelectorAll(".produit");
  const carburantsWrap = document.getElementById("carburantsWrap");
  const carburantsList = document.querySelectorAll(".carburant");

  toggleSwitchCarbuProds.addEventListener('change', function() {
      if (toggleSwitchCarbuProds.checked) {
        //Display Carburants
        produitsList.forEach((produit) => {
          produit.style.opacity = "0";
        });
        setTimeout(function(){
          produitsWrap.style.display = "none";
          carburantsWrap.style.display = "block";
          setTimeout(function(){
            carburantsList.forEach((carburant) => {
              carburant.style.opacity = "1";
            });
          }, 100);  
        }, 300);  
      } else {
        //Display Produits
        carburantsList.forEach((carburant) => {
          carburant.style.opacity = "0";
        });
        setTimeout(function(){
          produitsWrap.style.display = "block";
          carburantsWrap.style.display = "none";
          setTimeout(function(){
            produitsList.forEach((produit) => {
              produit.style.opacity = "1";
            });
          }, 100);  
        }, 300);  
      }
  });
}

function toggleSwitchRight() {  
  const toggleSwitchPanierCommandes = document.getElementById("inputPanierCommandes");
  const panierWrap = document.getElementById("panierWrap");
  const panierList = document.querySelectorAll(".produitPanier");
  const commandesWrap = document.getElementById("commandesWrap");
  const commandesList = document.querySelectorAll(".commande");
  const totalCount = document.getElementById("totalCount");

  toggleSwitchPanierCommandes.addEventListener('change', function() {
    if (toggleSwitchPanierCommandes.checked) {
      //Display Commandes
      panierList.forEach((produitPanier) => {
        produitPanier.style.opacity = "0";
        totalCount.style.opacity = "0";
      });
      setTimeout(function(){
        panierWrap.style.display = "none";
        commandesWrap.style.display = "block";
        setTimeout(function(){
          commandesList.forEach((commande) => {
            commande.style.opacity = "1";
          });
        }, 100);  
      }, 300);  
    } else {
      //Display Panier
      commandesList.forEach((commande) => {
        commande.style.opacity = "0";
      });
      setTimeout(function(){
        panierWrap.style.display = "block";
        commandesWrap.style.display = "none";
        setTimeout(function(){
          panierList.forEach((produitPanier) => {
            produitPanier.style.opacity = "1";
            totalCount.style.opacity = "1";
          });
        }, 100);  
      }, 300);  
    }
  });
}

function changeStockColor() {
  const textStockProduit = document.querySelectorAll(".stockProduit");
  textStockProduit.forEach((text) => {
    const stockValue = parseInt(text.textContent.replace("Stock : ", ""));
    if (stockValue < 10) {
      text.style.color = "var(--Vivid-Auburn)";
    }
  });
}