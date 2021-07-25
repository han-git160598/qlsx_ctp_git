function logout() {
    localStorage.removeItem('account_customer');
    window.location.href = urlserver + 'admin';
}