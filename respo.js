document.getElementById('showSignUp').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('Loginform').style.display = 'none';
    document.getElementById('SignUpform').style.display = 'block';
});

document.getElementById('showLogin').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('SignUpform').style.display = 'none';
    document.getElementById('Loginform').style.display = 'block';
});
