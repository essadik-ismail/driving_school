<?php

namespace App\Traits;

trait BreadcrumbTrait
{
    protected $breadcrumbs = [];
    protected $title;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function addBreadcrumb($name, $url = null)
    {
        $this->breadcrumbs[] = [
            'name' => $name,
            'url' => $url
        ];

        $this->setBreadcrumbs($this->title, $this->breadcrumbs);
        return $this;
    }

    public function getBreadcrumbs()
    {
        return $this->breadcrumbs;
    }


    public function resetBreadcrumbs()
    {
        $this->title = "";
        $this->breadcrumbs = [];
        session()->forget('breadcrumbs');
        session()->forget('breadcrumbTitle');
        return $this;
    }

    public function setBreadcrumbs($title, array $breadcrumbs = null)
    {
        $breadcrumbs = $breadcrumbs ?: $this->breadcrumbs;
        session(['breadcrumbs' => $breadcrumbs, 'breadcrumbTitle' => $title]);
    }

    public function getSessionBreadcrumbs()
    {
        return session('breadcrumbs', []);
    }

    public function getBreadcrumbTitle()
    {
        return session('breadcrumbTitle', null);
    }
}
