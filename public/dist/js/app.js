const BASE_URL = $('meta[name="base-url"]').attr('content');
const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// set header ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': CSRF_TOKEN
    }
});


// remove is-valid and is-invalid class
function removeValidations() {
    $('.is-valid').removeClass('is-valid');
    $('.is-invalid').removeClass('is-invalid');
    $('#form-store').trigger('reset');
    $('.invalid-feedback').remove();
}

// set is-valid class
function setIsValid(element) {
    $('.invalid-feedback').remove();
    $(element).addClass('is-valid').removeClass('is-invalid');
}

// init sweetalert2
const NotifAlert = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

const successNotif = (message) => {
    NotifAlert.fire({
        icon: 'success',
        title: message
    });
}

const errorNotif = (message) => {
    NotifAlert.fire({
        icon: 'error',
        title: message
    });
}

