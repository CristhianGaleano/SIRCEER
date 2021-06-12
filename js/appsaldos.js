

$( document ).ready(function() {
    
    
    var formsaldo = document.getElementById("form-saldo-estudiante");
    var respuesta = document.getElementById("respuesta");
    var showdocu = document.getElementById("show-docu");
    var contenidoSaldo = document.getElementById("contenido-saldo");


formsaldo.addEventListener( 'submit', function(e){
    e.preventDefault();
    console.log('Soy el formulario de saldos');

    var datos = new FormData(formsaldo);
    console.log(datos.get('documento'))

    fetch('../php/saldos-estudiante.php',{
        method: 'POST',
        body: datos
    })

    .then( res => res.json() )
    .then( data => {
        console.log( data )
        if( data === 'error' ){
            respuesta.innerHTML = `
        <div class="alert alert-danger" role="alert">
            Ingrese un numero de documento
        </div>
        `,
        contenidoSaldo.innerHTML = ``
        }else{
             console.log(data.documento);
             respuesta.innerHTML = ``,
             contenidoSaldo.innerHTML = `
             
             `
        }
    } )
} )


});