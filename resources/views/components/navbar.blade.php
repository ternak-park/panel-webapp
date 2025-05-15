   <!-- Navbar -->
   <header class="navbar navbar-expand-md navbar-light d-print-none">
       <div class="container-xl">
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
               aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
               <a href=".">
                   <img src="{{ asset('static/logo.webp') }}" width="110" height="32" alt="Tabler"
                       class="navbar-brand-image" />
               </a>
           </h1>

           @guest
               <div class="navbar-nav flex-row order-md-last">
                   <div class="nav-item d-none d-md-flex me-3">
                       <div class="btn-list">
                           <a href="{{ route('register') }}" class="btn btn-outline-primary" rel="noreferrer">
                               Daftar
                           </a>
                           <a href="{{ route('login') }}" class="btn btn-primary d-flex align-items-center"
                               rel="noreferrer">
                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                   stroke-linejoin="round" class="icon me-1">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                   <path
                                       d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                                   <path d="M3 12h13l-3 -3" />
                                   <path d="M13 15l3 -3" />
                               </svg>
                               Masuk
                           </a>
                       </div>
                   </div>
                   <div class="nav-item d-md-none">
                       <a href="{{ route('login') }}" class="btn btn-primary d-sm-none btn-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                               fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                               stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-login-2">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                               <path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                               <path d="M3 12h13l-3 -3" />
                               <path d="M13 15l3 -3" />
                           </svg>
                       </a>
                   </div>
               </div>
           @endguest
           @auth
               <div class="navbar-nav flex-row order-md-last">
                   <div class="nav-item d-none d-md-flex me-3">
                       {{-- KOSONG --}}
                   </div>
                   <div class="d-none d-md-flex">
                       <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                           data-bs-toggle="tooltip" data-bs-placement="bottom">
                           <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                               <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                           </svg>
                       </a>
                       <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                           data-bs-toggle="tooltip" data-bs-placement="bottom">
                           <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                               <circle cx="12" cy="12" r="4" />
                               <path
                                   d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                           </svg>
                       </a>
                       <div class="nav-item dropdown d-none d-md-flex me-3">
                           <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                               aria-label="Show notifications">
                               <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                   stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                   <path
                                       d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                   <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                               </svg>
                               <span class="badge bg-red"></span>
                           </a>
                           <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                               <div class="card">
                                   <div class="card-header">
                                       <h3 class="card-title">Last updates</h3>
                                   </div>
                                   <div class="list-group list-group-flush list-group-hoverable">
                                       <div class="list-group-item">
                                           <div class="row align-items-center">
                                               <div class="col-auto"><span
                                                       class="status-dot status-dot-animated bg-red d-block"></span></div>
                                               <div class="col text-truncate">
                                                   <a href="#" class="text-body d-block">Example 1</a>
                                                   <div class="d-block text-muted text-truncate mt-n1">Change deprecated
                                                       html tags to text decoration classes (#29604)</div>
                                               </div>
                                               <div class="col-auto">
                                                   <a href="#" class="list-group-item-actions">
                                                       <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                           width="24" height="24" viewBox="0 0 24 24"
                                                           stroke-width="2" stroke="currentColor" fill="none"
                                                           stroke-linecap="round" stroke-linejoin="round">
                                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                           <path
                                                               d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                       </svg>
                                                   </a>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="list-group-item">
                                           <div class="row align-items-center">
                                               <div class="col-auto"><span class="status-dot d-block"></span></div>
                                               <div class="col text-truncate">
                                                   <a href="#" class="text-body d-block">Example 2</a>
                                                   <div class="d-block text-muted text-truncate mt-n1">
                                                       justify-content:between ⇒ justify-content:space-between (#29734)
                                                   </div>
                                               </div>
                                               <div class="col-auto">
                                                   <a href="#" class="list-group-item-actions show">
                                                       <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow"
                                                           width="24" height="24" viewBox="0 0 24 24"
                                                           stroke-width="2" stroke="currentColor" fill="none"
                                                           stroke-linecap="round" stroke-linejoin="round">
                                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                           <path
                                                               d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                       </svg>
                                                   </a>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="list-group-item">
                                           <div class="row align-items-center">
                                               <div class="col-auto"><span class="status-dot d-block"></span></div>
                                               <div class="col text-truncate">
                                                   <a href="#" class="text-body d-block">Example 3</a>
                                                   <div class="d-block text-muted text-truncate mt-n1">Update
                                                       change-version.js (#29736)</div>
                                               </div>
                                               <div class="col-auto">
                                                   <a href="#" class="list-group-item-actions">
                                                       <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                           width="24" height="24" viewBox="0 0 24 24"
                                                           stroke-width="2" stroke="currentColor" fill="none"
                                                           stroke-linecap="round" stroke-linejoin="round">
                                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                           <path
                                                               d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                       </svg>
                                                   </a>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="list-group-item">
                                           <div class="row align-items-center">
                                               <div class="col-auto"><span
                                                       class="status-dot status-dot-animated bg-green d-block"></span>
                                               </div>
                                               <div class="col text-truncate">
                                                   <a href="#" class="text-body d-block">Example 4</a>
                                                   <div class="d-block text-muted text-truncate mt-n1">Regenerate
                                                       package-lock.json (#29730)</div>
                                               </div>
                                               <div class="col-auto">
                                                   <a href="#" class="list-group-item-actions">
                                                       <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                           width="24" height="24" viewBox="0 0 24 24"
                                                           stroke-width="2" stroke="currentColor" fill="none"
                                                           stroke-linecap="round" stroke-linejoin="round">
                                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                           <path
                                                               d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                       </svg>
                                                   </a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="nav-item dropdown">
                       <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                           aria-label="Open user menu">
                           <span class="avatar avatar-sm"
                               style="background-image: url(
             @if (Auth::user()->gambar_profile) {{ url('storage/' . Auth::user()->gambar_profile) }}
             @else{{ asset('static/avatars/AVATAR_SAPI.png') }} @endif
           )">
                           </span>
                           {{-- <span class="avatar avatar-sm"
                           style="background-image: url({{ asset('static/avatars/AVATAR_SAPI.png') }})"></span> --}}
                           <div class="d-none d-xl-block ps-2">
                               <div>{{ ucfirst(Auth::user()->username ?? 'Guest') }}</div>
                               <div class="mt-1 small text-muted">{{ ucfirst(Auth::user()->type ?? 'Guest') }}</div>
                           </div>
                       </a>
                       <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                           <a href="#" class="dropdown-item">Status</a>
                           <a href="#" class="dropdown-item">Profile</a>
                           <a href="#" class="dropdown-item">Feedback</a>
                           <div class="dropdown-divider"></div>
                           <a href="./settings.html" class="dropdown-item">Settings</a>
                           <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"
                               class="dropdown-item">Logout</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
                       </div>
                   </div>
               </div>
           @endauth
       </div>
   </header>
   <div class="navbar-expand-md">
       <div class="collapse navbar-collapse" id="navbar-menu">
           <div class="navbar navbar-light">
               <div class="container-xl">
                   <ul class="navbar-nav">
                       @if (!Auth::user())
                       @elseif (Auth::user()->type === 'user')
                           <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                               <a class="nav-link" href="{{ route('home') }}">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                           height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                           fill="none" stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                           <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                           <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Summary </span>
                               </a>
                           </li>

                           {{-- TIM OFFICE --}}
                       @elseif (Auth::user()->type === 'admin')
                           <li class="nav-item {{ Route::is('admin.home') ? 'active' : '' }}">
                               <a class="nav-link" href="{{ route('admin.home') }}">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                           height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                           fill="none" stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                           <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                           <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Summary </span>
                               </a>
                           </li>
                            {{-- Ternak --}}
                           <li
                               class="nav-item dropdown {{ Route::is('hewan.*', 'fisik.*','reproduksi.*' , 'kondisi.*') ? 'active' : '' }}">
                               <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                   data-bs-auto-close="outside" role="button" aria-expanded="false">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-building-cottage">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path d="M3 21l18 0" />
                                           <path d="M4 21v-11l2.5 -4.5l5.5 -2.5l5.5 2.5l2.5 4.5v11" />
                                           <path d="M12 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                           <path d="M9 21v-5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v5" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Ternak </span>
                               </a>
                               <div class="dropdown-menu">
                                   <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <div class="dropdown">
                                                <a href="{{ route('hewan.index') }}"
                                                    class="dropdown-item {{ Route::is('hewan.*') ? 'active' : '' }}">
                                                    Data </a>
                                                <a href="{{ route('reproduksi.index') }}"
                                                    class="dropdown-item {{ Route::is('reproduksi.*') ? 'active' : '' }}">
                                                    Reproduksi
                                                    {{-- <span
                                                        class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span> --}}
                                                </a>
                                                <a href="{{ route('fisik.index') }}"
                                                    class="dropdown-item {{ Route::is('fisik.*') ? 'active' : '' }}">
                                                    Fisik
                                                </a>
                                                <a href="{{ route('kondisi.index') }}"
                                                    class="dropdown-item {{ Route::is('kondisi.*') ? 'active' : '' }}">
                                                    Kondisi
                                                </a>
                                            </div>
                                       </div>
                                   </div>
                               </div>
                           </li>
                           {{-- KANDANG --}}
                           <li class="nav-item {{ Route::is('kandang.index') ? 'active' : '' }}">
                               <a class="nav-link" href="{{ route('kandang.index') }}">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-building-bank">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path d="M3 21l18 0" />
                                           <path d="M3 10l18 0" />
                                           <path d="M5 6l7 -3l7 3" />
                                           <path d="M4 10l0 11" />
                                           <path d="M20 10l0 11" />
                                           <path d="M8 14l0 3" />
                                           <path d="M12 14l0 3" />
                                           <path d="M16 14l0 3" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Kandang </span>
                               </a>
                           </li>
                           {{-- Pakan --}}
                           {{-- <li class="nav-item {{ Route::is('suppliers.index') ? 'active' : '' }}">
                               <a class="nav-link" href="{{ route('suppliers.index') }}">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-meat">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path
                                               d="M13.62 8.382l1.966 -1.967a2 2 0 1 1 3.414 -1.415a2 2 0 1 1 -1.413 3.414l-1.82 1.821" />
                                           <path
                                               d="M5.904 18.596c2.733 2.734 5.9 4 7.07 2.829c1.172 -1.172 -.094 -4.338 -2.828 -7.071c-2.733 -2.734 -5.9 -4 -7.07 -2.829c-1.172 1.172 .094 4.338 2.828 7.071z" />
                                           <path d="M7.5 16l1 1" />
                                           <path
                                               d="M12.975 21.425c3.905 -3.906 4.855 -9.288 2.121 -12.021c-2.733 -2.734 -8.115 -1.784 -12.02 2.121" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Pakan </span>
                               </a>
                           </li> --}}
                           {{-- ATRIBUT --}}
                           <li
                               class="nav-item dropdown {{ Route::is('status.index', 'tipe.index', 'program.index', 'kesehatan.index') ? 'active' : '' }}">
                               <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                   data-bs-auto-close="outside" role="button" aria-expanded="false">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-layout-distribute-horizontal">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path d="M4 4l16 0" />
                                           <path d="M4 20l16 0" />
                                           <path
                                               d="M6 9m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Atribut </span>
                               </a>
                               <div class="dropdown-menu">
                                   <div class="dropdown-menu-columns">
                                       <div class="dropdown-menu-column">

                                           <a class="dropdown-item {{ Route::is('status.index') ? 'active' : '' }}"
                                               href="{{ route('status.index') }}"> Status </a>
                                           
                                           <a class="dropdown-item {{ Route::is('program.index') ? 'active' : '' }}"
                                               href="{{ route('program.index') }}"> Program </a>
                                           <a class="dropdown-item {{ Route::is('kesehatan.index') ? 'active' : '' }}"
                                               href="{{ route('kesehatan.index') }}"> Kesehatan </a>
                                       </div>

                                   </div>
                               </div>
                           </li>
                           <li
                               class="nav-item dropdown {{ Route::is('users.index', 'users.adalahAdmin') ? 'active' : '' }}">
                               <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                   data-bs-auto-close="outside" role="button" aria-expanded="false">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                           <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                           <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Investor </span>
                               </a>

                               <div class="dropdown-menu">
                                   <div class="dropdown-menu-columns ">
                                       <div class="dropdown-menu-column">
                                           <a class="dropdown-item {{ Route::is('users.index') ? 'active' : '' }}"
                                               href="{{ route('users.index') }}"> User </a>
                                           <a class="dropdown-item {{ Route::is('users.adalahAdmin') ? 'active' : '' }}"
                                               href="{{ route('users.adalahAdmin') }}">
                                               Admin
                                               <span class="badge badge-sm bg-green-lt text-uppercase ms-auto"><svg
                                                       xmlns="http://www.w3.org/2000/svg" width="24"
                                                       height="24" viewBox="0 0 24 24" fill="none"
                                                       stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                       stroke-linejoin="round"
                                                       class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                                                       <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                       <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
                                                   </svg></span>
                                           </a>
                                       </div>
                                   </div>
                               </div>
                           </li>

                           {{-- Executive --}}
                       @elseif (Auth::user()->type === 'executive')
                           <li class="nav-item {{ Route::is('executive.home') ? 'active' : '' }}">
                               <a class="nav-link" href="{{ route('executive.home') }}">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                           height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                           fill="none" stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                           <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                           <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Summary </span>
                               </a>
                           </li>

                           <li
                               class="nav-item dropdown {{ Route::is('executive.hewan.index', 'executive.fattening.index') ? 'active' : '' }}">
                               <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                   data-bs-auto-close="outside" role="button" aria-expanded="false">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-horse">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path
                                               d="M7 10l-.85 8.507a1.357 1.357 0 0 0 1.35 1.493h.146a2 2 0 0 0 1.857 -1.257l.994 -2.486a2 2 0 0 1 1.857 -1.257h1.292a2 2 0 0 1 1.857 1.257l.994 2.486a2 2 0 0 0 1.857 1.257h.146a1.37 1.37 0 0 0 1.364 -1.494l-.864 -9.506h-8c0 -3 -3 -5 -6 -5l-3 6l2 2l3 -2z" />
                                           <path d="M22 14v-2a3 3 0 0 0 -3 -3" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Ternak </span>
                               </a>
                               <div class="dropdown-menu">
                                   <div class="dropdown-menu-columns">
                                       <div class="dropdown-menu-column">

                                           <a class="dropdown-item {{ Route::is('executive.hewan.index') ? 'active' : '' }}"
                                               href="{{ route('executive.hewan.index') }}"> Overview </a>
                                           <a class="dropdown-item {{ Route::is('executive.fattening.index') ? 'active' : '' }}"
                                               href="{{ route('executive.fattening.index') }}"> Fattening </a>
                                           <a class="dropdown-item {{ Route::is('executive.breeding.index') ? 'active' : '' }}"
                                               href="{{ route('executive.breeding.index') }}"> Breeding </a>
                                       </div>

                                   </div>
                               </div>
                           </li>

                           <li class="nav-item {{ Route::is('executive.kandang.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('executive.kandang.index') }}">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-building-cottage">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path d="M3 21l18 0" />
                                           <path d="M4 21v-11l2.5 -4.5l5.5 -2.5l5.5 2.5l2.5 4.5v11" />
                                           <path d="M12 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                           <path d="M9 21v-5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v5" />
                                       </svg>
                                </span>
                                <span class="nav-link-title"> Kandang </span>
                            </a>
                        </li>

                           <li class="nav-item {{ Route::is('executive.pakan.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('executive.pakan.index') }}">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-cheese">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path d="M4.519 20.008l16.481 -.008v-3.5a2 2 0 1 1 0 -4v-3.5h-16.722" />
                                           <path
                                               d="M21 9l-9.385 -4.992c-2.512 .12 -4.758 1.42 -6.327 3.425c-1.423 1.82 -2.288 4.221 -2.288 6.854c0 2.117 .56 4.085 1.519 5.721" />
                                           <path d="M15 13v.01" />
                                           <path d="M8 13v.01" />
                                           <path d="M11 16v.01" />
                                       </svg>
                                </span>
                                <span class="nav-link-title"> Pakan </span>
                            </a>
                        </li>

                           {{-- ATRIBUT --}}
                           {{-- <li
                               class="nav-item dropdown {{ Route::is('status.index', 'tipe.index', 'program.index', 'kesehatan.index') ? 'active' : '' }}">
                               <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                   data-bs-auto-close="outside" role="button" aria-expanded="false">
                                   <span
                                       class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                           stroke-linecap="round" stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-layout-distribute-horizontal">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                           <path d="M4 4l16 0" />
                                           <path d="M4 20l16 0" />
                                           <path
                                               d="M6 9m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                       </svg>
                                   </span>
                                   <span class="nav-link-title"> Atribut </span>
                               </a>
                               <div class="dropdown-menu">
                                   <div class="dropdown-menu-columns">
                                       <div class="dropdown-menu-column">

                                           <a class="dropdown-item {{ Route::is('status.index') ? 'active' : '' }}"
                                               href="{{ route('status.index') }}"> Status </a>
                                           <a class="dropdown-item {{ Route::is('tipe.index') ? 'active' : '' }}"
                                               href="{{ route('tipe.index') }}"> Tipe </a>
                                           <a class="dropdown-item {{ Route::is('program.index') ? 'active' : '' }}"
                                               href="{{ route('program.index') }}"> Program </a>
                                           <a class="dropdown-item {{ Route::is('kesehatan.index') ? 'active' : '' }}"
                                               href="{{ route('kesehatan.index') }}"> Kesehatan </a>
                                       </div>

                                   </div>
                               </div>
                           </li> --}}

                           <li class="nav-item {{ Route::is('executive.investor.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('executive.investor.index') }}">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Investor </span>
                            </a>
                        </li>
                       @endif

                   </ul>

                   <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                       <form action="./" method="get" autocomplete="off" novalidate>
                           <div class="input-icon">
                               <span class="input-icon-addon">
                                   <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                   <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                       height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                       fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                       <circle cx="10" cy="10" r="7" />
                                       <line x1="21" y1="21" x2="15" y2="15" />
                                   </svg>
                               </span>
                               <input type="text" value="" class="form-control" placeholder="Search…"
                                   aria-label="Search in website" />
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
