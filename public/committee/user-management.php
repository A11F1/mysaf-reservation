<?php require_once ('../layouts/header.php'); committeeSession(); ?>

<?php 

  try 
  {
    $stmt = $conn->prepare("
    SELECT
      personal_detail.id,
      personal_detail.name,
      personal_detail.tel_no,
      user.id_role AS ROLE,
      lookup_role.description AS role_desc
    FROM personal_detail
      LEFT JOIN user
        ON personal_detail.id_user = user.id
      LEFT JOIN lookup_role
        ON user.id_role = lookup_role.id
      WHERE
        personal_detail.deleted_at='0'
    ");

    $stmt->execute();

    // Set the Resulting Array to Associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $row = $stmt->fetchAll();

    
  }
 catch (PDOException $e)
  {
    dd("Error: " . $e->getMessage());
  }
?>

<div>
    <br>
    <h1>List of Users</h1>
    <a href="<?= constant("BASEURL") . 'public/committee/register-user.php' ?>"><button class="button register-user">Register User</button></a>
</div>

<table id="user">
<br>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Roles</th>
    <th>Action</th>
  
  </tr>

  <!-- PHP CODE TO FETCH DATA FROM ROWS-->
  <?php   // LOOP TILL END OF DATA 
   foreach ($row as $data) 
   { 
  ?>

  <tr>
  <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
    <td><?php echo $data['id'];?></td>
    <td><?php echo $data['name'];?></td>
    <td><?php echo $data['tel_no'];?></td>
    <td><?php echo $data['role_desc'];?></td>
    <td align="center"><a href="update-user.php?id=<?php echo $data["id"];?>">Edit</a> || <a href="golfer-delete-record.php?id=<?php echo $row["id"];?>">Delete</a></td>
  </tr>
  <?php
    }
  ?>
</table>

<?php require_once ('../layouts/footer.php'); ?>