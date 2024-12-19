<?php
require_once __DIR__ . '/controllers/ProductController.php';

// Récupérer l'URI demandée
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Créer un objet ProductController
$controller = new ProductController();

// Logique de routage : selon l'URL demandée, appeler la méthode correspondante du contrôleur
switch ($requestUri) {
    case '/':
    case '/index':
        $controller->index();  // Afficher la liste des produits
        break;
    case '/add':
        $controller->add();    // Afficher le formulaire d'ajout
        break;
    case (preg_match('/^\/delete\/(\d+)$/', $requestUri, $matches) ? true : false):
        $controller->delete($matches[1]);  // Supprimer un produit par ID
        break;
    default:
        echo "404 - Page non trouvée";  // Gérer les routes inconnues
        break;
}
