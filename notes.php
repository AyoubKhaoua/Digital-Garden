<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes — Digital Garden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="public/css/index.css?v=1">
    <link rel="stylesheet" href="public/css/sidebar.css?v=1">
    <link rel="stylesheet" href="public/css/notes.css?v=1">
</head>

<body>
    <?php include __DIR__ . '/includes/header.php'; ?>

    <?php

    session_start();
    include __DIR__ . '/config/database.php';
    $userId = $_SESSION['id'];
    $notes = [];
    if ($userId) {
        $query = "select n.id,n.title,n.content,n.importance, n.created_at,t.title,t.color
         from notes n
         inner join themes t
          on n.theme_id=t.id 
          where t.user_id='$userId'";
        $res = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_assoc($res)) {
            $notes[] = $row;
        }
    }
    ?>

    <main class="app-layout container-lg">
        <?php include __DIR__ . '/includes/sidebar.php'; ?>

        <section class="main-content">
            <div class="notes-hero d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Your Notes</h2>
                <a href="createNote.php" class="btn btn-primary btn-sm">+ New Note</a>
            </div>

            <div class="notes-grid">

                <?php if (empty($notes)): ?>
                    <div class="alert alert-info">No notes yet</div>
                <?php else: ?>
                    <?php foreach ($notes as $note): ?>
                        <?php
                        $preview = $note['content'];
                        if (strlen($preview) > 180) $preview = substr($preview, 0, 180) . '...';
                        $color = $note['color'];
                        ?>
                        <article class="note-card" style="border-left:6px solid <?= $color ?>;">
                            <h4><?= $note['title'] ?></h4>
                            <p class="muted"><?= $preview ?></p>
                            <div class="note-meta">
                                <small class="theme-label" style="color:<?= $color ?>"><?= $note['title'] ?></small>
                                <small class="text-muted">• <?= date('M j, Y', strtotime($note['created_at'])) ?></small>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>

</html>