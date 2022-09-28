<?php include "db.php"; 
// $url = 'http://'.($_SERVER['SERVER_NAME']==='localhost')?'localhost/SKINCARE':$_SERV‌​ER['SERVER_NAME']; 
// echo $url;
include "contactform.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Blog - Abi's Skincare</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- bootstrap only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <!-- <link rel="stylesheet" href="css/fontAwesome.css"> -->

        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <base target="_blank">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <?php include "header.php";  ?>
    
    <section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Abi Skincare</h2>
                        <span style="font-style: italic;">...the goal is your glow</span>
                        <div class="blue-button">
                            <a class="scrollTo" data-scrollTo="discover" href="#">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-places" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Popular Topics</h2>
                    </div>
                </div> 
            </div> 
            <div class='row'>
<?php 
$result_per_page = 3;
$sql = "SELECT * FROM posts";
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$result_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
    $page = 1;
}
else {
    $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page - 1)* $result_per_page;

$previous =$page - 1;
$next = $page + 1;

$sql = "SELECT * FROM posts ORDER BY date_created DESC LIMIT " . $this_page_first_result . ',' . $result_per_page;
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result); 
    while ($arr=mysqli_fetch_array($result)) {
        $id = $arr["id"];
        $title = $arr["title"];
        $body = $arr["body"];
        $imagename = $arr["imagename"];
        $date_created = $arr["date_created"];
        
        echo "
        <div class='col-lg-4 col-sm-6 col-xs-12'>
            <div class='featured-item'>
                <div class='thumb'>
                    <img src='img/$imagename' alt='' style='max-width: 100%; height: 170px;'>

                </div>
                <div class='down-content'>
                    <h4>$title</h4>
                    <p>"; echo substr($body, 0,150). '...'; echo "</p>
                    <div class='row'>
                        <div class='col-md-6 first-button'>
                            <div class='text-button'><i class='far fa-calendar-alt' style='margin-right:10px;'></i>";
                            echo date('F j, Y',strtotime($date_created)); echo "
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class='text-button'>
                                <a href='viewpost.php?id=$id'>Continue Reading</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    
}
?>
<!-- pagination -->
<center>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label='Page navigation example'>
                    <ul class='pagination justify-content-center'>
                        <li>
                            <a href="index.php?page=<?=$previous; ?>">
                            <span>&laquo;previous</span>
                            </a>
                        </li>
                    <?php for ($page=1; $page <= $number_of_pages; $page++): ?>
                        <li class='page-item'><a class="page-link" href="index.php?page=<?=$page; ?>"><?= $page; ?></a></li>
                    <?php endfor;     ?>
                        <li>
                            <a href="index.php?page=<?=$next; ?>">
                            <span>next &raquo;</span>
                            </a>
                        </li> 
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</center>

</div>

        </div>
    </section>



    <section class="our-services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Our Services</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="">
                            <i class="fas fa-school fa-4x"></i>
                        </div>
                        <h4>Skincare Training</h4>
                        <p>We provide skincare training on social media. Our training are very affordable and giving 
                            value is our utmost goal. E-books are given as bonus in all our online classes.
     
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <img style="width: 28%;" src="img/acquisition.png" alt="">
                        </div>
                        <h4>Sales of Skincare Products</h4>
                        <p>We sell skincare products such as soaps, scrubs and materials used in soap making. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <img style="width: 28%;" src="img/consultation.png" alt="">
                        </div>
                        <h4>Consultancy</h4>
                        <p>We offer advice on skin issues and skin related topics at a very affordable rate. Our 
                            blog section is also filled with helpful tips on skincare.  
                        </p>
                    </div>
                </div>
            </div>
            <div class="row" id="discover">
                <div class="col-md-12">
                    <div class="down-services">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="left-content">
                                    <h4>About the Author</h4>
                                    <p>The author is a certified cosmetologist and Natural skin care enthusiast who has worked with a lot of clients over the years 
                                        to create the look they envisioned. She provides her clients with skincare products and provide helpful tips
                                     on the usage of the skincare products.</p> 
                                    <div class="blue-button">
                                        <a href="#">Discover More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="accordions">
                                    <ul class="accordion">
                                        <li>
                                            <a>About Blog</a>
                                            <p>This blog is designed to create awareness and enlighten people
                                            on skincare and skincare products. If you have a skin story, you can share with us via comment section. You can always contact us or send a message and we promise to always respond. Above all, our goal is your glow.</p>
                                        </li>
                                        <li>
                                            <a>Abi Skincare</a>
                                            <p>We provide skincare training services, E-books, tips on skincare, sales of skincare products including soaps, scrubs, and materials used in soap making. We also offer advice on skin issues and related topics.</p>
                                        </li>
                                        <li>
                                            <a>Location</a>
                                            <p>Ilorin, Kwara State</p>
                                        </li>
                                    </ul> <!-- / accordion -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- <section id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
                <span>Video Presentation</span>
                <h2>Sed et risus ac sapien congue mattis.</h2>
                <a href="http://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
            </div>
        </div>
        <video autoplay="" loop="" muted>
        	<source src="highway-loop.mp4" type="video/mp4" />
        </video>
    </section> -->



    <!-- <section class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Pricing Tables</span>
                        <h2>Duis molestie ipsum id faucibus fermentum</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col-md-4">
                    <div class="table-item">
                        <div class="top-content">
                            <h4>Starter Plan</h4>
                            <h1>$25</h1>
                            <span>/monthly</span>
                        </div>
                        <ul>
                            <li><a href="#">100 Suspendisse dapibus</a></li>
                            <li><a href="#">10x Paleo celiac enamel</a></li>
                            <li><a href="#">Williamsburg organic post ironic</a></li>
                            <li><a href="#">Helvetica pinterest yuccie</a></li>
                            <li><a href="#">Plaid shabby chic godard</a></li>
                        </ul>
                        <div class="blue-button">
                            <a href="#">Buy It Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-item">
                        <div class="top-content">
                            <h4>Premium Plan</h4>
                            <h1>$45</h1>
                            <span>/monthly</span>
                        </div>
                        <ul>
                            <li><a href="#">200 Suspendisse dapibus</a></li>
                            <li><a href="#">20x Paleo celiac enamel</a></li>
                            <li><a href="#">Williamsburg organic post ironic</a></li>
                            <li><a href="#">Helvetica pinterest yuccie</a></li>
                            <li><a href="#">Plaid shabby chic godard</a></li>
                        </ul>
                        <div class="blue-button">
                            <a href="#">Buy It Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-item">
                        <div class="top-content">
                            <h4>Advanced Plan</h4>
                            <h1>$85</h1>
                            <span>/monthly</span>
                        </div>
                        <ul>
                            <li><a href="#">400 Suspendisse dapibus</a></li>
                            <li><a href="#">40x Paleo celiac enamel</a></li>
                            <li><a href="#">Williamsburg organic post ironic</a></li>
                            <li><a href="#">Helvetica pinterest yuccie</a></li>
                            <li><a href="#">Plaid shabby chic godard</a></li>
                        </ul>
                        <div class="blue-button">
                            <a href="#">Buy It Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



    <section class="contact" id="contact">
        <div id="map">
        			<!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.1749329197055!2d4.54456021478272!3d8.482365393901235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1036529654f15ced%3A0x5082a312f00e69cd!2sFemtech%20Information%20Technology!5e0!3m2!1sen!2sng!4v1636062825059!5m2!1sen!2sng" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <?php 

?>
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="wrapper">
                  <div class="section-heading">
                      <span>Contact Us</span>
                      <h2>I'd Love To Hear From You.</h2>
                  </div>
                  <!-- Modal button -->
                  <button id="modBtn" class="modal-btn">Talk to us</button>
                </div>  
                  
                <div id="modal" class="modal">
                  <!-- Modal Content -->
                  <div class="modal-content">
                    <div class="close fa fa-close"></div>
                    <div class="row">
                        <div class="col-md-8"> 
                            <div class="left-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-heading">
                                            <span>Talk To Us</span>
                                            <h2>Let's have a discussion</h2>
                                        </div>
                                    </div>
                                    <form action="index.php" method="POST" autocomplete>
                                    
                                    <div class="col-md-6">
                                      <fieldset>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name...">
                                      </fieldset>
                                    </div>
                                     <div class="col-md-6">
                                      <fieldset>
                                        <input name="email" type="email" class="form-control" id="subject" placeholder="Email..." required="">
                                      </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                      <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                      </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                    <input type="submit" name="submitForm">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="right-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content">                                          
                                            <div class="section-heading">
                                                <span>More About Us</span>
                                                <h2>Abi Skincare</h2>
                                            </div>
                                            <p>We provide skincare training services, E-books, tips on skincare, sales of skincare products including soaps, scrubs,
                                                and materials used in soap making. We also offer advice on skin issues and related topics.
                                            </p>
                                            <ul>
                                                <li>Phone:<a style="margin-left: 5px;" href="tel:+2347037984008">070-3798-4008</a></li>
                                                <li>Email:<a style="margin-left: 5px;" href="mailto:abifatskin@gmail.com">abifatskin@gmail.com</a></li>
                                                <li>Address:<a style="margin-left: 5px;" href="">Ilorin, Kwara State</a></li>
                                            </ul>
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
    </section>
    <?php include "footer.php";      ?>




        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
