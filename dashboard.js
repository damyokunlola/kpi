nav.setRoute('/dashboard', 'Dashboard', function() {
    if (ctx.state.role == 'admin') {

    } else if (ctx.state.role == 'user') {

    }
});

function admin() {

}

function user() {
    
}