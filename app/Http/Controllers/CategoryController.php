<?php

namespace App\Http\Controllers;

use App\DTO\CategoryDto as Dto;
use App\DTO\CategoryDto;
use App\Heads\CategoryHeads as Heads;
use App\Heads\CategoryHeads;
use App\Http\Requests\CategoryRequest as Request;
use App\Services\CategoryService as Service;
use App\Models\Category;
use App\Models\Unit;
use App\Models\User;
use App\Notifications\MyDatabaseNotification;
use App\Services\ExcelService;
use Illuminate\Http\Request as HttpRequest;


class CategoryController extends Controller
{
    public string $folder;
    public string $route;
    public string $lang;

    public function __construct(
        private Service $service,
        private ExcelService $excelService,
    ) {
        $this->folder = "category";
        $this->route = "categories";
        $this->lang = "category";
        $this->setTitle(trans('menu.category'));
    }

    public function breadcrumb()
    {
        return $this->addBreadcrumb(trans('menu.category'), route($this->route . '.index'));
    }

    public function index()
    {
        $this->addBreadcrumb(trans('menu.category'));
        return view('pages.' . $this->folder . '.index', [
            'heads' => Heads::heads(),
        ]);
    }

    public function create()
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.create'));

        $units = Unit::query()->where('tenant_id', tenant())->get();

        return view('pages.' . $this->folder . '.create', [
            'heads' => CategoryHeads::heads(),
            'units' => $units,
        ]);
    }

    public function store(Request $request)
    {
        $this->service->create(Dto::fromRequest($request));
        $this->success(trans('alert.create'), trans($this->lang . '.created'));
        return redirect()->route($this->route . '.index');
    }

    public function show(Category $category)
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.update'));
        return view('pages.' . $this->folder . '.edit', [
            'data' => $category,
            'heads' => CategoryHeads::heads(),
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $this->service->update(
            $category,
            Dto::fromRequest($request)
        );
        $this->success(trans('alert.update'), trans($this->lang . '.updated'));
        return redirect()->route($this->route . '.index');
    }

    public function delete(Category $category)
    {
        $this->service->delete($category);
        $this->success(trans('alert.delete'), trans($this->lang . '.deleted'));
        return redirect()->route($this->route . '.index');
    }

    public function import(HttpRequest $request)
    {
        $this->excelService->import($request, Category::class, CategoryHeads::heads());
        $this->success(trans('alert.import'), trans($this->lang . '.imported'));
        return redirect()->route($this->route . '.index');
    }
}
