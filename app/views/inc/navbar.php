
<div class="navbar">
    <img src="../public/img/logo.png" class = logo>
    <div class="navbar-orizontal"></div>
</div>

<div class="navbar-vertical">
    <div class="header-left">
        <a href="<?php echo URLROOT; ?>/pages/index" class="active">Home</a>
        <?php if(isset($_SESSION['user_id'])) : ?>
            <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        <?php else : ?>
            <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <a href="<?php echo URLROOT; ?>/users/register">Register</a>
        <?php endif; ?>
    </div>
</div>
