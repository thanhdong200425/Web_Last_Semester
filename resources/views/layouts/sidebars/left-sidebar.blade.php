<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="/back/vendors/images/deskapp-logo.svg" alt="" class="dark-logo"/>
            <img src="/back/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo"/>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <span class="micon bi bi-person"></span><span class="mtext">Users</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('user.create') }}">Add User</a></li>
                        <li><a href="{{ route('users') }}">Manage Users</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <span class="micon bi bi-file-music"></span><span class="mtext">Songs</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('song.create') }}">Add Song</a></li>
                        <li><a href="{{ route('songs') }}">Manage Songs</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <span class="micon bi bi-emoji-smile"></span><span class="mtext">Singers</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('singer.create') }}">Add Singer</a></li>
                        <li><a href="{{ route('singers') }}">Manage Singers</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <span class="micon bi bi-music-note-list"></span><span class="mtext">Albumns</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('albumn.create') }}">Add Albumn</a></li>
                        <li><a href="{{ route('albumns') }}">Manage Albumns</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
