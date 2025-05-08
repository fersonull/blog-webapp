export function swalToast(success = false, message, callback, duration = 2000) {
    Swal.fire({
        toast: true,
        title: success ? '<p class="text-success m-0">Success!</p>' : '<p class="text-danger m-0">Oops!</p>',
        html: '<p class="m-0 fs-7">' + message +'</p>',
        width: '22rem',
        timer: duration,
        timerProgressBar: true,
        position: 'top-end',
        showConfirmButton: false,
    }).then(() => {
        callback()
    })
}

export function swalDelete(message) {
    return Swal.fire({
        icon: 'warning',
        title: '<p class="text-warning m-0 poppins-regular">Delete post</p>',
        html: '<p class="m-0 fs-7">' + message +'</p>',
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#0d6efd',
        // customClass: {
        //     popup: 'swalRoundedNone',
        //     confirmButton: 'swalRoundedNone',
        //     cancelButton: 'swalRoundedNone'
        // }
    })
}

export function clickHandler(parent, event, callback) {
    parent.addEventListener(event, (e) => {
        callback(e)
    })
}