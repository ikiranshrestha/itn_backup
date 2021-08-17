<?php

if(isset($_POST['logout'])){
    logout();
    header('Location: http://localhost/itn2/login.php');
}

function logout()
{
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy(); 
}
?>
<li class="nav-item nav-profile">
    <a href="#" class="nav-link">
        <div class="profile-image">
            <img class="img-xs rounded-circle" src="http://localhost/itn2/assets/images/faces/face8.jpg" alt="profile image">
            <!-- <img class="img-xs rounded-circle" src="C:\Users\user\Desktop\notebahadur.png" alt="profile image"> -->
            <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
            <p class="profile-name"><?= $fullname; ?></p>
            <p class="designation"><?= $designation; ?></p>
        </div>  
    </a>
</li>

<li class="" style="margin: auto;">
        <form action="" method="POST">
            <button class="btn btn-danger" name = "logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                <path d="M7.5 1v7h1V1h-1z"/>
                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                </svg>
            </button>
        </form>
</li>