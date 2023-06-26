<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LOGO</a>
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
            <form action="/action_page.php">
                <input class="form-control me-1" type="text" placeholder="Username" name="username">
                <input class="form-control me-1" type="text" placeholder="Password" name="psw">      
                <button class="btn btn-outline-info" type="submit">Login</button>     
                <a href="#">Register</a>       
            </form>
        </div>
    </div>   
</nav>

<header>
    <h1>Готварски рецепти</h1>
</header>
