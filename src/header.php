<?php include("login/login_form.php") ?>
<?php include("register/register_form.php") ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a href = "#"> <img src = "img\INFO(2).png" height = "45px" style = "margin-right: 10px;" /></a>
    <a class="navbar-brand" href="#">INFODEO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET["ACTUAL_PAGE"]) && $_GET["ACTUAL_PAGE"] == "catalogue") echo "active"; ?>" href = "index.php?ACTUAL_PAGE=catalogue">Catálogo <span class="sr-only">()</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET["ACTUAL_PAGE"]) && $_GET["ACTUAL_PAGE"] == "offers") echo "active"; ?>" href="index.php?ACTUAL_PAGE=offers">Ofertas</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            		Secciones
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Acción</a>
                    <a class="dropdown-item" href="#">RPG</a>
                    <a class="dropdown-item" href="#">Aventura</a>
                    <a class="dropdown-item" href="#">Rol</a>
                    <a class="dropdown-item" href="#">Sandbox</a>
                    <a class="dropdown-item" href="#">Deportes</a>
                    <a class="dropdown-item" href="#">Fantasía</a>
                    <a class="dropdown-item" href="#">Ciencia Ficción</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Otros</a>
                </div>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" style="margin-right: 10%;" action = "index.php" method = "get">
            <input type = "hidden" name = "ACTUAL_PAGE" value = "catalogue">
            <input class="form-control mr-sm-2" type="search" name = "SEARCH_PRODUCT" placeholder="Search" aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav my-2 my-lg-0">               
            
            <?php
            if(!isset($_SESSION['logged_in_username'])){
               ?>
            
                <li class="nav-item " data-toggle="modal" data-target="#modalLoginForm">
                	<a class="nav-link" href="#">
						<svg class="bi bi-person-fill" width="1em" height="1em" viewBox="-2 -2 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    	        			<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                		</svg>
                		Login
					</a>
            	</li>     
        	<?php }else{ ?>
        		<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            		<?php echo $_SESSION['logged_in_username']; ?>	
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <a class="dropdown-item" href="index.php?ACTUAL_PAGE=orders">Pedidos</a>
                    <a class="dropdown-item" href="#">Preferencias</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="src/login/logout_src.php">Logout</a>
                </div>
            </li>
            
            
        	<?php if($_SESSION['logged_in_username'] == "admin"){ ?>
                	<li class="nav-item <?php if(isset($_GET["ACTUAL_PAGE"]) && $_GET["ACTUAL_PAGE"] == "administer") echo "active"; ?>">
                		<a class="nav-link" href = "index.php?ACTUAL_PAGE=administer">Administrar<?php if(isset($_SESSION["ACTUAL_PAGE"]) && $_SESSION["ACTUAL_PAGE"] == "administer"){ ?><span class="sr-only">(current)</span><?php } ?></a>
            		</li>

          	<?php } } ?>
              
        </ul>

    </div>

</nav>

