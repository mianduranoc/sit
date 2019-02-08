<?php
require_once "conexion.php";
if (isset($_POST['pass'])&&isset($_POST['r-pass'])){
    $db=new ConexionBD();
    $conexion=$db->getConnection();
    $pass=$_POST['pass'];
    $rfc=$_SESSION['usuario']['rfc'];
    $cambiar=mysqli_query($conexion,"UPDATE usuarios SET contrasena='$pass',primera_vez=0 WHERE rfc='$rfc'");
    if ($cambiar){?>
        <form id="enviar" method="post" action="redireccion.php">
            <input type="hidden" name="nc" value="<?=$rfc?>">
            <input type="hidden" name="pass" value="<?=$pass?>">
            <?php if(isset($_SESSION['usuario']['puesto_administrativo'])):?>
                <input type="hidden" name="acept" value="Administrativo">
            <?php elseif(isset($_SESSION['usuario']['puesto_tutor'])):?>
                <input type="hidden" name="acept" value="Tutor">
            <?php endif;?>
        </form>
        <script>
            var enviar=document.getElementById("enviar");
            enviar.submit();
        </script>
<?php
    }
    else{
        $_SESSION['error']="Error al cambiar la contraseña";
        header("Location: ./index.php");
    }
}
?>
