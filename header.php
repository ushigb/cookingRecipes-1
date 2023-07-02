<?php

include 'functions.php';
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="logo" src="pics/LOGO/Screenshot_2023-04-25-18-19-34-12_a23b203fd3aafc6dcb84e438dda678b6.jpg" alt=""></a></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Начало</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Рецепти</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Категории
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Закуска</a></li>
                        <li><a class="dropdown-item" href="#">Обяд</a></li>
                        <li><a class="dropdown-item" href="#">Вечеря</a></li>
                        <li><a class="dropdown-item" href="#">Салати</a></li>
                        <li><a class="dropdown-item" href="#">Десерти</a></li>
                        <li><a class="dropdown-item" href="#">Веган Меню</a></li>            
                    </ul>
                </li>                        
            </ul>
            <div class="container">  
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            
            <?php
    if (!$_SESSION) {
        ?>
            <form method="post" action="index.php">                
                <div class="input-group-access">
                <input type="hidden" name="user_id" >
            </div>
                <input class="form-control me-1" type="text" placeholder="Username" name="username">
                <input class="form-control me-1" type="text" placeholder="Password" name="psw"> 
                <?php echo display_error(); ?>
                <button class="btn btn-outline-info" type="submit" name="login_btn">Login</button>     
                <a href="register.php">Register</a> 
                
            </form>
        </div>
    </div>   
</nav>

<?php
} else {
    ?>
    <div class="row">
        <div class="col-md-6 nav-link ">
            <h5><strong class="nav-link"><?php echo $_SESSION['user']['username']; ?></strong></h5>
            <small>
                <h6><i class="nav-link"  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['userType']); ?>)</i></h6> 
                <br>
            </small>
            <h6><a class="logout" href="index.php?logout='1'" role="button">logout</a></h6>
        </div> 
                
    </div>
    </nav>

    <?php
}
?>
<header>
    <h1>Готварски рецепти</h1>
</header>
