
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista de Contactos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    table {
   width: 60%;
    }
    table, th, td {
      border: 1px solid;
      border-collapse: collapse;
    }
</style>

    </head>
    <body class="antialiased">
            <!--{{$contacts}}-->
            <h3>Contacts List</h3>
            
            <a href="{{route('contact.new')}}">New Contact</a><br/><br/>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                       <!-- <th>Contact</th>
                         <th>E-mail</th>-->
                         <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td style="text-align:center">{{$contact->id}}</td>
                             <td>{{$contact->name}}</td>
                            <!-- <td>{{$contact->contact}}</td>
                             <td>{{$contact->email}}</td>-->
                             <td style="text-align:center">
                                  <a href="{{route('contact.edit', $contact->id)}}">Edit</a>
                                   <a href="{{route('contact.show.delete', $contact->id)}}" style="margin-left:20px">Delete</a>
                              <a href="{{route('contact.show', $contact->id)}}" style="margin-left:20px">More details</a>
                             </td>
                             
                        </tr>
                      @endforeach
                </tbody>
            </table>
    </body>
</html>
