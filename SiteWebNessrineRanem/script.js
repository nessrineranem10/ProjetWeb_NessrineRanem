document.getElementById('addToCart').addEventListener('click', function () { 
    const quantity = parseInt(document.getElementById('quantity').value, 10);
    const selectedColorElement = document.querySelector('.color-circle.active');
    const color = selectedColorElement ? selectedColorElement.getAttribute('data-color') : null;

    if (!color) {
        alert('Veuillez sélectionner une couleur.');
        return;
    }

    ajouterAuPanier('iPhone 11 64GO', 590, quantity, color);
    window.location.href = 'Mon panier.php';
});

function ajouterAuPanier(nom, prix, quantite, couleur) {
    let panier = JSON.parse(localStorage.getItem('panier')) || [];
    const article = { 
        nom: nom, 
        prix: prix, 
        quantite: quantite, 
        couleur: couleur 
    };

    panier.push(article);
    localStorage.setItem('panier', JSON.stringify(panier));

    alert(`${nom} (${couleur}, ${quantite} pcs) a été ajouté à votre panier.`);
}

function selectColor(element) {
    const colorCircles = document.querySelectorAll('.color-circle');
    colorCircles.forEach(circle => circle.classList.remove('active'));
    element.classList.add('active');
}

function afficherPanier() {
    const panier = JSON.parse(localStorage.getItem('panier')) || [];
    const panierContainer = document.getElementById('panier');
    const totalContainer = document.getElementById('total-panier');

    panierContainer.innerHTML = "<h2>Votre panier</h2>";
    totalContainer.innerHTML = "";

    if (panier.length === 0) {
        panierContainer.innerHTML += "<p>Votre panier est vide.</p>";
        return;
    }

    let total = 0;
    panier.forEach((article, index) => {
        const { nom, prix, quantite, couleur } = article;
        const sousTotal = prix * quantite;
        total += sousTotal;

        const produitElement = document.createElement('div');
        produitElement.className = 'produit-panier';
        produitElement.innerHTML = `
            <p><strong>${nom}</strong> (${couleur}) - ${prix}€ x ${quantite} = ${sousTotal}€</p>
            <button onclick="retirerDuPanier(${index})">Retirer</button>
        `;
        panierContainer.appendChild(produitElement);
    });

    totalContainer.innerHTML = `<h3>Total : ${total}€</h3>`;
}

function retirerDuPanier(index) {
    const panier = JSON.parse(localStorage.getItem('panier')) || [];
    panier.splice(index, 1);
    localStorage.setItem('panier', JSON.stringify(panier));
    afficherPanier();
}

document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('panier')) {
        afficherPanier();
    }
});
