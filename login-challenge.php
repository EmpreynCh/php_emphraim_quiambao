<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body style="background-color: gray;">
    <div class="container">
    <?php
        $userCredentials = [
            'Admin' => [
                'admin' => 'Pass1234',
                'renmark' => 'Pogi1234'
            ],
            'Content Manager' => [
                'pepito' => 'manaloto',
                'juan' => 'delacruz'
            ],
            'System User' => [
                'pedro' => 'penduko'
            ]
        ];
    ?>

    <?php if (isset($_POST['btn-signin'])): ?>
        <?php
            $userType = $_POST['slctUserType'];
            $username = $_POST['inputUsername'];
            $password = $_POST['inputPassword'];
            
            $isAuthenticated = isset($userCredentials[$userType][$username]) && $userCredentials[$userType][$username] === $password;
        ?>

        <?php if ($isAuthenticated): ?>
            <div class="alert alert-success alert-dismissible fade show" style="max-width: 350px; margin: auto;">   
                Welcome to the system, <?php echo $username; ?>!
            </div>
        <?php else: ?>
            <div class="alert alert-danger alert-dismissible fade show" style="max-width: 350px; margin: auto;">
                Invalid Username or Password.
            </div>
        <?php endif; ?>
    <?php endif; ?>

        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Profile Image" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post">
                <select name="slctUserType" id="slctUserType" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="Content Manager">Content Manager</option>
                    <option value="System User">System User</option>
                </select>

                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="inputUsername" id="inputUsername" class="form-control" placeholder="User Name" required autofocus>
                <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="btn-signin">Sign in</button>
            </form>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
