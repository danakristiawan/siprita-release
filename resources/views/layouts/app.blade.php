<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Apik | Siprita</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
        />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @include('partials.styles')
    </head>

    <body data-pc-theme="light">
        <nav class="pc-sidebar">
            <div class="navbar-wrapper">
                <div class="m-header">
                    <a href="" class="b-brand text-primary">
                        <img
                            src="{{ asset('assets/images/logo-20.svg') }}"
                            class="img-fluid logo-lg"
                            alt="logo"
                        />
                    </a>
                </div>
                @include('partials.sidebar')
            </div>
        </nav>

        @include('partials.header')

        <div class="pc-container">
            <div class="pc-content">
                @yield('content') @include('partials.footer')
            </div>
        </div>

        @include('partials.scripts') @stack('js')
    </body>
</html>
