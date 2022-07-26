jQuery('input[type=file]').change(function(){
    var filename = jQuery(this).val().split('\\').pop();
    let label = jQuery('label[for="file"]');
    label.css("background-color", "#25CC0B");
    label.find('span').text(filename);
});

const fecha = new Date();
jQuery('span[id="copyright"]').text(fecha.getFullYear())