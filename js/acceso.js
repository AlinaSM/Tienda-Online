var xhr = new XMLHttpRequest();
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

/*
formulario.addEventListener('submit',(ev)=>{
    var form  =  new FormData(formulario);
    xhr.open('POST','php/controller/pw3UsuariosControlador.php');
    
    xhr.onload   = () => {
        if(xhr.status === 200){
            console.log('Conexion establecida!');
            console.log(JSON.parse(xhr.responseText));
        }else{
            console.log('Error en la peticion: '+xhr.status);
        }
    }
    xhr.send(form);
    ev.preventDefault();
});*/
