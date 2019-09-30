
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <meta charset="UTF-8">
    <title>Results </title>
</head>
<body>

    <?php
        include 'db.php';
        $id =  $_GET['id'];
        $website =  $_GET['website'];
        $rrr = getWebsiteData($id);

?>

<div class="jumbotron">
    <div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="text-info text-center mt-3"><h4>First View loadtime</h4></div>
                <div class="text-info text-center mt-2"><h1><?php echo $rrr["f_load_time"]?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="text-success text-center mt-3"><h4>First View Render Time</h4></div>
                <div class="text-success text-center mt-2"><h1><?php echo $rrr["f_render_time"]?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="text-danger text-center mt-3"><h4>First View Page Size</h4></div>
                <div class="text-danger text-center mt-2"><h1><?php echo $rrr["f_page_size"]?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="text-warning text-center mt-3"><h4>First View Request</h4></div>
                <div class="text-warning text-center mt-2"><h1><?php echo $rrr["f_request"]?></h1></div>
            </div>
        </div>
    </div>
</div>
    <div class="jumbotron">
        <div class="row w-100">
            <div class="col-md-3">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="text-info text-center mt-3"><h4>Repeat View loadtime</h4></div>
                    <div class="text-info text-center mt-2"><h1><?php echo $rrr["r_load_time"]?></h1></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="text-success text-center mt-3"><h4>Repeat View Render Time</h4></div>
                    <div class="text-success text-center mt-2"><h1><?php echo $rrr["r_render_time"]?></h1></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-danger mx-sm-1 p-3">
                    <div class="text-danger text-center mt-3"><h4>Repeat View Page Size</h4></div>
                    <div class="text-danger text-center mt-2"><h1><?php echo $rrr["r_page_size"]?></h1></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning mx-sm-1 p-3">
                    <div class="text-warning text-center mt-3"><h4>Repeat View Request</h4></div>
                    <div class="text-warning text-center mt-2"><h1><?php echo $rrr["r_request"]?></h1></div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>