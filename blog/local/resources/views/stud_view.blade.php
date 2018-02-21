<html>

      <head>

      <title>View Student Records</title>

   </head>

      <body>

      <table border="3px" width="100px" height ="400px">

         <tr>

            <td><h2>ID</h2></td>

           <td><h2>Name</h2></td>

         </tr>

         @foreach ($users as $user)

         <tr>

            <td><h2>{{ $user->id }}</h2></td>

            <td><h2>{{ $user->name }}</h2></td>

         </tr>

         @endforeach

      </table>

      </body>

</html>