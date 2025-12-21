<?php session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Theme — Digital Garden (Client-only)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/index.css?v=1">
    <link rel="stylesheet" href="public/css/sidebar.css?v=1">
</head>

<body>

    <?php
    include __DIR__ . '/includes/header.php';
    include './config/database.php'; ?>

    <main class="app-layout" style="max-width:1100px;margin:24px auto;padding:0 18px;">
        <!-- static sidebar -->
        <?php include __DIR__ . '/includes/sidebar.php' ?>

        <section class="main-content">
            <h2 style="margin-top:0">Create Theme </h2>

            <div id="alert-placeholder"></div>

            <div class="card">
                <div class="card-body">
                    <form id="themeForm" method="post" action="createTheme.php">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input id="title" name="title" type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <div class="d-flex gap-2 align-items-center">
                                <input id="color" name="color" type="color" class="form-control form-control-color" value="#ffffff" style="width:56px;padding:0;border:none;background:transparent">
                                <input id="colorText" type="text" class="form-control" value="#ffffff" readonly>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary" type="submit">Create Theme</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <a class="btn btn-secondary" href="dashboard.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>


        </section>

    </main>


    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $color = $_POST['color'];
        $id = $_SESSION['id'];
        $query = "insert into themes(user_id,title,color)values('$id','$title','$color')";

        $res = mysqli_query($connect, $query);

        /* 
        
         var_dump($_POST); */
    } ?>




</body>

</html>