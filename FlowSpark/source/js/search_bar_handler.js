const searchInput = document.getElementById('search');
const searchResults = document.getElementById('search-results');

const burger_input = document.querySelector(".burger_input");
const burger_results = document.querySelector(".burger_result");

burger_input.addEventListener('input', () => {
    const searchQuery = burger_input.value.trim();

if (searchQuery.length > 1) {
// Send AJAX request to server
const xhr = new XMLHttpRequest();
xhr.open('GET', `search.php?q=${searchQuery}`);
xhr.onload = () => {
    if (xhr.status === 200) {
        burger_results.innerHTML = xhr.responseText;
    }
};
xhr.send();
} else {
    burger_results.innerHTML = '';
}});

searchInput.addEventListener('input', () => {
const searchQuery = searchInput.value.trim();

if (searchQuery.length > 1) {
// Send AJAX request to server
const xhr = new XMLHttpRequest();
xhr.open('GET', `search.php?q=${searchQuery}`);
xhr.onload = () => {
    if (xhr.status === 200) {
        searchResults.innerHTML = xhr.responseText;
    }
};
xhr.send();
} else {
    searchResults.innerHTML = '';
}});