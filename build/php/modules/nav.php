<html>
  <body>
        <section id="header">
            <ul class="main-nav">
                <span class="logo-division">
                    <li><a href="" class="nav-logo">Fami.ly</a></li>
                </span>
                <span class="options-division">
                    <span class="profile-img-preview">
                        <img src="../../assets/img/users/profile.png">
                    </span>
                    <li class="nav-user">
                        <a>
                            <span class="user-alias"><b>@</b>henry.campos97</span>
                        </a>
                        <span class="profile-link">Ver más</span>
                    </li>
                    <li><a id="search" class="nav-option"><span class="option-icon"><i class="fas fa-search"></i></span></a></li>
                    <li><a href="../groups/home.php" class="nav-option"><span class="option-icon"><i class="fas fa-home"></i></span></a></li>
                    <!-- En el span .counter se debe colocar el tamaño del detalle. -->
                    <li><a href="../shop/shopping_cart.php" class="nav-option"><span class="option-icon notification"><i class="fas fa-bell"></i></span><span class="counter">2</span></a></li>
                    <li><a href="" class="nav-option"><span class="option-icon"><i class="fas fa-sign-out-alt"></i></span></a></li>
                </span>
            </ul>
        </section>
  </body>
</html>

<script>
$(document).ready(function(){
    $('.nav-user').click(function(){
        window.location.href = "../users/profile.php";
    });
    $('.profile-img-preview').click(function(){
        window.location.href = "../users/profile.php";
    });
});
</script>