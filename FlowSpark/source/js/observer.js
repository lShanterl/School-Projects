    const target = document.querySelector('tbody');
    const observer = new MutationObserver(function(mutationsList, observer) {
        RefreshButtons();
    });
    const config = { attributes: true, childList: true, subtree: true };
    observer.observe(target, config);
