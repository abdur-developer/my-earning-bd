<?php
// MySQL database information
$host = 'localhost';
$username = 'myebdonl_bd';
$password = 'sx!dcY6+2DSW';
$database = 'myebdonl_bd';

// Connect to MySQL server
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Name of the backup file
$backup_file = 'backup_' . date('Y-m-d_H-i-s') . '.sql';

// Fetch all tables from the database
$tables = array();
$result = mysqli_query($connection, "SHOW TABLES");
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

// Create/open the backup file
$handle = fopen($backup_file, 'w');
if (!$handle) {
    die("Unable to open file: $backup_file");
}

// Iterate through each table and dump its contents into the backup file
foreach ($tables as $table) {
    $result = mysqli_query($connection, "SELECT * FROM $table");
    fwrite($handle, "DROP TABLE IF EXISTS $table;\n");
    $row2 = mysqli_fetch_row(mysqli_query($connection, "SHOW CREATE TABLE $table"));
    fwrite($handle, $row2[1] . ";\n");
    while ($row = mysqli_fetch_row($result)) {
        fwrite($handle, "INSERT INTO $table VALUES(");
        for ($i = 0; $i < mysqli_num_fields($result); $i++) {
            if (!isset($row[$i])) {
                fwrite($handle, 'NULL');
            } elseif ($row[$i] != '') {
                fwrite($handle, "'" . addslashes($row[$i]) . "'");
            } else {
                fwrite($handle, "''");
            }
            if ($i < mysqli_num_fields($result) - 1) {
                fwrite($handle, ',');
            }
        }
        fwrite($handle, ");\n");
    }
    fwrite($handle, "\n");
}

// Close the backup file
fclose($handle);

// Close MySQL connection
mysqli_close($connection);

// Set headers for file download
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$backup_file\"");
header("Content-Length: " . filesize($backup_file));

// Output the file to the browser
readfile($backup_file);

// Delete the backup file after download
unlink($backup_file);

exit;
?>
