

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
             <div class="col-md-3 mt-3">
                <label class="form-gorup" for="documento">Documento</label>
                <input class="form-control" type="text" value="${data.documento}" placeholder="Numero de documento" name="documento" readonly="">
             </div>
             <div class="col-md-4 mt-3">
                <label class="form-gorup" for="nombre">Nombre</label>
                <input class="form-control" type="text" value="${data.primer_nombre}  ${data.segundo_nombre} ${data.primer_apellido} ${data.segundo_apellido} " placeholder="Nombre" name="nombre" readonly="">
             </div>
             <div class="col-md-6 mt-3">
                <label class="form-gorup" for="saldo">Saldo</label>
                <input class="form-control" type="text" value="${data.saldo}" placeholder="Saldo" name="saldo" readonly="">
             </div>
             `
        }
    } )
} )


});