<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <img src="media/logo.png" class="logo">
            <ul>
                <li><a href="#">HOME</a> </a></li>
                <li><a href="#">ABOUT</a> </a></li>
                <li><a href="#">SPECIFICATIONS</a> </a></li>
                <li><a href="../Login/login.php">LOGIN</a> </a></li>
                <li><a href="../Login/signup.php">SIGNUP</a> </a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="left-col">
            <h1>TWIICE<br>BEATS<br>CATALOG</h1>
        </div>
        <div class="right-col">
            <p>Click Here To Listen</p>
            <img src="media/play.png" id="icon">
        </div>
    </div>

    <audio id="mySong">
        <source src="media/Nirvana.mp3" type="audio/mp3">
    </audio>

    <script>
        var mySong = document.getElementById("mySong");
        var icon = document.getElementById("icon");

        icon.onclick = function(){
            if(mySong.paused){
                mySong.play();
                icon.src = "media/pause.png";
            }else{
                mySong.pause();
                icon.src = "media/play.png";
            }
        }
    </script>
</body>
</html>