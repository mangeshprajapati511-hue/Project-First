<?php

$mysqli = new mysqli('localhost', 'hachiekouser', '', 'db_99');

if ($mysqli->connect_errno) {
    echo 'Failed to connect to Mysql:' . $mysqli->connect_error;
    die;
}
if (isset($_POST['submit'])) {
    $name    = $_POST['name'];
    $college = $_POST['college'];
    $branch  = $_POST['branch'];
    $fee     = $_POST['fee'];
    $gender  = $_POST['gender'];

    $res = "INSERT INTO student1(name,college,branch,fee,gender)VALUES('$name','$college','$branch','$fee','$gender')";
    if ($mysqli->query($res)) {
        header("Location:table1.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#btnsubmit").click(function() {
                if ($("#name").val() == "") {
                    alert("Please Enter Your Name!!");
                    return false;
                }
                if ($.isNumeric($("#name").val())) {
                    alert("Please Enter Your Alphabetic Name!!");
                    return false;
                }

                if ($("#college").val() == "") {
                    alert("Please Enter college Name!!");
                    false;
                }
                if ($("#branch").val() == "") {
                    alert("Please Enter branch Name!!");
                    false;
                }

                if ($("#fee").val() == "") {
                    alert("Please Enter Your Fee!!");
                    false;
                }
                if ($('#male').prop('checked') == false && $('#female').prop('checked') == false) {
                    alert("Please select your gender!!");
                    return false;
                }
            })
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light ">

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class=" bg-primary text-white text-center">
                        <h4 class="mb-0">Add Student Data</h4>
                    </div>

                    <div class="card-body">
                        <form action="insert.php" method="post">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">College</label>
                                <input type="text" name="college" id="college" class="form-control" placeholder="Enter Your Collage Name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Branch</label><br>
                                <select class="form-control" name="branch" id="branch">
                                    <option value="">---Select Your Branch---</option>
                                    <option value="IT">IT</option>
                                    <option value="CS">CS</option>
                                    <option value="Networking">Networking</option>
                                    <option value="Civil">Civil</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Fee</label>
                                <input type="number" name="fee" id="fee" class="form-control" placeholder="Enter Your Fee">
                            </div>
                            <div class=" mb-3">
                                <label class="form-label d-block fw-semibold">Gender</label>
                                <input class="form-check-label" type="radio" name="gender" id="male" value="Male">Male
                                <input class="form-check-label" type="radio" name="gender" id="female" value="Female">Female

                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" name="submit" id="btnsubmit" class="btn btn-success btn-lg">
                                    Save Student
                                </button>
                            </div>

                        </form>
                    </div>

                    <div class="text-center mt-3">
                        <a href="table1.php" class="btn btn-primary">Back to Student Table</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>