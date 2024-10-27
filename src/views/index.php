<h1>Home Page</h1>
<hr>
<div>
    <?php if (! empty($invoice)): ?>
        Invoice ID: <?= htmlspecialchars($invoice['id']) ?> <br>
        Invoice Amount: <?= htmlspecialchars($invoice['amount']) ?> <br>
        User: <?= htmlspecialchars($invoice['full_name']) ?> <br>
    <?php endif; ?>
</div>



<form action="/upload" method="POST" enctype="multipart/form-data">
    <input type="file" name="receipt[]" />
    <button type="submit">Upload</button>
</form>


