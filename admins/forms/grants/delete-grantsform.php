<?php
require_once('../../db.php');


$statement = $conn->prepare("DELETE FROM grantsform WHERE id = " . $_GET["id"] . "");
$statement->execute();

echo "<script>alert('Successfully removed!!!'); window.location='index.php'</script>";
