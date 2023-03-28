const button = document.querySelector('#categories');
const categories = document.querySelector('.category-list');

button.addEventListener('click', () => {
    categories.classList.toggle('show');
});