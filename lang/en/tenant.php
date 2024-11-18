<?php

$single = 'Inventory';
$multiple = 'Inventories';

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
    // 'label' => 'value',
     
    'companyName' => 'Company Name',
    'address' => 'Address',
    'tel' => 'Tel',
    'gsm' => 'Gsm',
    'email' => 'Email',
    'website' => 'Website',
    'subscription_plan_id' => 'Subscription Plan',


    // alerts
    'created' => 'stade créée avec succès',
    'updated' => 'stade mise à jour avec succès',
    'deleted' => 'stade supprimée avec succès',
    'exported' => 'stade supprimée avec succès',
    'imported' => 'stade supprimée avec succès',
];
