<?php
// admin/gallery-manage.php - Gallery CRUD for admin
require '../admin/db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Handle add, update, delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $cat = $_POST['category'];
        $img = '';
        if (!empty($_FILES['image']['name'])) {
            $img = 'uploads/gallery/' . time() . '_' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], '../' . $img);
        }
        $stmt = $pdo->prepare('INSERT INTO gallery (image, title, description, category) VALUES (?, ?, ?, ?)');
        $stmt->execute([$img, $title, $desc, $cat]);
    }
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $stmt = $pdo->prepare('DELETE FROM gallery WHERE id = ?');
        $stmt->execute([$id]);
    }
}
$gallery = $pdo->query('SELECT * FROM gallery ORDER BY id DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Gallery</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Gallery Management</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="category" placeholder="Category">
        <textarea name="description" placeholder="Description"></textarea>
        <input type="file" name="image" required>
        <button type="submit" name="add">Add Image</button>
    </form>
    <hr>
    <h3>Gallery List</h3>
    <table border="1" cellpadding="8">
        <tr><th>Image</th><th>Title</th><th>Category</th><th>Description</th><th>Action</th></tr>
        <?php foreach($gallery as $g): ?>
        <tr>
            <td><img src="../<?= htmlspecialchars($g['image']) ?>" width="80"></td>
            <td><?= htmlspecialchars($g['title']) ?></td>
            <td><?= htmlspecialchars($g['category']) ?></td>
            <td><?= htmlspecialchars($g['description']) ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <button type="submit" name="delete" value="<?= $g['id'] ?>" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
