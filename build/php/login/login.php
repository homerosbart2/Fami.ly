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
                        <input type='text'  id='login-username' name='' placeholder='Ingrese el usuario' required>
                        <input type='password'  id='login-password' name='' placeholder='Ingrese la contraseña' required>
                        <span class="login-buttons">
                            <a href="#" type='submit' id='btn_login' name='submit' value='Iniciar' class='btn-login iniciar_sesion'> LOGIN </a>
                            <a class='btn-register' onclick='updateFormContainer();'> Registrar</a> 
                        </span>
                    </form>

                    <form id="register-form" class="register-form">
                        <input type='hidden'name='add' value='G'>
                        <input type='text' id='registro_nombre' name='' placeholder='Ingrese el nombre' required>
                        <input type='text' id='registro_username' name='' placeholder='Ingrese el usuario' required>
                        <input type='password' id='registro_password1' name='' placeholder='Ingrese la contraseña' required>
                        <input type='password'  id='registro_password2' name='' placeholder='Repita la contraseña' required>
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