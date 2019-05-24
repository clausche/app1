<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- {!! Html::style('css/bootstrap.min.css') !!} --}}
        {!! Html::style('css/bootstrap-select.css') !!}
        {!! Html::style('css/select2.min.css') !!}



    </head>
    <body>
@include('partials.navigation')
<div class="container">

        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header text-center">APP1</h1>
            </div>
        @if(session()->has('flash'))
            <div class="container">
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('flash') }}</strong>
                </div>
            </div>
        @endif
            @include('partials.errors')
            @include('partials.info')
            @yield('content')

        </div>
</div>




    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/app.js') !!}
    {!! Html::script('js/bootstrap-select.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    @include('flashy::message')
@yield('footer')
<script>
    var has_errors = {{$errors->count() > 0 ? 'true':'false'}};
    var has_messages = {{Session::has('message') ? 'true':'false'}};

    if(has_errors){
        swal({
          title: 'Errors',
          type: 'error',
          html:jQuery("#ERROR_COPY").html(),
          showCloseButton: true
        })

    }
    if(has_messages){
        swal({
          title: '{{Session::get('message')}}',
          type: 'info',
          //html:jQuery("#MESSAGE").html(),
          showCloseButton: true
        })

    }




</script>
    </body>
</html>
