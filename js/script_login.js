/*---------VALIDACION DE LA MATRICULA---------- */
function matricula(e){
    //Permite solo 8 caracteres
    $(document).ready(function () {
        $('input#txtmatricula')
            .keypress(function (event) {
            if (event.which < 48 || event.which > 57 || this.value.length === 8) {
                return false;
            }
            });
        });
}
/*---------VALIDACION DE LA MATRICULA---------- */


/*-------------VALIDACION DEL CURP-------------- */
function mayus(e) {
    //Convierte letras en mayusculas
    e.value = e.value.toUpperCase();

    //Permite solo 18 caracteres
    $(document).ready(function () {
        $('input#txtcontra')
            .keypress(function (event) {
            if (this.value.length === 18) {
                return false;
            }
            });
        });
}

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
/*-------------VALIDACION DEL CURP-------------- */