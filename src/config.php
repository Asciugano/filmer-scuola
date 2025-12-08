<?php
function getConnection()
{
  $host = "db";
  $user = "app_user";
  $pass = "app_pass";
  $db = "app_db";

  $conn = new mysqli($host, $user, $pass, $db);

  if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
  }

  return $conn;
}

// echo "✅ Connessione a MySQL riuscita!";
