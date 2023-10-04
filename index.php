<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<?php
require_once '././php/connect.php';
// Establish a database connection
$conn = connect();
// Check connection status
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} ?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Romeo`s Coffee</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- SWIPER -->
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
	<!-- Font Awesome CDN Link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<!-- Custom CSS File Link  -->
	<link rel="stylesheet" href="./landingpage/css/style.css">

</head>

<body>
	<?php
	include('./php/session-dialog.php');
	include __DIR__ . '/track-order/index.php';
	?>
	<!-- HEADER -->
	<header class="header">
		<div id="menu-btn" class="fas fa-bars"></div>

		<a href="#" class="logo">Romeo`s cafe <i class="fas fa-mug-hot"></i></a>

		<nav class="navbar">
			<a href="#home">home</a>
			<a href="#about">about</a>
			<a href="#menu">menu</a>
			<a href="#review">reviews</a>
		</nav>

		<div class="d-flex">
			<a href="#" class="btn d-block" data-toggle="modal" data-target="#categoryModal">
				<i class="fas fa-shopping-cart"></i> View Cart
			</a>
			<?php if (isset($_SESSION['costumer'])) :
				$costumer = json_decode($_SESSION['costumer']);
			?>
				<div class="dropdown bg-danger my-auto ms-2">
					<button class="fs-2 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						<?= $costumer->firstName . " " . $costumer->lastName ?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item fs-2" href="/milktea-commerce/costumer/logout.php">Log out</a></li>
					</ul>
				</div>
			<?php else : ?>
				<a href="./costumer/login.php" class="btn mx-2">Log in</a>
				<a href="./costumer/register.php" class="btn">Register</a>
			<?php endif; ?>
		</div>

	</header>

	<!-- HOME -->
	<section class="home" id="home">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="content">
						<h3>Brewing happiness one cup at a time.</h3>
						<a href="#menu" class="btn" id="Place-Order">Buy One Now</a> <!-- Improved button text -->
					</div>
				</div>

				<div class="col-md-5">
					<div class="image">
						<div class="swiper review-slider">
							<div class="swiper-wrapper">
								<div class="swiper-slide box">
									<img src="./landingpage/image/pic-2.png" alt="">
								</div>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ABOUT -->
	<section class="about" id="about">
		<h1 class="heading">about us <span>why choose us</span></h1>
		<div class="row">
			<div class="image">
				<img src="./landingpage/image/about-img.png" alt="">
			</div>
			<div class="content">
				<h3 class="title">what's make our coffee special!</h3>
				<p>Romeo's Café: Where Love Meets Brew! Savor the Town's Best Milk Tea and Coffee.
					At Romeo's Café, we're not just brewing beverages; we're crafting moments of pure bliss and
					enchantment for every guest who walks through our doors. Nestled in the heart of our charming town,
					our café has become synonymous with exceptional quality, unparalleled taste, and an atmosphere that r
					adiates warmth and affection.
				</p>
				<a href="#" class="btn">read more</a>
				<div class="icons-container">
					<div class="icons">
						<img src="./landingpage/image/about-icon-1.png" alt="">
						<h3>quality coffee and Tea</h3>
					</div>
					<div class="icons">
						<img src="./landingpage/image/about-icon-2.png" alt="">
						<h3>our branches</h3>
					</div>
					<div class="icons">
						<img src="./landingpage/image/about-icon-3.png" alt="">
						<h3>free delivery</h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- MENU -->
	<section class="menu" id="menu">
		<h1 class="heading">Our Menu <span>Popular Menu</span></h1>
		<div class="fluid row w-100">
			<div class="container-fluid d-flex justify-content-center">
				<!-- Categories filter here where itemTypeID values -->
				<?php
				$query = "SELECT DISTINCT itemTypeID,description FROM itemtype_tb";
				$result = $conn->query($query);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo '<button class="btn costum-btn-primary m-2 sort-button" data-category="' . $row["itemTypeID"] . '">' . $row["description"] . '</button>';
					}
				}
				?>
			</div>

			<div id="box-container" class="container-fluid mt-5">
				<!-- Add this line where you want the loader to appear -->
				<div id="loader" class="spinner-grow text-primary" role="status" style="display: none;">
					<span class="sr-only">Loading...</span>
				</div>
				<input type="hidden" name="" id="">
			</div>
		</div>
		<script>
			// Function to add to cart
			$(document).ready(function() {
				// Function to load menu content
				function loadMenu(category) {
					$.ajax({
						url: 'menu.php', // Replace 'get_items.php' with the actual URL of your PHP script
						type: 'GET',
						data: {
							category: category
						},
						beforeSend: function() {
							$('#loader').show(); // Show loader
							$('#box-container').css('opacity', '0'); // Set box container opacity to 0
						},
						success: (data) => {
							setTimeout(() => {
								$('#loader').hide(); // Hide loader
								$('#box-container').html(data).css('opacity', '1'); // Show and fade in the HTML of the box container

								// cart button click
								$(".addToCartBtn").click(async function() {
									const isLoggedIn = await validateLoggedIn();
									if (!isLoggedIn) return;

									// Find the checked radio button with the name "variant"
									const image = $(this).data('image');
									const inventoryID = $(this).data('inventory-id');
									const itemCode = $(this).data('item-code');
									const itemTypeID = $(this).data('item-id');
									const newRow = `
												<tr>
													<td style="display:none;">${inventoryID}</td>
													<td><img src="${image}" alt="Product Image" width="50"></td>
													<td>${itemCode}</td>
													<td>
														<input type="text" name="size" list="sizeOptions">
															<datalist id="sizeOptions">
																<option value="Small">
																<option value="Medium">
																<option value="Large">
															</datalist>
													</td>
													<td><input type="number" name="qty" value="1"></td>
													<td></td>
													<td><button class="btn-danger btn-sm removeItem">Remove</button></td>
												</tr>
											`;

									// Append the new row to the cart table
									$("#cartTable tbody").append(newRow);
									// Add a click event handler to the "Remove" button
									$(".removeItem").click(function() {
										$(this).closest("tr").remove();
									});
									// Show a success message using Swal with enhanced content
									Swal.fire({
										title: "Successfully Added to Cart!",
										text: itemCode + " has been added to the cart",
										confirmButtonText: "Okay",
										imageUrl: image, // Display the product image in the notification
										imageWidth: 100, // Set the width of the image
										imageHeight: 100, // Set the height of the image
										showCancelButton: true, // Display a "Continue Shopping" button
										cancelButtonText: "Continue Shopping",
									}).then((result) => {
										if (result.isConfirmed) {
											// Show the Bootstrap modal
											$('#categoryModal').modal('show');
										}
									});
								});
							}, 500); // Delay of 0.5 seconds (500 milliseconds)
						},
						error: function() {
							console.log('Error loading menu.');
						}
					});
				}
				// Initial page load
				loadMenu('');

				// Handle category filter clicks
				$('.sort-button').on('click', function(e) {
					e.preventDefault();
					var category = $(this).data('category');
					loadMenu(category);
				});

				async function validateLoggedIn() {
					const isLoggedIn = <?= isset($_SESSION['costumer']) == true ? 'true' : 'false' ?>;
					if (!isLoggedIn) {
						Swal.fire({
							title: "Log in first before adding to cart!",
							showDenyButton: false,
							showCancelButton: true,
							confirmButtonText: `<a class="text-white" href="/milktea-commerce/costumer/login.php">Log In</a>`,
							denyButtonText: "Cancel"
						});
					}
					return isLoggedIn;
				}

			});
		</script>
	</section>


	<!-- REVIEW -->
	<section class="review" id="review">
		<h1 class="heading">reviews <span>what people says</span></h1>

		<div class="swiper review-slider">
			<div class="swiper-wrapper">
				<div class="swiper-slide box">
					<i class="fas fa-quote-left"></i>
					<i class="fas fa-quote-right"></i>
					<img src="./landingpage/image/pic-2.png" alt="">
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum optio quasi ut, illo ipsam
						assumenda.</p>
					<h3>john deo</h3>
					<span>satisfied client</span>
				</div>

				<div class="swiper-slide box">
					<i class="fas fa-quote-left"></i>
					<i class="fas fa-quote-right"></i>
					<img src="./landingpage/image/pic-3.png" alt="">
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius asperiores aliquam hic quis!
						Eligendi, aliquam.</p>
					<h3>john deo</h3>
					<span>satisfied client</span>
				</div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>

	<!-- FOOTER -->
	<section class="footer">
		<div class="box-container">

			<div class="box">
				<h3>quick links</h3>
				<a href="#home"><i class="fas fa-arrow-right"></i> home</a>
				<a href="#about"><i class="fas fa-arrow-right"></i> about</a>
				<a href="#menu"><i class="fas fa-arrow-right"></i> menu</a>
				<a href="#review"><i class="fas fa-arrow-right"></i> review</a>
				<a href="#book"><i class="fas fa-arrow-right"></i> book</a>
			</div>

			<div class="box">
				<h3>contact info</h3>
				<a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
				<a href="#"><i class="fab fa-twitter"></i> twitter</a>
				<a href="#"><i class="fab fa-instagram"></i> instagram</a>
				<a href="#"><i class="fab fa-linkedin"></i> linkedin</a>
				<a href="#"><i class="fab fa-twitter"></i> twitter</a>
			</div>
		</div>
	</section>

	<?php include './landingpage/cart/cart.php' ?>
	<!-- Bootstrap and jQuery Scripts -->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- SWIPER -->
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
	<!-- Custom JS File Link  -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<!-- sliders functions -->
	<script>
		let menu = document.querySelector('#menu-btn');
		let navbar = document.querySelector('.navbar');

		menu.onclick = () => {
			menu.classList.toggle('fa-times');
			navbar.classList.toggle('active');
		};

		window.onscroll = () => {
			menu.classList.remove('fa-times');
			navbar.classList.remove('active');
		};



		var swiper = new Swiper(".review-slider", {
			spaceBetween: 20,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			loop: true,
			grabCursor: true,
			autoplay: {
				delay: 7500,
				disableOnInteraction: false,
			},
			breakpoints: {
				0: {
					slidesPerView: 1
				},
				
			},
		});
	</script>

</body>

</html>