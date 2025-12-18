<?php
include "../config/db.php";

// Set headers to force download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=products.csv');

// Create file pointer
$output = fopen('php://output', 'w');

// Add CSV column headers
fputcsv($output, ['ID', 'Name', 'Price', 'Category', 'Created At']);

// Fetch data from database
$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Write data rows
foreach ($products as $product) {
    $formattedDate = date(
    'Y-m-d H:i:s',
    strtotime($product['created_at'])
);

fputcsv($output, [
    $product['id'],
    $product['name'],
    $product['price'],
    $product['category'],
    $formattedDate
]);

}

fclose($output);
exit;
