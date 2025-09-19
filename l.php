<?php
// Handle AJAX Login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_ajax'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Dummy validation (replace with DB logic)
    if ($email === "admin@example.com" && $password === "admin123") {
        echo "Login successful! Welcome, $email.";
    } else {
        echo "Invalid email or password.";
    }
    exit;
}

// Handle AJAX Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup_ajax'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $is_admin = isset($_POST['admin']) ? true : false;

    if (empty($email) || empty($password) || empty($confirm_password)) {
        echo "Please fill in all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Dummy save (replace with DB insert logic)
    $role = $is_admin ? "Admin" : "User";
    echo "Signup successful for $email as $role!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Signup</title>
    <script src="https://code.jquery.com/jquery-3.7.0 .min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #b298dc, #f4a8a8);
        }

        header {
            display: flex;
            justify-content: flex-end;
            padding: 20px;
            font-size: 14px;
        }

        header a {
            margin-left: 20px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .auth-box {
            width: 500px; /* Wider */
            min-height: 450px; /* Taller */
            margin: 60px auto;
            background: #fff;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 8px 10px 18px rgba(0, 0, 0, 0.2);
        }

        .tabs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .tabs button {
            width: 49%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #eee;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .tabs button.active {
            background: linear-gradient(to right, #7866d2, #e37979);
            color: white;
        }

        form {
            display: none;
        }

        form.active {
            display: block;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            font-size: 15px;
            border-radius: 10px;
            border: none;
            box-shadow: 2px 3px 6px #ccc;
            box-sizing: border-box;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, #7866d2, #e37979);
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: #fff;
            margin-top: 50px;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
        background: linear-gradient(to right, #6752c2, #d16666);
    }

        #message {
            margin-top: 15px;
            font-size: 15px;
            color: red;
            text-align: center;
            font-weight: 500
        }

        label {
            font-size: 15px;
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            color: #333;
        }
    </style>
</head>
<body>

<header>
    <a href="home.php">HOME</a>
    <a href="#">SEARCH</a>
</header>


<div class="auth-box">
    <div class="tabs">
        <button id="login-tab" class="active">Login</button>
        <button id="signup-tab">Signup</button>
    </div>

    <!-- Login Form -->
    <form id="loginForm" class="active">
        <input type="text" name="email" placeholder="Enter your email ID" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <button type="submit" class="submit-btn">LogIn</button>
        <div id="login-message"></div>
    </form>

    <!-- Signup Form -->
    <form id="signupForm">
        <input type="email" name="email" placeholder="Enter your email ID" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>

        <!-- Admin checkbox -->
        <label style="display: block; margin: 10px 0;">
            <input type="checkbox" name="admin" value="1"> Register as Admin
        </label>

        <button type="submit" class="submit-btn">Signup</button>
        <div id="signup-message"></div>
    </form>
</div>

<script>
    $(document).ready(function () {
        // Toggle Forms
        $('#login-tab').click(function () {
            $(this).addClass('active');
            $('#signup-tab').removeClass('active');
            $('#loginForm').addClass('active');
            $('#signupForm').removeClass('active');
            $('#login-message, #signup-message').html('');
        });

        $('#signup-tab').click(function () {
            $(this).addClass('active');
            $('#login-tab').removeClass('active');
            $('#signupForm').addClass('active');
            $('#loginForm').removeClass('active');
            $('#login-message, #signup-message').html('');
        });

        // Login AJAX
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '', // same file
                data: $(this).serialize() + '&login_ajax=1',
                success: function (response) {
                    $('#login-message').css('color', 'green').html(response);
                },
                error: function () {
                    $('#login-message').css('color', 'red').html("Login failed.");
                }
            });
        });

        // Signup AJAX
        $('#signupForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '', // same file
                data: $(this).serialize() + '&signup_ajax=1',
                success: function (response) {
                    $('#signup-message').css('color', 'green').html(response);
                },
                error: function () {
                    $('#signup-message').css('color', 'red').html("Signup failed.");
                }
            });
        });
    });
</script>

</body>
</html>
