{{--layout for all pages--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    @basecss
    <link rel="stylesheet" href="{{url('css/general.css')}}">
    <link rel="stylesheet" href="{{url('css/header.css')}}"/>
    <link rel="stylesheet" href="{{url('css/footer.css')}} "/>
    <link rel="stylesheet" href="{{url('css/profile.css')}}" />
    <link rel="stylesheet" href="{{url('css/public.css')}}" />
    @vite('resources/css/app.css')
</head>
<body>
@include('components.general.header')
@admin
    @include('admin.header')
@endadmin
<main>
    {{$slot}}
</main>
@include('components.general.footer')
</body>
</html>
