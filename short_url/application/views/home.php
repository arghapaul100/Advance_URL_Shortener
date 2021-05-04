<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>URL Shortener</title>
</head>
<body>
<section id="outer" class="">
	<nav class="navbar navbar-expand-sm navbar-light">
		<a href="#" class="navbar-brand ml-5">
			<i class="fas fa-link"></i>URL Shortener
		</a>
		<div class="ml-auto mr-5">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.php/dashboard" class="nav-link">
						<button class="btn" id="our_dashboard_btn">Our Dashboard</button>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<section id="main">
		<div class="container">
			<div class="row justify-content-center d-flex align-items-center">
				<div class="col-lg-6" id="first_column">
					<div id="bg_img">
					</div>
				</div>
				<div class="col-lg-6" id="sec_column">

					<div class="" id="sec_col_child">
						<div id="heading_title" class="text-center">
							<h1 id="heading">Shorten Any Links</h1>
							<p id="title">Build and protect your brands using powerful and <br> recognizable short links. <span id="free_forever_tag">it's free forever.</span></p>
						</div>

						<div id="input_field">
							<form method="post" autocomplete="off" name="myForm1">
								<div id="text_icon_container">
									<div id="url_link_image_for_textbox" class="">
										<i class='fas fa-link link animate__animated animate__bounceIn' id='fa-link'></i>
									</div>
									<input type="url" name="url_input" id="url" class="form-control" placeholder="Enter or paste a long URL" required="">
								</div>
								<div>
									<button class="btn" id="btn_shortener">Shorten</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<div id="popup_modal">
	<div id="popup_child">
		<div id="popup_inner_child" class="">
			<div class="alert alert-success m-0 text-justify" id="alert">
				<strong>Note : </strong>This URL will be valid, when you save it.
			</div>
			<div class="m-0"id="qrCode_container">
				<div id="qr_code"></div>
			</div>
			<div id='save_edit_container'>
				<form method="post" name="myForm2" autocomplete="off">
					<div class="form-group m-0">
						<div id="title_container">
							<div id="popup_url_icon_container">
								<i class='fas fa-file-alt title animate__animated animate__bounceIn' id='fa-title'></i>
							</div>
							<input type="text" name="title" id="url_title" class="form-control" placeholder="Enter you URL title here">
						</div>
						<div id="generated_url_container">
							<div id="generated_child_url_container">
								<div id="popup_url_icon_container" class="">
									<i class='fas fa-link link animate__animated animate__bounceIn' id='fa-link'></i>
								</div>
								<input type="text" name="new_url" id="txt_generated_url" class="form-control" placeholder="Your new url is here..">
								<div id="popup_url_icon_container" class="">
									<i class='far fa-copy copy animate__animated animate__bounceIn' id='fa-copy'></i>
								</div>
							</div>
						</div>
						<div id="btn_save_container" class="">
							<button id="btn_save" class="btn btn-block m-0">Save</button>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
	<script type="text/javascript" src="./assets/js/main.js"></script>

<script>

</script>

</body>
</html>