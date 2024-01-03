<?php


include 'helper/connection.php';
session_start(); 
error_reporting(0); 

$id_customer = $_SESSION['id_customer'];
$query = "SELECT * from customer where id_customer = '$id_customer'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$nama = $row['nama_customer'];


					$query = 
					"SELECT * from kategori order by nama_kategori";
					
					$result = mysqli_query($con, $query);

					if (mysqli_num_rows($result) > 0)
					{
						$index = 1;

						while($row = mysqli_fetch_assoc($result))
						{
							$id_kategori = $row['id_kategori'];
							echo "
								<li><a href='categories.php?id_kategori=$id_kategori'>".$row['nama_kategori']."</a></li>
							";
						}
					}
				?>