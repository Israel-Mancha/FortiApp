$(document).on('click','#confirmar',function(){
    let id = $(".card.active").data('id');
    $.ajax({
        type: "post",
        url: "insertar_detalle.php",
        data: "id=" + id,
        success: function (response) {
            response=JSON.parse(response);
            if(response.status === 'success'){
            window.location.href="ventana_emergente.php";
            }
            else{
                alert("No puedes seleccionar más de un producto");
            }   
        }
    });
});

$(document).on('click', '.card', function(){
    if($(this).hasClass('active')){
        $(this).removeClass('active');
    }
    else{
     $('.card').removeClass('active');
    $(this).addClass('active','');
    }
    let cards = $('.card.active').length; 
    if(cards > 0){
        $('#confirmar').parent().show();
        $('#ver_todo').parent().hide();
    }
    else{
        $('#confirmar').parent().hide();
        $('#ver_todo').parent().show();
    }
    
});