<?php
include __DIR__ . '/config/database.php';
if (isset($_GET['edit'])) {
    $idTheme = $_GET['edit'];

    $query = "select * from themes where id='$idTheme'";
    $res = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($res);
    $title = $row['title'];
    $color = $row['color'];
}
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $color = $_POST['color'];
    $id = $_POST['id'];
    $query = "update themes set title='$title',color='$color' where id='$id' ";
    $res = mysqli_query($connect, $query);



    // redirect to themes list after successful update
    header('Location: themes.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/index.css?v=1">
    <link rel="stylesheet" href="public/css/sidebar.css?v=1">
    <link rel="stylesheet" href="public/css/editTheme.css?v=1">
</head>

<body>
    <div class="container py-5">
        <div class="card mx-auto edit-theme-card">
            <div class="card-body">
                <h2 class="card-title mb-3">Edit Theme</h2>
                <form id="themeForm" method="post" action="editTheme.php" class="needs-validation" novalidate>
                    <input type="hidden" name="id" value="<?= $idTheme ?>" />

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" name="title" type="text" class="form-control" value="<?= htmlspecialchars($title) ?>" required>
                        <div class="invalid-feedback">Please provide a title.</div>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <div class="d-flex gap-2 align-items-center">
                            <input id="color" name="color" type="color" class="form-control form-control-color" value="<?= $color ?>" style="width:56px;padding:0;border:none;background:transparent">
                            <input id="colorText" name="colorText" type="text" class="form-control color-hex" value="<?= $color ?>" maxlength="7">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit" name="submit">Update Theme</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <a class="btn btn-secondary" href="themes.php">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const color = document.getElementById('color');
            const colorText = document.getElementById('colorText');
            // init
            if (color && colorText) {
                colorText.value = color.value || '#ffffff';
                color.addEventListener('input', () => colorText.value = color.value);
                colorText.addEventListener('input', () => {
                    const v = colorText.value;
                    if (/^#([0-9A-Fa-f]{6})$/.test(v)) color.value = v;
                });
            }
            // Bootstrap validation
            const form = document.getElementById('themeForm');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>

</html>