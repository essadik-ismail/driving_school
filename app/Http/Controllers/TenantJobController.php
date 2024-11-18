<?php

namespace App\Http\Controllers;

use App\DTO\TenantJobDto as Dto;
use App\Heads\TenantJobHeads as Heads;
use App\Http\Requests\TenantJobRequest as Request;
use App\Services\TenantJobService as Service;
use App\Models\TenantJob;

use App\Services\ExcelService;
use Illuminate\Http\Request as HttpRequest;

class TenantJobController extends Controller
{
    public string $folder;
    public string $route;
    public string $lang;

    public function __construct(
        private Service $service,
        private ExcelService $excelService,
    ) {
        $this->folder = "tenantJob";
        $this->route = "tenantjobs";
        $this->lang = "tenantJob";
        $this->setTitle(trans('menu.tenantJob'));
    }

    public function breadcrumb()
    {
        return $this->addBreadcrumb(trans('menu.tenantJob'), route($this->route . '.index'));
    }

    public function index()
    {
        $this->addBreadcrumb(trans('menu.tenantJob'));
        return view('pages.' . $this->folder . '.index', [
            'heads' => Heads::heads(),
        ]);
    }

    public function create()
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.create'));
        return view('pages.' . $this->folder . '.create', [
            'heads' => Heads::heads(),
        ]);
    }

    public function store(Request $request)
    {
        $this->service->create(Dto::fromRequest($request));
        $this->success(trans('alert.create'), trans($this->lang . '.created'));
        return redirect()->route($this->route . '.index');
    }

    public function show(TenantJob $tenantJob)
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.update'));
        return view('pages.' . $this->folder . '.edit', [
            'data' => $tenantJob,
            'heads' => Heads::heads(),
        ]);
    }

    public function update(TenantJob $tenantJob, Request $request)
    {
        $this->service->update(
            $tenantJob,
            Dto::fromRequest($request)
        );
        $this->success(trans('alert.update'), trans($this->lang . '.updated'));
        return redirect()->route($this->route . '.index');
    }

    public function delete(TenantJob $tenantJob)
    {
        $this->service->delete($tenantJob);
        $this->success(trans('alert.delete'), trans($this->lang . '.deleted'));
        return redirect()->route($this->route . '.index');
    }

    public function import(HttpRequest $request)
    {
        $this->excelService->import($request, TenantJob::class, Heads::heads());
        $this->success(trans('alert.import'), trans($this->lang . '.imported'));
        return redirect()->route($this->route . '.index');
    }
}
