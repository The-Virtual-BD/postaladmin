$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


});

function sidebartoggle() {
    $('#sidemenutoggle button').toggleClass('rotate-180');
    $('#sidebar').toggleClass('w-52', 'w-64');
    $('#siteLogo').toggleClass('hidden', 'flex');
    $('.sidelinktext').toggleClass('hidden');
    $('.sidebarmenu li a').toggleClass('justify-center');
    $('.sidebarmenu li').toggleClass('mr-3');
    $('.logo-title').toggleClass('hidden');
    $('#settingmenu').toggleClass('w-52').toggleClass('w-20');
    $('.sidenav a').toggleClass('justify-center');
}
