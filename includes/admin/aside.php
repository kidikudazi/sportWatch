<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="<?php echo urlencode('home.php'); ?>">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="" href="<?php echo urlencode('home.php'); ?>">
                    <i class="fa fa-file"></i>
                    <span>Create Post</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:void(0);" class="">
                    <i class="icon_document_alt"></i>
                    <span>Registrations</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?php echo urlencode('reg_competitions.php'); ?>">Register Competitions.</a></li>
                    <li><a class="" href="<?php echo urlencode('reg_teams.php'); ?>">Register Teams.</a></li>
                    <li><a class="" href="<?php echo urlencode('competition_teams.php'); ?>">Competition Teams.</a></li>
                    <li><a class="" href="<?php echo urlencode('reg_players.php'); ?>">Register Players.</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>