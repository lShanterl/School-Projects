const loadButton = document.querySelector('#load-more');
const moviesWrapper = document.querySelector('.movies-wrapper');

loadButton.addEventListener('click', () => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'load_more.php');
    xhr.onload = () => {
        if (xhr.status === 200) {
            moviesWrapper.innerHTML += xhr.responseText;
            if(xhr.responseText === ''){
                loadButton.style.display = 'none';
            }
        }
    };
    xhr.send();

});