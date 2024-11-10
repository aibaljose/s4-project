<?php

include "conn.php";

session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin.php");
        exit;
    } else {
        header("Location: home.php");
    }
}


$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "*Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "*Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($usernameErr) && empty($passwordErr)) {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['profile_pic'] = $user['profile_pic'];

                if ($user['role'] == 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: home.php");
                }
                exit();
            } else {
                $passwordErr = "Incorrect password.";
            }
        } else {
            $usernameErr = "User not found.";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>

<head>
    <title>
        
<?php 

if($sucess){
    echo "connection sucess";
}
else{
    echo "failed";
}
?>

    </title>
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


        .login {
            display: flex;
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 350px;
            /* Set a width for the box */
            background-color: rgba(255, 255, 255, 0.9);
        }

        .lin {
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
            outline: none;
            height: 40px;
            border-radius: 10px;
            border: 1px solid gray;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }

        button {
            padding: 10px;
            background-color: #00bedf;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: green;
        }

        .signup-prompt {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="lin">
            <h1>Login</h1>
            <form method="POST" action="">
                Username: <input type="text" name="username" value="<?php echo $username; ?>">
                <span class="error"> <?php echo $usernameErr; ?></span>
                <br><br>

            

                Password: <input type="password" name="password">
                <span class="error"> <?php echo $passwordErr; ?></span>
                <br><br>
                <button type="submit" name="Login">Login</button>
            </form>
            <div class="signup-prompt">
                <p>Need an account? <a href="Signup.php">Click here to Sign up</a></p>
            </div>
        </div>
</body>

</html>