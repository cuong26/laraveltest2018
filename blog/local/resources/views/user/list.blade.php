<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
</head>
<body>
<div class="col-xs-8 col-xs-offset-2" style="margin-top:50px;">
    <table class="table table-hover">
     <tr>
         <td>Id</td>
         <td>UserName</td>
         <td>Sex</td>
         <td>Action</td>
     </tr>
     <?php foreach($allUsers as $user):  ?>
        <tr>
            <td> <?php echo $user['id']; ?> </td>
            <td> <?php echo $user['username']; ?></td>
            <td> <?php if($user['sex'] == 0 ){ echo "Male"; }else {echo "Female";}  ?> </td>
            <td>
                <a href='user/<?php echo $user['id'];?>/edit'> Edit</a>
                <a href='user/<?php echo $user['id'];?>/delete'> Delete</a>
            </td>
        </tr>
      <?php endforeach; ?>
    </table>
</div>
</body>
</html>