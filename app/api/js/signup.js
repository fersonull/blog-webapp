import { swalToast } from "/app/Helper/swal.js";

const form = document.getElementById('signupForm')

form.addEventListener('submit' , async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target)

    try {
        const respone = await fetch('/app/api/auth_register.php', {
            method: 'POST',
            body: formData
        })

        const data = await respone.json();
    
        console.log(data)

        if (data.status === 'error') {
            swalToast(false, data.message, () => {
                return
            }, 2000)
        }

        if (data.status === 'success') {
            swalToast(true, data.message, () => {
                window.location.href = '/login.php';
            }, 1000)
        }
    } catch (err) {
        console.log(err)
    }
})