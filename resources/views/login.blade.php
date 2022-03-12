<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Authentication Page</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    table {
   width: 100%;
    }
    table, th, td {
      border: 1px solid;
      border-collapse: collapse;
    }
</style>

    </head>
    <body class="antialiased">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <br/>
            <form action="{{route('authenticate')}}" method="POST">
                @csrf
                <label>Login:</label>
                <input type="text" name="login" value="{{ old('login') }}"><br/><br/>
                <label>Password:</label>
                 <input type="password" name="password" ><br/><br/>
                <button type="submit">Authenticate</button>  <a href="/" style="margin-left:20px">Contacts List</a><br/><br/>
            </form>
            
    </body>
</html>