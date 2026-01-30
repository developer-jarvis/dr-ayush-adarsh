<?php
// admin/about-manage.php - Manage About Doctor & Father sections
require '../admin/db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Handle add, update, delete for about_sections
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $type = $_POST['section_type'];
        $name = $_POST['name'];
        $content = $_POST['content'];
        $img = '';
        if (!empty($_FILES['image']['name'])) {
            $img = 'uploads/about/' . time() . '_' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], '../' . $img);
        }
        $stmt = $pdo->prepare('INSERT INTO about_sections (section_type, name, image, content) VALUES (?, ?, ?, ?)');
        $stmt->execute([$type, $name, $img, $content]);
    }
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $stmt = $pdo->prepare('DELETE FROM about_sections WHERE id = ?');
        $stmt->execute([$id]);
    }
}
$about = $pdo->query('SELECT * FROM about_sections ORDER BY ordering, id')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage About Sections</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>About Sections Management</h2>
    <form method="post" enctype="multipart/form-data">
        <select name="section_type" required>
            <option value="doctor">Doctor (Ayush Adarsh)</option>
            <option value="father">Father</option>
        </select>
        <input type="text" name="name" placeholder="Name" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <input type="file" name="image">
        <button type="submit" name="add">Add Section</button>
    </form>
    <hr>
    <h3>About Sections List</h3>
    <table border="1" cellpadding="8">
        <tr><th>Type</th><th>Name</th><th>Image</th><th>Content</th><th>Action</th></tr>
        <?php foreach($about as $a): ?>
        <tr>
            <td><?= htmlspecialchars($a['section_type']) ?></td>
            <td><?= htmlspecialchars($a['name']) ?></td>
            <td><?php if($a['image']): ?><img src="../<?= htmlspecialchars($a['image']) ?>" width="80"><?php endif; ?></td>
            <td><?= nl2br(htmlspecialchars($a['content'])) ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <button type="submit" name="delete" value="<?= $a['id'] ?>" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
