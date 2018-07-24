var formulario = document.getElementById("formularioRegistro");

function validarNombreUsuario(strNombre){
    var xhttp = new XMLHttpRequest();
    
    if(strNombre.length == 0){
        document.getElementById('txtHint').innerHTML = ""; // Input al agregar mensaje de validacion
        return;
    }
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('txtHint').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","php/controller/pw3UsuariosControlador.php?q="+strNombre,true);
    xhttp.send();
}
