
// get elements

// save to edit programa
const tsnies = document.querySelector('#e-pro-snies')
const tnombre = document.querySelector('#e-pro-nombre')
const tvalor = document.querySelector('#e-pro-valor_semestre')
const tsemestres = document.querySelector('#e-pro-semestres')
const tnaca = document.querySelector('#e-pro-nivel_academico')
const tjornada = document.querySelector('#e-pro-jornada')
const tuniversity = document.querySelector('#e-pro-university')
const formEditPrograma = document.querySelector('#form-editar-programa')

    
function obtenerDataEditarPrograma(id){
        
    // console.log(id);
    fetch('../php/getDataEditarPrograma.php?id='+id)
    .then(res => res.json())
    .then( data => {

        // console.log( data) ;

       
        

        // console.log('Options: ' + selectNAaca[0].text);
        // console.log('NA:'+ data.nivel_academico);
        // console.log(tsnies);

        


        // 
        tsnies.value = data.snies
        tnombre.value = data.nombre
        tvalor.value = data.costo_semestre
        tsemestres.value = data.cantidad_semestre
        
        setOptionNA(selectNAaca,data.nivel_academico,tnaca)
        setOptionNA(selectJornada,data.jornada,tjornada)


    })
}

function setOptionNA(object, na,tnaca) {
    // console.log('na:' +na);
    for (const key in object) {
        // console.log(data.nivel_academico_id);
        // console.log(object[key].text);
            if(object[key].text == na) {
                // console.log('is true');
                tnaca.selectedIndex = key
                return;
            }
    }
}

let errors = 0

        // 

        $('table.display').DataTable();

        $('#example').DataTable({
        //para cambiar el lenguaje a español
            "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast":"Último",
                        "sNext":"Siguiente",
                        "sPrevious": "Anterior"
                     },
                     "sProcessing":"Procesando...",
                }
        });     
















    

$(document).ready(function() {

        




        formEditPrograma.addEventListener('submit', e => {
            e.preventDefault();
            selectNAaca = document.getElementById('e-pro-nivel_academico').options
            selectJornada = document.getElementById('e-pro-jornada').options
            // console.log(selectNAaca);
        
            var vtsnies = tsnies.value.trim()
            var vtnombre = tnombre.value.trim()
            var vtvalor = tvalor.value.trim()
            var vsemestres = tsemestres.value.trim()
            var vnaca = tnaca.value.trim()
            var vjornada = tjornada.value.trim()
            var vuniversity = tuniversity.value.trim()
        
            checkInputs( vtsnies,vtnombre,vtvalor,vsemestres,vnaca,vjornada,vuniversity );
            saveRecordEditoPrograma(vtsnies,vtnombre,vtvalor,vsemestres,vnaca,vjornada,vuniversity)
            errors = 0
        })
        
        
        function checkInputs( vtsnies,vtnombre,vtvalor,vsemestres,vnaca,vjornada,vuniversity ) {
            
        
            if (vtsnies === '' || vtsnies.length <= 2) {
                // console.log('not success');
                setErrorFor(vtsnies, 'Error: Campo vacio o inferior a tres caracteres');
                errors++
            }else{
                setSuccessFor(vtsnies, 'Datos validado con exito')
            }
        
        
            if (vtnombre === '' || vtnombre.length <= 2) {
                // console.log('not success');
                setErrorFor(vtnombre, 'Error: Campo vacio o inferior a tres caracteres');
                errors++
            }else{
                setSuccessFor(vtnombre, 'Datos validado con exito')
            }
        
            if (vtvalor === '' || vtvalor.length <= 2) {
                // console.log('not success');
                setErrorFor(vtvalor, 'Error: Campo vacio o inferior a tres caracteres');
                errors++
            }else{
                setSuccessFor(vtvalor, 'Datos validado con exito')
            }
        
            
          
            
        
            if (errors) {
                console.log(`Usted tiene ${errors} errores para corregir`);
            }
        
        }
        
        
        
        
        function saveRecordEditoPrograma(vtsnies,vtnombre,vtvalor,vsemestres,vnaca,vjornada,vuniversity) {
            
        
            if(errors == 0) {
        
                const data = new FormData()
                data.append('snies',vtsnies)        
                data.append('programa',vtnombre)        
                data.append('valor_semestre',vtvalor)        
                data.append('semestres',vsemestres)        
                data.append('nivel_aca',vnaca)        
                data.append('university',vuniversity)        
                data.append('jornada',vjornada)
                
                fetch('../php/editar-programa.php', {
                    method: 'POST',
                    body: data
                })
        
                    .then( res => res.json() )
                    .then( data => {
                        // console.log(data);  
        
                        $("body").overhang({
                            type: "success",
                            message: "Registro exitoso! en segundos seras redirigido",
                            callback: function(){
                              window.location.href="buscar-programa.php";
                            }
                          });
                    } )
                    .catch(err => {
                        $("body").overhang({
                            type: "error",
                            message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
                            //closeConfirm: true
                          });                
                    })
        
            }
        }
        
        
        function setErrorFor(input, message) {
        
            const parent = input.parentElement
            // console.log(parent);
            const small = parent.querySelector('#spam-n-success')
            parent.classList = 'form-group checked'
            small.classList = 'check-n-success'
            // const icon = document.querySelector('#icon-n-success')
            // icon.classList = 'fas fa-check'
            small.innerText = message
        }
        
        function setSuccessFor(input, message) {
        
            console.log('success');
        }
        
        
        
        
        
        



























    //Cuando se envie el form del login
        //bin(evento que ejecuta una funcion): captura el evento- en este caso cuando haga el form submit, podria ser tambien 'clik etc.'
        $('#formulario-programa').bind("submit", function() {
           
            $.ajax({
                
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                beforeSend: function(){
                    $("#formulario-programa button[type=submit]").html("Enviando...");
                },
                //Recibe la respuesta: response
                success: function(response){
                    console.log(response);
                                    if (response.estado == 'true') {
                                        console.log("It's true");
    
    $("body").overhang({
      type: "success",
      message: "Registro exitoso! en segundos seras redirigido",
      callback: function(){
        window.location.href="buscar-programa.php";
      }
    });
    //En caso de fallar el insert
                    }else{
                        console.log("It's false");
    
    $("body").overhang({
      type: "error",
      message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
      //closeConfirm: true
    });
    $("#formulario-programa button[type=submit]").html("Enviando...");
    
                    }
    $("#formulario-programa button[type=submit]").html("Ingresar");

                },
                error: function(){
                    alert("Error");


                }
            });


            //Impide el envio del formulario
            return false; 
        });







/****************************************************************************************************************************/



//Cuando se envie el form del login
        //bin(evento que ejecuta una funcion): captura el evento- en este caso cuando haga el form submit, podria ser tambien 'clik etc.'
        $('#formulario_new_estu').bind("submit", function() {
           
            $.ajax({
                
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                beforeSend: function(){
                    $("#formulario_new_estu button[type=submit]").html("Enviando...");
                },
                //Recibe la respuesta: response
                success: function(response){
                    console.log(response);
                                    if (response.estado == 'true') {
                                        console.log("It's true");
    
    $("body").overhang({
      type: "success",
      message: "Registro exitoso! en segundos seras redirigido",
      callback: function(){
        window.location.href="buscar-estudiantes.php";
      }
    });
    //En caso de fallar el insert
                    }else{
                        console.log("It's false");
    
    $("body").overhang({
      type: "error",
      message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
      //closeConfirm: true
    });
    $("#formulario_new_estu button[type=submit]").html("Enviando...");
    
                    }
    $("#formulario_new_estu button[type=submit]").html("Ingresar");

                },
                error: function(){
                    alert("Error");


                }
            });


            //Impide el envio del formulario
            return false; 
        });









/********************************** NUEVA INSTITUCION ************************************************************/

 //Cuando se envie el form del login
        //bin(evento que ejecuta una funcion): captura el evento- en este caso cuando haga el form submit, podria ser tambien 'clik etc.'
        $('#formulario-institucion').bind("submit", function() {
           
            $.ajax({
                
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                beforeSend: function(){
                    $("#formulario-institucion button[type=submit]").html("Enviando...");
                },
                //Recibe la respuesta: response
                success: function(response){
                    console.log(response);
                                    if (response.estado == 'true') {
                                        console.log("It's true");
    
    $("body").overhang({
      type: "success",
      message: "Registro exitoso! en segundos seras redirigido",
      callback: function(){
        window.location.href="buscar-institucion.php";
      }
    });
    //En caso de fallar el insert
                    }else{
                        console.log("It's false");
    
    $("body").overhang({
      type: "error",
      message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
      //closeConfirm: true
    });
    $("#formulario-institucion button[type=submit]").html("Enviando...");
    
                    }
    $("#formulario-institucion button[type=submit]").html("Ingresar");

                },
                error: function(){
                    alert("Error");


                }
            });


            //Impide el envio del formulario
            return false; 
        });







/********************************** MATRICULAR ************************************************************/

 //Cuando se envie el form del login
        //bin(evento que ejecuta una funcion): captura el evento- en este caso cuando haga el form submit, podria ser tambien 'clik etc.'
        $('#formulario-m-matricular').bind("submit", function() {
           
            $.ajax({
                
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                beforeSend: function(){
                    $("#formulario-institucion button[type=submit]").html("Enviando...");
                },
                //Recibe la respuesta: response
                success: function(response){
                    console.log(response);
                                    if (response.estado == 'true') {
                                        console.log("It's true");
    
    $("body").overhang({
      type: "success",
      message: "Registro exitoso! en segundos seras redirigido",
      callback: function(){
        window.location.href="mod-matricula.php";
      }
    });
    //En caso de fallar el insert
                    }else{
                        console.log("It's false");
    
    $("body").overhang({
      type: "error",
      message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
      //closeConfirm: true
    });
    $("#formulario-institucion button[type=submit]").html("Enviando...");
    
                    }
    $("#formulario-institucion button[type=submit]").html("Ingresar");

                },
                error: function(){
                    alert("Error");


                }
            });


            //Impide el envio del formulario
            return false; 
        });







/********************************** ASIGNAR NOTA SEMESTRE ************************************************************/

 //Cuando se envie el form del login
        //bin(evento que ejecuta una funcion): captura el evento- en este caso cuando haga el form submit, podria ser tambien 'clik etc.'
        $('#formulario-m-asignar-nota').bind("submit", function() {
           
            $.ajax({
                
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                beforeSend: function(){
                    $("#formulario-m-asignar-nota button[type=submit]").html("Asignando...");
                },
                //Recibe la respuesta: response
                success: function(response){
                    console.log(response);
                                    if (response.estado == 'true') {
                                        console.log("It's true");
    
    $("body").overhang({
      type: "success",
      message: "Registro exitoso! en segundos seras redirigido",
      callback: function(){
        window.location.href="mod-matricula.php";
      }
    });
    //En caso de fallar el insert
                    }else{
                        console.log("It's false");
    
    $("body").overhang({
      type: "error",
      message: "Ha ocurrido un error! Es posible que haya incrongruencia en los datos...",
      //closeConfirm: true
    });
    $("#formulario-m-asignar-nota button[type=submit]").html("Asignando...");
    
                    }
    $("#formulario-m-asignar-nota button[type=submit]").html("Actualizar");

                },
                error: function(){
                    alert("Error");


                }
            });


            //Impide el envio del formulario
            return false; 
        });









/********************************** NUEVA SEDE ************************************************************/

 //Cuando se envie el form del login
        //bin(evento que ejecuta una funcion): captura el evento- en este caso cuando haga el form submit, podria ser tambien 'clik etc.'
        $('#formulario-sede').bind("submit", function() {
           
            $.ajax({
                
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                beforeSend: function(){
                    $("#formulario-sede button[type=submit]").html("Enviando...");
                },
                //Recibe la respuesta: response
                success: function(response){
                    console.log(response);
                                    if (response.estado == 'true') {
                                        console.log("It's true");
    
    $("body").overhang({
      type: "success",
      message: "Registro exitoso! en segundos seras redirigido",
      callback: function(){
        window.location.href="buscar-sede.php";
      }
    });
    //En caso de fallar el insert
                    }else{
                        console.log("It's false");
    
    $("body").overhang({
      type: "error",
      message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
      //closeConfirm: true
    });
    $("#formulario-sede button[type=submit]").html("Enviando...");
    
                    }
    $("#formulario-sede button[type=submit]").html("Ingresar");

                },
                error: function(){
                    alert("Error");


                }
            });


            //Impide el envio del formulario
            return false; 
        });



        /********************************** NUEVA SEDE ************************************************************/

 //Cuando se envie el form del login
        //bin(evento que ejecuta una funcion): captura el evento- en este caso cuando haga el form submit, podria ser tambien 'clik etc.'
        $('#formulario-new-universidad').bind("submit", function() {
           
            $.ajax({
                
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                beforeSend: function(){
                    $("#formulario-new-universidad button[type=submit]").html("Enviando...");
                },
                //Recibe la respuesta: response
                success: function(response){
                    console.log(response);
                                    if (response.estado == 'true') {
                                        console.log("It's true");
    
    $("body").overhang({
      type: "success",
      message: "Registro exitoso! en segundos seras redirigido",
      callback: function(){
        window.location.href="buscar-universidad.php";
      }
    });
    //En caso de fallar el insert
                    }else{
                        console.log("It's false");
    
    $("body").overhang({
      type: "error",
      message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
      //closeConfirm: true
    });
    $("#formulario-new-universidad button[type=submit]").html("Enviando...");
    
                    }
    $("#formulario-new-universidad button[type=submit]").html("Ingresar");

                },
                error: function(){
                    alert("Error");


                }
            });


            //Impide el envio del formulario
            return false; 
        });


/************************************************************************************+*/

  //bin(evento que ejecuta una funcion): captura el evento- en este caso cuando haga el form submit, podria ser tambien 'clik etc.'
        $('#form-editar-estudiante').bind("submit", function() {
           
            $.ajax({
                
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                data: $(this).serialize(),
                beforeSend: function(){
                    $("#form-editar-estudiante button[type=submit]").html("Enviando...");
                },
                //Recibe la respuesta: response
                success: function(response){
                console.log(response);
                if (response.estado == 'true') {
                console.log("It's true");
    
                    $("body").overhang({
                    type: "success",
                    message: "Registro exitoso! en segundos seras redirigido",
                    callback: function(){
                        window.location.href="buscar-estudiantes.php";
                    }
                    });
                        // En caso de fallar el insert
                }else{
                        console.log("It's false");
    
                    $("body").overhang({
                    type: "error",
                    message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
                    //closeConfirm: true
                    });
    $("#form-editar-estudiante button[type=submit]").html("Actualizando...");
    
                    }
    $("#form-editar-estudiante button[type=submit]").html("Editar");

                },
                error: function(){
                    alert("Error");


                }
            });


            //Impide el envio del formulario
            return false; 
        });
        //********************************************************************************



        /*DELETE ESTUDIANTE*/
         $(document).on('click', 'input[name="deleteEstudiante"]', function(event){
            var id = this.id;
            //var id = this.name;
            //var url = this.name + this.id;

                console.log("Deleting estudiante:" + id);
                //console.log("name:");
                //console.log($(this).attr("name"));


                  $("body").overhang({
                  type: "confirm",
                  message: "¿Esta seguro de realizar esta acción?",
                  overlay: true,
                  callback: function (value) {
                    var responses = value ? "Yes" : "No";
                    //alert("You made your selection of: " + responses);
                    //
                    
                    if (responses == "Yes") {

           $.ajax({

                type: "GET",
                //url: url,
                url: '../php/eliminarEstudiante.php?id='+id,
                data: $(this).serialize(),
                dataType: 'json',
                //Respuesta satisfactoria del servidor
                beforeSend: function(){
                    $("input[name=deleteEstudiante]").html("Eliminando");
                },
                success: function(response){

                    //console.log(response);
                    //console.log("on success");
                    if (response.estado == 'true') {
                        //console.log("true");
                      //  alert("On success");
                      
                     $(this).html("Eliminando...");
                    $("body").overhang({
                      type: "success",
                      message: "Registro eliminado! en segundos seras redirigido",
                      callback: function(){
                        window.location.href="buscar-estudiantes.php";
                      }
                    });
                    }else {
                        console.log("Respuesta false del servidor");
                        $("body").overhang({
                            type: "error",
                            message: "Lo siento ha ocurrido un error! Es posible que haya incrongruencia de los datos...",
                            //closeConfirm: true
                            });
                    }
                },
                //Codigo que se ejecuta sim importar la respuesta
                complete: function(){
                    console.log("Complete");
                  
                },
                error: function(){
                    console.log("Error!");
                }

            });//End ajax
            return false;

               }//end respuesta Yes
    }//end callback
    });//end overchang confirm

        });//End bind



        //DELETE PROGRAMA
        
        $(document).on('click', 'input[name="deletePrograma"]', function(event){
            var id = this.id;
            //var name = this.name;
            var url = this.name + this.id;

                console.log("Deleting programa:" + id);
                //console.log(id);




                  $("body").overhang({
                  type: "confirm",
                  message: "¿Esta seguro de realizar esta acción?",
                  overlay: true,
                  callback: function (value) {
                    var responses = value ? "Yes" : "No";
                    //alert("You made your selection of: " + responses);
                    //
                    
                    if (responses == "Yes") {

           $.ajax({

                type: "GET",
                url: '../php/eliminarPrograma.php?id='+id,
                data: $(this).serialize(),
                dataType: 'json',
                //Respuesta satisfactoria del servidor
                beforeSend: function(){

                },
                success: function(response){

                    //console.log(response);
                    //console.log("on success");
                    if (response.estado == 'true') {
                        //console.log("true");
                      //  alert("On success");
                      
                     $(this).html("Eliminando...");
                    $("body").overhang({
                      type: "success",
                      message: "Registro eliminado! en segundos seras redirigido",
                      callback: function(){
                        window.location.href="buscar-programa.php";
                      }
                    });
                    }else {
                        console.log("Respuesta false del servidor");
                    }
                },
                //Codigo que se ejecuta sim importar la respuesta
                complete: function(){
                    console.log("Complete");
                },
                error: function(){
                    console.log("Error!");
                }

            });//End ajax
            return false;

               }//end respuesta Yes
    }//end callback
    });//end overchang confirm

        });//End bind




         /*DELETE MATRICULA*/
         $(document).on('click', 'input[name="deleteEstudiante"]', function(event){
            var id = this.id;
            //var id = this.name;
            //var url = this.name + this.id;

                console.log("Deleting estudiante:" + id);
                //console.log("name:");
                //console.log($(this).attr("name"));


                  $("body").overhang({
                  type: "confirm",
                  message: "¿Esta seguro de realizar esta acción?",
                  overlay: true,
                  callback: function (value) {
                    var responses = value ? "Yes" : "No";
                    //alert("You made your selection of: " + responses);
                    //
                    
                    if (responses == "Yes") {

           $.ajax({

                type: "GET",
                //url: url,
                url: '../php/eliminarEstudiante.php?id='+id,
                data: $(this).serialize(),
                dataType: 'json',
                //Respuesta satisfactoria del servidor
                beforeSend: function(){
                    $("input[name=deleteEstudiante]").html("Eliminando");
                },
                success: function(response){

                    //console.log(response);
                    //console.log("on success");
                    if (response.estado == 'true') {
                        //console.log("true");
                      //  alert("On success");
                      
                     $(this).html("Eliminando...");
                    $("body").overhang({
                      type: "success",
                      message: "Registro eliminado! en segundos seras redirigido",
                      callback: function(){
                        window.location.href="buscar-estudiantes.php";
                      }
                    });
                    }else {
                        console.log("Respuesta false del servidor");
                    }
                },
                //Codigo que se ejecuta sim importar la respuesta
                complete: function(){
                    console.log("Complete");
                },
                error: function(){
                    console.log("Error!");
                }

            });//End ajax
            return false;

               }//end respuesta Yes
    }//end callback
    });//end overchang confirm

        });//End bind







 /*DELETE IEB*/
         $(document).on('click', 'input[name="deleteInstitucion"]', function(event){
            var id = this.id;
            //var id = this.name;
            //var url = this.name + this.id;

                console.log("Deleting Institución:" + id);
                //console.log("name:");
                //console.log($(this).attr("name"));


                  $("body").overhang({
                  type: "confirm",
                  message: "¿Esta seguro de realizar esta acción?",
                  overlay: true,
                  callback: function (value) {
                    var responses = value ? "Yes" : "No";
                    //alert("You made your selection of: " + responses);
                    //
                    
                    if (responses == "Yes") {

           $.ajax({

                type: "GET",
                //url: url,
                url: '../php/eliminarInstitucion.php?id='+id,
                data: $(this).serialize(),
                dataType: 'json',
                //Respuesta satisfactoria del servidor
                beforeSend: function(){
                    $("input[name=deleteInstitucion]").html("Eliminando");
                },
                success: function(response){

                    //console.log(response);
                    //console.log("on success");
                    if (response.estado == 'true') {
                        //console.log("true");
                      //  alert("On success");
                      
                     $(this).html("Eliminando...");
                    $("body").overhang({
                      type: "success",
                      message: "Registro eliminado! en segundos seras redirigido",
                      callback: function(){
                        window.location.href="buscar-institucion.php";
                      }
                    });
                    }else {
                        console.log("Respuesta false del servidor");
                    }
                },
                //Codigo que se ejecuta sim importar la respuesta
                complete: function(){
                    console.log("Complete");
                },
                error: function(){
                    console.log("Error!");
                }

            });//End ajax
            return false;

               }//end respuesta Yes
    }//end callback
    });//end overchang confirm

        });//End bind





          /*DELETE IES*/
         $(document).on('click', 'input[name="deleteEstudiante"]', function(event){
            var id = this.id;
            //var id = this.name;
            //var url = this.name + this.id;

                console.log("Deleting estudiante:" + id);
                //console.log("name:");
                //console.log($(this).attr("name"));


                  $("body").overhang({
                  type: "confirm",
                  message: "¿Esta seguro de realizar esta acción?",
                  overlay: true,
                  callback: function (value) {
                    var responses = value ? "Yes" : "No";
                    //alert("You made your selection of: " + responses);
                    //
                    
                    if (responses == "Yes") {

           $.ajax({

                type: "GET",
                //url: url,
                url: '../php/eliminarEstudiante.php?id='+id,
                data: $(this).serialize(),
                dataType: 'json',
                //Respuesta satisfactoria del servidor
                beforeSend: function(){
                    $("input[name=deleteEstudiante]").html("Eliminando");
                },
                success: function(response){

                    //console.log(response);
                    //console.log("on success");
                    if (response.estado == 'true') {
                        //console.log("true");
                      //  alert("On success");
                      
                     $(this).html("Eliminando...");
                    $("body").overhang({
                      type: "success",
                      message: "Registro eliminado! en segundos seras redirigido",
                      callback: function(){
                        window.location.href="buscar-estudiantes.php";
                      }
                    });
                    }else {
                        console.log("Respuesta false del servidor");
                    }
                },
                //Codigo que se ejecuta sim importar la respuesta
                complete: function(){
                    console.log("Complete");
                },
                error: function(){
                    console.log("Error!");
                }

            });//End ajax
            return false;

               }//end respuesta Yes
    }//end callback
    });//end overchang confirm

        });//End bind







          /*DELETE SEDE*/
         $(document).on('click', 'input[name="deleteEstudiante"]', function(event){
            var id = this.id;
            //var id = this.name;
            //var url = this.name + this.id;

                console.log("Deleting estudiante:" + id);
                //console.log("name:");
                //console.log($(this).attr("name"));


                  $("body").overhang({
                  type: "confirm",
                  message: "¿Esta seguro de realizar esta acción?",
                  overlay: true,
                  callback: function (value) {
                    var responses = value ? "Yes" : "No";
                    //alert("You made your selection of: " + responses);
                    //
                    
                    if (responses == "Yes") {

           $.ajax({

                type: "GET",
                //url: url,
                url: '../php/eliminarEstudiante.php?id='+id,
                data: $(this).serialize(),
                dataType: 'json',
                //Respuesta satisfactoria del servidor
                beforeSend: function(){
                    $("input[name=deleteEstudiante]").html("Eliminando");
                },
                success: function(response){

                    //console.log(response);
                    //console.log("on success");
                    if (response.estado == 'true') {
                        //console.log("true");
                      //  alert("On success");
                      
                     $(this).html("Eliminando...");
                    $("body").overhang({
                      type: "success",
                      message: "Registro eliminado! en segundos seras redirigido",
                      callback: function(){
                        window.location.href="buscar-estudiantes.php";
                      }
                    });
                    }else {
                        console.log("Respuesta false del servidor");
                    }
                },
                //Codigo que se ejecuta sim importar la respuesta
                complete: function(){
                    console.log("Complete");
                },
                error: function(){
                    console.log("Error!");
                }

            });//End ajax
            return false;

               }//end respuesta Yes
    }//end callback
    });//end overchang confirm

        });//End bind







          /*DELETE ALIANZA*/
         $(document).on('click', 'input[name="deleteEstudiante"]', function(event){
            var id = this.id;
            //var id = this.name;
            //var url = this.name + this.id;

                console.log("Deleting estudiante:" + id);
                //console.log("name:");
                //console.log($(this).attr("name"));


                  $("body").overhang({
                  type: "confirm",
                  message: "¿Esta seguro de realizar esta acción?",
                  overlay: true,
                  callback: function (value) {
                    var responses = value ? "Yes" : "No";
                    //alert("You made your selection of: " + responses);
                    //
                    
                    if (responses == "Yes") {

           $.ajax({

                type: "GET",
                //url: url,
                url: '../php/eliminarEstudiante.php?id='+id,
                data: $(this).serialize(),
                dataType: 'json',
                //Respuesta satisfactoria del servidor
                beforeSend: function(){
                    $("input[name=deleteEstudiante]").html("Eliminando");
                },
                success: function(response){

                    //console.log(response);
                    //console.log("on success");
                    if (response.estado == 'true') {
                        //console.log("true");
                      //  alert("On success");
                      
                     $(this).html("Eliminando...");
                    $("body").overhang({
                      type: "success",
                      message: "Registro eliminado! en segundos seras redirigido",
                      callback: function(){
                        window.location.href="buscar-estudiantes.php";
                      }
                    });
                    }else {
                        console.log("Respuesta false del servidor");
                    }
                },
                //Codigo que se ejecuta sim importar la respuesta
                complete: function(){
                    console.log("Complete");
                },
                error: function(){
                    console.log("Error!");
                }

            });//End ajax
            return false;

               }//end respuesta Yes
    }//end callback
    });//end overchang confirm

        });//End bind


    });//end