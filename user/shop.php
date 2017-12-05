<?php
include "header.php";	
//include "left_menu.php";
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "hassan");
        
?>
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
				
                                    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                                                
                                                
     <?php
include("pagination/function.php");
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $limit = 3;//if you want to display 10 record per page than you have to change here
        $startpoint = ($page * $limit) - $limit;
        $statement = "product"; //you have to pass your query over here
    
    $res=mysqli_query($link,"select * from {$statement} LIMIT {$startpoint} , {$limit}"); 
    while ($row = mysqli_fetch_array($res))
  {
     ?>
       <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
                                                                            <img src="../admin/<?php echo$row["product_image"];?>" alt="" />
										<h2>$<?php echo$row["product_price"];?></h2>
										<p><?php echo$row["product_name"];?></p>
                                                                                <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$<?php echo$row["product_price"];?></h2>
											<p><?php echo$row["product_name"];?></p>
											<a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>                                         
     <?php                                           
  }
                                                
      ?>
						
						
                                        </div>
						<ul class="pagination">
						<?php	
                                                    echo pagination($statement,$limit,$page);
                                                 ?>   
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	<?php
        include "footer.php"
        ?>