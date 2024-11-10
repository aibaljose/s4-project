<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Festbook</title>
</head>

<body>
    <div class="nav">
        <div class="name">EventBook</div>
        <div class="menu_list">
            <ul>
                <li>Home</li>
                <li>Events</li>
                <li>Upcoming</li>
                <li>about us</li>
            </ul>
            <?php

            if (isset($_SESSION['role'])) {

               

                echo "<div class='profile_card'><img src='{$_SESSION["profile_pic"]}'> {$_SESSION["username"]}</div>";
                echo '<a href="logout.php" ><div class="imd_log" ><img height="20px" width="20px" src="logout.png"></div></a>';
            } else {
                echo '<a href="login.php" ><div class="btn">login</div></a>';
            }
            ?>

            <!-- <a href="login.php" ><div class="btn">login</div></a> -->
        </div>
    </div>
    <section class="header">

        <div class="header_text">
            <h1>Explore <br>Tech Events<br> with us</h1>
            <p>Immerse yourself in the future of gaming with our state-of-the-art gaming controller designed for Virtual Reality.</p>
            <div class="btn-g">
                <div class="btn2">Explore more</div>
                <div class="btn2">Play Video</div>
            </div>
        </div>
        <div class="header_img">
            <div class="booking_card">
                <div class="card">
                    <form action="">
                        <div class="inpt">
                            <h6 >Event date</h6>
                            <input type="text" onblur="if(this.value==''){this.type='text'}" placeholder="12/01/2004" onfocus="(this.type='date')" class="in1">
                        </div>
                        <div class="inpt">
                            <h6>Location</h6>
                            <input type="text" placeholder="Adimaly" class="in1">
                        </div>


                        <button class="btn" type="submit">Check</button>
                    </form>
                </div>
            </div>
        </div>

    </section>


</body>

</html>