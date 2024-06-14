<?php include 'config/db.php'; ?>
<?php include 'helpers/sql-query-builder.php'; ?>

<?php
  header("Access-Control-Allow-Origin: http://localhost:3000");
  header("Content-Type: application/json; charset=utf-8");
?>

<?php
  $sql = buildSqlQuery();

  $response = mysqli_query($connection, $sql);
  $data = mysqli_fetch_all($response, MYSQLI_ASSOC);

  echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
