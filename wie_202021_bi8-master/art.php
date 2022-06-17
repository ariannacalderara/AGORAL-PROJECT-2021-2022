<?php

    //connection 
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "rooms";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die('Could not connect: ' . mysql_error()); 

    
    //if(filter_has_var(INPUT_POST, 'infoSubmit')){
    if(isset($_POST['infoSubmit'])){
        //get form data
        $artist = $_POST['artist']; 
        $period = $_POST['period']; 
        $image = $_POST['image']; 
        $link = $_POST['link'];
        
        
        $artistSanitized = filter_var($artist, FILTER_SANITIZE_SPECIAL_CHARS);
             
        $periodSanitized = filter_var($period, FILTER_SANITIZE_SPECIAL_CHARS);
               
        $imageSanitized = filter_var($image, FILTER_SANITIZE_URL);
        
        $linkSanitized = filter_var($link, FILTER_SANITIZE_URL);
        
        
         //query 
         $query = "INSERT INTO art_room (artist, period, image, link) VALUES ('$artistSanitized', '$periodSanitized', '$imageSanitized', '$linkSanitized')"; 
         $result = mysqli_query($conn, $query);
      
    }

   
 
    //close
    mysqli_close($conn);

    ?>

<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="images/logo.png" alt="A" width="35" height="35">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="rooms.css">

        <title>Art Room</title>
     </head>
     <body>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-md navbar-light bg-light justify-content-center">
      <img src="images/logo.png" style="width:50px; border-radius: 50%;">
            <a class="navbar-brand d-flex w-50 mr-auto" href="LandingPage.html">Agoral</a>
            <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" aria-expanded="false" 
            aria-label="Toggle navigation" aria-controls="toggleMobileMenu" data-bs-target="#toggleMobileMenu">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="navbar-collapse collapse w-100" id="toggleMobileMenu">
            <ul class="navbar-nav text-center">
              <li class="nav-item">
                  <a class="nav-link" href="sport.php">Sport</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="art.php">Art</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="music.php">Music</a>
              </li>
          </ul>
          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link" href="TeamPage.html">Contact Us</a>
              </li>
          </ul>
      </div>
  </nav>


          <header class="topImage" style="width:100%; height:100%; background-image: no-repeat center center fixed;" alt="Hamburger Catering" width="100%" height="100%; " id="home">
            <div class="backArt">
               <div id="overlay">
               <section id="welcome">
                      
                   <div class="middle" style="padding: 1em; background-color: rgba(128, 128, 128, 0.4); border-color: black;" >
                           <h1>Venice 2022 <hr/></h1>
                           <h2>Biennale Art<hr/></h2>
                          <h3>April 23rd</h3>
                           <hr>
                           <p id="demo" style="font-size:30px"></p>
                   </div>
               </div>
              </header>

   <!-- info area -->
   <div class="container-fluid">
     <section id = "info-area">
          <div class="half-half-image-text">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-6">
                  <div class="content">
                   <div class="onright"> <h3 class="secondHeaderInfo">Art Info</h3>
                    <p>Are you very passionate about art and want to have fun sharing you favorite infos to share with others?
                      There we go.</p> </div>

                      <div class="onright"> <h3 class="secondHeaderInfo">Pinboard</h3> 
                    <p> Here, in the art pinboard, you can do pretty much anything! You can recommend to everyone your favorite song by posting it, you can upload your favorite album's cover or you can just get inspiration to start listening to new things. </p> </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div> <img src="images/artImage.jpg" class="img"></div>
                </div>
                </div>
            </div>
          </div>
          </section>
          <div class="blank"></div>

          
          <section class="MPinboard" >
          <h1 class="headerPinboard">Art Pinboard</h1>
              <div class="parent">
          
             <?php 
                      //connection 
                        $host = "localhost";
                        $user = "root";
                        $pwd = "";
                        $db = "rooms";

                        $conn = mysqli_connect($host, $user, $pwd, $db) or die('Could not connect: ' . mysql_error()); 
                  
                         
                         $query2 = "SELECT * FROM art_room"; 
                         $result= mysqli_query($conn, $query2);
                         
                        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);

                         mysqli_close($conn);
                    ?>
                  
                    <div class="div1" style="overflow:auto">
                      <ul class="pinboards">
                        <?php foreach($posts as $post) : ?>
                        <li>
                          <div id ="post-it">
                            <p>Artist: <?php echo $post["artist"] ?></p>
                            <p>Period: <?php echo $post["period"] ?></p>
                            <a href=" <?php echo $post["link"] ?> " target="_blank"><i class="fa fa-external-link "></i></a>
                            <div id = "post-it_img" style="background-image: url('<?php echo $post["image"] ?>');"></div>

                          </div>
                        </li>
                     <?php endforeach; ?>

                        </ul>
                        
                       </div>

                       <div style="background-image: url('images/artPin.jpg');" class="div2">
                        <form method="post" action= "<?php echo $_SERVER['PHP_SELF']; ?>" > 

                        <div class="mb-3">
                          <label  class="form-label"></label>
                          <input type="text" name="artist" class="form-control" placeholder="Insert the name of the artist here!" required/>
                        </div>
                        <div class="mb-3">
                          <label  class="form-label"></label>
                          <input href="" name="image"  class="form-control" placeholder="Paste the image url here!" required/>
                        </div>

                            <div class="custom-dropdown big">
                                        <select name = "period" required  aria-label="Default select example" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
                                            <option selected>Select a period</option>
                                            <option>Pop Art</option>
                                            <option>Expressionism</option>
                                            <option>Impressionism</option>
                                            <option>Surrealism</option>
                                            <option>Art Nouveau</option>
                                            <option>Cubism</option>
                                    </select>
                            </div>

                            <div class="mb-3">
                                <label  class="form-label"></label>
                                <input href="" name="link" class="form-control" placeholder="Paste the url to the event/article here!" required/>
                              </div>

                        <button type="submit" name = "infoSubmit" class="btn btn-outline-warning">Add</button>

                        </form> 
                    </div>
                  </div>
              </section>
              <div class="blank"></div>


            </div>
            <section id="footer" style="background-color:#a09a8e; height:400px; overflow: auto;">
                <ul>
                  <li>
                    <div class="col">
                      <ul class="social-icons">
                        <div class="footer1">
                        <li><h4>You can find us here:</h4></li>
                        </div>
                        <div class="footer2">
                        <li><a class="facebook" href="https://facebook.com" inputmode="submit"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="https://twitter.com" inputmode="submit"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="linkedin" href="https://www.linkedin.com" inputmode="submit"><i class="fa fa-linkedin"></i></a></li> 
                       </div> </ul>
                  </li>
            
                   <li>
                     <div class="footer3">
                  <form action=mailto:agoral@gmail.com method=”POST” class="needs-validation" novalidate>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Last name</label> 
                        <input type="text" class="form-control" id="validationCustom02" value="" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                          Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                          You must agree before submitting.
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary custom" type="submit"><a>Submit</a></button>
                  </form>
                  </div>
                  </li>
                  </ul>
                  </section>
          
    
    <script>
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

        
      </script>
           </div>

           <script>
            var countDownDate = new Date("April 23, 2022 00:00:00").getTime();
            
            var x = setInterval(function() {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
            }, 1000);
        </script>

     </body>
</html>
