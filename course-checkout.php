<?php include 'header.php';?>

<?php
$id = $_REQUEST['course'];
$sel = "select * from aws_coursedetails where course_id = $id";
$details = db_lib::db_execute_select($sel);
?>


<style>

	#info
	{
		font-size: 18px;
		color: #555;
		text-align: center;
		margin-bottom: 25px;
	}

	a{
		color: #074E8C;
	}

	.scrollbar
	{
		background: #fff;
		overflow-y: scroll;
		margin-bottom: 25px;
	}

	.force-overflow
	{
		min-height: 500px;
	}

	#wrapper
	{
		text-align: center;
		width: 500px;
		margin: auto;
	}


	#style-14::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.6);
		background-color: #CCCCCC;
	}

	#style-14::-webkit-scrollbar
	{
		width: 5px;
		background-color: #F5F5F5;
	}

	#style-14::-webkit-scrollbar-thumb
	{
		background-color: #FFF;
		background-image: -webkit-linear-gradient(90deg,
			rgba(0, 0, 0, 1) 0%,
			rgba(0, 0, 0, 1) 25%,
			transparent 100%,
			transparent)
	}


</style>

<div class="container-fluid" style="background: linear-gradient(to right, #85D8CE, #085078);
 background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 25.2px; padding: 30px;">
	<div class="container">
		<div class="col-md-3">
			<div class="courseimage">
				<img src="videodir/<?php echo $details[0]['banner'];?>" class="img-responsive">
			</div>
		</div>
		<div class="col-md-8 col-md-offset-1">
			<h1 style="color:#fff; font-size: 30px;"> <?php echo $details[0]['title']; ?></h1>
			<p class="text-justify" style="color:#fff; font-size: 14px;">CBSC > English Medium > Class 6</p>

			<p style="font-weight: 700; font-size:18px; color:#fff; padding-top: 10px">Rs. <?php echo $details[0]['price']; ?></p>

			<div class="col-md-3" style="padding:0">
				<select class="form-control">
					<option>Please Select</option>
					<option value="Online">Online</option>
				</select>
			</div>

			<div class="col-md-3 p-m-20">
				<select class="form-control">
					<option>Please Select</option>
					<option value="">One Years</option>
					<option value="">Free Trial</option>
				</select>
			</div>
			<div class="clearfix"></div>
			<div style="padding-top:20px;">

				<a href="add-to-cart.php" class="btn btn-style2"> Add To Cart </a> &nbsp; &nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-style2" data-toggle="modal" data-target="#myModal" style="color:#fff"> Drop A Query </a>
			</div>
		</div>
	</div>
</div>


<div class="bundle-content">
	<div class="container">
		<div class="row pt-80">
			<div class="col-lg-4 col-md-4 sidebar-left scrollbar" id="style-14">
				<div class="instructor-right__item">
					<div class="column-left__title"></div>
					<div class="courses__list blogs">
						<?php

								$id = $_REQUEST['course'];
								$video1 = "select * from aws_videodetails where course_id = $id";
								$vdetails1 = db_lib::db_execute_select($video1);
								foreach($vdetails1 as $value){
							?>
							<div class="courses__item courses__item1">
								<div class="courses__top">
									<div class="black-bg">
										<img class="courses__top__image img-responsive" src="videodir/video_course/<?php echo $value['video_banner'];?>" alt="video">
									</div>

								</div>

								<div class="courses__content"><a class="courses__content__title" href="#"><?php echo  $value['title']; ?> </a>
									<div class="courses__content__info">
										<div class="courses__info__item"><i class="fa fa-lock icaon11 " aria-hidden="true"></i><i class="fa fa-clock-o" aria-hidden="true"></i></i> <span class="courses__content__number"> <?php echo  $value['timing']; ?></span></div>
									</div>
								</div>
							</div>
							<?php 
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-md-offset-1">
				<div class="bundle-header__about">
					<h1 class="bundle-header__title" style="font-size: 35px; font-family: 'Pacifico';"> Course Overview</h1>
					<p class="bundle-header__content">
						<?php echo $details[0]['description'];?> 
					</p>
				</div>

				<div class="bundle-list">
					<div class="bundle" id="creator" style="border: 1px solid #d6d6d6;">
						<?php

						$id = $_REQUEST['course'];
						$video = "select * from aws_videodetails where course_id = $id";
						$vdetails = db_lib::db_execute_select($video);


						?>
						<div class="bundle__content">           
							<a data-fancybox="video" href="videodir/video_course/<?php echo $vdetails[0]['video'];?>">
								<div class="creator" style="background: url(videodir/<?php echo $details[0]['banner'];?>) no-repeat; background-color: rgba(37, 37, 37, 0.88);">
									<p class="btn btn-danger tag-bunle">Watch Demo Video</p>
									<div class="videoicon"><i class='fa fa-play-circle-o faa-pulse animated fa-4x iconposition'></i></div>
									<div class="creator__title"><?php echo $vdetails[0]['title']; ?></div>
									<div class="creator__content">
										<?php echo $vdetails[0]['description']; ?>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 2. Create links -->
		<div class="row">
			<div class="bundle" id="faq">
				<div class="bundle__title"></div>
				<div class="bundle__content">
					<div class="faqs faqs--course-single" id="faqs">
						<?php

						$id = $_REQUEST['course'];
						$video1 = "select * from aws_videodetails where course_id = $id";
						$vdetails1 = db_lib::db_execute_select($video1);
						foreach($vdetails1 as $value){
							$video_id= $value['video_id'];
							?>

							<div class="panel faqs__item">
								<div class="faqs__heading">
									<h4 class="faqs__title"><a class="faqs__link" data-toggle="collapse" data-parent="#faqs" href="#<?php echo $video_id ?>answer1" aria-expanded="true"><?php echo $value['title']; ?><span class="glyph-icon flaticon-arrows-3 faqs__icon"></span></a>
									</h4>
								</div>
								<div class="panel-collapse collapse in" id="<?php echo $video_id ?>answer1">
									<div class="faqs__body">
										<?php echo  $value['description']; ?>
									</div>
								</div>
							</div>

						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="bundle" id="how-it-works">
			<div class="bundle__title">How it works</div>
			<div class="bundle__content">
				<div class="list_works">
					<div class="list_works__item">
						<div class="list_works__wapper"><img class="list_works__image" src="assets/img/course-single/icon-login.png" alt="How to works"></div>
						<div class="list_works__content">
							<div class="list_works__title">Log In</div>
							<div class="list_works__subs">In just a few steps, you can register and enroll.</div>
						</div>
					</div>
					<div class="list_works__item">
						<div class="list_works__wapper"><img class="list_works__image" src="assets/img/course-single/Icon-how-it-works-1.png" alt="How to works"></div>
						<div class="list_works__content">
							<div class="list_works__title">Select Course</div>
							<div class="list_works__subs">Our courses are available online in Hindi medium & English medium. Students can select as per their convenience. Our website and mobile App offer the online medium whereas the offline version is supported through our encrypted & password protected USBs & e-Books.

							</div>
						</div>
					</div>
					<div class="list_works__item">
						<div class="list_works__wapper"><img class="list_works__image" src="assets/img/course-single/Icon-how-it-works-2.png" alt="How to works"></div>
						<div class="list_works__content">
							<div class="list_works__title">Help from Your Peers</div>
							<div class="list_works__subs">Connect with thousands of other learners and debate ideas, discuss course material, and get help mastering concepts.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>



<?php include 'footer.php';?>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-image:url('assets/img/blue-bg.jpg');">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="signin-form__body__title text-center" style="color:#fff; font-family:cursive;">Drop A Query</h3>
				<p class="signin-form__body__sub text-center" style="color:#fff;"> Ask Us Anything, or write a feedback.</p>
			</div>
			<div class="modal-body">
				<form class="signin-form__form" action="enquirydb.php?enquiry=save" method="post" name="form"  enctype="multipart/form-data">
					<div class="signin-form__form__inputs">
						<div class="col-md-6">
							<input class="input-item" type="text" placeholder="First Name" name="f_name" required>
						</div>
						<div class="col-md-6">
							<input class="input-item" type="text" placeholder="Last Name" name="l_name" required>
						</div>
						<div class="col-md-6">
							<input class="input-item" type="email" placeholder="Email" name="email" autocomplete="off"required>
						</div>
						<div class="col-md-6">
							<input class="input-item" type="text" placeholder="Mobile No." name="mobile_no" maxlength="10" required>
						</div>
						<div class="col-md-12">
							<textarea class="form-control" placeholder="Message" name="message"></textarea>
						</div>

						<div class="col-md-12 text-center" style="padding-top: 20px;">
							<button type="submit" class="btn-green list-link__btn"> Submit </button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			if (!$.browser.webkit) {
				$('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
			}
		});
	</script>