<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
         <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
        <!-- include summernote css -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
           <!--  @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif -->

            <!-- Page Content -->
            <main>
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{route('create.category')}}">Create Category</a></li>
                                <li class="list-group-item"><a href="{{route('all.cate')}}">All Category</a></li>
                                <li class="list-group-item"><a href="{{route('create.post')}}">Create Post</a></li>
                                <li class="list-group-item"><a href="{{route('all.post')}}">All Post</a></li>
                                <li class="list-group-item"><a href="{{route('post.trashed')}}">All Trash Post</a></li>
                                <li class="list-group-item"><a href="{{route('create.tags')}}">Create Tag</a></li>
                                <li class="list-group-item"><a href="{{route('all.tags')}}">All Tag</a></li>
                                <li class="list-group-item"><a href="{{route('create.user')}}">Create Users</a></li>
                                <li class="list-group-item"><a href="{{route('all.user')}}">All User</a></li>
                                <li class="list-group-item"><a href="{{ route('all.settings')}}">Settings</a></li>
                                <li class="list-group-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <!-- jQuery library -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <!-- Popper JS -->
        <script src="{{ asset('js/popper.min.js') }}"></script>

        <!-- Latest compiled JavaScript -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Latest toastir JavaScript -->
       <script src="{{ asset('js/toastr.min.js') }}"></script>
       <!-- include summernote js -->
       <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

       <script type="text/javascript">
            @if(Session::has('creat'))
                toastr.success("{{ Session::get('creat') }}");
            @endif
            @if(Session::has('deletecate'))
                toastr.info("{{ Session::get('deletecate') }}");
            @endif
            @if(Session::has('creatpost'))
                toastr.success("{{ Session::get('creatpost') }}");
            @endif
            @if(Session::has('info'))
                toastr.warning("{{ Session::get('info') }}");
            @endif
            @if(Session::has('update'))
                toastr.success("{{ Session::get('update') }}");
            @endif
            @if(Session::has('restore'))
                toastr.success("{{ Session::get('restore') }}");
            @endif
            @if(Session::has('kill'))
                toastr.info("{{ Session::get('kill') }}");
            @endif
            @if(Session::has('postupdate'))
                toastr.success("{{ Session::get('postupdate') }}");
            @endif
            // start tags section //
            @if(Session::has('createtags'))
                toastr.success("{{ Session::get('createtags') }}");
            @endif
            @if(Session::has('tagsupdate'))
                toastr.success("{{ Session::get('tagsupdate') }}");
            @endif
            @if(Session::has('deltags'))
                toastr.info("{{ Session::get('deltags') }}");
            @endif
            // start user section //
            @if(Session::has('user'))
                toastr.success("{{ Session::get('user') }}");
            @endif
            @if(Session::has('admin'))
                toastr.success("{{ Session::get('admin') }}");
            @endif
            @if(Session::has('not_admin'))
                toastr.success("{{ Session::get('not_admin') }}");
            @endif
            @if(Session::has('useradmin'))
                toastr.info("{{ Session::get('useradmin') }}");
            @endif
            // start setting section //
            @if(Session::has('settingupd'))
                toastr.success("{{ Session::get('settingupd') }}");
            @endif
       </script>

       <script>
           $(document).ready(function() {
                $('#content').summernote();
            });
       </script>
    </body>
</html>
