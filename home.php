<?php
session_start()
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .card {
            width: 350px;
            height: fit-content;
            background: rgb(255, 255, 255);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 30px;

            box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.068);
        }

        .card-content {
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .card-heading {
            font-size: 20px;
            font-weight: 700;
            color: rgb(27, 27, 27);
        }

        .card-description {
            font-weight: 100;
            color: rgb(102, 102, 102);
        }

        .card-button-wrapper {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .card-button {
            width: 50%;
            height: 35px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .primary {
            background-color: rgb(255, 114, 109);
            color: white;
        }

        .primary:hover {
            background-color: rgb(255, 73, 66);
        }

        .secondary {
            background-color: #ddd;
        }

        .secondary:hover {
            background-color: rgb(197, 197, 197);
        }

        .exit-button {
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background-color: transparent;
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }

        .exit-button:hover svg {
            fill: black;
        }

        .exit-button svg {
            fill: rgb(175, 175, 175);
        }

        .card-content img {
            height: 200px;
            border-radius: 20px;
            object-fit: cover;
        }
    </style>
</head>

<body>


    <div class="session">


        <div class="sidebar">
            event type
            <div class="crdcon">
                <div class="crd">Tech </div>
                <div class="crd1"> clutre</div>
                <div class="crd1"> clutre</div>
                <div class="crd1"> clutre</div>
                <div class="crd1"> clutre</div>
                <div class="crd1"> clutre</div>
            </div>

        </div>



        <div class="content">

            <div class="nav" style="position:relative;width:100%;padding:0;margin-top:30px">
                <div class="name">EventBook</div>
                <div class="menu_list">
                    <ul style="color:#3c3c3c">
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

            <div class="mincontent">
                <div class="card">
                    <div class="card-content">
                        <img src="https://images.unsplash.com/photo-1722841549066-8a844d9be972?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="card-heading">Delete file?</p>
                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur adi</p>
                    </div>
                    <div class="card-button-wrapper">
                       
                        <button class="card-button primary">Delete</button>
                    </div>
                    <button class="exit-button">


                    </button>
                </div>

                <div class="card">
                    <div class="card-content">
                        <img src="https://images.unsplash.com/photo-1722841549066-8a844d9be972?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="card-heading">Delete file?</p>
                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur adi</p>
                    </div>
                    <div class="card-button-wrapper">
                      
                        <button class="card-button primary">Delete</button>
                    </div>
                    <button class="exit-button">


                    </button>
                </div>



                <div class="card">
                    <div class="card-content">
                        <img src="https://images.unsplash.com/photo-1722841549066-8a844d9be972?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="card-heading">Delete file?</p>
                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur adi</p>
                    </div>
                    <div class="card-button-wrapper">
                    
                        <button class="card-button primary">Delete</button>
                    </div>
                    <button class="exit-button">


                    </button>
                </div>


                <div class="card">
                    <div class="card-content">
                        <img src="https://images.unsplash.com/photo-1722841549066-8a844d9be972?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="card-heading">Delete file?</p>
                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur adi</p>
                    </div>
                    <div class="card-button-wrapper">
                
                        <button class="card-button primary">Delete</button>
                    </div>
                    <button class="exit-button">


                    </button>
                </div>
                <div class="card">
                    <div class="card-content">
                        <img src="https://images.unsplash.com/photo-1722841549066-8a844d9be972?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="card-heading">Delete file?</p>
                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur adi</p>
                    </div>
                    <div class="card-button-wrapper">
                
                        <button class="card-button primary">Delete</button>
                    </div>
                    <button class="exit-button">


                    </button>
                </div>
                <div class="card">
                    <div class="card-content">
                        <img src="https://images.unsplash.com/photo-1722841549066-8a844d9be972?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="card-heading">Delete file?</p>
                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur adi</p>
                    </div>
                    <div class="card-button-wrapper">
                
                        <button class="card-button primary">Delete</button>
                    </div>
                    <button class="exit-button">


                    </button>
                </div>
                <div class="card">
                    <div class="card-content">
                        <img src="https://images.unsplash.com/photo-1722841549066-8a844d9be972?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <p class="card-heading">Delete file?</p>
                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur adi</p>
                    </div>
                    <div class="card-button-wrapper">
                
                        <button class="card-button primary">Delete</button>
                    </div>
                    <button class="exit-button">


                    </button>
                </div>

            </div>



        </div>
    </div>
    </div>



</body>

</html>