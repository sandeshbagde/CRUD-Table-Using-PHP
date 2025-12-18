<?php
include "../config/db.php";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);

    if ($name && $price && $category) {
        $stmt = $conn->prepare(
            "INSERT INTO products (name, price, category) VALUES (?, ?, ?)"
        );
        $stmt->execute([$name, $price, $category]);
        header("Location: index.php");
    }
}

include "../includes/header.php";
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow p-4">

            <h4 class="text-center page-title mb-4">
                <i class="bi bi-plus-circle"></i> Add New Product
            </h4>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter price" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" placeholder="Enter category" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>

                    <button name="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Save Product
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
