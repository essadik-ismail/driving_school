<?php

namespace App\Http\Controllers;

use App\DTO\TenantDto as Dto;
use App\Heads\TenentHeads as Heads;
use App\Http\Requests\TenantRequest as Request;
use App\Models\SubscriptionPlan;
use App\Services\TenentService as Service;
use App\Models\Tenant;

use App\Services\ExcelService;
use Illuminate\Http\Request as HttpRequest;

class TenantController extends Controller
{
    public string $folder;
    public string $route;
    public string $lang;

    public function __construct(
        private Service $service,
        private ExcelService $excelService,
    ) {
        $this->folder = "tenant";
        $this->route = "tenants";
        $this->lang = "tenant";
        $this->setTitle(trans('menu.tenant'));
    }

    public function breadcrumb()
    {
        return $this->addBreadcrumb(trans('menu.tenant'), route($this->route . '.index'));
    }

    public function index()
    {
        $this->addBreadcrumb(trans('menu.tenant'));
        return view('pages.' . $this->folder . '.index', [
            'heads' => Heads::heads(),
        ]);
    }

    public function create()
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.create'));

        $plans = SubscriptionPlan::all();

        return view('pages.' . $this->folder . '.create', [
            'heads' => Heads::heads(),
            'plans' => $plans,
        ]);
    }

    public function store(Request $request)
    {
        $this->service->create(Dto::fromRequest($request));
        $this->success(trans('alert.create'), trans($this->lang . '.created'));
        return redirect()->route($this->route . '.index');
    }

    public function show(Tenant $tenant)
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.update'));
        return view('pages.' . $this->folder . '.edit', [
            'data' => $tenant,
            'heads' => Heads::heads(),
        ]);
    }

    public function update(Tenant $tenant, Request $request)
    {
        $this->service->update(
            $tenant,
            Dto::fromRequest($request)
        );
        $this->success(trans('alert.update'), trans($this->lang . '.updated'));
        return redirect()->route($this->route . '.index');
    }

    public function delete(Tenant $tenant)
    {
        $this->service->delete($tenant);
        $this->success(trans('alert.delete'), trans($this->lang . '.deleted'));
        return redirect()->route($this->route . '.index');
    }

    public function import(HttpRequest $request)
    {
        $this->excelService->import($request, Tenant::class, Heads::heads());
        $this->success(trans('alert.import'), trans($this->lang . '.imported'));
        return redirect()->route($this->route . '.index');
    }
}