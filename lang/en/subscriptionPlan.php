<?php

$single = 'Subscription Plan';
$multiple = 'Subscription Plans';

return [
    // pages
    'index_page' => [
        'title' => "List $multiple",
        'head_title' => "$multiple",
    ],

    'create_page' => [
        'title' => "create a $single",
        'head_title' => "Add $single",
    ],

    'edit_page' => [
        'title' => "Edit $single",
        'head_title' => "Edit $single",
    ],

    // labels
    'plan_name' => 'Plan Name',
    'price' => 'Price',
    'maxUsers' => 'Wax Users',
    'maxStockItems' => 'Max Stock Items',

    // alerts
    'created' => 'stade créée avec succès',
    'updated' => 'stade mise à jour avec succès',
    'deleted' => 'stade supprimée avec succès',
    'exported' => 'stade supprimée avec succès',
    'imported' => 'stade supprimée avec succès',
];
