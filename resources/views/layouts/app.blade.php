<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lifey</title>
    @vite('resources/css/app.css')
    <style>
    body {
        font-family: Arial, sans-serif;

        background-image: url('{{ asset("images/vaccine.jpeg") }}'); /* Replace with the actual path to your image */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin: -10px; /* Negative margin to counteract spacing between columns */
    }

    .col {
      flex: 0 0 calc(33.33% - 20px); /* Adjust the width based on your desired column layout */
      margin: 10px; /* Spacing between columns */
      box-sizing: border-box;
      border: 1px solid #ccc;
      padding: 20px;
      transition: transform 0.2s, box-shadow 0.2s;
      border-radius: 4px;
    }

    .col:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .col h2 {
        font-weight: 800;
    }
  </style>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            
            <a href="{{ route('home') }}">
                <img src="{{ asset('images\LIFEY_logo.png') }}" alt="LOGO" style="height: 40px; width: 40px;" />
            </a>

            @auth
            <li>
                <a href ="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            @endauth

            <li>
                <a href ="{{ route('posts') }}" class="p-3">Query</a>
            </li>        
        </ul>

        <ul class="flex items-center">
            @auth
            <li>
            <a href ="" class="p-3">{{ auth()->user()->username }}</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method ="post" class="p-3 inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            
            @endauth

            @guest
            <li>
                <a href ="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href ="{{ route('register') }}" class="p-3">Register</a>
            </li>

            @endguest
        </ul>

    </nav>
    @yield('content')
</body>
</html>