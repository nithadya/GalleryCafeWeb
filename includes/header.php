<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe</title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./assets/images/favicon.jpg" type="image/x-icon">
    
    <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Rubik:wght@400;500;600;700&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">
  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.png" media="min-width(768px)">
  <link rel="preload" as="image" href="./assets/images/hero-banner-bg.png" media="min-width(768px)">
  <link rel="preload" as="image" href="./assets/images/hero-bg.jpg">

</head>
<body id="top">


   <!-- 
    - #HEADER
  -->
  
  <header class="header" data-header>
    <div class="container">
        <h1>
            <a href="#" class="logo">The Gallery Cafe<span class="span"></span></a>
        </h1>

        <nav class="navbar" data-navbar>
            <ul class="navbar-list">
                <li class="nav-item">
                    <a href="index.php" class="navbar-link"> 
                    <span class="span">Home</span>
</a>
   
                </li>
                <li class="nav-item">
                    <a href="about.php" class="navbar-link" data-nav-link>
                    <span class="span">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="mainmenu.php" class="navbar-link" data-nav-link>Menu</a>
                  </li>
        
                  <li class="nav-item">
                    <a href="gallery.php" class="navbar-link" data-nav-link>Gallery</a>
                  </li>
        
                  <li class="nav-item">
                    <a href="#blog" class="navbar-link" data-nav-link>Reservation</a>
                  </li>
        
                  <li class="nav-item">
                    <a href="contact.php" class="navbar-link" data-nav-link>Contact</a>
                  </li>

                  <li class="nav-item">
                    <a href="contact.php" class="navbar-link" data-nav-link>Blog</a>
                  </li>


                  <li class="nav-item">
                    <a href="../adminSide/StaffLogin/login.php" class="navbar-link" data-nav-link>Staff</a>
                  </li>

            </ul>

        </nav>

        <div class="header-btn-group">
            <button class="search-btn" aria-label="Search" data-search-btn>
              <ion-icon name="search-outline"></ion-icon>
            </button>
    
            <a href="../GalleryCafe/customerSide/customerLogin/login.php" >
            <button class="btn btn-hover" style="color: white;">Login</button>
            </a>
    
            <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn>
              <span class="line top"></span>
              <span class="line middle"></span>
              <span class="line bottom"></span>
            </button>
          </div>
        </div>
   </header>