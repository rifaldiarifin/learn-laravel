<nav>
    <div>
        <div class="menu-group">
            <h2>General</h2>
            <ul>
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <span class="material-symbols-outlined">home</span>Dashboard
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/posts*') ? 'active' : '' }}">
                    <a href="/dashboard/posts">
                        <span class="material-symbols-outlined">note</span>My Posts
                    </a>
                </li>
            </ul>
        </div>
        @can('admin')
        <div class="menu-group admin">
            <h2>Admin</h2>
            <ul>
                <li class="{{ Request::is('dashboard/categories*') ? 'active' : '' }}">
                    <a href="/dashboard/categories">
                        <span class="material-symbols-outlined">category</span>Post Categories
                    </a>
                </li>
            </ul>
        </div>
        @endcan
    </div>
</nav>