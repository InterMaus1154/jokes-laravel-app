{{--layout for 4xx status responses--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="icons/warning.png" type="image/x-icon">
    <title>{{$title}}</title>
    @basecss
    <link rel="stylesheet" href="css/response.css"/>
</head>
<body>
<main class="full-width full-height">
    {{$slot}}
</main>
</body>
</html>
