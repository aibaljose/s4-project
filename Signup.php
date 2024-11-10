<?php

include "conn.php";

$name = $email = $password = "";
$nameErr = $emailErr = $passwordErr = $fileErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "*Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
            $nameErr = "*Only letters and numbers allowed";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "*Password is required";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 6) {
            $passwordErr = "*Password must be at least 6 characters long";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "*Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Invalid email format";
        }
    }

    if (!$_FILES['profile_pic']['error'] == 0) {
        $fileErr = "*File is required";
    } else {
        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];
        if (in_array($_FILES['profile_pic']['type'], $allowedTypes)) {
            $target = "uploads/" . $_FILES['profile_pic']['name'];
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {
                $path = $target;
            }
        }
    }

    if (empty($nameErr) && empty($passwordErr) && empty($emailErr) && empty($fileErr)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $checkUser = "SELECT * FROM users WHERE username='$name' OR email='$email'";
        $result = mysqli_query($conn, $checkUser);

        if (mysqli_num_rows($result) > 0) {
            echo "Username or email already exists";
        } else {
            $sql = "INSERT INTO users (username, email, password, role,profile_pic) VALUES ('$name', '$email', '$hashed_password', 'user', '$path')";

            if (mysqli_query($conn, $sql)) {
                echo "Signup successful!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>

<head>
    <title>Signup</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('https://images.unsplash.com/photo-1640906152676-dace6710d24b?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
        }


        .signup {
            display: flex;
            border-radius: 0.5rem;
            box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 350px;
            /* Set a width for the box */
            background-color: rgba(255, 255, 255, 0.9);
        }

        .sig {
            padding: 40px;
            flex: 1;
            /* Each form takes up equal space */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            margin-top: 10px;
        }

        input {
            padding: 8px;
            margin-bottom: 15px;
            width: 100%;
            border-radius: 10px;
            outline: none;
            border: 1px solid #e5e5e5;
            height: 42px;
        }

        input:focus-within {
            border: 1.5px solid #2d79f3;
        }

        input:focus {
            outline: none;
        }



        .error {
            color: red;
            font-size: 0.9em;
        }

        button {
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: green;
        }

        .login-prompt {
            text-align: center;
            margin-top: 15px;
        }

        .fileup {
            display: none;
            width: 100%;
        }

        .file {
            position: relative;
            display: flex;
            border-radius: 20px;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 42px;
            cursor: pointer;
            border: 1px solid #2d79f3;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="signup">
        <div class="sig">
            <h1>Signup</h1>
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter username">
                <span class="error"> <?php echo $nameErr; ?></span>
                <br><br>

                <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email">
                <span class="error"> <?php echo $emailErr; ?></span>
                <br><br>

                <input type="password" name="password" placeholder="Password">
                <span class="error"> <?php echo $passwordErr; ?></span>
                <br><br>
                <div id="place" class="file" onclick="document.getElementById('file-input').click();" >Upload Profile</div>
                <input type="file" id="file-input" name="profile_pic" class="fileup" onchange="document.getElementById('place').innerHTML=document.getElementById('file-input').fileInput.files[0].name" >

                <span class="error"> <?php echo $fileErr; ?></span>

                <button type="submit" name="signup">Sign Up</button>
            </form>
            <div class="login-prompt">
                <p>Already have an account? <a href="login.php">Click here to log in</a></p>
            </div>
        </div>
</body>

</html>