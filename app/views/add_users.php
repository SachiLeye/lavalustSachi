<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Users</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }

        .header {
            background-color: #469712;
            color: #ffffff;
            padding: 30px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .main {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .footer {
            font-family: 'Courier New', monospace;
            color: #000;
            background-color: #ffffff;
            padding: 15px;
            text-align: center;
            border-top: solid 1px #2980B9;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .card-header {
            background-color: #f7f7f7;
            border-bottom: 2px solid #469712;
            font-size: 20px;
        }

        .btn-primary {
            background-color: #469712;
            border-color: #469712;
        }

        .form-control {
            border-radius: 4px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0;
            padding: 12px 10px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="header">Add Users</div>
    <div class="main">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-sm-9 mx-auto">
                    <div class="card">
                        <div class="card-header">Users</div>
                        <?php flash_alert(); ?>
                        <form action="<?= site_url('add_users'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <textarea name="lastname" id="lastname" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <textarea name="firstname" id="firstname" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="Gender">Gender</label>
                                    <select class="form-control" id="Gender" name="Gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit" name="add_users">Save</button>
                                        <br>
                                        <a class="btn btn-success mt-2" href="<?= site_url('home'); ?>">Return Home</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            Page rendered with <?php echo $this->performance->memory_usage(); ?> in <strong><?php echo $this->performance->elapsed_time('lavalust'); ?></strong> seconds.
            <?php echo (config_item('ENVIRONMENT') === 'development') ? 'LavaLust Version <strong>' . config_item('VERSION') . '</strong>' : ''; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>

</html>
