<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = filter_input(INPUT_GET,"country", FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET,"context", FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);



$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt2 = $conn->query("SELECT cities.name, cities.district, cities.population 
                            FROM cities join countries on cities.country_code=countries.code 
                            WHERE countries.name= '$country'");
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>



<?php if(!isset($context)):?>

  <table class=table>
  <tr>
    <th class=th> Name </th>
    <th class=th> Continent </th>
    <th class=th> Independance </th>
    <th class=th> Head of State </th>
  </tr>

  <?php foreach ($results as $row): ?>

  <tr>
    <td class=td> <?php echo $row['name'] ?> </td>
    <td class=td> <?php echo $row['continent'] ?> </td>
    <td class=td> <?php echo $row['independence_year'] ?> </td>
    <td class=td> <?php echo $row['head_of_state'] ?> </td>
  </tr>
  <?php endforeach; ?>
  </table>
<?php endif;?>


<?php if(isset($context)):?>

  <table class=table>
    <tr>
      <th class=th> Name </th>
      <th class=th> District </th>
      <th class=th> Population </th>
    </tr>
    <?php foreach ($results2 as $city): ?>
      <tr>
        <td class=td><?php echo $city['name']; ?></td>
        <td class=td><?php echo $city['district']; ?></td>
        <td class=td><?php echo $city['population']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif;?>

