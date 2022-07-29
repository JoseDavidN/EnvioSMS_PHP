jQuery('input[type=file]').change(function () {
    var filename = jQuery(this).val().split('\\').pop();
    let label = jQuery('label[for="file"]');
    label.css("background-color", "#25CC0B");
    label.find('span').text(filename);
});

$('#filtroOption1').click(function () {
    let filtro = $('.filtro')
    filtro.css('display', 'flex')
})
$('#filtroOption2').click(function () {
    let filtro = $('.filtro')
    filtro.css('display', 'none')
})

const fecha = new Date();
jQuery('span[id="copyright"]').text(fecha.getFullYear())

if(fecha.getDay() == fecha.getDay(30) && fecha.getHours() >= fecha.getHours(02)){
    let limit = $('#limit')
    limit.val('cumplido')
}

let alert_success = $("#message").text()
let alert_error = $('#alerta_error').text()
$('#content').ready(function(){
    if (alert_success != ''){
        Swal.fire({
            icon: 'success',   
            text: alert_success
        })
    }else if(alert_error != ''){
        Swal.fire({
            icon: 'error',   
            text: alert_error
        })
    }
})