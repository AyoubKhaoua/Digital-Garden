<?php
session_start();
include __DIR__ . '/config/database.php';

$errors = [];
if (isset($_POST['submit'])) {
    $theme_id = $_POST['theme_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $importance = isset($_POST['importance']) && in_array($_POST['importance'], ['1', '2', '3', '4', '5']) ? $_POST['importance'] : '3';

    //query
    $query = "INSERT INTO notes (theme_id, title, content, importance) VALUES('$theme_id ','$title','$content','$importance')";
    $res = mysqli_query($connect, $query);
    if ($res) {
        $query = "UPDATE themes SET nbrnotes = nbrnotes + 1 WHERE id ='$theme_id'";
        mysqli_query($connect, $query);
        header('location:themes.php');
    }
}

$id = $_SESSION['id'];
$res = mysqli_query($connect, "SELECT id, title FROM themes WHERE user_id='$id'");
$themes = [];
while ($row = mysqli_fetch_assoc($res)) {
    $themes[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Note — Digital Garden</title>
    <link rel="stylesheet" href="public/css/index.css?v=1">
    <link rel="stylesheet" href="public/css/notes.css?v=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include __DIR__ . '/includes/header.php'; ?>

    <main class="app-layout container-lg py-4">
        <?php include __DIR__ . '/includes/sidebar.php'; ?>

        <section class="main-content">
            <div class="card mx-auto" style="max-width:720px;">
                <div class="card-body">
                    <h3 class="card-title mb-3">Create Note</h3>



                    <?php if (empty($themes)): ?>
                        <div class="alert alert-warning">You don't have any themes yet. <a href="createTheme.php">Create a theme</a> first.</div>
                    <?php else: ?>
                        <form method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="theme_id" class="form-label">Theme</label>
                                <select id="theme_id" name="theme_id" class="form-select" required>
                                    <option value="">Select a theme</option>
                                    <?php foreach ($themes as $t): ?>
                                        <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['title']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Choose a theme.</div>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input id="title" name="title" type="text" class="form-control" required>
                                <div class="invalid-feedback">Please provide a title.</div>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea id="content" name="content" rows="6" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="importance" class="form-label">Importance</label>
                                <select id="importance" name="importance" class="form-select" required>
                                    <option value="3">3 (normal)</option>
                                    <option value="1">1 (low)</option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="5">5 (high)</option>
                                </select>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Create</button>
                                <a href="notes.php" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>



</body>

</html>