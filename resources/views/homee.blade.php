<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
        width: 100%;
        background-color: #555;
        overflow: auto;
    }

    .navbar a {
        float: right;
        padding: 12px;
        color: white;
        text-decoration: none;
        font-size: 17px;
    }

    .navbar a:hover {
        background-color: #000;
    }

    .active {
        background-color: #4CAF50;
    }

    @media screen and (max-width: 500px) {
        .navbar a {
            float: none;
            display: block;
        }
    }

    .imag {
        height: 23em;
        margin: 0.4em;
        border-radius: 0.5em;
    }

    .imagg {
        height: 23.8em;
        margin: 0.5em;
        width: 23.8em;
        border-radius: 0.5em;
        background-color: lightblue;
    }

    .secon {
        background-color: lightblue;
        height: 17em;
        margin: 0.5em;
        width: 23.8em;
        border-radius: 0.5em;
        padding-top: 0.1em;

    }

    .hdv {
        background-color: black;
        color: white;
        margin: 0.5em;
        border-radius: 0.3em;
        height: 2em;
        text-align: center;
    }

    .second {
        background-color: lightgray;
        height: 17em;
        margin: 0.5em;
        width: 57.8em;
        border-radius: 0.5em;
        padding-top: 0.1em;

    }

    .hdvd {
        background-color: black;
        color: white;
        margin: 0.5em;
        border-radius: 0.3em;
        height: 2em;
        text-align: center;
    }

    .hdvv {
        background-color: black;
        color: white;
        margin: 0.3em;

        border-radius: 0.3em;
        height: 2em;
        text-align: center;
    }

    .midll {
        background-color: gray;
        height: 13.5em;
        margin: 0.5em;
        border-radius: 0.3em;

    }

    .midlld {
        background-color: lightblue;
        height: 13.5em;
        margin: 0.5em;
        border-radius: 0.3em;

    }

    .midlll {
        background-color: gray;
        height: 10em;
        margin: 0.5em;
        border-radius: 0.3em;

    }

    .lon {
        background-color: lightgray;
        height: 23.6em;
        width: 58.6em;
        border-radius: 0.3em;
    }

    .lonn {
        background-color: lightgray;
        height: 13.4em;
        width: 82.9em;
        border-radius: 0.3em;
        margin-left: 0.5em;
        padding-top: 0.1em;
    }

</style>

<body>



    <div class="navbar">
        <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
    </div>
    <table>
        <tr>
            <td>
                <div class="imagg">
                    <img src="./images/pro.jpg" class="imag">
                </div>
            </td>
            <td>
                <div class="lon"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="lonn">
                    <div class="hdvv">
                        <p>About Us</p>
                    </div>
                    <div class="midlll"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>

                <div class="secon">
                    <div class="hdv">
                        <p>Mission</p>
                    </div>
                    <div class="midll"></div>
                </div>
            </td>
            <td>
                <div class="second">
                    <div class="hdvd">
                        <p>Vision</p>
                    </div>
                    <div class="midlld"></div>
                </div>
            </td>
        </tr>
    </table>
    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>About<span>Eduonix</span></h3>

            <p class="footer-links">
                <a href="#">Home</a>
                |
                <a href="#">Blog</a>
                |
                <a href="#">About</a>
                |
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">© 2019 Eduonix Learning Solutions Pvt. Ltd.</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>309 - Rupa Solitaire,
                        Bldg. No. A - 1, Sector - 1</span>
                    Mahape, Navi Mumbai - 400710</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+91 22-27782183</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@eduonix.com">support@eduonix.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                We offer training and skill building courses across Technology, Design, Management, Science and
                Humanities.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>
