const closeToast = (event) => {
    const parent = event.target.parentElement;
    parent.classList.replace('show', 'hide');
    setTimeout(() => {
        parent.remove();
    }, 400);
}