import Swal from 'sweetalert2';

window.deleteConfirm = function(formId, text)
{
    Swal.fire({
        icon: 'warning',
        text: text,
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
}