<?php include 'header.php'; ?>

<h1>Liste des produits</h1>
<a href="/add">Ajouter un produit</a>  <!-- Lien vers la page d'ajout -->

<?php if (!empty($products)): ?>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= htmlspecialchars($product['name']) ?> - <?= htmlspecialchars($product['price']) ?>€
                <!-- Formulaire de suppression -->
                <form method="POST" action="/delete/<?= $product['id'] ?>" style="display:inline;">
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun produit disponible.</p>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <p style="color: green;">Produit ajouté avec succès !</p>
<?php endif; ?>

<?php if (isset($_GET['deleted'])): ?>
    <p style="color: red;">Produit supprimé avec succès !</p>
<?php endif; ?>
