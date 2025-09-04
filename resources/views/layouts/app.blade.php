<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $title ?? 'Manajemen User')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">Manajemen User</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    @auth
                    <li class="nav-item"><a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    @if(auth()->user()->isAdmin())
                    <li class="nav-item"><a href="{{ route('admin.users.index') }}"
                            class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Users</a></li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-1">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <h6 class="dropdown-header mb-0">{{ auth()->user()->email }}</h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="px-3 py-1">@csrf<button
                                        type="submit" class="btn btn-sm btn-outline-danger w-100">Logout</button></form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item"><a href="{{ route('login') }}"
                            class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container flex-grow-1 mb-5">
        @hasSection('breadcrumb')
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0 small">
                @yield('breadcrumb')
            </ol>
        </nav>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @foreach (['success','status','error','warning','info'] as $msg)
        @if(session($msg))
        <div class="alert alert-{{ $msg === 'error' ? 'danger' : ($msg === 'status' ? 'success' : $msg) }} alert-dismissible fade show"
            role="alert">
            {{ session($msg) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @endforeach

        @yield('content')
    </div>

    <footer class="mt-auto py-3 bg-light border-top small text-muted">
        <div class="container d-flex flex-column flex-sm-row align-items-center justify-content-between gap-2">
            <span>&copy; {{ date('Y') }} Manajemen User</span>
            <span class="text-secondary">Built with Laravel & Bootstrap</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>