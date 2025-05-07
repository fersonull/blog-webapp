export function swalToast(success = false, message, callback, duration = 2000) {
    Swal.fire({
        toast: true,
        title: success ? '<p class="text-success m-0">Success!</p>' : '<p class="text-primary m-0">Oops!</p>',
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
        title: '<p class="text-primary m-0">Delete</p>',
        html: '<p class="m-0 fs-7">' + message +'</p>',
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#d33', 
    })
}

export function clickHandler(parent, event, callback) {
    parent.addEventListener(event, (e) => {
        callback(e)
    })
}