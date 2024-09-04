<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
    integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMh4a5VhRjS96inGtD0XIpzD7kC7Ee+J4Y1ljlD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/11dc58ec11.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Toys-Shop</title>
</head>
<body>
    <header>
        <div class="header1">
            <a href="contactus.php"> 
                <i class="fa-solid fa-phone" style="color: #eb3b5e;"></i> +1234567890 <!-- Display phone icon here -->
            </a>
            <a href="contactus.php">
                <i class="fa-solid fa-envelope" style="color: #eb3b5e;"></i> toystoresinfo@test.com <!-- Display email icon here -->
            </a> 
        </div>
        <div class="header2">
            <h1>Toys-Shop</h1>
            <div class="head-search">
               <input type="text" placeholder="Search..." > 
               <button type="submit"><span>Search</span></button>
            </div>
            <div class="head-wish-order"> <!-- Icons for wishlist and order -->
                <div class="icon-container">
                  <i class="fa-solid fa-heart" style="color: #eb3b5e;"></i><!-- Wishlist icon with hover placeholder and count -->
                  <span class="wishlist-count">0</span>
                </div>
                <div class="icon-container">
                  <i class="fa-solid fa-cart-shopping" style="color: #eb3b5e;"></i><!-- Shopping cart icon with hover placeholder and count -->
                  <span class="cart-count">0</span>
                </div>
               
            </div>
        </div>
        <nav>
          <div class="nav-tab">
            <a href="home.php">HOME</a>
            <a href="aboutus.php">ABOUT</a>
            <a href="shopnow.php">SHOP NOW</a>
            <a href="contactus.php">CONTACT</a>
            <a href="wishlist.php">WISHLIST</a>
            <div class="dropdown">
               <a href="account.php" class="dropbtn">MY ACCOUNT <i class="fa-solid fa-caret-down"></i></a> <!-- Dropdown with arrow -->
               <div class="dropdown-content">
                 <a href="profile.php">Profile</a>
                 <a href="orders.php">Orders</a>
                 <a href="logout.php">Logout</a>
              </div>
            </div>
           </div>
        </nav>

    </header>
