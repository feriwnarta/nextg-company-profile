
localStorage.setItem('base_url', 'http://localhost/nextg')

document.addEventListener('DOMContentLoaded', function() {
    // Mendapatkan URL halaman saat ini
    let currentUrl = window.location.href;


    // Loop melalui setiap link pada navigasi
    $('.nav-link').each(function() {
        let linkUrl = $(this).attr('href');


        // Jika URL link sama dengan URL halaman saat ini
        if (currentUrl.indexOf(linkUrl) > -1) {
            // Tambahkan class active ke link
            $(this).addClass('active');
        }
    });
});



$('.contact-us-button').click(function () {
    window.location.href = 'contactus';
});


$('#form-contactus').submit(function () {


    var name = $('#name').val();
    var email = $('#email').val();
    var subject = $('#subject').val();
    var projectDetail = $('#project-detail').val();
    var attachment = $('#attachment').prop('files')[0];


    let file = new FormData();
    file.append('name', name);
    file.append('email', email);
    file.append('subject', subject);
    file.append('projectDetail', projectDetail);
    file.append('attachment', attachment);


    $.ajax(
        {
            url: localStorage.getItem('base_url') + '/contactus/offering',
            method: 'POST',
            data: file,
            processData: false,
            contentType:false,
            cache: false,
            success: function (data) {

            }
        }
    );



});





