import { swalToast } from "/app/Helper/swal.js"

const form = document.getElementById('loginForm')

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target)

    try {
        const response = await fetch('/app/api/auth_login.php', {
            method: 'POST',
            body: formData
        })
    
        const data = await response.json();

        console.log(data)
        // console.log(typeof(data.status))
    
        if (data.status === 'error') {
            swalToast(false , data.message, () => {
                return
            }, 2000)
        }
    
        if (data.status === 'success') {
            swalToast(true , data.message, () => {
                window.location.href = document.referrer
                return
            }, 1000)
        }
    } catch (err) {
        console.log(err)
    }

})