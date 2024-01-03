<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>In-Book</title>
	<style>
		.fixed-footer {
            width: 100%;
            position: static;
            margin: 0 10px 10px 0;
            padding: 10px 0;
            color: rgba(255, 255, 255, 1);
            text-align: center;
            bottom:0;
        }
	</style>
</head>

	<?php 

	include 'helper/connection.php';
	session_start(); 
	error_reporting(0); 

	$id_customer = $_SESSION['id_customer'];
	$query = "SELECT * from customer where id_customer = '$id_customer'";

	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);

	$nama = $row['nama_customer'];

	?>

<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">In-Book</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
		<a class="nav-link" href="cart.php">Cart 
				<span>(<?php if(isset($_SESSION["nomor"])){ echo $_SESSION["nomor"]; } else{ echo 0 ;} ?>)</span>
			</a>
		</li>
		</div>
		
		<a href="admin/index.php" class="btn btn-info mr-3">Login</a>
	</nav>
	
	<!-- carousel -->
	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner text-center">
			<div class="carousel-item active">
			<img src="images/carousel1.jpg" class=" w-40 img-fluid" alt="Responsive image">>
			</div>
			<div class="carousel-item">
			<img src="images/carousel1.jpg" class="d-block w-40" alt="Responsive image">
			</div>
			<div class="carousel-item">
			<img src="..." class="d-block w-100" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>


		<!-- Home -->

		<div class="home">
			<div class="home_slider_container">

				<!-- Home Slider -->
				<div class="owl-carousel owl-theme home_slider">

					<!-- Slider Item -->
					<div class="owl-item home_slider_item">
						<div class="home_slider_background" style="background-image:url(images/buku.jpeg)"></div>
						<div class="home_slider_content_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_slider_content" data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
											<div class="home_slider_title">
												<font size="5px">Toko Buku Islam sesuai pemahaman</font> Salafush Shalih.
											</div>
											<div class="home_slider_subtitle">Selamat Datang di MuslimSunnah.id</div>
											
											<div class="button button_light home_button"><a href="#produk">
													<font color="black">Beli Sekarang</font>
												</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Products -->
		<section id="produk">
			<div class="products">
				<div class="container">
					<div class="row">
						<div class="col">

							<div class="product_grid">
								<?php
								$query = 
								"select * from buku b,pengarang p
								where b.id_pengarang = p.id_pengarang";
								
								$result = mysqli_query($con, $query);

								if (mysqli_num_rows($result) > 0)
								{
									$index = 1;

									while($row = mysqli_fetch_assoc($result))
									{
										$id_buku = $row['id_buku'];
										echo "
										<div class='product'>
										<a href='product.php?id_buku=$id_buku'>
											<div class='product_image'><img src='images/". $row['gambar'] ."' alt=''></div>
											<div class='product_content'>
												<div class='product_title'>".$row['judul_buku']."</a></div>
												<div class='product_price'>Rp.".$row['harga'].",-</div>
												<br>
												<div class='nmpengarang'>".$row['nama_pengarang']."</div>
											</div>
										</div>
										";
									}
								}
                            ?>

							</div>

						</div>
					</div>
				</div>
			</div>
		</section>



    <!-- footer -->
    <div class="fixed-footer bg-dark">
      <div class="container">Copyright &copy; 2023 Kelompok PWWW</div>
    </div>


         
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
