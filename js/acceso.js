var xhr = new XMLHttpRequest();
var formulario = document.getElementById("formularioRegistro");

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
});


function hola(){
    alert("hola");
}