<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .navbar-brand {
            font-size: 24px;
        }
        .welcome-message {
            margin-top: 20px;
            text-align: center;
        }
        .search-form {
            margin-top: 20px;
        }
        @media (max-width: 767px) {
            .table-responsive {
                overflow-x: auto;
            }
            .navbar-header {
                float: none;
            }
            .navbar-left, .navbar-right {
                float: none !important;
            }
            .navbar-toggle {
                margin-right: 0;
            }
            .welcome-message h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
 
    <!-- Navigation Bar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">MyApp</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome, Yongyut</a></li>
                    <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-message">
        <h1><?= esc($title); ?></h1>
        </div>


       

       
    </div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
