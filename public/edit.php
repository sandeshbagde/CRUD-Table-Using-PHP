<?php
include "../config/db.php";

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (isset($_POST['update'])) {
    $stmt = $conn->prepare(
        "UPDATE products SET name=?, price=?, category=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['name'], $_POST['price'], $_POST['category'], $id
    ]);
    header("Location: index.php");
}

include "../includes/header.php";
?>

<form method="POST">
    <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control mb-2">
    <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control mb-2">
    <input type="text" name="category" value="<?= $product['category'] ?>" class="form-control mb-2">
    <button name="update" class="btn btn-primary">Update</button>
</form>

<?php include "../includes/footer.php"; ?>
