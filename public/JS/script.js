document.addEventListener('DOMContentLoaded', function () {
    let form = document.getElementById('contactForm');
    let statusDiv = document.getElementById('formStatus');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        statusDiv.textContent = '';
        statusDiv.style.color = '';

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const subject = document.getElementById('subject').value.trim();
        const message = document.getElementById('message').value.trim();


        statusDiv.textContent = 'Thank you for your message!';
        statusDiv.style.color = 'green';
        form.reset();
    });
});
