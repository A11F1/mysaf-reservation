<nav class="topnav">
    <div class="container">
        <a class="<?= active_url(["b031910250", "mysaf-reservation", "public", "user", "index.php"]); ?>" href="<?= constant("BASEURL") . 'public/user/index.php' ?>">Home</a>
        <a class="<?= active_url(["my-reservation.php"]); ?>"href="<?= constant("BASEURL") . 'public/user/my-reservation.php' ?>">My Reservation</a>
        <a href="#history">History</a>
        <a class="<?= active_url(["my-user-account.php"]); ?>"href="<?= constant("BASEURL") . 'public/user/my-user-account.php' ?>">My Account</a>
        <a class="<?= active_url("logout.php"); ?>" href="<?= constant("BASEURL") . 'public/logout.php' ?>" style="float: right;">Logout</a>
    </div>
</nav>