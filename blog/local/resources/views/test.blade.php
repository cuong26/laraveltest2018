


         </tr>

         @foreach ($users as $user)

         <tr>

            <td>{{ $user->id }}</td>

            <td>{{ $user->name }}</td>

          
         </tr>
        

         @endforeach
      