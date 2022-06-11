<?php
session_start();
include 'database.php';

if(!isset($_SESSION['log'])){
	header('location:login.php');
} else {
	
};
	$uid = $_SESSION['id'];
	$caricart = mysqli_query($conn,"select * from cart where userid='$uid' and status='Cart'");
	$fetc = mysqli_fetch_array($caricart);
	$orderidd = $fetc['orderid'];
	$itungtrans = mysqli_query($conn,"select count(detailid) as jumlahtrans from detailorder where orderid='$orderidd'");
	$itungtrans2 = mysqli_fetch_assoc($itungtrans);
	$itungtrans3 = $itungtrans2['jumlahtrans'];
	
if(isset($_POST["checkout"])){
	
	$q3 = mysqli_query($conn, "update cart set status='Payment' where orderid='$orderidd'");
	if($q3){
		echo "Berhasil Check Out
		<meta http-equiv='refresh' content='1; url= index.php'/>";
	} else {
		echo "Gagal Check Out
		<meta http-equiv='refresh' content='1; url= index.php'/>";
	}
} else {
	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dropdeer" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="agile-login">
				<ul>
				<?php
				if(!isset($_SESSION['log'])){
					echo '
					<li><a href="registered.php"> Daftar</a></li>
					<li><a href="login.php">Masuk</a></li>
					';
				} else {
					
					if($_SESSION['role']=='Member'){
					echo '
					<li style="color:white">Halo, '.$_SESSION["name"].'
					<li><a href="logout.php">Keluar?</a></li>
					';
					} else {
					echo '
					<li style="color:white">Halo, '.$_SESSION["name"].'
					<li><a href="admin">Admin Panel</a></li>
					<li><a href="logout.php">Keluar?</a></li>
					';
					};
					
				}
				?>
					
				</ul>
			</div>
			<div class="product_list_header">  
					<a href="cart.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					 </a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">Dropdeer</a></h1>
			</div>
		<div class="w3l_search">
			<form action="search.php" method="post">
				<input type="search" name="Search" placeholder="Cari produk...">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori Produk<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Kategori</h6>
														
														<?php 
														$kat=mysqli_query($conn,"SELECT * from kategori order by idkategori ASC");
														while($p=mysqli_fetch_array($kat)){

															?>
														<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>
																				
														<?php
																	}
														?>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>
									<li><a href="cart.php">Keranjang Saya</a></li>
									<li><a href="daftarorder.php">Daftar Order</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h1>Terima kasih, <?=$_SESSION['name']?> Telah Membeli <?php echo $itungtrans3 ?> Barang Di Dropdeer</span></h1>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>No.</th>	
							<th>Produk</th>
							<th>Nama Produk</th>
							<th>Jumlah</th>
							
						
							<th>Sub Total</th>
							<th>Hapus</th>
						</tr>
					</thead>
					
					<?php 
						$brg=mysqli_query($conn,"SELECT * from detailorder d, produk p where orderid='$orderidd' and d.idproduk=p.idproduk order by d.idproduk ASC");
						$no=1;
						while($b=mysqli_fetch_array($brg)){

					?>
					<tr class="rem1"><form method="post">
						<td class="invert"><?php echo $no++ ?></td>
						<td class="invert"><a href="product.php?idproduk=<?php echo $b['idproduk'] ?>"><img src="<?php echo $b['gambar'] ?>" width="100px" height="100px" /></a></td>
						<td class="invert"><?php echo $b['namaproduk'] ?></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                     
									<h4><?php echo $b['qty'] ?></h4>
								</div>
							</div>
						</td>
				
						<td class="invert">$<?php echo number_format($b['harga']*$b['qty']) ?></td>
						<td class="invert">
							<div class="rem">
							
								<input type="submit" name="update" class="form-control" value="Update" \>
								<input type="hidden" name="idproduknya" value="<?php echo $b['idproduk'] ?>" \>
								<input type="submit" name="hapus" class="form-control" value="Hapus" \>
							</form>
							</div>
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
						</td>
					</tr>
					<?php
						}
					?>
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Total Harga</h4>
					<ul>
						<?php 
						$brg=mysqli_query($conn,"SELECT * from detailorder d, produk p where orderid='$orderidd' and d.idproduk=p.idproduk order by d.idproduk ASC");
						$no=1;
						$subtotal = 0;
						while($b=mysqli_fetch_array($brg)){
						$hrg = $b['harga'];
						$qtyy = $b['qty'];
						$totalharga = $hrg * $qtyy;
						$subtotal += $totalharga;
						}
						?>
						
						<h1><input type="text" value="$<?php echo number_format($subtotal) ?>" disabled \></h1>
					</ul>
				</div>
				<br>
				<div class="checkout-left-basket" style="width:80%;margin-top:60px;">
					<div class="checkout-left-basket">
					<h4>Nomer Resi</h4>
					<h1><input type="text" value="<?php echo $orderidd ?>" disabled \></h1>
				</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			
			
			<br>
			<hr>
			<br><center>
			<h2>Total harga yang tertera di atas sudah termasuk ongkos kirim sebesar $10.000</h2>
			<h2>Bila telah melakukan pembayaran, harap konfirmasikan pembayaran Anda.</h2>
			<br>
			
			
			<?php 
			$metode = mysqli_query($conn,"select * from pembayaran");
			
			while($p=mysqli_fetch_array($metode)){
				
			?>
			
			<img src="<?php echo $p['logo'] ?>" width="300px" height="200px"><br>
        <h4><?php echo $p['metode'] ?> - <?php echo $p['norek'] ?><br>
        a/n. <?php echo $p['an'] ?></h4><br>
        <br>
		 <hr>
			
			<?php
			}
		?>
		
		<br>
        <br>
        <p>Orderan anda Akan Segera kami proses 1x24 Jam Setelah Anda Melakukan Pembayaran ke ATM kami dan menyertakan informasi pribadi yang melakukan pembayaran seperti Nama Pemilik Rekening / Sumber Dana, Tanggal Pembayaran, Metode Pembayaran dan Jumlah Bayar.</p>
      
		<br>
		<form method="post">
		<input type="submit" class="form-control btn btn-success" name="checkout" value="I Agree and Check Out" \>
		</form>
	  
	  </center>
		</div>
	</div>
<!-- //checkout -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 4000,
				easingType: 'linear' 
				};
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 
</body>
</html>