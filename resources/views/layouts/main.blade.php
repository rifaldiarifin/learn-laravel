<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ($title_2nd ? $title_2nd . ' - ' : '') }}{{ ($title ? $title . ' - ' : '') }}Learn Laravel</title>
    <link rel="stylesheet" href="/index.css">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" as="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <link rel="preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
<body>
    <header class="w-screen">
        <div class="w-cnt">
            <div class="box">
                <h1 class="company-text">
                    <a href="/">Learn <span>Laravel</span></a>
                </h1>
                <div class="nav-header">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/about">About</a>
                        </li>
                        <li>
                            <a href="/blog">Blog</a>
                        </li>
                        <li>
                            <a href="/categories">Categories</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box">
                @auth
                    <div class="profile-dropdown">
                        <input type="checkbox" id="profCheckbox">
                        <label for="profCheckbox" class="prof-button">
                            <img src="/img/maik-jonietz-_yMciiStJyY-unsplash.jpg" alt="User">
                        </label>
                        <div class="prof-dropdown">
                            <div class="user">
                                <img src="/img/maik-jonietz-_yMciiStJyY-unsplash.jpg" alt="User">
                                <div>
                                    <p class="name">{{ auth()->user()->name }}</p>
                                    <span class="email">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                            <span class="dp-separator"></span>
                            <a href="/dashboard" class="dp-list">
                                <span class="material-symbols-outlined">dashboard</span>Dashboard
                            </a>
                            <form action="/auth/logout" method="POST">
                                @csrf
                                <button type="submit" class="dp-list">
                                    <span class="material-symbols-outlined">logout</span>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/auth/login" class="btn icon">
                        <span class="material-symbols-outlined" style="--size: 36px; color: gray;">account_circle</span>
                    </a>
                @endauth
            </div>
        </div>
    </header>
    <div class="content w-screen">
        <div class="w-cnt">
            @yield('content')
        </div>
    </div>
    <div class="toast-notifications" id="toastNotifications">
    <script src="/index.js"></script>
    <script>
        // use toast here...
        // example: setToast({title: 'Test1', description: 'Type some description here.', type: 'info'})
        @if (session()->has('form_toast'))
        setToast({title: '{{ session('form_toast')['title'] }}', description: '{{ session('form_toast')['description'] }}', type: '{{ session('form_toast')['type'] }}'})
        @endif
    </script>
</body>
</html>