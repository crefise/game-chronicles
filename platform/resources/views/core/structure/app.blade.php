<html>
<head>
    <title>
        @yield('title')
    </title>

    @yield('style')

    <script src="/js/header.js" defer></script>
    @yield('script')

</head>
<body>
<header class="header">
    <header-component authorized="{{ !!auth()->user()}}"></header-component>
</header>
<main>
    @yield('main')
</main>
<footer>
    @yield('footer')
</footer>
</body>
</html>
