const divMesRestaurants = document.querySelector(".mesRestaurants");
const divMesPlats = document.querySelector(".mesPlats");
const divMonForm = document.querySelector(".monForm");

afficheTousLesRestaurants();

// function qui affiche tous les restaurants
function afficheTousLesRestaurants() {
  let maRequete = new XMLHttpRequest();

  maRequete.open(
    "GET",
    "http://localhost/baseFrameworkObjet/index.php?controller=restaurant&task=indexApi"
  );

  maRequete.onload = () => {
    // on veut recuper la reponse en json
    let data = JSON.parse(maRequete.responseText);

    faisDesCardsRestaurants(data);
  };
  maRequete.send();
}

// function qui affiche un restaurant via son id
function afficheUnRestaurant(idRestaurant) {
  let maRequete = new XMLHttpRequest();

  maRequete.open(
    "GET",
    `http://localhost/baseFrameworkObjet/index.php?controller=restaurant&task=showApi&id=${idRestaurant}`
  );

  maRequete.onload = () => {
    let data = JSON.parse(maRequete.responseText);

    let restaurant = data.restaurant;
    let plats = data.plats;

    faisUneCardRestaurantEtCardRecettes(restaurant, plats);
    faisUnForm();
  };

  maRequete.send();
}

function faisDesCardsRestaurants(tableauRestaurant) {
  let cards = "";
  tableauRestaurant.forEach((element) => {
    card = ` <div class="card border-success mb-3 text-center me-4" style="max-width: 20rem;">
    <div class="card-body">
     <h3 class="card-title mt-3 mb-3">Nom du Restaurant: ${element.name} </h3>
     <hr>
     <h4 class="card-text">Adresse du restaurant: ${element.address} </h4>
    </div>
    
  
    <button class="boutonAfficherRestaurant btn btn-success mb-4 mt-4" id='${element.id}' value="">voir le restaurant et sa carte</button>
    </div>`;

    cards += card;
    divMesRestaurants.innerHTML = cards;
    divMesPlats.innerHTML = "";
    divMonForm.innerHTML = "";
  });

  document.querySelectorAll(".boutonAfficherRestaurant").forEach((bouton) => {
    bouton.addEventListener("click", () => {
      let idRestaurant = bouton.id;
      afficheUnRestaurant(idRestaurant);
    });
  });
}

function faisUneCardRestaurantEtCardRecettes(restaurant, plats) {
  cardRestaurant = `<h2 class="text-center mb-5">-- La super page du restaurant --</h2>
  <div class="card border-primary pb-5">
   <h3 class="mt-3 mb-3">${restaurant.name} </h3>
   <h4 class="">${restaurant.address} </h4>
  <button class="btn btn-primary mt-4 retourRestaurants">Retour aux restaurants</button>
  </div>`;

  divMesRestaurants.innerHTML = cardRestaurant;

  cardsPlats = "";
  titre = '<h2 class="mb-4 mt-5">La carte du restaurant</h2>';

  plats.forEach((plat) => {
    cardPlat = `
    <div class="row" data-plat="${plat.id}">
    <hr>
    <h3 class ="mt-3 mb-3">${plat.name}</h3>
    <h3>${plat.price} €</h3>
    <h3>${plat.description}</h3>
    <button class="boutonSupprimePlat btn btn-danger" value="${plat.id}">Supprime ce plat</button>
    </div>
    
    <hr>
    `;
    cardsPlats += cardPlat;
  });
  divMesPlats.innerHTML = titre + cardsPlats;

  document.querySelectorAll(".boutonSupprimePlat").forEach((bouton) => {
    bouton.addEventListener("click", (event) => {
      supprimeUnPlat(bouton.value);
    });
  });

  const btnRetourRestaurants = document.querySelector(".retourRestaurants");
  btnRetourRestaurants.addEventListener("click", (event) => {
    afficheTousLesRestaurants();
  });
}

function faisUnForm() {
  cardForm = ` <h2 class="mb-4">Ajouter un plat</h2>
  <form action="" method="POST">
        <div class="form-group mb-3">
           
            <input type="text" id="unName" name="unName" placeholder="entre le nom du plat">
        </div>
        <div class="form-group mb-3">
            <input type="text" id="price" name="price" placeholder="entre le prix">
        </div>
        <div class="form-group mb-3">
            <textarea name="" id="description" name="description" placeholder="decrire le plat"></textarea>
        </div>
        <div class="form-group button">
            <button type="submit" class="btn btn-success" id="restaurantId" value="">Envoyer le plat</button>
        </div>

    </form>`;

  divMonForm.innerHTML = cardForm;

  const monBouton = document.querySelector("#restaurantId");
  const unName = document.querySelector("#unName");
  const price = document.querySelector("#price");
  const description = document.querySelector("#description");

  monBouton.addEventListener("click", (event) => {
    preventDefault(event);
    console.log(unName.value, price.value, description.value);
  });
}

//function supprime un plat

function supprimeUnPlat(platId) {
  let maRequete = new XMLHttpRequest();

  maRequete.open(
    "POST",
    "http://localhost/baseFrameworkObjet/index.php?controller=plat&task=supprApi"
  );

  maRequete.onload = () => {
    let data = JSON.parse(maRequete.responseText);

    let divRecette = document.querySelector(`div[data-plat="${platId}"]`);
    divRecette.remove();
  };

  maRequete.setRequestHeader(
    "Content-type",
    "application/x-www-form-urlencoded"
  );
  params = "id=" + `${platId}`;
  maRequete.send(params);
}
