<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    {!! clean($mail_template) !!}
    <a href="{{ route('newsletter-verification',$newsletter_info->verify_token) }}">{{ route('newsletter-verification',$newsletter_info->verify_token) }}</a>
</body>
</html>
