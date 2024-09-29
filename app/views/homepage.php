<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Homepage</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            background-color: #469712;
            color: #0000000;
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

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-circle {
            border-radius: 50%;
        }

        .btn-success {
            background-color: #469712;
            border-color: #469712;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .card-header {
            background-color: #f7f7f7;
            border-bottom: 2px solid #469712;
        }

        .card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .add-user-btn {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
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
    <div class="header">
        <h1>Students Information</h1>
    </div>
    
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="m-0 text-success">All Users</h2>
                            <button type="button" onclick="location.href='<?php echo site_url('add_users');?>'" class="btn btn-success btn-circle btn-sm add-user-btn">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                        <?php flash_alert(); ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="user_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $record): ?>
                                        <tr>
                                            <td><?php echo $record['id']; ?></td>
                                            <td><?php echo $record['msvl_last_name']; ?></td>
                                            <td><?php echo $record['msvl_first_name']; ?></td>
                                            <td><?php echo $record['msvl_email']; ?></td>
                                            <td><?php echo $record['msvl_gender']; ?></td>
                                            <td><?php echo $record['msvl_address']; ?></td>
                                            <td>
                                                <button onclick="location.href='<?php echo site_url('edit_users/'.$record['id']);?>'" type="button" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button onclick="confirmDelete('<?php echo site_url('delete_users/'.$record['id']);?>')" type="button" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash-can"></i> Delete
                                            </button>
                                            </td>
                                            <script>
                                                 function confirmDelete(url) {
                                                    if (confirm("Are you sure you want to delete this user?")) {
                                                        window.location.href = url;
                                                    }
                                                }
                                            </script>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        Page rendered with <?php echo $this->performance->memory_usage(); ?> in <strong><?php echo $this->performance->elapsed_time('lavalust'); ?></strong> seconds. 
        <?php echo (config_item('ENVIRONMENT') === 'development') ? 'LavaLust Version <strong>' . config_item('VERSION') . '</strong>' : ''; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#user_table').DataTable();
        });
    </script>
</body>
</html>
