<?php
include "../config/db.php";
include "../includes/header.php";

$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<a href="create.php" class="btn btn-primary mb-3">Add Product</a>
<a href="export_csv.php" class="btn btn-success mb-3 ">
    Export CSV
</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['category'] ?></td>
        <td>
            <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $product['id'] ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


<?php include "../includes/footer.php"; ?>

<?php
$chartStmt = $conn->query(
    "SELECT category, COUNT(*) as total FROM products GROUP BY category"
);
$data = $chartStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Medium size chart container -->
<div style="max-width: 1000px; margin: 40px auto; height: 400px;">
    <canvas id="myChart"></canvas>
</div>

<script>
const data = {
    labels: <?= json_encode(array_column($data, 'category')) ?>,
    datasets: [{
        label: 'Products per Category',
        data: <?= json_encode(array_column($data, 'total')) ?>,
        backgroundColor: 'rgba(56, 134, 224, 0.8)', // Black bars
        borderRadius: 6,
        barThickness: 40
    }]
};

new Chart(document.getElementById('myChart'), {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

