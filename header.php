<?php include_once 'noice.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Custom css -->
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/userprofile.css">
    <link rel="stylesheet" href="CSS/search.css">
    <!-- Tailwind css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.7.3/tailwind.min.css" integrity="sha512-jJ4q433srLv86rVtrIu5Tco3NLLZ81Y4kkgr7jqm19oZG7cutkYOSSVLqQJ0I4niSm/5X5B4BeEbnBRvFfhWLg==" crossorigin="anonymous" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- GOOGLE ROBOTO FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <!-- font awesome kit -->
    <script src="https://kit.fontawesome.com/f2fae123e6.js" crossorigin="anonymous"></script>

    <!-- For sidebar -->
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        body a{
            text-decoration: none!important;
        }
        .searchHomeRedirect{
            display: none!important;
        }
        @media screen and (min-width: 1080px){
            .smallImage{
                display: none!important;
            }
        }
        @media screen and (max-width: 1080px){
            .cart-counter{
                top: -10%!important;
                right: 27%!important;
            }
            .smallImgae{
                display: block!important;
                border: 4px solid black!important;
                margin-top: 0!important;
            }
            .bigImage{
                display: none!important;
            }
        }
    </style>
</head> 
<body>
<!-- Paste sidebar here -->

<?php
        $site = 'search.php';
        $item = '%s?linkValue=%s';
        include_once 'Template/_sidebar.php';
?>

<header>
        <nav style="position: fixed; top:0; width: 100%; z-index:6;">
            <div class="nav-list">
            <div class="burger" id="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
                <div class="logo"><a href="index.php">BIGVIGS</a></div>
                <div class="list-item">

<!-- ------------------------MEN--------------------- -->
                    <div class="dropdown">
                        <div class="dropbtn">MEN</div>
                        <div class="row">
                        <div class="dropdown-content p-0">
                            <div class="col-md-3 col-sm-3 p-0 m-2">
                            
                                <h6 style="margin: 1rem">Topwear</h6>
                                <?php
                                     $site = 'search.php';
                                     $item = '%s?linkValue=%s';
                                ?>
                                <a href="<?php printf("$item","$site",'T-shirt')?>" class="p-0 mx-3 my-1">T-shirts</a>
                                <a href="<?php printf("$item","$site",'Casual shirt')?>" class="p-0 mx-3 my-1">Casual shirts</a>
                                <a href="<?php printf("$item","$site",'Formal shirts')?>" class="p-0 mx-3 my-1">Formal shirts</a>
                                <a href="<?php printf("$item","$site",'Sweat shirts')?>" class="p-0 mx-3 my-1">Sweat shirts</a>
                                <a href="<?php printf("$item","$site",'Jackets')?>" class="p-0 mx-3 my-1">Jackets</a>
                                <a href="<?php printf("$item","$site",'Sweaters')?>" class="p-0 mx-3 my-1">Sweaters</a>
                                <a href="<?php printf("$item","$site",'Blazers and coats')?>" class="p-0 mx-3 my-1">Blazers and coats</a>
                                <a href="<?php printf("$item","$site",'Rain Jackets')?>" class="p-0 mx-3 my-1">Rain Jackets</a>
                                <hr class="mx-3">

                                <h6 style="margin: 1rem">Indian and festive wear</h6>
                                <a href="<?php printf("$item","$site",'Kurta')?>" class="p-0 mx-3 my-1">Kurtas & Kurta Sets</a>
                                <a href="<?php printf("$item","$site",'Sherwanis')?>" class="p-0 mx-3 my-1">Sherwanis</a>
                                <a href="<?php printf("$item","$site",'Nehru Jackets')?>" class="p-0 mx-3 my-1">Nehru Jackets</a>
                                <a href="<?php printf("$item","$site",'Dhotis')?>" class="p-0 mx-3 my-1">Dhotis</a>
                                <a href="<?php printf("$item","$site",'Jackets')?>" class="p-0 mx-3 my-1">Jackets</a>
                                <a href="<?php printf("$item","$site",'Sweaters')?>" class="p-0 mx-3 my-1">Sweaters</a>
                                <a href="<?php printf("$item","$site",'Blazers')?>" class="p-0 mx-3 my-1">Blazers</a>
                                <a href="<?php printf("$item","$site",'Coats')?>" class="p-0 mx-3 my-1">Coats</a>
                                <a href="<?php printf("$item","$site",'Rain Jackets')?>" class="p-0 mx-3 my-1">Rain Jackets</a>

                            </div>
                            <div class="col-md-3 col-sm-3">
    
                                <h6 style="margin: 1rem">Bottom Wear</h6>
                                <a href="<?php printf("$item","$site",'Jeans')?>" class="p-0 mx-3 my-1">Jeans</a>
                                <a href="<?php printf("$item","$site",'Casual Trousers')?>" class="p-0 mx-3 my-1">Casual Trousers</a>
                                <a href="<?php printf("$item","$site",'Formal Trousers')?>" class="p-0 mx-3 my-1">Formal Trousers</a>
                                <a href="<?php printf("$item","$site",'Shorts')?>" class="p-0 mx-3 my-1">Shorts</a>
                                <a href="<?php printf("$item","$site",'Track Pants  and Joggers')?>" class="p-0 mx-3 my-1">Track Pants and Joggers</a>

                                <hr class="mx-3">

                                <h6 style="margin: 1rem">Inner wear and Sleep wear</h6>
                                <a href="<?php printf("$item","$site",'Briefs and Trunks')?>" class="p-0 mx-3 my-1">Briefs and Trunks</a>
                                <a href="<?php printf("$item","$site",'Boxers')?>" class="p-0 mx-3 my-1">Boxers</a>
                                <a href="<?php printf("$item","$site",'Vests')?>" class="p-0 mx-3 my-1">Vests</a>
                                <a href="<?php printf("$item","$site",'Sleep wear')?>" class="p-0 mx-3 my-1">Sleep wear</a>
                                <a href="<?php printf("$item","$site",'Lounge wear')?>" class="p-0 mx-3 my-1">Lounge wear</a>
                                <a href="<?php printf("$item","$site",'Thermals')?>" class="p-0 mx-3 my-1">Thermals</a>

                                <hr class="mx-3">

                                <h6>plus size</h6>
                            </div>
                            <div class="col-md-3 col-sm-3">

                                <h6 style="margin: 1rem">Foot Wear</h6>
                                <a href="<?php printf("$item","$site",'Casual shoes')?>" class="p-0 mx-3 my-1">Casual shoes</a>
                                <a href="<?php printf("$item","$site",'Formal shoes')?>" class="p-0 mx-3 my-1">Formal shoes</a>
                                <a href="<?php printf("$item","$site",'Sport shoes')?>" class="p-0 mx-3 my-1">Sport shoes</a>
                                <a href="<?php printf("$item","$site",'Sneakers')?>" class="p-0 mx-3 my-1">Sneakers</a>
                                <a href="<?php printf("$item","$site",'Sandals')?>" class="p-0 mx-3 my-1">Sandals & Floaters</a>
                                <a href="<?php printf("$item","$site",'Flip Flop')?>" class="p-0 mx-3 my-1">Flip Flop</a>
                                <a href="<?php printf("$item","$site",'Socks')?>" class="p-0 mx-3 my-1">Socks</a>

                                <hr class="mx-3">

                                <a href="<?php printf("$item","$site",'Personal care & grooming')?>" class="p-0 mx-3 my-1"><h6>Personal care & grooming</h6></a>
                                <a href="<?php printf("$item","$site",'Sunglasses')?>" class="p-0 mx-3 my-1"><h6>Sunglasses & frames</h6></a>
                                <a href="<?php printf("$item","$site",'watches')?>" class="p-0 mx-3 my-1"><h6>watches</h6></a>

                            </div>
                            <div class="col-md-3 col-sm-3">

                            <h6 style="margin: 1rem">Sports and active Wear</h6>
                                <a href="#" class="p-0 mx-3 my-1">Sports shoes</a>
                                <a href="#" class="p-0 mx-3 my-1">Sports Sandals</a>
                                <a href="#" class="p-0 mx-3 my-1">Active T-shirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Track pants and shorts</a>
                                <a href="#" class="p-0 mx-3 my-1">Track suits</a>
                                <a href="#" class="p-0 mx-3 my-1">Jackets & Sweat shirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Sport accessories</a>
                                <a href="#" class="p-0 mx-3 my-1">Swim wears</a>

                                <hr class="mx-3">

                                <h6>Personal care & grooming</h6>
                                <h6>Sunglasses & frames</h6>
                                <h6>watches</h6>

                            </div>
                        </div>
                        </div>
                    </div>
<!-- ------------------------MEN--------------------- -->


<!-- ------------------------WOMEN--------------------- -->

                    <div class="dropdown">
                        <div class="dropbtn">WOMEN</div>
                        <div class="row">
                        <div class="dropdown-content p-0">
                            <div class="col-md-3 col-sm-3">
                            
                                <h6 style="margin: 1rem">Indian & Fusion Wear</h6>
                                <a href="#" class="p-0 mx-3 my-1">Kurtas & Suits</a>
                                <a href="#" class="p-0 mx-3 my-1">Kurtis,Tunics & Tops</a>
                                <a href="#" class="p-0 mx-3 my-1">Ethnic Dresses</a>
                                <a href="#" class="p-0 mx-3 my-1">Leggings, Salwars & Chudidars</a>
                                <a href="#" class="p-0 mx-3 my-1">Skirts & Plazzos</a>
                                <a href="#" class="p-0 mx-3 my-1">Sarees</a>
                                <a href="#" class="p-0 mx-3 my-1">Dress Materials</a>
                                <a href="#" class="p-0 mx-3 my-1">Lehnga Cholis</a>
                                <a href="#" class="p-0 mx-3 my-1">Dupattas & Shawls</a>
                                <a href="#" class="p-0 mx-3 my-1">Jackets & WaistCoats</a>
                                <hr class="mx-3">

                                <a href="#" style="font-weight: 600; font-size:0.75em; color: black;">Belts, Scarves & more</a>
                                <a href="#" style="font-weight: 600; font-size:0.75em; color: black;">Watches & Wearables</a>

                            </div>
                            <div class="col-md-3 col-sm-3">
    
                                <h6 style="margin: 1rem">Western Wear</h6>
                                <a href="#" class="p-0 mx-3 my-1">Dresses</a>
                                <a href="#" class="p-0 mx-3 my-1">Jump Suits</a>
                                <a href="#" class="p-0 mx-3 my-1">Tops, T-shirts & Shirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Jeans & Jeggings</a>
                                <a href="#" class="p-0 mx-3 my-1">Trousers & Capris</a>
                                <a href="#" class="p-0 mx-3 my-1">Shorts & Skirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Shrugs</a>
                                <a href="#" class="p-0 mx-3 my-1">Swaters & Sweatshirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Jackets & Coats</a>
                                <a href="#" class="p-0 mx-3 my-1">Blazzers & Waistcoats</a>

                                <hr class="mx-3">

                                <a href="#" style="font-weight: 600; font-size:0.75em; color: black;">Plus Size</a>
                                <a href="#" style="font-weight: 600; font-size:0.75em; color: black;">Sunglasses & Frames</a>
                            </div>
                            <div class="col-md-3 col-sm-3">

                                <h6 style="margin: 1rem">Footwear</h6>
                                <a href="#" class="p-0 mx-3 my-1">Flats</a>
                                <a href="#" class="p-0 mx-3 my-1">Casual shoes</a>
                                <a href="#" class="p-0 mx-3 my-1">Heels</a>
                                <a href="#" class="p-0 mx-3 my-1">Boots</a>
                                <a href="#" class="p-0 mx-3 my-1">Sports Shoes & Floaters</a>

                                <hr class="mx-3">

                                <h6 style="margin: 1rem">Sports and active Wear</h6>
                                <a href="#" class="p-0 mx-3 my-1">clothings</a>
                                <a href="#" class="p-0 mx-3 my-1">Footwear</a>
                                <a href="#" class="p-0 mx-3 my-1">Sports Accessiories</a>
                                <a href="#" class="p-0 mx-3 my-1">Sports Equipments</a>

                            </div>
                            <div class="col-md-3 col-sm-3">

                                <h6 style="margin: 1rem">Lingerie & Sleepwear</h6>
                                <a href="#" class="p-0 mx-3 my-1">Bra</a>
                                <a href="#" class="p-0 mx-3 my-1">Briefs</a>
                                <a href="#" class="p-0 mx-3 my-1">Shapewears</a>
                                <a href="#" class="p-0 mx-3 my-1">Sleepwear & Loungewear</a>
                                <a href="#" class="p-0 mx-3 my-1">Swimwear</a>
                                <a href="#" class="p-0 mx-3 my-1">Camisoles & Thermals</a>

                                <hr class="mx-3">

                                <h6 style="margin: 1rem">Beauty & Personal Care</h6>
                                <a href="#" class="p-0 mx-3 my-1">Make Up</a>
                                <a href="#" class="p-0 mx-3 my-1">Skin Care</a>
                                <a href="#" class="p-0 mx-3 my-1">Premium Beauty</a>
                                <a href="#" class="p-0 mx-3 my-1">Lipsticks</a>
                                <a href="#" class="p-0 mx-3 my-1">Fragrances</a>

                            </div>
                        </div>
                        </div>
                    </div>

<!-- ------------------------WOMEN--------------------- -->

<!-- ------------------------KIDS--------------------- -->

                    <div class="dropdown">
                        <div class="dropbtn">KIDS</div>
                        <div class="row">
                        <div class="dropdown-content p-0">
                            <div class="col-md-3 col-sm-3">
                            
                                <h6 style="margin: 1rem">Boys Clothing</h6>
                                <a href="#" class="p-0 mx-3 my-1">T-shirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Shirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Shorts</a>
                                <a href="#" class="p-0 mx-3 my-1">Jeans</a>
                                <a href="#" class="p-0 mx-3 my-1">Trousers</a>
                                <a href="#" class="p-0 mx-3 my-1">Clothing Sets</a>
                                <a href="#" class="p-0 mx-3 my-1">Ethnic Wear</a>
                                <a href="#" class="p-0 mx-3 my-1">Track Pants & Pyjamas</a>
                                <a href="#" class="p-0 mx-3 my-1">Jackets, Sweaters & Sweatshirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Innerwear & Sleepwear</a>
                                <hr class="mx-3">

                            </div>
                            <div class="col-md-3 col-sm-3">
    
                                <h6 style="margin: 1rem">Western Wear</h6>
                                <a href="#" class="p-0 mx-3 my-1">Dresses</a>
                                <a href="#" class="p-0 mx-3 my-1">Jump Suits</a>
                                <a href="#" class="p-0 mx-3 my-1">Tops, T-shirts & Shirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Jeans & Jeggings</a>
                                <a href="#" class="p-0 mx-3 my-1">Trousers & Capris</a>
                                <a href="#" class="p-0 mx-3 my-1">Shorts & Skirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Shrugs</a>
                                <a href="#" class="p-0 mx-3 my-1">Swaters & Sweatshirts</a>
                                <a href="#" class="p-0 mx-3 my-1">Jackets & Coats</a>
                                <a href="#" class="p-0 mx-3 my-1">Blazzers & Waistcoats</a>

                                <hr class="mx-3">

                                <a href="#" style="font-weight: 600; font-size:0.75em; color: black;">Plus Size</a>
                                <a href="#" style="font-weight: 600; font-size:0.75em; color: black;">Sunglasses & Frames</a>
                            </div>
                            <div class="col-md-3 col-sm-3">

                                <h6 style="margin: 1rem">Footwear</h6>
                                <a href="#" class="p-0 mx-3 my-1">Flats</a>
                                <a href="#" class="p-0 mx-3 my-1">Casual shoes</a>
                                <a href="#" class="p-0 mx-3 my-1">Heels</a>
                                <a href="#" class="p-0 mx-3 my-1">Boots</a>
                                <a href="#" class="p-0 mx-3 my-1">Sports Shoes & Floaters</a>

                                <hr class="mx-3">

                                <h6 style="margin: 1rem">Sports and active Wear</h6>
                                <a href="#" class="p-0 mx-3 my-1">clothings</a>
                                <a href="#" class="p-0 mx-3 my-1">Footwear</a>
                                <a href="#" class="p-0 mx-3 my-1">Sports Accessiories</a>
                                <a href="#" class="p-0 mx-3 my-1">Sports Equipments</a>

                            </div>
                            <div class="col-md-3 col-sm-3">

                                <h6 style="margin: 1rem">Lingerie & Sleepwear</h6>
                                <a href="#" class="p-0 mx-3 my-1">Bra</a>
                                <a href="#" class="p-0 mx-3 my-1">Briefs</a>
                                <a href="#" class="p-0 mx-3 my-1">Shapewears</a>
                                <a href="#" class="p-0 mx-3 my-1">Sleepwear & Loungewear</a>
                                <a href="#" class="p-0 mx-3 my-1">Swimwear</a>
                                <a href="#" class="p-0 mx-3 my-1">Camisoles & Thermals</a>

                                <hr class="mx-3">

                                <h6 style="margin: 1rem">Beauty & Personal Care</h6>
                                <a href="#" class="p-0 mx-3 my-1">Make Up</a>
                                <a href="#" class="p-0 mx-3 my-1">Skin Care</a>
                                <a href="#" class="p-0 mx-3 my-1">Premium Beauty</a>
                                <a href="#" class="p-0 mx-3 my-1">Lipsticks</a>
                                <a href="#" class="p-0 mx-3 my-1">Fragrances</a>

                            </div>
                        </div>
                        </div>
                    </div>


<!-- ------------------------KIDS--------------------- -->

                    <div>ESSENTIALS</div>
                    <div>STORES</div>
                </div> 
                
                <a href="index.php" style="text-decoration: none; color:black; display:flex; justify-content:center; align-items:center; padding: 0 1rem;" class="searchHomeRedirect"><i class="fas fa-chevron-left"></i></a>
                <div class="icon-links">
                    <form method="get" class="search">
                        <input type="text" class="searchInput" name="searchInput" placeholder="Search clothings and accessiories">
                        <button class="searchIcon i-links" name="searchIcon"><i class="fas fa-search"></i></button>
                    </form>
                    <a href="search.php" class="search2 i-links" id="icon-link"><i class="fas fa-search"></i></a>
                    <?php if(isset($_SESSION['user_id'])){
                            ?>
                            <a href="bookmark.php" class="i-links" id="icon-link"><i class="fas fa-bookmark"></i></a>
                            <a href="cart.php" class="i-links" id="icon-link" name="cart"><i class="fas fa-shopping-bag"></i></a>
                            <?php
                            }
                    ?>
                    <a href="<?php if(isset($_SESSION['shop_id'])){ echo "shopProfile.php";} else{echo "userProfile.php";}  ?>" id="icon-link" class="i-links"><i class="fas fa-user"></i></a>
                    <?php
                        $userId = 0;
                        isset($_SESSION['user_id'])?$userId = $_SESSION['user_id'] : $userId=0;
                        if($userId){
                            $sqlCounter = "SELECT distinct item_id FROM cart where user_id= '$userId' and order_status=0;";
                            $result = mysqli_query($con,$sqlCounter);
                            $resultcheck = mysqli_num_rows($result);
                            if($resultcheck > 0){
                            ?>
                            <div class="cart-counter"><span><?php echo $resultcheck;?></span></div>
                            <?php
                            }
                        }
                    ?>
                </div>

            </div>
        </nav>
    </header>

    <!-- header ends -->
    <!-- main starts -->
<main style="margin-top:4rem; border:1px solid transparent;">
<!-- It ends in footer page -->