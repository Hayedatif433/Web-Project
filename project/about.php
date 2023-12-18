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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>ABOUT US</title>
    <style>
        .dblock {
            width: 100%;
            height: 75%;
        }


        footer {

            width: 100%;
            height: 20%;
            margin-right: 110px;
            background-color: grey;
            overflow: hidden;
            background-color: black;
        }

        .foot h4 {
            color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-align: center;
            margin-right: 15px;
            font-size: 28px;
        }

        .foot p {
            text-align: center;
            margin-top: 9px;
            margin-right: 30px;
            color: white;
        }



        .footnav a {

            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 17px;
            width: 23%;
        }
        .footnav a:hover{
            opacity: 0.5;
        }
        p 
        {
            text-align: justify ;
            margin: 20px;
        }
    </style>
</head>

<body>

    <section>
        <?php require 'partials/navbar_v1.php';?>
        <h1> ABOUT US Nike </h1>
        <p style=" font-size: 18px ;">Nike, is an American multinational association that is involved in the design, development, manufacturing and
            worldwide marketing and sales of apparel, footwear, accessories, equipment and services.The company’s world
            headquarters
            are situated near Beaverton, Oregon, in the Portland metropolitan area (USA). It is a major producer of
            sports
            equipment
            and one of the world’s largest suppliers of athletic shoes and apparel.</p>
        <P style=" font-size: 18px;">It employs more than 44,000 people worldwide and in 2014 the brand alone was valued as $19 billion (€17,5
            billion), making it
            the most valuable brand between sports businesses.Founded by Bill Bowerman and Phil Knight on January 25
            1964,
            as Blue Ribbon
            Sports, the company became officially Nike, Inc. on May 30 1971. The company was named after the Greek
            goddess
            of victory, Nike
            (Νίκη).Superlarge is a brand experience agency that delivers integrated solutions through the power of
            design.
            The agency solves problems by performing heart surgery –
            not cosmetic surgery – to drive results that matter for the world’s most ambitious brands.
        </P>
        <div class="row" style="margin-bottom: 80px;">
            <div class="col-md-6 d-flex justify-content-left align-items-left">

                <div class="container">
                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/nike-running-shoe-buying-guide-refresh-lead-64517574cc201.jpg"
                        width="700" height="350" alt="Centered Image">
                </div><br>
            </div>
            <div class="d-flex col-md-6 align-items-center">
                <div style="font-size: 30px;">
                    <p> <i>It is the world's largest supplier of athletic shoes and apparel and a major manufacturer of sports equipment,Nike is a champion brand builder. Its advertising slogans—“Bo Knows,” “Just Do It,”</i></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="margin-bottom: 80px;">
                <div class="col-md-6" >
                    <div style="font-size: 30px; margin-top: 80px; ">
                        <p><i>From its origins on the basketball court to its enduring cultural impact, let's take a deep dive into the story of the Air Force 1.”</i></p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <img src="https://img.shoplineapp.com/media/image_clips/63930c9cc50d4d00196a0a66/original.jpg?1670581404"
                    width="700" height="350" alt="Centered Image"  >
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 80px;">
            <div class="col-md-6 d-flex justify-content-left align-items-left">
    
                <div class="container">
                    <img src="http://superlarge.org/wp-content/uploads/2019/05/NIKE-GOLF-SS18_01.jpg"
                    alt="Centered Image" width="700" height="400">
                </div><br>
            </div>
            <div class="d-flex col-md-6 align-items-center">
                <div style="font-size: 30px;">
                    <p> <i>A Nike Golf Performance Specialist is likely an individual with expertise in golf performance and the use of Nike's golf products to enhance an athlete's performance on the golf course. </i></p>
                </div>
            </div>
        </div>
    </section>
    <?php require 'partials/footer.php' ?>



</body>

</html>