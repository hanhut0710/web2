function showNotification(message, type) {
    const notification = document.getElementById('notification');
    const notificationMessage = document.getElementById('notification-message');
    const icon = notification.querySelector('i');

    if(type === 'success') {
        icon.className = 'fa-solid fa-check-circle';
    } else if (type === 'error') {
        icon.className = 'fa-solid fa-exclamation-circle';
    }

    notificationMessage.textContent = message;

    notification.classList.remove('hidden', 'error');
    if (type === 'error') {
        notification.classList.add('error');
    }

    notification.classList.remove('hidden');

    setTimeout(() => {
        notification.classList.add('hidden');
    }, 3000);
}

function closeNotification() {
    const notification = document.getElementById('notification');
    notification.classList.add('hidden');
}

let sidebar_tab = document.querySelectorAll(".sidebar-list-item.tab-content");
sidebar_tab.forEach(item => {
    item.addEventListener('click', function() {
        
        sidebar_tab.forEach(tab => tab.classList.remove('active'))
        item.classList.add('active');
    })
})