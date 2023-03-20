let load_more = document.getElementById("load-more");
let form = document.getElementById("load-more-form");

load_more.addEventListener("click", (e) => {
    form.preventDefault();
    form.submit();
    console.log("load more clicked");

    });