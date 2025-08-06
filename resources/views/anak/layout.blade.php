<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | Alkitab</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 text-gray-900">
  <div class="min-h-screen py-8">
    @yield('content')
  </div>
</body>
</html>
