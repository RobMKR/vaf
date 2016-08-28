<html>
    <head>
        <title>@yield('title')</title>
        {!! HTML::style('css/reset.css') !!}
        {!! HTML::style('css/admin_main.css') !!}
        {!! HTML::style('css/jquery.mCustomScrollbar.min.css') !!}
        {!! HTML::script('js/jquery-2.0.0.min.js') !!}
        {!! HTML::script('js/admin.js') !!}
        {!! HTML::script('js/jquery.mCustomScrollbar.min.js') !!}
        @yield('css_js')
        
    </head>
    <body>
        @if(Session::has('note.ok'))
            <div class="alert alert-success"><em> {!! session('note.ok') !!}</em></div>
        @elseif(Session::has('note.error'))
            <div class="alert alert-error"><em> {!! session('note.ok') !!}</em></div>
        @endif
        
        <div class="header">
            <ul>
                <li><a class="{{ (Request::is('admin') ? 'active' : '') }}" href="{{ url('admin') }}">Home</a></li>
                <li><a class="{{ (Request::is('admin/addCategory') ? 'active' : '') }}" href="{{ url('admin/addCategory') }}">Add Category</a></li>
                <li><a class="{{ (Request::is('admin/addPicture') ? 'active' : '') }}" href="{{ url('admin/addPicture') }}">Add Picture</a></li>
                <li><a class="{{ (Request::is('admin/lastUpdates') ? 'active' : '') }}" href="{{ url('admin/lastUpdates') }}">Last Updates</a></li>
                <li class="go-to-home"><a href="{{ url('/admin/goHome') }}">Go To Website</a></li>
            </ul>
        </div>

        <div class="container">
            <div class="main">
                <h1 class="title">@yield('main_title')</h1>
                <p class="info">@yield('main_info')</p>
                @yield('main')
            </div>
        </div>
        @yield('end_script')
    </body>
</html>