import { swalToast } from "/app/Helper/swal.js"

const form = document.getElementById('editProfileForm')
const imgPlaceholder = document.getElementById('imgPlaceholder')
const imageInput = document.getElementById('imageInp')

imageInput.addEventListener('change', (e) => {
    const file = e.target.files[0]
    if (file) {

        const imageUrl = URL.createObjectURL(file)

        console.log(imageUrl)

        imgPlaceholder.src = imageUrl
    }
})

form.addEventListener('submit', async (e) => {
    e.preventDefault()

    const formData = new FormData(e.target)

    try {
        const response = await fetch('/app/api/update_profile.php', {
            method: 'POST',
            body: formData
        })

        const data = await response.json()
    
        console.log(data)

        if (data.status === 'error') {
            swalToast(false, data.message, () => {
                return
            }, 2000)
        }

        if (data.status === 'success') {
            swalToast(true, data.message, () => {
                window.location.href = '/'
            }, 1000)
        }
    } catch (err) {
        console.log(err)
    }
})