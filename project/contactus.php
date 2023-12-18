<html>

<head>
    <title> Contact Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <title>Home</title>
    <style>
        

        .dblock {
            width: 100%;
            height: 75%;
        }

        .client {
            width: 510px;
            height: 500px;
            background-color: gray;
            border: 5px solid gray;
            float: left
        }

        .box {
            width: 65vw;
            height: 500px;
            background-color: white;

            float: right
        }

        .maps {
            width: 65vw;
            height: 100px;
            background-color: white;
            border: 5px solid black;
        }

        .location {
            padding-bottom: 50%;
            position: relative;
        }

        .location iframe {
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            position: absolute;
        }

        h6 {
            font-size: 46px;
            color: rgb(20, 94, 255);
        }

        footer {
            position: relative;
            width: 100%;
            height: 20%;
            margin-right: 110px;
            background-color: grey;
            overflow: hidden;
            margin-top: 100px;
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
    </style>
</head>

<body>
    <?php require 'partials/navbar_v1.php'?>
    
    <div>
        <h6>Contact us </h6>
        <br>
        <p> Beaverton, USA </p>
        <p> +92 313 8674775 </p>
        <p> info@nike.com.us </p>
    </div>
    <section>
        <div class="client">
            <formname="Query /Complain" method="post" action="serversideScriptURL">
                <table cellpadding="5" bgcolor="gray">
                    <tr>
                        <td align="center"><b>Name</b></td>
                        <td><input type="text" name="username" placeholder="Enter your name" size="30" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><b>Email</b></td>
                        <td><input type="email" name="useremail" value="info@nike.com.us" size="30" readonly />
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><b>Mobile No</b></td>
                        <td><input type="text" name="mobile" placeholder="Enter your cell number" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td align="center"><b>Gender</b></td>
                        <td>
                            <input type="radio" name="gender" value="Male" />Male <br>
                            <input type="radio" name="gender" value="Female" />Female <br>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td align="center"><b>Message</b></td>
                        <td><textarea rows="10" cols="35" placeholder="Write your query/complain" required>
                        </textarea>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <input type="submit" name="submit" value="submit" />
                            <input type="reset" name="clear" value="clear" />
                        </td>
                    </tr>
                </table>

                </form>
        </div>
        <div class="box">
            <div class="maps">
                <h1 style=" color:black"> Main Headquarters </h1>
                <p>One Bowerman Drive Beaverton, 97005 USA</p>
            </div>
            <div class="location">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2796.1261779603633!2d-122.83214611430475!3d45.50753855597725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54950ec24d4da46d%3A0xa6e823d05767d2d0!2sNike%20World%20Headquarters!5e0!3m2!1sen!2s!4v1697646646358!5m2!1sen!2s"
                    width="800" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <div>
        <p color="white"> ..</p>
    </div>
    <?php require 'partials/footer.php'?>
</body>

</html>