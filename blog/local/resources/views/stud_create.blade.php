<html>

    <head>

      <title>Student Management | Add</title>

   </head>

      <body>

      <form action = "{{route('create')}}" method = "post">

         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">             
           <table>

            <tr>

               <td>Name</td>

               <td><input type='text' name='stud_name' /></td>

            </tr>
            <tr>
              <td>Password</td>
              <td><input type="password" name="password"></td>
            </tr>
             <tr>
              <td>Email</td>
              <td><input type="text" name="email"></td>
            </tr>

            <tr>

               <td colspan = '2'>

                  <input type = 'submit' value = "Add Record"/>

               </td>

            </tr>

         </table>

      </form>

      </body>

</html>