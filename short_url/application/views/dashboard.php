<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dashboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Dashboard</title>
</head>
<body>
	<section id="main">
		<div id="jumbotron">
			<div id="form_container" class="">
				<form>
					<div class="form-group">
						<div id="text_search_container" class="input-group">
							<div class="input-group-prepend">
						      <span class="input-group-text">@</span>
						    </div>
							<input type="text" name="txt_search" class="form-control" id="myInput"placeholder="Search your url or title">
						</div>
					</div>
				</form>
				<h6 class="text-white text-center m-0">Search your URL by title or short url which you have remember. <a class="text-decoration-none" href="<?php echo site_url();?>">Home Page</a></h6>
			</div>
		</div>
		<div id="parent">
				<div id="data_containers">
					
					<?php

						if(isset($all_data)){
							$count = count($all_data);
							for ($i=0; $i < $count ; $i++) { 
					?>
						<div id="box">
								<div id="qr_box_container" class="">
									<div id="qr_box" style="background-image: url('https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $all_data[$i]['original_url'];?>&choe=UTF-8%22');" class=""></div>
								</div>
								<div id="contents">
									<div>
										<div id="head">
											<h4 class="mt-1">
											<?php 
												if(strlen($all_data[$i]['title']) > 10)
													echo substr($all_data[$i]['title'],0,10)."...";
												else
													echo $all_data[$i]['title'];
											?>
											</h4>
											<h5 class="mt-1">Total Clicks : <?php echo $all_data[$i]['clicks'];?></h5>
										</div>
										<p class="mt-1 mb-1">
											Main URL : 
											<a href="<?php echo $all_data[$i]['original_url'];?>" class="m-0 text-decoration-none orginal_url_text">
												Click here to visit by original url
											</a>
										</p>

										<p class="mt-1 mb-1" id="short_url">
											Short URL : <a href="<?php echo "http://localhost/short_url/?u=".$all_data[$i]['short_url'];?>" class="m-0" title="<?php echo "http://localhost/short_url/?u=".$all_data[$i]['short_url'];?>" id="short_url_link"><?php echo "http://localhost/short_url/?u=".$all_data[$i]['short_url'];?></a>
										</p>

										<div id="delete_copy_container" class="d-flex justify-content-end align-items-center">
											<a href="Home/delete?code=<?php echo $all_data[$i]['short_url'];?>" class="delete_link text-decoration-none mr-0">Delete</a>
										</div>
									</div>
								</div>
							</div>
					<?php

							}
						}else{
							echo $error;
						}
					?>
				</div>
			</div>
	</section>
	<script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
</body>
</html>