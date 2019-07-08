<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="<?php echo urlencode('home.php') ?>" class="logo">Sport <span class="lite">Watch</span></a>
    <!--logo end-->
    <div class="nav search-row" id="top_menu">
       
    </div>

    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="profile-ava">
                        <img alt="" src="../public/dist/img/avatar1_small.jpg">
                    </span>
                    <span class="username">Administrator</span>
                    <b class="caret"></b>
                </a>

                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li>
                        <a href="../functions/logout.php"><i class="icon_key_alt"></i> Log Out</a>
                    </li>
                   
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>