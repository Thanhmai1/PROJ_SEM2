document.getElementById('login-button').addEventListener('click', function() {
    document.getElementById('login-modal').style.display = 'block';
});

document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Kiểm tra thông tin đăng nhập (ví dụ: gửi yêu cầu đến server)
    // Ở đây, giả sử đăng nhập luôn thành công và lưu trữ tên người dùng
    if (username && password) {
        // Lưu trữ tên người dùng vào sessionStorage
        sessionStorage.setItem('username', username);

        // Cập nhật giao diện
        document.getElementById('login-modal').style.display = 'none';
        document.getElementById('login-button').style.display = 'none';
        document.getElementById('user-name').style.display = 'inline';
        document.getElementById('user-name').textContent = 'Hello, ' + username;
    }
});

// Kiểm tra nếu người dùng đã đăng nhập trước đó
document.addEventListener('DOMContentLoaded', function() {
    var username = sessionStorage.getItem('username');
    if (username) {
        document.getElementById('login-button').style.display = 'none';
        document.getElementById('user-name').style.display = 'inline';
        document.getElementById('user-name').textContent = 'Hello, ' + username;
    }
});
