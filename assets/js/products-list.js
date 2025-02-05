// Requête au serveur pour les données products.json
var xhr = new XMLHttpRequest();
xhr.onload = function () {
  if (xhr.status === 200) {
    var products = JSON.parse(xhr.responseText); // Importer les données JSON dans la variable "products"

    function generateProductsHTML(productsList) {
      var pageContent = '';

      for (var i = 0; i < productsList.length; i++) {
        var product = productsList[i];

        // Création d'un div pour chaque produit avec lien vers sa page individuelle
        pageContent += `<div class="product">`;
        pageContent += `<a href="./product.html?id=${product.id}" title="${product.name}">`;
        pageContent += `<h3 style="margin:0;">${product.name}</h3>`;
        pageContent += `<img src="./assets/img/${product.image}" alt="${product.name}" />`;
        pageContent += `<p class="price">${product.price.toFixed(2)} $</p>`;
        pageContent += `</a>`;
        pageContent += `</div>`;

        
      }

      // Afficher la liste et le nombre de produits
      document.getElementById('products-list').innerHTML = pageContent;
      document.getElementById('products-count').innerHTML = productsList.length + ' produits';
    }

    function sortAscending(property) {
      return function (a, b) {
        return (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
      };
    }

    function sortDescending(property) {
      return function (a, b) {
        return (a[property] > b[property]) ? -1 : (a[property] < b[property]) ? 1 : 0;
      };
    }

    function sortAscendingName(property) {
      return function (a, b) {
        return a[property].localeCompare(b[property]);
      };
    }

    function sortDescendingName(property) {
      return function (a, b) {
        return b[property].localeCompare(a[property]);
      };
    }

    // Initialisation de la page HTML avec les paramètres sélectionnés par défaut
    var refreshedProductList = products;
    refreshedProductList.sort(sortAscending("price"));
    generateProductsHTML(refreshedProductList);

    
    function productsFiltering() {
      var productCategory = "all";
      var productCriteria = "priceAscending";

      // Mise à jour de la classe ".selected" au clic d'un bouton de catégorie
      $('#product-categories button').click(function () {
        $('#product-categories button').removeClass('selected');
        $(this).addClass('selected');
        productCategory = $(this).attr("id");

        // Filtrer les produits selon la catégorie
        if (productCategory === 'all') {
          refreshedProductList = products;
        } else {
          refreshedProductList = products.filter(item => item.category === productCategory);
        }

        // Trier les produits en fonction du critère sélectionné
        if (productCriteria === "priceAscending") {
          refreshedProductList.sort(sortAscending("price"));
        } else if (productCriteria === "priceDescending") {
          refreshedProductList.sort(sortDescending("price"));
        } else if (productCriteria === "nameAscending") {
          refreshedProductList.sort(sortAscendingName("name"));
        } else if (productCriteria === "nameDescending") {
          refreshedProductList.sort(sortDescendingName("name"));
        }

        // Générer et afficher les produits triés
        generateProductsHTML(refreshedProductList);
      });

      // Mise à jour de la classe ".selected" au clic d'un bouton de classement
      $('#product-criteria button').click(function () {
        $('#product-criteria button').removeClass('selected');
        $(this).addClass('selected');
        productCriteria = $(this).attr("id");

        // Trier les produits selon le critère sélectionné
        if (productCriteria === "priceAscending") {
          refreshedProductList.sort(sortAscending("price"));
        } else if (productCriteria === "priceDescending") {
          refreshedProductList.sort(sortDescending("price"));
        } else if (productCriteria === "nameAscending") {
          refreshedProductList.sort(sortAscendingName("name"));
        } else if (productCriteria === "nameDescending") {
          refreshedProductList.sort(sortDescendingName("name"));
        }

        // Générer et afficher les produits triés
        generateProductsHTML(refreshedProductList);
      });
    }

    productsFiltering();
  }
};

xhr.open('GET', 'data/products.json', true);
xhr.send(null);
