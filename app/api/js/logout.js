import { swalToast, swalDelete, swalLogOut } from "/app/Helper/swal.js"

document.addEventListener('DOMContentLoaded', () => {
    let confirmed = false; 

    const logoutBtn = document.getElementById('logoutBtn')

    console.log(logoutBtn)

    logoutBtn.addEventListener('click', async () => {
        await swalLogOut('are you sure?').then((e) => {
            if (e.isDenied) {
                confirmed = false
            }

            if (e.isConfirmed) {
                confirmed = true
            }
        })

        if (!confirmed) {
            console.log('hindi')
            return;
        }

        const response = await fetch('/app/api/logout.php')

        console.log('logged out')

        window.location.href = '/'

    })

})  