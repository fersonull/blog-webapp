import { swalToast, swalDelete, clickHandler } from '/app/helper/swal.js';

document.addEventListener('DOMContentLoaded', () => {

    const postContainer  = document.getElementById('card-post')

    
    clickHandler(postContainer, 'click', async (e) => {
        let confirmedDelete = false;

        console.log(e.target.id)

        if (e.target.id !== 'deleteBtn') {
            console.log('mali ang pindot')
            return
        }

        console.log(e.target.getAttribute('data-id'))

        const itemID = e.target.getAttribute('data-id');

        await swalDelete("Are you sure you want to delete this post?").then(e => {
            if (e.isDenied) {
                confirmedDelete = false
            }

            if (e.isConfirmed) {
                confirmedDelete = true
            }
        })

        if (!confirmedDelete) {
            console.log('canceled')
            return;
        }

        const response = await fetch("app/api/delete.php?delid=" + itemID)
        
        const data = await response.json()

        console.log(data)

        if (data.status === 'error') {
            swalToast(false, data.message, () => {
                return
            }, 2000)
        }

        swalToast(true, data.message, () => {
            location.refresh()
            return
        }, 1000)
    });

})
