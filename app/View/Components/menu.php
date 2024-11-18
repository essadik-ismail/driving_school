<?php

namespace App\View\Components;

use Illuminate\View\Component;

class menu extends Component
{
    public $menuItems;

    public function __construct()
    {
        $this->menuItems = [
            [
                'title' => trans('menu.stock_manager'),
                'url' => 'user',
                'route' => '#',
                'icon' => 'uil uil-box', // Changed icon for Stock Manager
                'translation_key' => 'menu.user_title',
                'subitems' => [
                    ['url' => 'tenantjobs', 'route' => route('tenantjobs.index'), 'translation_key' => 'menu.tenantjob'],
                    ['url' => 'employees', 'route' => route('employees.index'), 'translation_key' => 'menu.employee'],
                ]
            ],
            [
                'title' => '',
                'url' => 'crm',
                'route' => '#',
                'icon' => 'uil uil-users-alt', // Changed icon for CRM
                'translation_key' => 'menu.crm_title',
                'subitems' => [
                    ['url' => 'customers', 'route' => route('customers.index'), 'translation_key' => 'menu.customer'],
                    ['url' => 'suppliers', 'route' => route('suppliers.index'), 'translation_key' => 'menu.supplier'],
                    ['url' => 'sales', 'route' => route('sales.index'), 'translation_key' => 'menu.sale'],
                    ['url' => 'contracts', 'route' => '', 'translation_key' => 'menu.contract'],
                ]
            ],
            [
                'title' => '',
                'url' => 'product',
                'route' => '#',
                'icon' => 'uil uil-shopping-cart', // Changed icon for Product
                'translation_key' => 'menu.product_title',
                'subitems' => [
                    ['url' => 'warehouses', 'route' => route('warehouses.index'), 'translation_key' => 'menu.warehouse'],
                    ['url' => 'units', 'route' => route('units.index'), 'translation_key' => 'menu.unit'],
                    ['url' => 'categories', 'route' => route('categories.index'), 'translation_key' => 'menu.category'],
                    ['url' => 'products', 'route' => route('inventories.index'), 'translation_key' => 'menu.inventory'],
                ]
            ],
            [
                'title' => trans('menu.settings_title'),
                'url' => 'settings',
                'route' => '#',
                'icon' => 'uil uil-cog', // Changed icon for Settings
                'translation_key' => 'menu.settings_title',
                'subitems' => [
                    ['url' => 'subscriptionplans', 'route' => route('subscriptionplans.index'), 'translation_key' => 'menu.subscriptionplan'],
                    ['url' => 'tenants', 'route' => route('tenants.index'), 'translation_key' => 'menu.tenant'],
                ]
            ],

        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu', [
            'menuItems' => $this->menuItems,
        ]);
    }
}
