
// Ce script prépare la page d'affichage des différents produits et permet
// de trier les produits selon différentes catégories sélectionnées à l'aide de boutons.

// Requête au serveur pour les données products.json
var xhr = new XMLHttpRequest();
xhr.onload = function () {
  if (xhr.status === 200) {
    products = JSON.parse(xhr.responseText); // Importer les données JSON dans la variable "products"

    // Fonction qui génère le contenu de la page des produits à partir d'une liste de produits ordonnées
    function generateProductsHTML(productsList) {

      var pageContent = '';

      for (var i = 0; i < productsList.length; i++) {

     //  à Compléter

      //  pageContent += '<div class="product">'
      //  .....
      //.....

      //  pageContent += '</div>'
      }

      document.getElementById('products-list').innerHTML = pageContent;
      document.getElementById('products-count').innerHTML = productsList.length + ' produits';

    };

    // Fonction pour classer en ordre croissant les prix.
    // Adapté de: https://stackoverflow.com/questions/12900058/how-can-i-sort-a-javascript-array-of-objects-numerically-and-then-alphabetically
    function sortAscending(property) {
      

     //  à Compléter
    };

    // Fonction pour classer en ordre décroissant les prix.
    // Adapté de: https://stackoverflow.com/questions/12900058/how-can-i-sort-a-javascript-array-of-objects-numerically-and-then-alphabetically
    function sortDescending(property) {
      return function (a, b) {
        return (a[property] > b[property]) ? -1 : (a[property] < b[property]) ? 1 : 0;
      }
    };

    // Fonction pour classer en ordre croissant les noms des produits.
    // Adapté de: https://stackoverflow.com/questions/12900058/how-can-i-sort-a-javascript-array-of-objects-numerically-and-then-alphabetically
    function sortAscendingName(property) {
      
     //  à Compléter
    };

    // Fonction pour classer en ordre décroissant les noms des produits.
    // Adapté de: https://stackoverflow.com/questions/12900058/how-can-i-sort-a-javascript-array-of-objects-numerically-and-then-alphabetically
    function sortDescendingName(property) {
      
     //  à Compléter
    };

    // Initialisation de la page HTML avec les paramètres sélectionnée par défaut ("Tous les produits" + "Prix (bas-haut)")
    var refreshedProductList = []
    refreshedProductList = products // Tous les produits
    refreshedProductList.sort(sortAscending("price")) // Prix (bas-haut)
    generateProductsHTML(refreshedProductList) // Générer la page initiale


    // Fonction pour la mise à jour des paramètres de classement après le clic d'un bouton
    function productsFiltering() {

      // Initialisation des paramètres initiaux
      var productCategory = "all"
      var productCriteria = "priceAscending"

      // Mise à jour de la classe ".selected" au clic d'un bouton de catégorie
      $('#product-categories button').click(function () {
        $('#product-categories button').removeClass('selected')
        $(this).addClass('selected')
        productCategory = String($(this).attr("id"))
      })

      // Mise à jour de la classe ".selected" au clic d'un bouton de classement
      
     //  à Compléter
     //  .......

      // Au clic d'un bouton, mettre à jour les produits affichés en fonction des critères sélectionnés
      $('button').click(function () {

        if (productCategory == 'computers') {
          refreshedProductList = products.filter(item => { return item.category == 'computers' });
        } else if (productCategory == "cameras") {
          refreshedProductList = products.filter(item => { return item.category == 'cameras' });
        //
        } 
       //  à Compléter
     //  .......




        if (productCriteria == "nameAscending") {
          refreshedProductList = refreshedProductList.sort(sortAscendingName("name"));
        } else if (productCriteria == "nameDescending") {
          refreshedProductList = refreshedProductList.sort(sortDescendingName("name"));
        

     //  à Compléter
     //  .......


        // Afficher les produits selon le nouveau classement déterminé
        generateProductsHTML(refreshedProductList);
      });
    };
    productsFiltering();

  }
};

xhr.open('GET', 'data/products.json', true);
xhr.send(null);