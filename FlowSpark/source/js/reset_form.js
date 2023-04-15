const reset_button = document.querySelector('input[type="reset"]');

const inputs = document.querySelectorAll('input[type="text"], input[type="email"]');

reset_button.addEventListener('click', () => {
    inputs.forEach(input => {
        input.defaultValue = '';
    });   
});
