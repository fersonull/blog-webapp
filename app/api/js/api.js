const form = document.getElementById('loginForm');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target)

    const response = await fetch('app/api/auth_login.php', {
        method: 'POST',
        body: formData
    })

    const data = await response.json();

    if (data.status === 'error') {
        Swal.fire({
            toast: true,
            title: '<p class="text-warning m-0">Oops!</p>',
            width: '22rem',
            timer: 2000,
            timerProgressBar: true,
            html: '<p class="m-0 fs-7">' + data.message +'</p>',
            position: 'top-end',
            showConfirmButton: false,
        })

        return;
    }
    
    Swal.fire({
        toast: true,
        title: '<p class="text-success m-0">Success!</p>',
        width: '22rem',
        timer: 1500,
        timerProgressBar: true,
        html: '<p class="m-0 fs-7">' + data.message +'</p>',
        position: 'top-end',
        showConfirmButton: false,
    }).then(() => {
        window.location.href = '/blog/';
    })

})