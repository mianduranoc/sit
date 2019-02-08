<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="shortcut icon" href="./img/escudo_itt.png">
    <script src="js/jquery.min.js"></script>

    <?php require_once  'includes/cabecera.php';
    if (!isset($_SESSION['usuario'])){
        header("Location:./index.php");
    }?>
    <div class="container">
        <div class="formulario">
            <form action="helpers/cambiar_contrasena.php" method="post" id="inicio">
                <div class="form-group">
                    <label>Bienvenido</label>
                    <p>Favor de cambiar su contraseña</p>
                    <input type="password" name="pass" id="pass" placeholder="Contraseña" class="form-control" >
                </div>

                <div class="form-group">
                    <label class="sr-only" for="pass">Contraseña</label>
                    <input type="password" name="r-pass" id="r-pass" placeholder="Repita Contraseña" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="acept" id="aceptar" value="Aceptar" class="btn btn-secondary boton">
                    <input type="submit" name="acept" value="Cancelar" id="cancelar" formaction="index.php" class="btn btn-secondary boton">
                </div>

                <script>
                    var pass=document.getElementById("pass");
                    var cPass=document.getElementById("r-pass");
                    var aceptar=document.getElementById("aceptar");
                    var cancelar=documento.getElementById("cancelar");
                    aceptar.addEventListener("click", () => {
                        $("#inicio").submit(function(e){
                            let a = pass.value;
                            let b = cPass.value;
                            if (a !== b) {
                                alert("Las contraseñas no coinciden");
                                e.preventDefault();
                            }
                            else{
                                e.submit();
                            }
                        });
                    });
                    cancelar.addEventListener("click",()=>{
                        $("#inicio").submit(function (e) {
                            e.submit();
                        })
                    })
                </script>
            </form>
        </div>
    </div>


<?php require_once 'includes/pie.php';?>