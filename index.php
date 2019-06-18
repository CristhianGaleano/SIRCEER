<?php session_start();
    
    require_once 'admin/config.php';
    require_once 'php/Conexion.php';
    require_once 'php/funciones.php';

    #var_dump($bd_config);
    

    /*Comprobamos methodo de envio*/
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cn = getConexion($bd_config);
    #var_dump($cn);
    comprobarConexion($cn);

    $usuario = strtolower( $_POST['usuario']);
    $pass = $_POST['pass'];
    


        #Buscamos coincidencia en la base de datos
        $result = searchUserLogin($usuario,$pass,$cn);
        // var_dump($result);

        #Sy hay coincidencia se guardan datos y se verfica perfil
        if ($result != false) {
            $_SESSION['usuario']['user'] = $usuario;

            #Buscamos el nombre del perfil que tiene el usuario
            $perfil = shearcPerfilUser($result['id'],$cn);
            #var_dump($perfil);
            $_SESSION['usuario']['perfil'] = $perfil;
            #var_dump($_SESSION);
            if ($_SESSION['usuario']['perfil'] == "ADMINISTRADOR") {?>
            <script type="text/javascript"> 
                window.location="<?php echo URL ?>admin/principal-admin.php"; 
            </script> 
            <?php //lo abro de nuevo
            }elseif ( $_SESSION['usuario']['perfil'] == "REGULAR"  || $_SESSION['usuario']['perfil'] == "EXTERNO") {?>
            <script type="text/javascript"> 
                window.location= "<?php echo URL ?>gestion/principal-gestion.php"; 
            </script> 
            <?php //lo abro de nuevo
                
            }else {
                ?>
            <script type="text/javascript"> 
                alert('Por favor verique sus datos de acceso o comuniquese con el administrador.');
                window.location= "<?php echo URL ?>index.php"; 
            </script> 
            <?php //lo abro de nuevo
            }
            
        }else{
            ?>
            <script type="text/javascript"> 
               alert('Por favor verique sus datos de acceso o comuniquese con el administrador.');
                window.location= "<?php echo URL ?>index.php"; 
            </script> 
            <?php //lo abro de nuevo
        }
        
    }//End POST

 ?>
<?php require("view/login.view.php") ?>