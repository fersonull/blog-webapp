import { swalToast } from "/blog/app/helper/swal.js";

console.log('loaded')

const form = document.getElementById('uploadForm')

form.addEventListener('submit' , async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target)

    try {
        const respone = await fetch('app/api/upload_post.php', {
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
                window.location.href = '/blog/';
            }, 1000)
        }
    } catch (err) {
        console.log(err)
    }
})