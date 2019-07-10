<?php 
  // get match highlights
  function matchHighlight()
  {
    $conn = mysqli_connect("localhost", "root", "", "sport_watch");
    $fetchNews = "SELECT * FROM posts WHERE category = 'Match Highlight' ";

    $result = mysqli_query($conn, $fetchNews);

    $totalRecords = mysqli_num_rows($result);

   if($totalRecords > 0){
      $data = [];
      while ($row = mysqli_fetch_assoc($result)) {
        # code...
        $data[] = $row;
      }
      return $data;
    }else{
      $data = [];
      return $data;
    }
  }

 ?>
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

    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover overlay" style="background-image: url(public/images/swift.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-start">
            <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
              <h1 class="bg-text-line">Catch Them Young.</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="site-blocks-cover overlay" style="background-image: url(public/images/football.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-start">
            <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
              <h1 class="bg-text-line">Local Football Monitroring System.</h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section pt-0 feature-blocks-1" data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row" id="gen-news">
        </div>
      </div>
    </div>

    <div class="site-blocks-vs site-section bg-light">
      <div class="container">

        <!-- <div class="border mb-3 rounded d-block d-lg-flex align-items-center p-3 next-match"> -->

          <!-- <div class="mr-auto order-md-1 w-60 text-center text-lg-left mb-3 mb-lg-0">
            Next match -->
            <!-- <div id="date-countdown"></div> -->
          <!-- </div> -->

          <!-- <div class="ml-auto pr-4 order-md-2">
            <div class="h5 text-black text-uppercase text-center text-lg-left">
              <div class="d-block d-md-inline-block mb-3 mb-lg-0">
                <img src="public/images/img_1_sq.jpg" alt="Image" class="mr-3 image"><span class="d-block d-md-inline-block ml-0 ml-md-3 ml-lg-0">Sea Hawlks </span>
              </div>
              <span class="text-muted mx-3 text-normal mb-3 mb-lg-0 d-block d-md-inline ">vs</span>
              <div class="d-block d-md-inline-block">
                <img src="public/images/img_3_sq.jpg" alt="Image" class="mr-3 image"><span class="d-block d-md-inline-block ml-0 ml-md-3 ml-lg-0">Patriots</span>
              </div>
            </div>
          </div>
        </div> -->

       <!--  <div class="bg-image overlay-success rounded mb-5" style="background-image: url('public/images/hero_bg_1.jpg');" data-stellar-background-ratio="0.5">

          <div class="row align-items-center">
            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">

              <div class="text-center text-lg-left">
                <div class="d-block d-lg-flex align-items-center">
                  <div class="image mx-auto mb-3 mb-lg-0 mr-lg-3">
                    <img src="public/images/img_1_sq.jpg" alt="Image" class="img-fluid">
                  </div>
                  <div class="text">
                    <h3 class="h5 mb-0 text-black">Sea Hawks</h3>
                    <span class="text-uppercase small country text-black">Brazil</span>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-12 col-lg-4 text-center mb-4 mb-lg-0">
              <div class="d-inline-block">
                <p class="mb-2"><small class="text-uppercase text-black font-weight-bold">Premier League &mdash; Round 10</small></p>
                <div class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded"><span class="h3">3:2</span></div>
                <p class="mb-0"><small class="text-uppercase text-black font-weight-bold">10 September / 7:30 AM</small></p>
              </div>
            </div>

            <div class="col-md-12 col-lg-4 text-center text-lg-right">
              <div class="">
                <div class="d-block d-lg-flex align-items-center">
                  <div class="image mx-auto ml-lg-3 mb-3 mb-lg-0 order-2">
                    <img src="public/images/img_4_sq.jpg" alt="Image" class="img-fluid">
                  </div>
                  <div class="text order-1">
                    <h3 class="h5 mb-0 text-black">Steelers</h3>
                    <span class="text-uppercase small country text-black">London</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
 -->
      </div>
    </div>


    <div class="site-section block-13 bg-primary fixed overlay-primary bg-image" style="background-image: url('public/images/hero_bg_3.jpg');"  data-stellar-background-ratio="0.5">

      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="text-white">More Game Highlights</h2>
          </div>
        </div>

        <div class="row">
          <div class="nonloop-block-13 owl-carousel">
            <?php 
              $data = matchHighlight();
              foreach($data as $row)
              {
                echo('<div class="item">');
                echo('<div class="block-12">');
                echo('<figure>');
                echo('<img src="'.str_replace('../', '',$row["post_image"]).'" alt="Image" class="img-fluid" >');
                echo('</figure>');
                echo('<div class="text">');
                echo('<span class="meta">'.date("M d Y", $row['post_date']).'</span>');
                echo('<div class="text-inner">');
                echo('<h2 class="heading mb-3"><a href="#" class="text-black">'.substr($row['heading'], 0).'</a></h2>');
                echo('<p>'.substr($row['body'], 0,70).'</p>');
                echo('</div>');
                echo('</div>');
                echo('</div>');
                echo('</div>');
              }
            ?>
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
    })

    // get match highlight news
    $.ajax({
      type:"GET",
      url:'__factory/fetch_match_news.php',
      cache:false,
      success:res=>{
        $("#match-highlight").empty();
        $("#match-highlight").html(res);
      }
    })
  });
</script>
</body>
</html>