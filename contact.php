<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sport Watch</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include('includes/style.php'); ?>
  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-logo">
          <a href="#"><img src="public/images/logo.png" alt="Image"></a>
        </div>
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

	<?php include('includes/header.php'); ?>

    <div class="site-blocks-cover overlay" style="background-image: url(public/images/cool.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-start">
          <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
            <h1 class="bg-text-line">Contact Us</h1>
            <p class="mt-4">Get in touch with us.</p>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-first">
          <div class="col-md-7">
            <form action="#" method="post" class="bg-white">

              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Subject </label>
                    <input type="text" class="form-control" id="c_subject" name="c_subject">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-5">
            <div class="p-4 border mb-3 bg-white">
              <p class="mb-0">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0">Email Address</p>
              <p class="mb-4"><a href="#">youremail@domain.com</a></p>

            </div>

          </div>

        </div>
      </div>
    </div>



    <div class="site-section feature-blocks-1 no-margin-top">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="text-black">Match Highlights</h2>
          </div>
        </div>
        <div class="row" id="gen-news">
        </div>
        </div>
      </div>
    </div>

	<?php include("includes/footer.php"); ?>
  </div>
<?php include("includes/script.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
    // get all general news
    $.ajax({
      type:"GET",
      url:'__factory/fetch_general_news.php',
      cache:false,
      success:res=>{
        $("#gen-news").html(res);
      }
    });
    
  });
</script>
  </body>
</html>