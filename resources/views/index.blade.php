<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Abdullah Al Noman</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <img src="{{ asset('assets/images/noman.jpg') }}" alt="Profile" class="profile-img">
            <h2>Abdullah Al Noman</h2>
            <p>Dhaka, Bangladesh</p>
        </div>
        <nav class="nav-menu">
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#education">Education</a></li>
                <li><a href="#research">Research</a></li>
                <li><a href="#publications">Publications/Press</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#experience">Experience</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#extra">Extra Curricular Activities</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <footer class="footer">
            &copy; 2025 Abdullah Al Noman
        </footer>
    </div>
    <div class="main-content">
        @yield('main-content')
    </div>
</body>
</html>
