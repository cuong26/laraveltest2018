<html>

      <head>

      <title>Student Management | Edit</title>

   </head>

      <body>

      <form action = "{{asset('edic/'.$users[0]->id)}}" method = "post">
         <input type = "hidden" name = "_token" value = "{{csrf_token()}}">               <table>

            <tr>

               <td>Name</td>

               <td>

                  <input type = 'text' name = 'stud_name' value = '<?php echo $users[0]->name; ?>'/> </td>

            <tr>

               <td>Email</td>

               <td>

                  <input type = 'text' name = 'stud_email' value = '<?php echo $users[0]->email; ?>'/> </td>  
                  

            </tr>

            <tr>

               <td colspan = '2'>

                  <input type = 'submit' value = "Update student" />

               </td>

            </tr>

         </table>

       </form>

      </body>

</html>