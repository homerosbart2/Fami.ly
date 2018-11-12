<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Register</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="../../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../../assets/js/pnotify.custom.min.js" type="text/javascript"></script>
    <link href="../../assets/css/pnotify.custom.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" href="../../assets/css/main.min.css" />
</head> 

<body>
    <section id="header-login">
        <div class="wrapper">
            <div class="login-register">
                <span class="login-logo">
                    Fami.ly
                </span>
                <div class="form-container">
                    <form id="login-form" class="login-form">
                        <input type='hidden' name='add' value='G'>
                        <input type='text'  id='login-username' name='' placeholder='Usuario' required>
                        <input type='password'  id='login-password' name='' placeholder='Contraseña' required>
                        <span class="login-buttons">
                            <a href="#" type='submit' id='btn_login' name='submit' value='Iniciar' class='btn-login iniciar_sesion'> LOGIN </a>
                            <a class='btn-register' onclick='updateFormContainer();'> Registrar</a> 
                        </span>
                    </form>

                    <form id="register-form" class="register-form">
                        <input type='hidden'name='add' value='G'>
                        <input type='text' id='registro_nombre' name='' placeholder='Nombres' required>
                        <input type='text' id='registro_lastname' name='' placeholder='Apellidos' required>
                        <input type='text' id='registro_username' name='' placeholder='Usuario' required>
                        <input type='date' id='registro_fecha' name='' placeholder='Fecha de nacimiento' required>
                        <input type='password' id='registro_password1' name='' placeholder='Ingrese contraseña' required>
                        <input type='password'  id='registro_password2' name='' placeholder='Repita Contraseña' required>
                        <span class="login-buttons">
                            <a class='btn-cancel' onclick='updateFormContainer();'>Cancelar</a>
                            <a href="#" type='submit' id='btn_registrar' name='submit' value='Iniciar' class='btn-login iniciar_sesion'> REGISTRAR </a>
                             
                        </span>
                    </form>
                </div>
            </div>
            <div class="copyright-footer">
            <small>Copyright &copy; <span class="creator-name">Diego Alay</span> & <span class="creator-name">Henry Campos</span></small>
            </div>
        </div>
    </section>
    <script src="../../assets/js/vendors.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/actions.js"></script>
</body>

</html>

<style>
.ui-pnotify{
    /*CSS PARA PNOTIFY EDITADO*/
    top:0px;
    right:66px;
    left:0px;
}
</style>
<script>
    function renderProfile(){
        //Luego de 1 segundo se redirige
        $(location).attr('href', '../users/profile.php');
    }

    function showMessage(type,title,text){
        var opts = {
            width: "100%"
        };
        opts.title = title;
        opts.text = text;
        opts.type = type;
        opts.styling = 'bootstrap3';
        new PNotify(opts);
    }

    var iniciarSesion = function(){
        username = document.getElementById("login-username").value;
        password = document.getElementById("login-password").value;
        if(username != "" && password != ""){
            $.ajax({
                url: '../rutas_ajax/session/validar_login.php?',
                data: 'username=' + username + '&password=' + password,
                type: 'POST',
                success: function(r){
                    if(r == 1){
                        showMessage("success","Sesión inciada exitosamente","Bienvenido " + username + ".");
                        setTimeout("renderProfile()",1000); 
                    }else{
                        showMessage("error","Error al iniciar sesión","Verifique sus datos porfavor!.");
                    }
                }
            });
        }else{
            showMessage("warning","Login","Complete todos los campos porfavor.");      
        }    
    }

    var crearUsuario = function(){
        nombre = document.getElementById("registro_nombre").value;
        username = document.getElementById("registro_username").value;
        password1 = document.getElementById("registro_password1").value;
        password2 = document.getElementById("registro_password2").value;
        fecha = document.getElementById("registro_fecha").value;
        lastname = document.getElementById("registro_lastname").value;
        if((password1 == password2) && password1 != "" && password2 != ""){
            if(username != "" && nombre != ""){
                $.ajax({
                    url: '../rutas_ajax/session/nuevo_usuario.php?',
                    data: 'name=' + nombre + '&username=' + username + '&password=' + password1 + "&fecha=" + fecha + "&lastname=" + lastname,
                    type: 'POST',
                    success: function(r){
                        if(r == 1){
                            showMessage("success","Nuevo usuario","Usuario registrado correctamente.");
                            setTimeout("renderProfile()",1000);   
                        }else{
                            showMessage("error","Nuevo usuario","Error al crear usuario, verifique sus datos!.");
                        }
                    }
                });
            }else{
                showMessage("warning","Nuevo usuario","Complete todos los campos porfavor.");         
            }         
        }else{
            showMessage("warning","Nuevo usuario","Ambas contraseñas deben coincidir.");       
        }
    }

    $(document).ready(function() {
        $('#btn_login').on('click',function(){
            iniciarSesion();
        });

        $('#btn_registrar').on('click',function(){
            crearUsuario();
        });
    
        $('#login-password').keyup((event)=>{
            if(event.which == 13){
                $('#btn_login').click();
            }
        });
    });
</script>