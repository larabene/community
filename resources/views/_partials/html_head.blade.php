<meta name="description" content="{{ $page_description or 'LaraBeNe - Nederlands/Belgische Laravel community' }}">
<meta name="author" content="LaraBeNe">

<title>{{ config('app.name') }}</title>

<!-- Open Graph data -->
<meta property="og:locale" content="{{ app()->getLocale() }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ config('app.name') }}">
<meta property="og:description" content="{{ $page_description or 'LaraBeNe - Nederlands/Belgische Laravel community' }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:image" content="{{ asset('images/Logo.png') }}">
<meta property="og:image:secure_url" content="{{ asset('images/Logo.png') }}">

<!-- Twitter Card data -->
<meta name="twitter:title" content="{{ config('app.name') }}">
<meta name="twitter:description" content="{{ $page_description or 'LaraBeNe - Nederlands/Belgische Laravel community' }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@LaraBeNe">
<meta name="twitter:image" content="{{ asset('images/Logo.png') }}">
<meta name="twitter:creator" content="@LaraBeNe">