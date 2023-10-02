<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    
    <h2>Index</h2>
    <form action="index.php" method="GET">
    <input type="text" name="search" placeholder="Search by Email or Username">
    <button type="submit">Search</button>
</form>

    <table border = 1>
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Email</td>
        <td>Gender</td>
        <td>Action</td>
      </tr>


      <?php 
if (isset($_GET['search'])) {
  
  $searchTerm = trim($_GET['search']);
  
  $sql = "SELECT * FROM users WHERE email LIKE ? OR username LIKE ?";
  $db = new PDO('mysql:host=localhost;dbname=data','root','');
  $stmt = $db->prepare($sql);
  $stmt->bindValue(1, "%$searchTerm%", PDO::PARAM_STR);
  $stmt->bindValue(2, "%$searchTerm%", PDO::PARAM_STR);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $i = 1;
  if (empty($results)) {
      echo "No matching records found.";
  } else {
    foreach($results as $row) : ?>
      <tr id = <?php echo $row["id"]; ?>>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["gender"]; ?></td>
        <td>
          <a href="edituser.php?id=<?php echo $row['id']; ?>">Edit</a>
          <button type="button" onclick = "submitData(<?php echo $row['id']; ?>);">Delete</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  <?php }
} else {
  // Display all records if no search query is provided
  $sql = "SELECT * FROM users";
  // Execute the query and display all records
}

?>

    <br>
    <a href="adduser.php">Add User</a>
    <?php require 'script.php'; ?>
  </body>
</html>
