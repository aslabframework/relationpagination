<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            @if (Auth::user()->role == 'admin')
                <li class="nav-item ">
                    <a class="nav-link active" href="{{ route('users.index') }}">
                    <span data-feather="users"></span>
                    Users
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="{{ route('posts.index') }}">
                    <span data-feather="home"></span>
                    Posts
                    </a>
                </li>  
            @else
                <li class="nav-item ">
                    <a class="nav-link active" href="{{ route('users.show',['id'=>Auth::user()->id]) }}">
                    <span data-feather="users"></span>
                        Profile
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="{{ route('posts.index') }}">
                        <span data-feather="home"></span>
                        Posts
                    </a>
                </li>        
            @endif
        </ul>
    </div>
</nav>