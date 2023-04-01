const checkboxes = document.querySelectorAll('input[type="checkbox"]');

const deselect = document.querySelector('.deselect');

const next = document.querySelector('.next');

const title = document.querySelector('#title').innerHTML;
const play_date = document.querySelector('#date').innerHTML;

const selected = new Set();
const ids = new Set();
deselect.addEventListener('click', () => {
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
    selected.clear();
});

console.log(title, play_date);


checkboxes.forEach(checkbox => {
    addEventListener('change', () => {
        if(checkbox.checked)
        {
            selected.add(checkbox.value);
            ids.add(checkbox.id);

        }
        else
        {
            selected.delete(checkbox.value);
            ids.delete(checkbox.id);
        }
    })
});

next.addEventListener('click', () => {
    if(selected.size != 0) {
        const seats_id = Array.from(ids).join(',');
        const seatsString = Array.from(selected).join(',');
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../php/save_session.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(`seats=${encodeURIComponent(seatsString)}&title=${encodeURIComponent(title)}&date=${encodeURIComponent(play_date)}&seats_id=${encodeURIComponent(seats_id)}`);
        window.location.href = '../php/payment.php';
    }

});
