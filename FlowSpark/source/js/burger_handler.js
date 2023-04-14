const burger_button = document.querySelector('.burger');
const burger_menu = document.querySelector('.burger_menu');

burger_button.addEventListener('click', () => {
    burger_button.classList.toggle('active');
    burger_menu.classList.toggle('active');
    
})