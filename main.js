nav.setRoute('/', 'Login', function() {

    ctx.setState({userrole: 'guest'})
    app.innerHTML = render('main');

    $('#help')[0].onclick = (e) => route('/help');

    $('#submit')[0].onclick = async function(e) {
        let email = $('#email')[0];
        let remember = $('#remember')[0];
        if (email.value == "" || !validateEmail(email.value)) {
            email.classList.add('border-danger');
            return;
        } else {
            email.classList.remove('border-danger');
        }

        if (remember.checked == true) {
            // expire in 2days
            // ctx.setState({})
        }

        // let body = new FormData();
        // body.append('email', email.value);
        // let resp = await fetch('api/verifyuser.php', {body: body, method: 'POST'});
        // resp.json();
        // if (resp.status == true) {
        //     ctx.setState({auth: true, user: email.value})
            nav.route('/verify');
        // }

    }

});

nav.setRoute('/verify', 'Verify', function() {

    app.innerHTML = render('verify');

    $('#submit')[0].onclick = async function() {
        let token = $('#token')[0];
        if (token.value == "" || !validateToken(token.value)) {
            token.classList.add('border-danger');
            return;
        } else {
            token.classList.remove('border-danger');
        }

        // let body = new FormData();
        // body.append('email', email.value);
        // let resp = await fetch('api/verifyuser.php', {body: body, method: 'POST'});
        // resp.json();
        // if (resp.status == true) {
        //     ctx.setState({auth: true, user: email.value})
            ctx.setState({role: 'admin'});
            nav.route('/dashboard');
        // }
    }
})

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateToken(token) {
    const re = /^\d{6}$/;
    return re.test(String(token).toLowerCase());
}