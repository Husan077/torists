<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title')</title>

{{--<link rel="icon" type="image/png" href="{{ asset('images/logo/16.png') }}" sizes="16x16">--}}
{{--<link rel="icon" type="image/png" href="{{ asset('images/logo/32.png') }}" sizes="32x32">--}}
{{--<link rel="icon" type="image/png" href="{{ asset('images/logo/96.png') }}" sizes="96x96">--}}
{{--<link rel="apple-touch-icon" href="{{ asset('images/logo/76.png') }}" sizes="76x76">--}}
{{--<link rel="apple-touch-icon" href="{{ asset('images/logo/120.png') }}" sizes="120x120">--}}
{{--<link rel="apple-touch-icon" href="{{ asset('images/logo/152.png') }}" sizes="152x152">--}}
{{--<link rel="apple-touch-icon" href="{{ asset('images/logo/180.png') }}" sizes="180x180">--}}

<link rel="apple-touch-icon" href="{{ asset('images/admin/logo/logo.png') }}">
<link rel="icon" type="image/png" href="{{ asset('images/admin/logo/logo.png') }}">

<link rel="stylesheet" href="{{ asset('./css/admin/lite-purple.min.css') }}" data-n-g="" />
<link rel="stylesheet" href="{{ asset('./css/admin/perfect-scrollbar.min.css') }}" data-n-g="" />
<link rel="stylesheet" href="{{ asset('./css/admin/bootstrap-tagsinput-typeahead.css') }}" data-n-g="" />
<link rel="stylesheet" href="{{ asset('./css/admin/bootstrap-tagsinput.css') }}" data-n-g="" />

<meta name="csrf-token" content="{{ csrf_token() }}">
