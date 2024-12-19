<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    // Afficher la liste des produits
    public function index() {
        $products = $this->model->getAllProducts();  // Récupérer tous les produits
        include __DIR__ . '/../views/productList.php';  // Afficher la vue de la liste des produits
    }

    // Ajouter un produit
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer et valider les données du formulaire
            $name = trim($_POST['name']);
            $price = trim($_POST['price']);
            $description = trim($_POST['description']);

            if (!empty($name) && is_numeric($price) && $price > 0) {
                $this->model->addProduct($name, $price, $description);  // Ajouter le produit
                header("Location: /?success=1");  // Redirection après succès
                exit;
            } else {
                $error = "Veuillez remplir tous les champs correctement.";
                include __DIR__ . '/../views/productForm.php';  // Afficher le formulaire avec erreur
            }
        } else {
            include __DIR__ . '/../views/productForm.php';  // Afficher le formulaire d'ajout
        }
    }

    // Supprimer un produit
    public function delete($id) {
        if (is_numeric($id) && $id > 0) {
            $this->model->deleteProduct($id);  // Supprimer le produit
            header("Location: /?deleted=1");  // Redirection après suppression
            exit;
        } else {
            echo "ID de produit invalide.";  // Gérer une erreur d'ID invalide
        }
    }
}
