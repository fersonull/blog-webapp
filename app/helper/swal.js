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