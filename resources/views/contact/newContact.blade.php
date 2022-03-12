<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Contact</title>

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
            <h3>New Contact</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            
            <a href="/">Contacts List</a>
            <br/><br/>
            <form action="{{route('contact.register')}}" method="POST">
                @csrf
                <label>Nome:</label>
                <input type="text" name="name" value="{{ old('name') }}"><br/><br/>
                 <label>Contact:</label>
                <input type="text" name="contact" maxlength="9" value="{{ old('contact') }}"><br/><br/>
                <label>E-mail:</label>
                <input type="email" name="email" value="{{ old('email') }}"><br/><br/>
                <button type="submit">Register</button>
            </form>
            
    </body>
</html>