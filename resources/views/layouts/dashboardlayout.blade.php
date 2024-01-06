<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JarlSoftware Dashboard</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
<div id="myDropdown" class="dropdown-content">
    <a class="navigation-link active" href="/dashboard" aria-current="page">
                    <span class="flex flex-nowrap w-full items-center gap-2">
                        <span class="text-ellipsis" title="Dashboard"><i class="fa-regular fa-user" style="color: #ffffff;"></i>Dashboard</span>
                    </span>
    </a>
    <a class="navigation-link active" href="/subscription" aria-current="page">
                    <span class="flex flex-nowrap w-full items-center gap-2">
                        <span class="text-ellipsis" title="Subscription"><i class="fa-solid fa-crown" style="color: #ffffff;"></i></i>Subscription</span>
                    </span>
    </a>
    <a class="navigation-link active" href="/download" aria-current="page">
                    <span class="flex flex-nowrap w-full items-center gap-2">
                        <span class="text-ellipsis" title="About us"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</span>
                    </span>
    </a>
    <a class="navigation-link active" href="/social" aria-current="page">
                    <span class="flex flex-nowrap w-full items-center gap-2">
                        <span class="text-ellipsis" title="Social Media"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i>Social Media</span>
                    </span>
    </a>
    <a class="navigation-link active" href="logout" aria-current="page">
    <span class="flex flex-nowrap w-full items-center gap-2">
        <span class="text-ellipsis" title="logout">
            <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>Logout
        </span>
    </span>
    </a>
</div>
<div class="content">
    <nav class="navbar navbar-expand-lg navbar-mainbg">
        <div class="collapse nav-color navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a aria-current="page" class="nav-link a active" href="/dashboard">
                        <div class="navbar-logo"></div>
                    </a></li>
                <i class="log fa-solid fa-right-from-bracket fa-lg" style="color: #ffffff; margin: 25px;">
                    <a class="decorator primarycolorwhite" href="logout">Logout</a>
                </i>
                <div class="dropdownx">
                    <i class="fa-solid fa-bars fa-xl" style="color: #fcfcfc;" onclick="toggleDropdown()"></i>
                </div>
            </ul>
        </div>
    </nav>

    <div class="sidebar flex flex-nowrap flex-column no-print outline-none" data-expanded="false" data-focus-root="1">
        <!-- Hamburger Button for Mobile -->
        <button
            class="button button-for-icon button-medium button-ghost-weak md:hidden shrink-0 absolute right mr-5 mt-2 opacity-0 focus:opacity-100 bg-norm"
            aria-busy="false" type="button" aria-expanded="false" title="Open Navigation">

            <svg viewBox="0 0 16 16" class="icon-16p" role="img" focusable="false" aria-hidden="true">
                <use xlink:href="#ic-hamburger"></use>
            </svg>
            <span class="sr-only">Open Navigation</span>
        </button>
        <!-- Navigation Menu -->
        <nav class="navigation max-w-full flex-auto" aria-label="Main">
            <ul class="my-0 navigation-list">
                <div class="margin"></div>
                <li class="navigation-item w-full px-3 mb-0.5">
                    <a class="navigation-link active" href="/dashboard" aria-current="page">
                    <span class="flex flex-nowrap w-full items-center gap-2">
                        <span class="text-ellipsis" title="Dashboard"><i class="fa-regular fa-user" style="color: #ffffff;"></i>Dashboard</span>
                    </span>
                    </a>
                </li>
                <li class="navigation-item w-full px-3 mb-0.5">
                    <a class="navigation-link active" href="/subscription" aria-current="page">
                    <span class="flex flex-nowrap w-full items-center gap-2">
                        <span class="text-ellipsis" title="Subscription"><i class="fa-solid fa-crown" style="color: #ffffff;"></i></i>Subscription</span>
                    </span>
                    </a>
                </li>
                <li class="navigation-item w-full px-3 mb-0.5">
                    <a class="navigation-link active" href="/download" aria-current="page">
                    <span class="flex flex-nowrap w-full items-center gap-2">
                        <span class="text-ellipsis" title="About us"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</span>
                    </span>
                    </a>
                </li>
                <li class="navigation-item w-full px-3 mb-0.5">
                    <a class="navigation-link active" href="/social" aria-current="page">
                    <span class="flex flex-nowrap w-full items-center gap-2">
                        <span class="text-ellipsis" title="Social Media"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i>Social Media</span>
                    </span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Sidebar Footer -->
        <div class="border-top">
            <div class="text-center py-2 px-3">
            <span title="Thu, 14 Dec 2023 11:03:20 GMT" class="app-infos-version text-xs m-0">
                <span class="app-infos-name mr-1">JarlSoftware</span>
                <span class="app-infos-number">1.0</span>
            </span>
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/0d88b2fdb5.js" crossorigin="anonymous"></script>
<script>
    document.querySelector('.button-for-icon').addEventListener('click', function () {
        document.querySelector('.sidebar').classList.toggle('active');
    });
</script>
<script>
    function toggleDropdown() {
        document.getElementById("myDropdown").classList.toggle("show");
        document.querySelector('.main-container').classList.toggle('blur');
    }


    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.fa-bars')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var mainContainer = document.querySelector('.main-container');
            var isDropdownOpen = false;

            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                    isDropdownOpen = true;
                }
            }

            if (isDropdownOpen) {
                mainContainer.classList.remove('blur');
            }
        }
    }
</script>
</body>
</html>
