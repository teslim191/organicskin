<?php
include "db.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($arr=mysqli_fetch_array($result)) {
            $title = $arr["title"];
            $body = $arr["body"];
            $date_created = $arr["date_created"];
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Blog - Abi's Skincare - viewpost</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap -->
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

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
        <body>
            <!-- Facebook Page Plugin SDK -->
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=285071545181837&autoLogAppEvents=1">
            </script>
            <!-- header -->
            <?php include "header.php";  ?>

            <div class="container">
                <h1><?php echo strtoupper($title);?></h1>
                <div class="container">
                    <ul>
                        <li>
                            <i class="fa fa-calendar"></i>
                            <?php echo date('F j, Y',strtotime($date_created));?>
                        </li>
                    </ul>
                </div>
                <div class="row mt-5">
                    <div class="col-md-8">
                        <h4 class="text-justify"><?php echo $body;?></h4>
                    </div>
                    <div class="col-md-4">
                        <div class="fb-page" data-href="https://web.facebook.com/ABIs-skincare-101322955361805" data-small-header="false"
                        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://web.facebook.com/ABIs-skincare-101322955361805" class="fb-xfbml-parse-ignore"><a
                        href="https://web.facebook.com/ABIs-skincare-101322955361805"></a></blockquote>
                        </div>
                    </div>
                    </div>
            </div>                        
                    <?php  
                    // $sql = "SELECT * FROM posts";
                    // $result = mysqli_query($con, $sql);
                    // if ($result) {
                    //     while ($arr=mysqli_fetch_array($result)) {
                    //         $heading = $arr["title"];
                    //         echo"
                    //         <hr>
                    //         $heading       
                    //         ";
                    //     }
                    // }
                    if (isset($_GET["id"])) {
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM posts WHERE id=$id";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($arr=mysqli_fetch_array($result)) {
                                $id = $arr["id"];
                                $title = $arr["title"];

                                $baseUrl = "https://organicskin.herokuapp/";
                                $slug = "viewpost.php?id=$id";
                            }
                        }
                    }
                    ?>

                        
                    

<div class="container mt-5">
    <ul class="social-icons">
        
        <li>
            <span style="font-size: 1.1em;font-weight: 700;">Share:</span>
            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $baseUrl.$slug; ?>"><i class="fab fa-linkedin-in px-2"></i></a>
            <a href="http://www.facebook.com/sharer.php?u=<?php echo $baseUrl.$slug; ?>"><i class="fab fa-facebook px-2"></i></a>
            <a href="#"><i class="fab fa-twitter px-2"></i></a>
            <a href="whatsapp://send?text=<?php echo $baseUrl.$slug; ?>"><i class="fab fa-whatsapp px-2"></i></a>
            <!-- <a href="#"><i class="fab fa-instagram"></i></a> -->
        </li>
    </ul>
</div>

            <hr>
            <div class="container mt-5">
            <div class="row">
                <h3>Comments</h3>
                <?php
                $sql = "SELECT * FROM comments WHERE post_id=$id ORDER BY id DESC";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    while ($arr=mysqli_fetch_array($query)) {
                        $name = $arr['username'];
                        $message = $arr['message'];
                        $date = $arr['date_created'];

                        echo"
                        <div class='col-12 mb-5'>
                <div class='comment mt-3 text-justify'>
                <img src='img/user.png' alt='' class='rounded-circle' width='40' height='40'>
                    <h4>$name</h4> <span>"; echo date('F j, Y',strtotime($date)); echo "</span> <br>
                    <p>$message</p>
                </div>
            </div>";
                    }
                }
                ?>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4 mb-5">
               <h4>Leave a comment</h4> 
                <form action="comments.php" id="algin-form" method="POST">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="fullname" id="fullname" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                       <label for="message">Message</label>
                       <textarea name="message" id="" msg cols="30" rows="5" class="form-control">

                       </textarea>
                    </div>
                    <div class="form-group"> <input type="submit" id="post" name="comment" class="btn btn-info mt-3"></div>
                </form>
            </div>                
            </div>


            
            <div>
                <?php include "footer.php";   ?>
            </div>
            

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

            <script src="js/vendor/bootstrap.min.js"></script>
            
            <script src="js/datepicker.js"></script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script>
        </body>
</html>
