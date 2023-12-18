<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
        <title>NIKE</title>
        <style>

            footer {

                width: 100%;
                height: 20%;
                margin-right: 100px;
                background-color: black;
                overflow: hidden;
            }

            .foot h4 {
                color: white;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                text-align: center;
                margin-right: 15px;
                font-size: 28px;
                margin-top: 40px;
            }

            .foot p {
                text-align: center;
                justify-content: center;
                margin-top: 9px;
                margin-right: 30px;
                color: white;
            }

            .footnav a {

                float: left;
                color: #f2f2f2;
                text-align: center;
                justify-content: center;
                padding: 0px 0px;
                text-decoration: none;
                font-size: 17px;
                width: 23%;
            }

            .footnav a:hover{
                opacity: 0.5;
            }

            .blur-background {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-image: url(best.jpeg);
              background-repeat: no-repeat;
              background-size: cover;
              filter: blur(300px);
              z-index: -1;
            }

            .my-container {
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              width: 100%;
            }
            .container {
              width: 75%;
              padding: 0px;
              margin-bottom: 70px;
              background-color: white;
              margin-top: 70px;
              box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
              align-items: center;
              justify-content: center;
            }

            .brand {
              color: #080808;
            }
            .row p{
              text-align: center;
              margin-top: 30px;
            }

            .sign-container {
              max-width: 470px;
              margin-top: 100px;
            }

            .right-box p{
              margin-top: 420px;
              color: #000000;
              /* margin-left: 50px; */
            }

            .log-in {
              background: #3d3d3d;
              color: #fff;
            }

            .log-in:hover {
              background: #fff;
              color: #000000;
              border: 1px solid #000000;
            }
            
            .log-in-border{
                width: 60px;
                border: 2px solid darkgrey;
            }
            
            .btn:hover {
                  background: grey;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                // When any "Read More" button is clicked, toggle the visibility of its description
                $(".toggle-description").click(function () {
                    var $product = $(this).closest(".card");
                    var $fullDescription = $product.find(".full-description");

                    $fullDescription.slideToggle();

                    // Change the button text based on the current state
                    if ($(this).text() === "Read More") {
                        $(this).text("Read Less");
                    } else {
                        $(this).text("Read More");
                    }
                });
            });
        </script>
    </head>

    <body>
      <?php require'partials/navbar_v2.php'?>
      <div>
        <div class="blur-background"></div>
        <div class="container">
          <section class="container-fluid">
            <div class="row vh-100">
              <p class="fs-5 my-6">
                <b style="font-size: 45px;">Welcome to Nike Clone! </b></br>
                <b style="font-size: 30px;">Just Do It</b>
              </p>
              <div class="col-md-6 col-12">
                <div class="px-4 sign-container mx-auto">
                  <div class="text-center mt-5">
                    <p class="fs-5 my-6" >
                      <b style="font-size: 45px;">Already a user?</b><br>
                      Login to your account.
                    </p>
                    <a href="login.php">
                    <button class="btn my-5 fw-bold btn-lg log-in rounded-5 px-5 fs-6" >Login 
                    </button></a>               
                  </div>
                </div>
              </div>
                <div class="col-md-6 col-12">
                  <div class="px-4 sign-container mx-auto">
                    <div class="text-center mt-5">
                      <p class="fs-5 my-6" >
                        <b style="font-size: 45px;">Not a user?</b><br>
                        Sign up now and join us.
                      </p>
                      <a href="signup.php">
                      <button class="btn my-5 fw-bold btn-lg log-in rounded-5 px-5 fs-6" >Signup 
                      </button></a>
                    </div>
                  </div>
                </div>             
            </div>
          </section>
        </div>
      </div>

      <!-- <footer>
          <div class="foot">
              <div>  
                  <h4><i>NIKE</i></h4>
                   <p>© 2023 NIKE, Inc</p>
              </div>
              <div class="footnav">
                  <a href="About.html">Home</a>
                  <a href="contactus.html">Contact</a>
                  <a href="Contact.html">Address</a>
                  <a href="Product.html">Product</a>
              </div>
          </div>
      </footer> -->
      <?php require 'partials/footer_welcome.php'?>

    </body>
</html>