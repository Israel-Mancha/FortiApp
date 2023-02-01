/*-------------VALIDACION DE CAMPOS VACIOS-------------- */
function validar() {
    if ($('#txtmatricula').val().length == 0) {
        alert('Por favor llene todos los campos');
        return false;
    }
    
    if ($('#txtnombre').val().length == 0) {
      alert('Por favor llene todos los campos');
      return false;
    }
    
    if ($('#txtap_pat').val().length == 0) {
        alert('Por favor llene todos los campos');
        return false;
    }

    if ($('#txtap_mat').val().length == 0) {
        alert('Por favor llene todos los campos');
        return false;
    }
    if ($('#txtcarrera').val().length == 0) {
        alert('Por favor llene todos los campos');
        return false;
    }
    if ($('#txttelefono').val().length == 0) {
        alert('Por favor llene todos los campos');
        return false;
    }
    if ($('#txtcontra').val().length == 0) {
        alert('Por favor llene todos los campos');
        return false;
    }
    if ($('#txtcurp').val().length == 0) {
        alert('Por favor llene todos los campos');
        return false;
    }
    if ($('#txtcuatri').val().length == 0) {
        alert('Por favor llene todos los campos');
        return false;
    }
    
}
/*-------------VALIDACION DE CAMPOS VACIOS-------------- */