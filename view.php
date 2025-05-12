<?php
$conn = new mysqli('localhost', 'root', '', 'annotations_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM annotations ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Annotations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
  <div class="container">
    <h1 class="mb-4">All Saved Annotations</h1>
    <a href="index.html" class="btn btn-primary mb-3">← Back to Annotation Tool</a>
    <table class="table table-bordered bg-white shadow-sm">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Selected Text</th>
          <th>Annotation</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['user_input']) ?></td>
            <td><?= htmlspecialchars($row['annotation']) ?></td>
            <td><?= $row['created_at'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>

<?php $conn->close(); ?>
