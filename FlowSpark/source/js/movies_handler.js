const genre = document.getElementById('genre');
const rating = document.getElementById('rating');
const order = document.getElementById('order');
const submitButton = document.getElementById('filter-submit');

submitButton.addEventListener('click', () => {
const searchResults = document.querySelector('.movies-wrapper');

// Send AJAX request to server
const xhr = new XMLHttpRequest();
xhr.open('GET', `refresh_movies.php?genre=${genre.value}&rating=${rating.value}`);
xhr.onload = () => {
    if (xhr.status === 200 && xhr.responseText != 'false') {
        searchResults.innerHTML = xhr.responseText;
    }
};
xhr.send();

});