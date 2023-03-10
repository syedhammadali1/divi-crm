
{{--{!! $content !!}--}}

<html>
<head>
    <meta charset="UTF-8" />
    <style>{!! $content['css'] ?? '' !!}</style>
</head>
<body>
{!! $content['content'] ?? '' !!}
</body>
</html>
