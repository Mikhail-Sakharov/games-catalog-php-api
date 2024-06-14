<?php
  define('DB_HOST', 'localhost:3306');
  define('DB_USER', 'Admin');
  define('DB_PASSWORD', 'P@ssword123456');
  define('DB_NAME', 'games');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($connection->connect_error) {
  die('Connection failed: ' . $connection->connect_error);
}
