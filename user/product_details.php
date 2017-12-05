<?php
$id=$_GET["id"];
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "hassan");

if (isset($_POST["submit1"]))
{
    $d = 0;
    if(is_array($_COOKIE['item']))//this is for checking cookies available or not
    {
        foreach ($_COOKIE['item'] as $name => $value)
        {
            $d = $d+1;
        } 
        $d = $d+1;
    }
    else
   { 
    $d = $d+1;  
   } 
//to get item description from table
    $res3 = mysqli_query($link,"select * from product where id= $id");
     while($row3 = mysqli_fetch_array($res3))
 {
    
   $img1 = $row3["product_image"];
   $nm = $row3["product_name"];
   $price = $row3["product_price"];
   $qty = "1";
   $total = $price * $qty;
 }
 if(is_array($_COOKIE['item']))//this is for checking cookies available or not
    {
        foreach ($_COOKIE['item'] as $name1 => $value)
        {
            $values11=explode("__",$value);
            $found=0;
            if($img1==$values11[0])
            {
                $found=$found+1;
                $qty=$values11[3]+1;
                
                $tb_qty;
                $res = mysqli_query($link, "select * from product where product_image='$img1'");
                while ($row = mysqli_fetch_array($res))
                {
                    $tb_qty = $row["product_qty"];
                }
                
                if ($tb_qty < $qty) {
                    ?>
                    <script type="text/javascript">
                        alert("This is too much quantity Not Available")
                        </script>

                    <?php
                    
                } else {
              
                
                $total=$values11[2]*$qty;
                setcookie("item[$name1]",$img1."__".$nm."__".$price."__".$qty."__".$total,time()+1800);
            
                
                
            }
            
        }
            
    }
        if($found==0)
        {
             setcookie("item[$d]",$img1."__". $nm."__".$price."__".$qty."__".$total, time() + 1800);//new
        }
    }
    else
    {
        setcookie("item[$d]",$img1."__". $nm."__".$price."__".$qty."__".$total, time() + 1800);//new
    }
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">-->
	<link href="css/main.css" rel="stylesheet">
	<!--<link href="css/responsive.css" rel="stylesheet">-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
<!--    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">-->
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
											</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html" class="active">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										
									</h4>
								</div>
								
							</div>
							
							
							
							
							
						</div><!--/brands_products-->
						
						
						
					
						
					</div>
				</div>
				
				
                                        <?php
                                        $res= mysqli_query($link, "select * from product where id = $id");
                                        while($row= mysqli_fetch_array($res))
                                        {
                                         ?>
                            <div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="../admin/<?php echo $row["product_image"];?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								 
							</div>

						</div>
                                            
                                            <form name="form1" action="" method="post">                                        
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row["product_name"];?></h2>
								<p><?php echo $row["id"];?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>US $<?php echo $row["product_price"];?></span>
									<label>Quantity:</label>
									<input type="text" value="<?php echo $row["product_qty"];?>" />
									<button type="submit" name="submit1" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								
								<!--<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>-->
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					</form> 
                                        <!--end here-->
                            
                            
                                        <?php
                                            
                                            
                                        }        
                                            
                                        ?>
                                        
                                        
					