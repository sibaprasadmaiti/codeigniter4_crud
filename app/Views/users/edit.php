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
                    <div class="nav-link">User / Edit</div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('/users');?>" class="btn btn-primary btn-sm">Back</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">Edit User</div>
                    </div>
                    <div class="card-body">
                        <form id="createForm" action="" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control <?php echo isset($validation) && $validation->hasError('name') ? 'is-invalid' : '';?>" name="name" id="name" placeholder="Enter Your Name" value="<?php echo set_value('name',$user['name'])?>">
                            <?php
                            if (isset($validation) && $validation->hasError('name')) {
                               echo '<p class="invalid-feedback">'.$validation->getError('name').'</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control <?php echo isset($validation) && $validation->hasError('name') ? 'is-invalid' : '';?>" name="email" id="email" placeholder="Enter Your Email" value="<?php echo set_value('email',$user['email'])?>">
                            <?php
                            if (isset($validation) && $validation->hasError('name')) {
                               echo '<p class="invalid-feedback">'.$validation->getError('name').'</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control <?php echo isset($validation) && $validation->hasError('phone') ? 'is-invalid' : '';?>" name="phone" id="phone" placeholder="Enter Your Phone No." value="<?php echo set_value('phone',$user['phone'])?>">
                            <?php
                            if (isset($validation) && $validation->hasError('phone')) {
                               echo '<p class="invalid-feedback">'.$validation->getError('phone').'</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Your Address" value="<?php echo set_value('address',$user['address'])?>">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>