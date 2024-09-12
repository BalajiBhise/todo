<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            width: 100%;
            margin: 0 auto;
        } 
        .header {
            background-color: #f8f8f8;
            padding: 9px;
            text-align: center;
            border-bottom: 1px solid #dddddd;
        }

        .content {
            padding: 20px;
        }

        .footer {
            background-color: #f8f8f8;
            padding: 10px;
            text-align: center;
            border-top: 1px solid #dddddd;
            font-size: 12px;
            color: #888888;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .text-center {
            text-align: center;
        }

        @media screen and (max-width: 740px) {
            .container-fluid {
                width: auto !important;
            }
        }
        .mt-4{
            margin-top : -20px !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid"> 
        <div class="header">
            <h1 class="ms-0"> {!! $title !!} </h1>
        </div> 
        <div class="content">
            {!! $data !!}
        </div> 
    </div>
</body>

</html>