<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple codeigniter4 CRUD application</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/myStyle.css'); ?>">
</head>

<body>
    <div class="container-fluid bg-purple shadow-sm">
        <div class="container pb-2 pt-2">
            <div class="text-white h4">Simple Codeigniter 4 CRUD Application</div>
        </div>
    </div>
    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="nav nav-underline">
                    <div class="nav-link">User / View</div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary btn-sm">Add</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (!empty($session->getFlashdata('success'))) {
                ?>
                    <div class="alert alert-success">
                        <?php echo $session->getFlashdata('success'); ?>
                    </div>

                <?php
                }
               
                if (!empty($session->getFlashdata('error'))) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo $session->getFlashdata('error'); ?>
                    </div>

                <?php
                }
                ?>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">Users</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Sl No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Added</th>
                                <th>Updated</th>
                                <th width="150">Action</th>
                            </tr>
                            <?php
                            if (!empty($user_data)) {
                                $i = 0;
                                foreach ($user_data as $value) {
                               
                            ?>
                                    <tr>
                                        <td><?php echo  ++$i; ?></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['phone']; ?></td>
                                        <td><?php echo $value['address']; ?></td>
                                        <td><?php echo $value['create_date']; ?></td>
                                        <td><?php echo $value['update_date']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('users/edit/'.$value['id']);?>" title="Edit" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?php echo base_url('users/delete/'.$value['id']);?>" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm(' Are You Sure You Want to Delete This Record ?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="8">Records not found.</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>