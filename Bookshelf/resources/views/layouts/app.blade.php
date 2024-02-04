<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')

<body>
    <div class="wrapper dashboard-wrapper">
        <main>
            <div class="d-flex flex-wrap flex-xl-nowrap">
                @include('layouts.sidebar')
                <div class="page-content">
                    <header class="main-header shadow-none shadow-lg-xs-1 bg-white position-relative d-none d-xl-block">
                        <div class="container-fluid">
                            @include('layouts.navbar')
                        </div>
                    </header>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>


    @include('layouts.footer')
</body>

</html>