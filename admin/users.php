<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'common/config.php';

// Delete user/business
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $stmt = $conn->prepare("DELETE FROM business_list WHERE id = ?");
  $stmt->bind_param('i', $id);
  if ($stmt->execute()) {
    echo "<script>alert('Record Deleted'); window.location='users.php';</script>";
  } else {
    echo "<script>alert('Error deleting record'); window.location='users.php';</script>";
  }
  exit;
}

$sql = "SELECT * FROM business_list ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">
<?php include 'common/head.php'; ?>
<?php include 'common/session.php'; ?>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include 'common/sidebar.php'; ?>
      <div class="layout-page">
        <?php include 'common/header.php'; ?>

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-12 mb-4">
                <div class="card shadow">
                  <div class="card-body">
                    <h5 class="card-title">Users / Businesses</h5>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Business Name</th>
                            <th>Owner</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if ($result && $result->num_rows > 0) {
                            $i = 1;
                            while ($row = $result->fetch_assoc()) {
                              $id = intval($row['id']);
                              $business_name = htmlspecialchars($row['business_name']);
                              $owner_name = htmlspecialchars($row['owner_name'] ?? '');
                              $phone = htmlspecialchars($row['phone'] ?? '');
                              $email = htmlspecialchars($row['email'] ?? '');
                              $state = htmlspecialchars($row['state'] ?? '');
                              $city = htmlspecialchars($row['city'] ?? '');
                              $status = htmlspecialchars($row['status'] ?? '');

                              echo "<tr>
                                        <td>{$i}</td>
                                        <td class='text-nowrap'>{$business_name}</td>
                                        <td class='text-nowrap'>{$owner_name}</td>
                                        <td>{$phone}</td>
                                        <td>{$email}</td>
                                        <td class='text-nowrap'>{$state}</td>
                                        <td>{$city}</td>
                                        <td>{$status}</td>
                                        <td class='text-nowrap'>
                                          <a href='view-business.php?id={$id}' class='btn btn-sm btn-info'>View</a>
                                          <a href='users.php?delete={$id}' class='btn btn-sm btn-danger' onclick=\"return confirm('Delete this record?')\">Delete</a>
                                        </td>
                                     </tr>";
                              $i++;
                            }
                          } else {
                            echo "<tr><td colspan='9' class='text-center'>No records found</td></tr>";
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <?php include 'common/footer.php'; ?>
</body>

</html>
