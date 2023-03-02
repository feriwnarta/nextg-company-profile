localStorage.setItem('base_url', 'http://localhost/nextg')

document.addEventListener('DOMContentLoaded', function() {
    // Mendapatkan URL halaman saat ini
    let currentUrl = window.location.href;


    // Loop melalui setiap link pada navigasi
    $('.nav-link').each(function() {
        let linkUrl = $(this).attr('href');

        // $(this).removeClass('active');

        currentUrl = currentUrl.split('/');
        currentUrl = currentUrl.pop();



        if(currentUrl == linkUrl) {
            $(this).addClass('active');
        } else if (currentUrl == '') {
            $(this).addClass('active');
            return false;
        }

    });



});

$('.contact-us-button').click(function () {
    window.location.href = 'contactus';
});



$('#form-contactus').submit(function (e) {

    var name = $('#name').val();
    var email = $('#email').val();
    var subject = $('#subject').val();
    var projectDetail = $('#project-detail').val();
    var attachment = $('#attachment').prop('files')[0];


    let file = new FormData();
    file.append('name', name);
    file.append('email', email);
    file.append('subject', subject);
    file.append('project_detail', projectDetail);
    file.append('attachment', attachment);

    e.preventDefault();


    $.ajax(
        {
            url: localStorage.getItem('base_url') + '/contactus/offering',
            method: 'POST',
            data: file,
            processData: false,
            contentType:false,
            cache: false,
            beforeSend: function(){
                $('#btn-submit-form').html('<div class="spinner-border spinner-border-sm" role="status">\n' + '</div>');
            },
            success: function (data) {
                if(data != null || data != undefined) {
                    alertSuccess();
                } else {

                }

            },
            complete: function(){
                e.stopPropagation();
            },
        }
    );


});

function alertSuccess() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Kirim Requirement Project Berhasil',
        showConfirmButton: true,
    }).then((rs) => {
        if(rs.isConfirmed) {
            location.reload();
        }
    });
}





