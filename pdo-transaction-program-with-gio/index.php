<?php
//transaction example
//https://www.youtube.com/watch?v=e6yLUvpcOZo

try{
  $db->beginTransaction();
  $newUserStmt = $db->prepare(
    'INSERT INTO users (email, full_name, is_active, created_at)
    VALUES (?, ?, 1, NOW())'
    );
  $newInvoiceStmt = $db->prepare(
    'INSERT INTO invoices (amount, user_id)
    VALUES (?, ?)'
    );
  $newUserStmt->execute([$email, $name]);
  $userId = (int)$db->lastInsertId();
  $newInvoiceStmt->execute([$amount, $userId]);
  $db->commit();
} catch(\Throwable $e) {
  $db->rollBack();
}
