<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" href={{ asset('storage/' . profileWeb()?->logo) }} type="image/x-icon">
    <link rel="shortcut icon" href={{ asset('storage/' . profileWeb()?->logo) }} type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    @stack('style')
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
