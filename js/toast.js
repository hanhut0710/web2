function showToast(message, type = "success") {
    const container = document.querySelector('.toast-container') || createToastContainer();
    const toast = document.createElement('div');
    toast.className = `toast-message toast-${type}`;
  
    const icon = document.createElement('i');
    if (type === 'success') {
      icon.className = 'fas fa-check-circle';
    } else if (type === 'fail') {
      icon.className = 'fas fa-times-circle';
    } else if (type === 'warning') {
      icon.className = 'fas fa-exclamation-circle';
    }
  
    const text = document.createElement('span');
    text.className = 'toast-text';
    text.textContent = message;
  
    toast.appendChild(icon);
    toast.appendChild(document.createTextNode(" "));
    toast.appendChild(text);
    container.appendChild(toast);
  
    // Sau 3 giây, áp dụng hiệu ứng slide-out và xóa thông báo
    setTimeout(() => {  
      toast.classList.add('slide-out');
      setTimeout(() => {
        toast.remove();
      }, 300);  // Chờ thời gian hiệu ứng slide-out kết thúc (300ms)
    }, 3000);
  }
  
  function createToastContainer() {
    const container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
    return container;
  }
  