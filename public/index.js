const toastParrent = document.getElementById('toastNotifications');

const setToast = ({ 
    title = 'Toast Notification', 
    description = 'Someone has trigger the toast notification.', 
    type = 'info'
}) => {
    const toast = `<span class="tst-close" onclick="closeToast(event)">
    <span class="material-symbols-outlined">close</span>
    </span>
    <div class="tst-icon">
        <span class="material-icons">${
            type === 'warning' ? 'warning' :
            type === 'success' ? 'check_circle' :
            type === 'danger' ? 'error' : 'info'
        }</span>
    </div>
    <div class="tst-details">
        <h3 class="title">${title}</h3>
        <p class="description">${description}</p>
    </div>
    <div class="tst-progress-bar"></div>`;

    const toastElement = document.createElement('div');
    toastElement.classList.add('toast', `${type}`, 'show');

    toastElement.innerHTML = toast;
    try {
        toastParrent.append(toastElement);
        setTimeout(() => {
            toastElement.classList.replace('show', 'hide');
            setTimeout(() => {
                toastElement.remove();
            }, 400);
        }, 5000);
    } catch (error) {
        console.error('Something went wrong while set the toast.', error.message)
    }
}