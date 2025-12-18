    <?php require_once __DIR__ . '/config/database.php';
    session_start() ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard — Digital Garden</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="public/css/index.css?v=1">
        <link rel="stylesheet" href="public/css/sidebar.css?v=1">
    </head>

    <body>
        <?php include __DIR__ . '/includes/header.php'; ?>


        <main class="app-layout" style="max-width:1100px;margin:24px auto;padding:0 18px;">
            <?php include __DIR__ . '/includes/sidebar.php'; ?>

            <section class="main-content">

                <div class="container my-5">
                    <h1>list of theme</h1>
                    <a class="btn btn-primary" href="createTheme.php" role="button">Add Theme </a>
                </div>
                <div class="container-fluid px-0">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                        <?php
                        $id = $_SESSION['id'];
                        $query = mysqli_query($connect, "SELECT * FROM themes  where id='$id'");
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                $title = htmlspecialchars($row['title']);
                                $color = htmlspecialchars($row['color'] ?? '#ffffff');
                                $nbrnotes = (int) $row['nbrnotes'];
                                $id = (int) $row['id'];
                                echo '<div class="col">';
                                echo '<div class="card h-100 theme-card">';
                                echo '<div class="card-body d-flex flex-column">';
                                echo '<div class="theme-swatch mb-3" style="background:' . $color . '; height:100px;width:100%; border-radius:6px; border:1px solid rgba(2,6,23,0.04);"></div>';
                                echo '<h5 class="card-title">' . $title . '</h5>';
                                echo '<p class="card-text text-muted mb-2">Notes: ' . $nbrnotes . '</p>';
                                echo '<div class="mt-auto d-flex gap-2">';
                                echo '<a class="btn btn-danger" href="delete.php?id=' . $id . '" class="btn btn-sm btn-primary">delete</a>';
                                echo '<a class="btn btn-primary text-white "href="createTheme.php?edit=' . $id . '" class="btn btn-sm btn-outline-secondary">Edit</a>';
                                echo '</div>';
                                echo '</div></div></div>';
                            }
                        } else {
                            echo '<p>No themes found. <a href="createTheme.php">Create one</a>.</p>';
                        }
                        ?>
                    </div>
                </div>
            </section>
        </main>
        <?php


        ?>

        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>

    </html>