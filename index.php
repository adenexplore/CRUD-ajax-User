<!DOCTYPE html>

<html>

<head>

    <title>PHP/MySQLi CRUD Operation using Bootstrap/Modal</title>
    <script src="jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="bootstrap-filestyle.min.js"> </script>
    <link href="fonts.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('#empTable').dataTable();
            $('.file-upload').file_upload();
        });
    </script>
</head>

<body style="margin:20px auto">
    <center>
        <h2><span style="font-size:25px; color:blue">
                FORM CRUD DENGAN AJAX</span>
        </h2>
    </center>

    <div class="container">
        <br /><br />
        <div class="row header col-sm-12" style="text-align:center;color:green">
            <span class="pull-left">
                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-plus"></span> Add New
                </a></span>

            <div style="height:50px;"></div>
            <table class="table table-striped table-bordered table-responsive table-hover" id="empTable">
                <thead>
                    <th>
                        <center>Picture</center>
                    </th>
                    <th>
                        <center>Name</center>
                    </th>
                    <th>
                        <center>Address</center>
                    </th>
                    <th>
                        <center>Phone</center>
                    </th>
                    <th>
                        <center>Action</center>
                    </th>
                </thead>
                <tbody>
                    <?php
                    include('database.php');
                    $result = $mysqli->query("select * from user");
                    while ($row = $result->fetch_assoc()) {
                        $img = "http://localhost/php_crud/profile_images/" . $row['id'] . ".jpg";
                    ?>
                        <tr>
                            <td> <img src='<?php echo $img ?>' height="50px" width="70px" /></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td>
                                <a href="#detail<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-success btn-sm">
                                    <span class="glyphicon glyphicon-floppy-open">
                                    </span>Detail</a>&nbsp;

                                <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning btn-sm">
                                    <span class="glyphicon glyphicon-edit">
                                    </span> Edit</a>&nbsp;

                                <a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash">
                                    </span> Delete</a>

                                <!-- include edit modal -->
                                <?php include('show_detail_modal.php'); ?>
                                <!-- End -->
                                <!-- include edit modal -->
                                <?php include('show_edit_modal.php'); ?>
                                <!-- End -->
                                <!-- include delete modal -->
                                <?php include('show_delete_modal.php'); ?>
                                <!-- End -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- include insert modal -->
        <?php include('show_add_modal.php'); ?>
        <!-- End -->
    </div>
</body>

</html>