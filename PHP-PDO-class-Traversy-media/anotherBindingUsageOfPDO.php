<?php

$stmt = $conn->prepare("INSERT INTO tbl VALUES(:id, :name)");
$stmt->bindValue(':id', $id);
$stmt->bindValue(':name', $name);
$stmt->execute();
