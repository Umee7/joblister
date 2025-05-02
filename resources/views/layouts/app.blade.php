<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark-theme">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')?? 'JobLister' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/logo/joblister.png')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('css')
    
</head>
<body class="bg-primary">
    <a href="#main-content" class="skip-to-main">Skip to main content</a>
    <div id="app">
        <nav class="main-nav">
            <div class="nav-container">
                <div class="nav-left">
                    <a href="{{ url('/') }}" class="nav-logo">
                        <img src="{{asset('images/logo/joblister.png')}}" alt="{{ config('app.name') }}">
                        <span class="nav-brand">JobLister</span>
                    </a>
                </div>

                <div class="nav-center desktop-nav">
                    <a href="{{ route('job.index') }}" class="nav-link">
                        <i class="fas fa-search"></i> Find Jobs
                    </a>
                    <a href="{{ route('company.index') }}" class="nav-link">
                        <i class="fas fa-building"></i> Companies
                    </a>
                </div>

                <div class="nav-right">
                    <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="desktop-nav auth-links">
                        @guest
                            <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-button">{{ __('Register') }}</a>
                            @endif
                        @else
                            <div class="nav-profile">
                                <button class="profile-trigger" onclick="toggleDropdown()">
                                    <img src="{{ Auth::user()->profile ? asset(Auth::user()->profile->avatar) : asset('images/user-profile.png') }}" 
                                         alt="Profile" 
                                         class="profile-image">
                                    <span class="profile-name">{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="profile-dropdown">
                                    @role('admin')
                                        <a href="{{route('account.dashboard')}}" class="dropdown-item">
                                            <i class="fas fa-cogs"></i> Dashboard
                                        </a>
                                    @endrole
                                    @role('author')
                                        <a href="{{route('account.authorSection')}}" class="dropdown-item">
                                            <i class="fas fa-cogs"></i> Author Dashboard
                                        </a>
                                    @endrole
                                    <a href="{{route('account.index')}}" class="dropdown-item">
                                        <i class="fas fa-user"></i> Profile
                                    </a>
                                    <a href="{{route('account.changePassword')}}" class="dropdown-item">
                                        <i class="fas fa-key"></i> Change Password
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('account.logout')}}" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>

            <div class="mobile-menu" id="mobileMenu">
                <div class="mobile-menu-links">
                    <a href="{{ route('job.index') }}" class="mobile-link">
                        <i class="fas fa-search"></i> Find Jobs
                    </a>
                    <a href="{{ route('company.index') }}" class="mobile-link">
                        <i class="fas fa-building"></i> Companies
                    </a>
                    @guest
                        <a href="{{ route('login') }}" class="mobile-link">
                            <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="mobile-link highlight">
                                <i class="fas fa-user-plus"></i> {{ __('Register') }}
                            </a>
                        @endif
                    @else
                        <a href="{{ route('account.index') }}" class="mobile-link">
                            <i class="fas fa-user-circle"></i> My Profile
                        </a>
                        <a href="{{ route('account.dashboard') }}" class="mobile-link">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                        <a href="{{ route('logout') }}" 
                           class="mobile-link text-danger"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="bg-primary" id="main-content">
            @yield('layout-holder')
        </main>

        <footer class="bg-secondary shadow-sm mt-5 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0 text-primary">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <div class="social-links">
                            <a href="#" class="text-primary mr-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-primary mr-3"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-primary mr-3"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-primary"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @include('sweetalert::alert')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            const body = document.body;
            
            if (mobileMenu.classList.contains('show')) {
                mobileMenu.classList.remove('show');
                body.classList.remove('menu-open');
            } else {
                mobileMenu.classList.add('show');
                body.classList.add('menu-open');
            }
        }

        function toggleDropdown() {
            const dropdown = document.querySelector('.profile-dropdown');
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            } else {
                dropdown.classList.add('show');
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.profile-dropdown');
            const profileTrigger = document.querySelector('.profile-trigger');
            
            if (dropdown && !profileTrigger.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                const mobileMenu = document.getElementById('mobileMenu');
                const body = document.body;
                mobileMenu.classList.remove('show');
                body.classList.remove('menu-open');
            });
        });
    </script>
    @stack('js')
</body>
</html>

@push('css')
<style>
.main-nav {
    background-color: var(--bg-secondary);
    border-bottom: 1px solid var(--border-color);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0.75rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nav-left {
    display: flex;
    align-items: center;
}

.nav-center {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.nav-right {
    display: flex;
    align-items: center;
}

.nav-logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    text-decoration: none;
    margin-right: 2rem;
}

.nav-logo img {
    height: 36px;
    width: auto;
}

.nav-brand {
    color: var(--text-primary);
    font-size: 1.25rem;
    font-weight: 600;
}

.auth-links {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.nav-link {
    color: var(--text-secondary);
    text-decoration: none;
    padding: 0.5rem 0.75rem;
    border-radius: 6px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.95rem;
    white-space: nowrap;
}

.nav-link:hover {
    color: var(--text-primary);
    background-color: var(--bg-tertiary);
    text-decoration: none;
}

.nav-button {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    color: var(--text-primary);
    padding: 0.5rem 1.25rem;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.95rem;
    white-space: nowrap;
}

.nav-button:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
    text-decoration: none;
    color: var(--text-primary);
}

.nav-profile {
    position: relative;
}

.profile-trigger {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem;
    background: none;
    border: none;
    color: var(--text-primary);
    cursor: pointer;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.profile-trigger:hover {
    background-color: var(--bg-tertiary);
}

.profile-image {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--border-color);
}

.profile-name {
    font-weight: 500;
    font-size: 0.95rem;
}

.profile-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    width: 220px;
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 0.5rem;
    margin-top: 0.5rem;
    box-shadow: var(--shadow-lg);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
}

.profile-dropdown.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    color: var(--text-secondary);
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.dropdown-item:hover {
    background-color: var(--bg-tertiary);
    color: var(--text-primary);
    text-decoration: none;
}

.dropdown-item.text-danger:hover {
    background-color: rgba(239, 68, 68, 0.1);
    color: var(--accent-danger);
}

.dropdown-divider {
    height: 1px;
    background-color: var(--border-color);
    margin: 0.5rem 0;
}

/* Mobile Menu */
.mobile-menu-btn {
    display: none;
    background: none;
    border: none;
    color: var(--text-primary);
    font-size: 1.25rem;
    padding: 0.5rem;
    cursor: pointer;
}

.mobile-menu {
    display: none;
    position: fixed;
    top: 64px;
    left: 0;
    right: 0;
    background-color: var(--bg-secondary);
    border-top: 1px solid var(--border-color);
    padding: 1rem;
    transform: translateY(-100%);
    transition: transform 0.3s ease;
}

.mobile-menu.show {
    transform: translateY(0);
}

.mobile-menu-links {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.mobile-link {
    color: var(--text-secondary);
    text-decoration: none;
    padding: 0.75rem 1rem;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.mobile-link:hover {
    color: var(--text-primary);
    background-color: var(--bg-tertiary);
    text-decoration: none;
}

.mobile-link.highlight {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    color: var(--text-primary);
}

.mobile-link.text-danger {
    color: var(--accent-danger);
}

.mobile-link.text-danger:hover {
    background-color: rgba(239, 68, 68, 0.1);
}

@media (max-width: 768px) {
    .desktop-nav {
        display: none;
    }

    .mobile-menu-btn {
        display: block;
    }

    .mobile-menu {
        display: block;
    }

    .nav-container {
        padding: 0.5rem 1rem;
    }

    .nav-brand {
        font-size: 1.1rem;
    }

    .nav-logo {
        margin-right: 0;
    }

    .nav-logo img {
        height: 32px;
    }

    body.menu-open {
        overflow: hidden;
    }
}
</style>
@endpush
