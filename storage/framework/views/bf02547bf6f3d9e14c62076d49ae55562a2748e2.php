<nav class="navbar navbar-inverse navbar-fixed-top">
    <div id="navbar-inner">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Cows App</a>
            </div>
            <ul class="nav navbar-nav">
                <?php if (!isset($nav_selection)): ?>
                    <?php $nav_selection = ''; ?>
                <?php endif ?>
                <li class="<?= $nav_selection == 'home' ? 'active' : '' ?>"><a href="/">All cows</a></li>
                <?php if(Auth::check()): ?>
                    <li class="<?= $nav_selection == 'cow_profile' ? 'active' : '' ?> "><a href="/addcow">Add cow</a></li>
                    <li class="<?= $nav_selection == 'profile' ? 'active' : '' ?> "><a href="/profile">Edit profile</a></li>
                    <li class="<?= $nav_selection == 'logout' ? 'active' : '' ?> "><a href="/logout">Log out</a></li>
                <?php else: ?>
                    <li class="<?= $nav_selection == 'login' ? 'active' : '' ?> "><a href="/login">Log in</a></li>
                    <!-- <li class="<?= $nav_selection == 'register' ? 'active' : '' ?> "><a href="/register">Register</a></li> -->
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
