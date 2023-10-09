<!DOCTYPE html>
<html lang="es">
<?php
require_once '././php/connect.php';
// Establish a database connection
$conn = connect();
// Check connection status
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
session_start();


?>

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
			<a href="#" class="btn d-block " data-toggle="modal" data-target="#categoryModal">
				<i class="fas fa-shopping-cart"></i> View Cart
			</a>
			<?php if (isset($_SESSION['costumer'])) :
				$costumer = json_decode($_SESSION['costumer']);
			?>
				<div class="dropdown my-auto ms-2 rounded">
					<button class="fs-2 dropdown-toggle rounded" style="background-color: #D5C0AC;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						<?= $costumer->firstName . " " . $costumer->lastName ?>
					</button>
					<ul class="dropdown-menu rounded" aria-labelledby="dropdownMenuButton1">
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
				<div class="col-md-6 ">
					<div class="content">
						<h3>Brewing happiness one cup at a time.</h3>
						<a href="#menu" class="btn" id="Place-Order">Buy One Now</a>
					</div>
				</div>
				<div class="col-md-5">
					<div style="max-width: 500px; margin: auto; max-height: 500px;">
						<div class="image">
							<div class="swiper review-slider">
								<div class="swiper-wrapper" id="imageSlider">
									<!-- Images will be dynamically loaded here -->
								</div>
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				function loadImages() {
					$.ajax({
						url: 'promolist.php',
						type: 'GET',
						dataType: 'json',
						success: function(data) {
							if (data.length > 0) {
								var imageSlider = $('#imageSlider');
								imageSlider.empty();
								for (var i = 0; i < data.length; i++) {
									var promoInfo = data[i];
									var imageUrl = promoInfo.imageUrl;
									var promoName = promoInfo.promoName;
									var promoPercentage = promoInfo.promoPercentage;
									var minimumSpend = promoInfo.minimumSpend;

									console.log('Image URL:', imageUrl);
									console.log('Promo Name:', promoName);
									console.log('Promo Percentage:', promoPercentage);
									console.log('Minimum Spend:', minimumSpend);

									var swiperSlide = $('<div class="swiper-slide box">');
									var image = $('<img>').attr('src', imageUrl).attr('alt', 'Promo Image');

									// Set the desired width and height to make the images larger and add creative styles
									image.css('width', '100%');
									image.css('height', '100%');
									image.css('border', '2px solid #e3e3e3'); // Add a border
									image.css('border-radius', '30px'); // Add rounded corners
									image.css('box-shadow', '0 4px 8px rgba(0, 0, 0, 0.2)'); // Add a shadow
									image.css('transition', 'transform 0.3s ease-in-out'); // Add a hover effect

									// Add a hover effect for scaling the image
									image.hover(
										function() {
											$(this).css('transform', 'scale(1.05)'); // Scale the image on hover
										},
										function() {
											$(this).css('transform', 'scale(1)'); // Reset the scale when not hovering
										}
									);

									swiperSlide.append(image);
									imageSlider.append(swiperSlide);
								}
							} else {
								console.log('No promo images available.');
							}
						},
						error: function() {
							console.log('Error fetching promo images.');
						}
					});
				}
				loadImages();
			});
		</script>
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

			<div id="box-container" class="container-fluid my-5">
				<!-- Add this line where you want the loader to appear -->
				<div id="loader" class="spinner-grow text-primary" role="status" style="display: none;">
					<span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>
		<script>
			let image;
			let inventoryID;
			let itemCode;
			let itemTypeID;
			let variantsJSON;
			let variantPrice;


			$(document).ready(function() {
				function loadMenu(category) {
					$.ajax({
						url: 'menu.php',
						type: 'GET',
						data: {
							category: category
						},
						beforeSend: function() {
							$('#loader').show();
							$('#box-container').css('opacity', '0');
						},
						success: (data) => {
							setTimeout(() => {
								$('#loader').hide();
								$('#box-container').html(data).css('opacity', '1');

								$(".addToCartBtn").click(async function() {
									const isLoggedIn = await validateLoggedIn();
									if (!isLoggedIn) return;

									image = $(this).data('image');
									itemCode = $(this).data('item-code');
									inventoryID = $(this).data('inventory-id');
									itemTypeID = $(this).data('item-id');
									variantsJSON = $(this).data('variants');
									// Set the values for the image and HTML elements
									$('#AddonsProdimage').attr('src', image);
									$('#AddonsProdName').text(itemCode);
									// Log itemCode to check its value
									$('#addonsmodal').modal('show');

								});
							}, 500);
						},
						error: function() {
							console.log('Error loading menu.');
						}
					});
				}

				loadMenu('');

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
		<!-- script for addons -->
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				// Get a reference to the "Done" button


				var doneButton = document.getElementById("doneButton");
				let rowAdded = false;
				const cartTableBody = document.querySelector("#cartTable tbody");
				// Add a click event listener to the "Done" button
				doneButton.addEventListener("click", function() {
					var select = document.getElementById("sugarLevel");
					var selectedValue = select.value;
					if (selectedValue == "") {
						Swal.fire({
							title: "Please select sugar level!",
							icon: "warning", // Adding an error icon
						});
						console.log(selectedValue);
					} else if (!rowAdded) {
						// Set the flag to true to prevent adding more rows
						rowAdded = true;

						// Get all the checkboxes with the name "addon[]"
						const checkboxes = document.querySelectorAll('input[name="addon[]"]:checked');

						// Create an array to store the selected addon data
						const selectedAddonsData = [];

						// Loop through the selected checkboxes and extract their values, description, and price
						checkboxes.forEach(function(checkbox) {
							const addonId = checkbox.value;
							const addonDescription = document.querySelector(`#addon${addonId} .description-text`).textContent;
							const addonPrice = document.querySelector(`#addon${addonId} .price-text`).textContent;

							selectedAddonsData.push({
								id: addonId,
								description: addonDescription,
								price: addonPrice
							});
						});

						// Calculate totalAmount and descriptions
						let totalAmount = 0;
						let PartialAmount = 0;
						let descriptions = "";

						selectedAddonsData.forEach(function(addon) {
							// Extract addonPrice and parse it as a floating-point number
							const addonPrice = parseFloat(addon.price.replace(/[^\d.]/g, ''));

							// Check if addonPrice is a valid number before adding it to totalAmount
							if (!isNaN(addonPrice)) {
								totalAmount += addonPrice;
							}
							PartialAmount = totalAmount;
							descriptions += addon.description + ", ";
						});

						// Remove the trailing comma and space
						descriptions = descriptions.slice(0, -2);
						console.log(selectedValue);

						const newRow = `
									<tr>
										<td style="display:none;">${inventoryID}</td>
										<td><img src="${image}" alt="Product Image" width="50"></td>
										<td>${itemCode}</td>
										<td>
											<input class="sizeSelect" type="text" name="size" id="size" list="sizeOptions" placeholder="Select Size">
											<datalist id="sizeOptions">
											</datalist>
										</td>
										<td><input type="number" class="qtySelect" name="qty" id="qty" value="1"></td>
										<td id="sugarLeveel">${selectedValue}</td>
										<td id="addonsDescription">${descriptions}</td>
										<td class="priceRow" id="price">${totalAmount.toFixed(2)}</td>
										<td><button class=" btn-danger btn-sm removeItem">Remove</button></td>
									</tr>
								`;

						// Append newRow to the cart table
						cartTableBody.insertAdjacentHTML("beforeend", newRow);


						// Create a new row HTML string


						const dataList = document.getElementById('sizeOptions');
						const sizeInput = document.getElementById('size');
						const qtyInput = document.getElementById('qty');
						const priceElement = document.getElementById('price');
						// Remove any existing options and set the 'readonly' attribute
						while (dataList.firstChild) {
							dataList.removeChild(dataList.firstChild);
						}
						// Add an option for each variant
						variantsJSON.forEach(variant => {
							var option = document.createElement('option');
							option.value = variant.variantName;
							dataList.appendChild(option);
						});
						$(".sizeSelect").on('change', function() {
							// Get the selected value from the input
							const selectedSize = $(this).val();

							// Find the variant that matches the selected size
							const selectedVariant = variantsJSON.find(variant => variant.variantName === selectedSize);

							// Check if a matching variant was found
							if (selectedVariant) {
								const selectedPrice = parseFloat(selectedVariant.price);
								totalAmount = PartialAmount;
								// Log the selected size and its corresponding price
								console.log("Selected Size:", selectedSize);
								console.log("Selected Price:", selectedPrice);
								totalAmount += selectedPrice;
								// priceElement.textContent = totalAmount.toFixed(2);
								$(this).closest("tr").find(".priceRow").text(totalAmount.toFixed(2));

								// Now you can use the selectedPrice as needed
							} else {
								// Handle the case where no matching variant was found
								Swal.fire({
									icon: 'error',
									title: 'No variant found',
									text: 'Please Select a Variant Size',
								});
							}
							calculateTotalPrice();
						});

						$(".qtySelect").on('change', function() {
							const qtyValue = parseFloat($(this).val());
							const qtyTotalAmt = qtyValue * totalAmount;
							$(this).closest("tr").find(".priceRow").text(qtyTotalAmt.toFixed(2));
							calculateTotalPrice();
						});

						// Add click event listener to remove items
						$(".removeItem").click(function() {
							$(this).closest("tr").remove();
							calculateTotalPrice();
						});

						// Hide/show modals
						$('#addonsmodal').modal('hide');
						$('#categoryModal').modal('show');
						calculateTotalPrice();
						rowAdded = false;
					}
				});

			});
		</script>
	</section>


	<!-- REVIEW -->
	<section class="review" id="review">
		<h1 class="heading">reviews <span>what people say</span></h1>

		<div class="swiper review-slider">
			<div class="swiper-wrapper">
				<?php
				$sql = "SELECT * FROM feedback_tb";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
						<div class="swiper-slide box">
							<i class="fas fa-quote-left"></i>
							<i class="fas fa-quote-right"></i>

							<img src="img/user.jpg">
							<!-- <img src="<?php echo $row['image_path']; ?>" alt=""> -->
							<div class="stars">
								<?php
								// Assuming the star rating is stored in the 'rating' column
								$rating = $row['ratingStars'];
								for ($i = 0; $i < $rating; $i++) {
									echo '<i class="fas fa-star"></i>';
								}
								?>
							</div>

							<p><?php echo $row['SalesID']; ?></p>

							<span><?php echo $row['feedback']; ?></span>
						</div>
				<?php
					}
				} else {
					echo "No reviews found.";
				}
				?>
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
	<?php include './landingpage/cart/addons.php' ?>
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
				delay: 5000,
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