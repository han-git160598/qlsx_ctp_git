$(document).ready(function() {
    var username = JSON.parse(localStorage.getItem('account_customer'));
    if (username == null || username == '') {
        window.location.href = urlserver + 'admin';
    }
});