<?php

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:shanesproj.database.windows.net,1433; Database = Drinqr", "x15048209", "Jwfn3262");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "x15048209@shanesproj", "pwd" => "Jwfn3262", "Database" => "Drinqr", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:shanesproj.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>