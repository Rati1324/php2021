<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    @yield('styles')
    <title>Document</title>
</head>

<body>
    <div class="outer_container">
        
        <div class="header_and_content">
            <header>
                <div class="filler"></div>
                <h2>Student Portal</h2>
                <a class="logout"> Log Out </a>
                
            </header>
            <div class="content">
                
                @yield('content_inner')

            </div>
             
        </div> 
        
    </div>
    
    <footer></footer>
 

</body>
</html>