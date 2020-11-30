nav.setRoute('/dashboard', 'Dashboard', function() {
    if (ctx.state.role == 'admin') {
        admin();
    } else if (ctx.state.role == 'user') {
        user();
    }
});

function admin() {
    app.innerHTML = render('admin-dashboard');
}

function user() {

}