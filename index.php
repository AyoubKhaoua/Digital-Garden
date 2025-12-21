<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Garden</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="public/css/index.css?v=1">

</head>

<body>
    <div class="header">
        <?php include __DIR__ . '/includes/header.php'; ?>
    </div>

    <main>

        <section class="hero">
            <div style="max-width:900px;margin:0 auto;">
                <h1>Digital Garden — cultivate your ideas</h1>
                <p>Write, organize and share your notes in a beautiful, extensible space. Local-first, simple and focused on helping you grow your knowledge.</p>

                <div class="cta-group">
                    <a class="btn-primary" href="register.php">Get started — it's free</a>
                    <a class="" href="notes.php" style="display:inline-flex;align-items:center;padding:10px 14px;border-radius:10px;border:1px solid rgba(2,6,23,0.06);text-decoration:none;color:#374151">Browse notes</a>
                </div>
            </div>
        </section>

        <section class="features" aria-label="Key features">
            <article class="feature">
                <h3 style="margin:0 0 8px">Flexible notes</h3>
                <p style="margin:0;color:#6b7280">Rich editor for quick capture and longform thinking — link ideas together like a garden.</p>
            </article>
            <article class="feature">
                <h3 style="margin:0 0 8px">Themes & accessibility</h3>
                <p style="margin:0;color:#6b7280">Choose a reading-friendly theme, keyboard shortcuts and readable typography.</p>
            </article>
            <article class="feature">
                <h3 style="margin:0 0 8px">Private by default</h3>
                <p style="margin:0;color:#6b7280">User-first privacy model, opt-in sharing and export tools.</p>
            </article>
        </section>

    </main>
    <div class="footer">
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </div>

</body>

</html>