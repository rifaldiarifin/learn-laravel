<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ($title ? $title . ' - ' : '') }}Learn Laravel</title>
    <link rel="stylesheet" href="/index.css">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" as="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <link rel="preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <script src="/js/eventToast.js"></script>
</head>
<body>
    <div class="form-layout">
        @yield('content')    
    </div>    
    <div class="toast-notifications" id="toastNotifications">
    </div>
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