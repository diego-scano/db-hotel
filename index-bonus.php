<?php

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "db_hotel";

  // Connect
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
  } else {
    echo "Connection done!<br><br>";
  };

  $sql = "SELECT room_number, floor FROM stanze";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Stanza N. " . $row['room_number'] . " - Piano: " . $row['floor'] . '<br>';
    }
  } elseif ($result) {
    echo "0 results";
  } else {
    echo "query error";
  }
  $conn->close();
