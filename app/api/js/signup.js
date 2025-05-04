const form = document.getElementById('signupForm')

console.log('ok')

form.addEventListener('submit' , async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target)

    try {
        const respone = await fetch('app/api/auth_register.php', {
            method: 'POST',
            body: formData
        })

        const data = await respone.json();
    
        console.log(data)
    } catch (err) {
        console.log(err)
    }
})