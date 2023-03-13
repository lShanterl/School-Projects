const reset_button = document.querySelector('.reset-button');

const inputs = document.querySelectorAll('.resetable');

reset_button.addEventListener('click', () => {
    inputs.forEach(input => {
        input.defaultValue = '';
    });   
});
