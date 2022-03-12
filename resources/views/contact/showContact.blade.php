<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Show Contact</title>

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
            <h3>Show Contact</h3>
            
            
            <a href="/">Contacts List</a><br/><br/>
            
                <label>Nome:</label> <b>{{$contact->name}}</b><br/><br/>
                
                 <label>Contact:</label> <b>{{$contact->contact}}</b><br/><br/>
               
                <label>E-mail:</label> <b>{{$contact->email}}</b> <br/><br/>
            <a href="{{route('contact.edit', $contact->id)}}">Edit</a>   
            <a href="{{route('contact.show.delete', $contact->id)}}" style="margin-left:20px">Delete</a> 
    </body>
</html>