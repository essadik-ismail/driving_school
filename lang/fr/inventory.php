<?php

$single = 'Inventaire';
$multiple = 'Inventaires';

return [
    // pages
    'index_page' => [
        'title' => "Liste des $multiple",
        'head_title' => "$multiple",
    ],

    'create_page' => [
        'title' => "Créer un $single",
        'head_title' => "Ajouter un $single",
    ],

    'edit_page' => [
        'title' => "Modifier un $single",
        'head_title' => "Modifier $single",
    ],

    // labels
    'product_name' => 'Nom',
    'quantity' => 'Quantité',
    'pricePerUnit' => 'Prix Unitaire',
    'minStockLevel' => 'Niveau de Stock Minimum',

    // alerts
    'created' => 'Inventaire créé avec succès',
    'updated' => 'Inventaire mis à jour avec succès',
    'deleted' => 'Inventaire supprimé avec succès',
    'exported' => 'Inventaire exporté avec succès',
    'imported' => 'Inventaire importé avec succès',
];
