<?php
$mysqli = new mysqli('localhost', 'hachiekouser', '', 'db_99');

if ($mysqli->connect_errno) {
    echo 'Failed to connect to Mysql:' . $mysqli->connect_error;
    die;
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $mysqli->prepare("SELECT * FROM student1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}


if (isset($_POST['submit'])) {

    $id      = $_GET['id'];
    $name    = $_POST['name'];
    $college = $_POST['college'];
    $branch  = $_POST['branch'];
    $fee     = $_POST['fee'];
    $gender  = $_POST['gender'];

    $stmt = $mysqli->prepare("UPDATE student1 SET name = ?, college = ?, branch = ?, fee = ?, gender = ? WHERE id = ?");

    $stmt->bind_param("sssssi", $name, $college, $branch, $fee, $gender, $id);

    if ($stmt->execute()) {
        header("Location: table1.php");
        exit();
    } else {
        echo "Update Failed: " . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Edit Student Data</h4>
                    </div>

                    <div class="card-body">
                        <form method="post">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="<?php echo $row['Name']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">College</label>
                                <input type="text" name="college" class="form-control"
                                    value="<?php echo $row['College']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Branch</label>
                                <select name="branch" class="form-control" required>
                                    <option value="">-- Select Branch --</option>
                                    <option value="IT" <?php if ($row['Branch'] == "IT") echo "selected"; ?>>IT</option>
                                    <option value="CS" <?php if ($row['Branch'] == "CS") echo "selected"; ?>>CS</option>
                                    <option value="Networking" <?php if ($row['Branch'] == "Networking") echo "selected"; ?>>Networking</option>
                                    <option value="Civil" <?php if ($row['Branch'] == "Civil") echo "selected"; ?>>Civil</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Fee</label>
                                <input type="number" name="fee" class="form-control"
                                    value="<?php echo $row['Fee']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold d-block">Gender</label>

                                <input type="radio" name="gender" value="Male"
                                    <?php if ($row['gender'] == "Male") echo "checked"; ?>> Male

                                <input type="radio" name="gender" value="Female" class="ms-3"
                                    <?php if ($row['gender'] == "Female") echo "checked"; ?>> Female
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-success">
                                    Update Student
                                </button>
                            </div>

                        </form>
                    </div>

                    <div class="card-footer text-center">
                        <a href="table1.php" class="btn btn-secondary">Back</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>

</html>