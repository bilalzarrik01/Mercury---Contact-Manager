<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Mercury</title>
    @php
        $manifestPath = public_path('build/manifest.json');
        $cssFile = null;
        if (file_exists($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);
            $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
        }
    @endphp
    @if ($cssFile)
        <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
    @else
        @vite('resources/css/app.css')
    @endif
</head>
<body class="page-glass">
    <main class="wrap">
        <img class="logo" src="/images/image.png" alt="Mercury logo">
        <h1>Welcome to Mercury</h1>
        <p>Mercury</p>
    </main>
    <script>
        var delay = 3000;
        var fadeDuration = 500;
        setTimeout(function () {
            document.body.classList.add("fade-out");
        }, delay - fadeDuration);
        setTimeout(function () {
            window.location.href = "/dashboard";
        }, delay);
    </script>
</body>
</html>
