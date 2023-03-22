const searchInput = document.getElementById('search');
const searchResults = document.getElementById('search-results');

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