const yearSpan = document.getElementById('currentYear');
yearSpan.textContent = new Date().getFullYear();

const navToggle = document.getElementById('menu-toggle');
const navMenu = document.getElementById('navbar');

navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('show');
});

//contacts_form validation;
