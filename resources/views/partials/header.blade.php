<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img src="{{asset('images/logo_blu.png')}}" alt="BacLieu Learning Support Logo">
                <span class="brand-text"> &nbsp; Học - học nữa - học mãi</span>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-end">
                <a class="navbar-item" href="/">
                    <span class="icon"><i class="fas fa-home"></i></span> <span>Giới thiệu</span>
                </a>
                <a class="navbar-item" href="/guide">
                    <span class="icon"><i class="fas fa-book"></i></span> <span>Hướng dẫn</span>
                </a>
                <a class="navbar-item">
                    <span class="icon"><i class="fas fa-book-reader"></i></span> <span>Kiến thức</span>
                </a>
                @if(Auth::guest())
                    <a class="navbar-item" href="{{ route('login') }}">
                        <span class="icon"><i class="fas fa-sign-in-alt"></i></span> <span>Đăng nhập</span>
                    </a>
                @else
                    <a class="navbar-item" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span> <span>Thoát</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>