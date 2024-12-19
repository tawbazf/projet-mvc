<?php include 'header.php'; ?>

<h1>Ajouter un produit</h1>
<form method="POST" action="/add">
    <input type="text" name="name" placeholder="Nom du produit" required>
    <input type="number" name="price" placeholder="Prix" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Ajouter</button>
</form>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
