<?php
define('SERVER', 'localhost');
define('DB_NAME', 'ajax');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');


function executeQuery($query)
{
    $connection = mysqli_connect(SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die ("DB access error" . mysqli_error($connection));

    // ejecuta el query
    $result = mysqli_query($connection, $query);

    $names = "";
    while ($row =$result->fetch_assoc()) {
        $names = $names . $row['nombre'] . ",";
    }
    return $names;
}



$query = executeQuery("SELECT nombre FROM alumno WHERE nombre LIKE '" . $_GET['query'] . "%'");
echo $query;
