<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel-test</title>
</head>

<body style="display:flex;flex-direction:column;justify-content:space-between;">
  <header style="width:100%;height:100px;background:grey;color:white;text-align:center;">
    <nav>
      <ul style="display:flex; list-style-type: none;gap:20px;">
        <li><a href="{{route('home.index')}}">Home</a></li>
        <li><a href="{{route('about.index')}}">About</a></li>
        <li><a href="{{route('contact.index')}}">Contacts</a></li>
        <li><a href="{{route('post.index')}}">Posts</a></li>
      </ul>
    </nav>
  </header>
  <br>
  @yield('content')
</body>

</html>