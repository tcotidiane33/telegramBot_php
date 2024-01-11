// app.js
import { getData } from './data.js';
import { updateCartItems } from './cart.js'; // Importez la fonction de mise à jour du panier depuis cart.js

document.addEventListener('DOMContentLoaded', function () {
  const selectedBookIds = [];

  // Récupérer les données du fichier db.json
  fetch('src/data/db.json')
    .then(response => response.json())
    .then(books => {
      const bookListSection = document.getElementById('book-list');

      books.forEach(book => {
        const bookCard = createBookCard(book);
        bookListSection.appendChild(bookCard);

        // Ajoutez un événement de clic pour gérer la sélection du livre
        bookCard.addEventListener('click', () => {
          addToSelectedBooks(book.id);
        });

        // Créer un bouton pour déclencher l'ouverture de la modal
        const openModalButton = document.createElement('button');
        openModalButton.setAttribute('type', 'button');
        openModalButton.classList.add('btn', 'btn-danger', 'mt-1');
        openModalButton.setAttribute('data-bs-toggle', 'modal');
        openModalButton.setAttribute('data-bs-target', `#modal${book.id}`);
        openModalButton.textContent = 'Descriptions';

        // Ajouter le bouton après le cardBody
        // bookCard.appendChild(cardBody);
        bookCard.appendChild(openModalButton);

        // Ajouter le livre à la section
        bookListSection.appendChild(bookCard);

        // Créer une modal Bootstrap pour chaque livre
        const modal = document.createElement('div');
        modal.classList.add('modal', 'fade');
        modal.id = `modal${book.id}`;
        modal.setAttribute('tabindex', '-1');
        modal.setAttribute('aria-labelledby', `modal${book.id}Label`);
        modal.setAttribute('aria-hidden', 'true');

        const modalDialog = document.createElement('div');
        modalDialog.classList.add('modal-dialog');

        const modalContent = document.createElement('div');
        modalContent.classList.add('modal-content');

        const modalHeader = document.createElement('div');
        modalHeader.classList.add('modal-header');

        const modalTitle = document.createElement('h5');
        modalTitle.classList.add('modal-title');
        modalTitle.id = `modal${book.id}Label`;
        modalTitle.textContent = book.BookTitle;

        const modalCloseButton = document.createElement('button');
        modalCloseButton.classList.add('btn-close');
        modalCloseButton.setAttribute('type', 'button');
        modalCloseButton.setAttribute('data-bs-dismiss', 'modal');
        modalCloseButton.setAttribute('aria-label', 'Close');

        modalHeader.appendChild(modalTitle);
        modalHeader.appendChild(modalCloseButton);

        const modalBody = document.createElement('div');
        modalBody.classList.add('modal-body');

        // Ajoutez le contenu du livre à la modal
        const bookModalCard = document.createElement('div');
        bookModalCard.classList.add('card', 'book-card', 'm-2');

        const modalThumbnailDiv = document.createElement('div');
        modalThumbnailDiv.classList.add('thumbnail-container');

        const modalImage = document.createElement('img');
        modalImage.src = book.ImageM;
        modalImage.classList.add('card-img-top');
        modalImage.alt = `Cover of ${book.BookTitle}`;

        modalThumbnailDiv.appendChild(modalImage);

        const modalCardBody = document.createElement('div');
        modalCardBody.classList.add('card-body');

        const modalAuthor = document.createElement('p');
        modalAuthor.classList.add('card-text');
        modalAuthor.textContent = `Author: ${book.BookAuthor}`;

        const modalYear = document.createElement('p');
        modalYear.classList.add('card-text');
        modalYear.textContent = `Year of Publication: ${book.YearOfPublication}`;

        const modalPrice = document.createElement('p');
        modalPrice.classList.add('card-text');
        modalPrice.textContent = `Price: ${book.price} XOF`;

        modalCardBody.appendChild(modalAuthor);
        modalCardBody.appendChild(modalYear);
        modalCardBody.appendChild(modalPrice);

        bookModalCard.appendChild(modalThumbnailDiv);
        bookModalCard.appendChild(modalCardBody);

        modalBody.appendChild(bookModalCard);

        const modalFooter = document.createElement('div');
        modalFooter.classList.add('modal-footer');

        const modalCloseFooterButton = document.createElement('button');
        modalCloseFooterButton.classList.add('btn', 'btn-secondary');
        modalCloseFooterButton.setAttribute('type', 'button');
        modalCloseFooterButton.setAttribute('data-bs-dismiss', 'modal');
        modalCloseFooterButton.textContent = 'Close';

        modalFooter.appendChild(modalCloseFooterButton);

        modalContent.appendChild(modalHeader);
        modalContent.appendChild(modalBody);
        modalContent.appendChild(modalFooter);

        modalDialog.appendChild(modalContent);
        modal.appendChild(modalDialog);

        // Ajouter la modal à la fin du document
        document.body.appendChild(modal);

        // Créer une div pour les boutons et le voyant
        const buttonsDiv = document.createElement('div');
        buttonsDiv.classList.add('buttons-container');

        const count = document.createElement('div');
        count.classList.add('count');
        count.textContent = '0'; // Valeur par défaut

        const incrementButton = document.createElement('button');
        incrementButton.textContent = '➕';
        incrementButton.classList.add('increment-button');
        incrementButton.addEventListener('click', () => {
          // Incrémenter la valeur du compteur et mettre à jour l'affichage
          count.textContent = (parseInt(count.textContent) + 1).toString();

          // Afficher le bouton de décrément une fois que le compteur est supérieur à 0
          decrementButton.style.display = 'inline-block';
        });

        const decrementButton = document.createElement('button');
        decrementButton.textContent = '➖';
        decrementButton.classList.add('decrement-button');
        decrementButton.style.display = 'none'; // Caché par défaut
        decrementButton.addEventListener('click', () => {
          // Décrémenter la valeur du compteur et mettre à jour l'affichage
          count.textContent = (parseInt(count.textContent) - 1).toString();

          // Cacher le bouton de décrément si le compteur atteint 0
          if (parseInt(count.textContent) === 0) {
            decrementButton.style.display = 'none';
          }
        });

        const counterContainer = document.createElement('div');
        counterContainer.classList.add('counter-container');
        counterContainer.appendChild(incrementButton);
        counterContainer.appendChild(count);
        counterContainer.appendChild(decrementButton);

        // Ajouter le conteneur du compteur après le cardBody
        bookCard.appendChild(counterContainer);

        bookListSection.appendChild(bookCard);

      });


      function addToSelectedBooks(bookId, quantity) {
        const existingBook = selectedBookIds.find(book => book.id === bookId);

        if (existingBook) {
          existingBook.quantity += quantity || 1;
        } else {
          selectedBookIds.push({ id: bookId, quantity: quantity || 1 });
        }

        updateCart();
      }

      function updateCart() {
        // Utiliser la fonction importée pour transmettre les informations des livres sélectionnés à cart.js
        updateCartItems(selectedBookIds);
      }
      const selectButtons = document.querySelectorAll('.select-book');

      selectButtons.forEach(button => {
        button.addEventListener('click', function () {
          const bookData = JSON.parse(this.getAttribute('data-book'));
          addToCart(bookData);
        });
      });

      // Ajouter un livre au panier
      function addToCart(bookData) {
        // Initialiser la session si elle n'est pas déjà initialisée
        if (!sessionStorage.getItem('selectedBooks')) {
          sessionStorage.setItem('selectedBooks', JSON.stringify([]));
        }

        // Récupérer les livres sélectionnés de la session
        const selectedBooks = JSON.parse(sessionStorage.getItem('selectedBooks'));

        // Vérifier si le livre est déjà dans la liste des sélectionnés
        const existingBook = selectedBooks.find(book => book.id === bookData.id);

        if (existingBook) {
          // Si le livre existe déjà, augmenter la quantité
          existingBook.quantity++;
        } else {
          // Sinon, ajouter le livre à la liste des sélectionnés
          selectedBooks.push({ ...bookData, quantity: 1 });
        }

        // Mettre à jour la session avec la liste mise à jour des sélectionnés
        sessionStorage.setItem('selectedBooks', JSON.stringify(selectedBooks));
      }

      function createBookCard(book) {
        const bookCard = document.createElement('div');
        bookCard.classList.add('card', 'book-card', 'm-2', 'p-2');

        // Créer une div pour la miniature de l'image
        const thumbnailDiv = document.createElement('div');
        thumbnailDiv.classList.add('thumbnail-container');

        const image = document.createElement('img');
        image.src = book.ImageM;
        image.classList.add('card-img-top');
        image.alt = `Cover of ${book.BookTitle}`;

        thumbnailDiv.appendChild(image);

        const cardBody = document.createElement('div');
        cardBody.classList.add('card-body');

        const title = document.createElement('h5');
        title.classList.add('card-title');
        title.textContent = book.BookTitle;

        const author = document.createElement('p');
        author.classList.add('card-text');
        author.textContent = `Author: ${book.BookAuthor}`;

        const year = document.createElement('p');
        year.classList.add('card-text');
        year.textContent = `Year of Publication: ${book.YearOfPublication}`;

        const price = document.createElement('p');
        price.classList.add('card-text');
        price.textContent = `Price: ${book.price} XOF`;

        cardBody.appendChild(title);
        // cardBody.appendChild(author);
        // cardBody.appendChild(year);
        // cardBody.appendChild(price);

        // Ajouter la miniature avant le cardBody
        bookCard.appendChild(thumbnailDiv);
        bookCard.appendChild(cardBody);

        return bookCard;


      }
    });
  // Ajoutez un gestionnaire d'événements au bouton "Voir le panier" s'il existe
  const viewCartButton = document.getElementById('view-cart-btn');
  if (viewCartButton) {
    viewCartButton.addEventListener('click', function (event) {
      event.preventDefault(); // Empêche le comportement par défaut du lien

      // Construit l'URL avec les données sélectionnées
      const selectedBooks = encodeURIComponent(JSON.stringify(selectedBookIds));
      const cartUrl = `cart.php?selectedBooks=${selectedBooks}`;

      // Redirige vers la page cart.php avec les données sélectionnées
      window.location.href = cartUrl;
    });
  }
});

