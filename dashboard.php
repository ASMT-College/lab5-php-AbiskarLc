<?php
include("./common/header.php");
include("./process/connection.php");
if (!isset($_SESSION['logged_in'])) {

  header("Location: ./login.php?error_message=Login First");
}


$connect = getConnection();
$c = 1;
$query = "SELECT * FROM user ";

$result = mysqli_query($connect, $query);

?>
<div class="dashboard-page">
  <h1>Welcome to Admin DashBoard</h1>

  <table >
    <thead>
        <th width="10%">S.no</th>
        <th>Username</th>
        <th>Email</th>
        <th>Contact No</th>
        <th></th>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
         <td><?php echo($row['id'])  ?></td>
         <td><?php echo($row['username']) ?></td>
         <td><?php echo($row['email']) ?></td>
         <td><?php echo($row['contact']) ?></td>
         <td class="admin-operation">
            <p>Edit</p>
            <p>delete</p>
         </td>
         </tr>
              
               



        <?php } ?>
        </tbody>
  </table>

  <a href="./process/logout_process.php">Log Out</a>
</div>