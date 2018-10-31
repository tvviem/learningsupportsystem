<header class="hero">
    <div class="hero-head">
        <nav class="navbar has-background-grey-darker" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item is--brand">
                    <img class="navbar-brand-logo" src="/images/logo_blu.png" alt="LOGO Bac Lieu University">
                </a>
                <a class="navbar-item is-tab is-hidden-mobile">
                    <span class="icon is-medium"><i class="fas fa-home"></i></span>Trang chủ BLU
                </a>
                <a class="navbar-item is-tab is-hidden-mobile">Chức năng</a>
                <a class="navbar-item is-tab is-hidden-mobile">Bản quyền</a>
                <a class="navbar-item is-tab is-hidden-mobile">Thông tin</a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu navbar-end has-background-grey-darker" id="navMenu">
                {{-- <a class="navbar-item is-tab is-hidden-tablet">Home</a>
                <a class="navbar-item is-tab is-hidden-tablet">Features</a>
                <a class="navbar-item is-tab is-hidden-tablet">Pricing</a>
                <a class="navbar-item is-tab is-hidden-tablet">About</a> --}}
                <a class="navbar-item nav-tag">
                    <span class="icon is-small">
                        <i class="far fa-envelope"></i>
                    </span>
                    <span class="tag is-primary tag-notif">6</span>
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link has-text-grey-lighter">
                        <figure class="image is-32x32">
                            <img src="images/profile.png">
                        </figure>
                        &nbsp; tvviem
                    </a>

                    <div class="navbar-dropdown is-right has-background-grey-darker has-shadow">
                        <a class="navbar-item">
                            <span class="icon is-small"><i class="far fa-user"></i></span>
                            &nbsp; Profile
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            <span class="icon is-small"><i class="fas fa-sign-out-alt"></i></span>
                            &nbsp; Logout
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
