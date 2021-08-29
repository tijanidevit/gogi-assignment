<div class="header d-print-none">
    <div class="header-container">
        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i data-feather="menu"></i>
                </a>
            </div>

            <div class="header-logo">
                <a href="dashboard">
                    <img class="logo" src="../assets/media/image/logo.png" alt="logo">
                </a>
            </div>
        </div>

        <div class="header-body">
            <div class="header-body-left">

            </div>

            <div class="header-body-right">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown d-none d-md-block">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize" data-feather="maximize"></i>
                            <i class="minimize" data-feather="minimize"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="chat" class="nav-link nav-link-notify" title="Chats">
                            <i data-feather="message-circle"></i>
                        </a>
                    </li>




                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                            <figure class="avatar avatar-sm">
                                <img src="../uploads/lecturers/images/<?php echo $lecturer['image'] ?>" class="rounded-circle" alt="avatar">
                            </figure>
                            <span class="ml-2 d-sm-inline d-none"><?php echo $lecturer['fullname'] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="text-center py-4">
                                <figure class="avatar avatar-lg mb-3 border-0">
                                    <img src="../uploads/lecturers/images/<?php echo $lecturer['image'] ?>" class="rounded-circle" alt="image">
                                </figure>
                                <h5 class="text-center"><?php echo $lecturer['fullname'] ?></h5>
                                <div class="mb-3 small text-center text-muted"><?php echo $lecturer['email'] ?></div>
                            </div>
                            <div class="list-group">
                                <a href="logout" class="list-group-item text-danger" >Sign Out!</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item header-toggler">
                <a href="#" class="nav-link">
                    <i data-feather="arrow-down"></i>
                </a>
            </li>
        </ul>
    </div>
</div>