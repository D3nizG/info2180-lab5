<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
<tr>
  <th> Name </th>
  <th> Continent </th>
  <th> Independance </th>
  <th> Head of State </th>
</tr>

<?php foreach ($results as $row): ?>

<tr>
  <td> <?php echo $row['name'] ?> </td>
  <td> <?php echo $row['continent'] ?> </td>
  <td> <?php echo $row['independence_year'] ?> </td>
  <td> <?php echo $row['head_of_state'] ?> </td>
</tr>
</table>

<!-- <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li> -->

<?php endforeach; ?>
