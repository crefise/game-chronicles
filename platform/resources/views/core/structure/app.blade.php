<html>
<head>
    <title>
        @yield('title')
    </title>

    @yield('style')
    <style>
        .footer {
            height: 100px;
            background: white;
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .footer__nav {
            margin-bottom: 20px;
        }

        .footer__nav a {
            color: black;
            text-decoration: none;
            margin-right: 20px;
        }

        .footer__nav a:hover {
            color: black;
        }

        .footer__social {
            margin-bottom: 20px;
        }

        .footer__social a {
            color: #fff;
            font-size: 20px;
            margin-right: 10px;
        }

        .footer__social a:hover {
            color: #cccccc;
        }

        .footer__copy {
            font-size: 14px;
            margin-top: 20px;
        }

    </style>

    <script src="/js/header.js" defer></script>
    @yield('script')

    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header class="header">
    <header-component authorized="{{ !!auth()->user()}}"></header-component>
</header>
<main>
    @yield('main')
</main>
<footer class="footer">
    <nav class="footer__nav">
        <a href="#">Next gen</a>
        <a href="#">Next gen</a>
        <a href="#">Next gen</a>
    </nav>
    <p class="footer__copy">&copy; 2021 - Game Chronicles</p>
</footer>

</body>
</html>
