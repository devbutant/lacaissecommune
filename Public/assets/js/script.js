// Récupération et stockage du nom de la caisse (depuis homepage)
let inputPotName = document.querySelector('#potName');
let potName = '';
let formInput = document.querySelector('#formInputPotName');

let notifIfNotRegister = document.querySelector('#namePot');
let namePotForNotif = document.querySelector('.namePotValue');

let potNameStocked = localStorage.getItem('potName');

if (document.body.contains(namePotForNotif)) {
    if (potNameStocked) {
        notifIfNotRegister.style.display = 'block';
        namePotForNotif.textContent = potNameStocked;
    }
}

if (document.body.contains(inputPotName)) {
    if (localStorage.getItem('potName')) {
        inputPotName.value = localStorage.getItem('potName');
    }
    inputPotName.addEventListener('keyup', (e) => {
        potName = inputPotName.value;
        localStorage.setItem('potName', potName);
    });

    // Redirection si keyCode = 13 (enter)
    inputPotName.addEventListener('keydown', (e) => {
        switch (e.keyCode) {
            case 13:
                e.preventDefault();
                let server = window.location.pathname;
                document.location.href = server + 'caisses/cadeau';
        }
    });
}

// Récupération du nom de la caisse dans le formulaire de finalisation
if (document.body.contains(formInput)) {
    formInput.value = potNameStocked;
    localStorage.clear();
}

// Remplacement de certains caractères instantanément dans le formulaire de création de caisse
let slug = document.querySelector('#slug');

if (document.body.contains(document.querySelector('#slug'))) {
    slug.addEventListener('keyup', () => {
        let str = '';
        str += slug.value;
        str = str.replaceAll(/\s+/g, '-').toLowerCase();
        slug.value = str;
    });
}

// Navbar effect
let navbar = document.querySelector('#navHome');
let littleNav = document.querySelector('.navbar');

if (document.body.contains(navbar)) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            navbar.classList.replace('nav-transparent', 'nav-bg');
            navbar.classList.remove('big-container');

            littleNav.style.display = 'flex';
            littleNav.classList.add('big-container');
        } else {
            navbar.classList.replace('nav-bg', 'nav-transparent');
            navbar.classList.add('big-container');

            littleNav.classList.remove('big-container');
        }
    });
}

// Menu hamburger
let hamburgerBtn = document.querySelector('.hamburger-btn');
let menuHamb = document.querySelector('#mobile-menu');
let menuBg = document.querySelector('.menu-mobile-bg');

hamburgerBtn.addEventListener('click', () => {
    menuHamb.classList.toggle('menu-active');
    menuBg.classList.toggle('bg-active');
});

menuBg.addEventListener('click', () => {
    menuHamb.classList.toggle('menu-active');
    menuBg.classList.toggle('bg-active');
});

// Date du jour dans les inputs  date
let inputsDate = document.querySelectorAll('input[type="date"]');

inputsDate.forEach((input) => {
    let todayDate = new Date().toISOString().slice(0, 10);
    let dates = document.querySelectorAll('.date');
    input.value = todayDate;
    console.log(todayDate);
});

// Date en temps réel footer - copyright
let copyrightDate = document.querySelector('#copyrightDate');
copyrightDate.textContent = new Date().getFullYear();

// Show slides
if (document.body.contains(document.querySelector('.slideshow'))) {
    var slideIndex = 1;

    // A l'arrivée sur la page, vu du premier slide
    showSlide(slideIndex);

    // Au click (html)
    function currentSlide(num) {
        showSlide((slideIndex = num));
    }

    function showSlide(num) {
        let i;
        let slides = document.getElementsByClassName('mySlides');
        let dots = document.getElementsByClassName('dot');

        // Après le premier point, retour au premier et inversement
        if (num > slides.length) {
            slideIndex = 1;
        } else if (num < 1) {
            slideIndex = slides.length;
        }

        // Cache les slides précédents
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none';
        }

        // Dots couleur en fonction de la classe active
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(
                ' active',
                ''
            );
        }

        // Style
        slides[slideIndex - 1].style.display = 'flex';
        slides[slideIndex - 1].style.justifyContent = 'center';
        slides[slideIndex - 1].style.alignItems = 'center';

        dots[slideIndex - 1].className += ' active';
    }

    setInterval(() => {
        showSlide(slideIndex);
        console.log(slideIndex);
        slideIndex++;
    }, 1500);
}

// Gestion de la page Créer une caisse
if (
    document.body.contains(document.querySelector('.page-create-pot'))
) {
    var catName = document.querySelectorAll('.category');
    let titlePage = document.querySelector('#titlePage');
    // Récupération du dernier élément de l'URL correspondant au type de caisse selectionné
    var commonGiftPage = isInUrl('cadeau');
    var solidarityProjectPage = isInUrl('projet');
    var groupedExpensesPage = isInUrl('depense');

    // Get title by URL
    function getTitleByUrl() {
        let title = '';
        title = window.location.href.split('/');
        title = title[title.length - 1];
        // title = title.replaceAll('-', " ");

        if (commonGiftPage) {
            title =
                "Un cadeau <span class='text-secondary'>commun</span>";
        } else if (solidarityProjectPage) {
            title =
                "Un projet personnel <span class='text-secondary'>ou solidaire</span>";
        } else if (groupedExpensesPage) {
            title =
                "Une dépense <span class='text-secondary'>à plusieurs</span>";
        }
        titlePage.innerHTML = title;
        return title;
    }

    // Is in URL
    function isInUrl(urlPart) {
        return getTitleByUrl().indexOf(urlPart) !== -1;
    }

    // Ajout de style au type de caisse
    function activeCategoryStyle() {
        // Changement au clique
        const pages = [
            commonGiftPage,
            solidarityProjectPage,
            groupedExpensesPage,
        ];

        if (commonGiftPage) {
            catName[0].classList.add('focus-1');
            catName[3].classList.add('focus-1');
        } else if (solidarityProjectPage) {
            catName[1].classList.add('focus-2');
            catName[4].classList.add('focus-2');
        } else if (groupedExpensesPage) {
            catName[2].classList.add('focus-3');
            catName[5].classList.add('focus-3');
        }

        // Changement au hover

        // catName.forEach(cat => {
        //     for(let i = 1; i <= 5; i++){

        //         cat.addEventListener('mouseover', () => {
        //             // cat.classList.add('hover-' + i);
        //             // if ...activeCategoryStyle.apply.contains
        //         });
        //         cat.addEventListener('mouseout', () => {
        //             cat.classList.remove('hover-' + i);
        //         });
        //     }
        // });
    }

    // Functions calls
    activeCategoryStyle();
    getTitleByUrl();
}
