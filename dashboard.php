<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Digital Garden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/index.css?v=1">
    <link rel="stylesheet" href="public/css/sidebar.css?v=1">
    <link rel="stylesheet" href="public/css/dashboard.css?v=1">
</head>

<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <?php require_once __DIR__ . '/config/database.php'; ?>

    <main class="app-layout" style="max-width:1100px;margin:24px auto;padding:0 18px;">
        <?php include __DIR__ . '/includes/sidebar.php'; ?>

        <section class="main-content">


            <div class="hero" style="margin-bottom:16px">
                <div class="hero-text">
                    <h1>Welcome back, <?php echo  htmlspecialchars($_SESSION['name']); ?></h1>
                    <p class="small-muted">Nurture your ideas — this is your digital garden.</p>
                </div>
                <img src="public/img/hero-garden.svg" alt="Digital Garden hero" style="height:88px;border-radius:8px">
            </div>

        </section>




    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>

</html>