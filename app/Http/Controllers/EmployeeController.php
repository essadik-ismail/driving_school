<?php

namespace App\Http\Controllers;

use App\DTO\EmployeeDto as Dto;
use App\Heads\EmployeeHeads as Heads;
use App\Http\Requests\EmployeeRequest as Request;
use App\Services\EmployeeService as Service;
use App\Models\Employee;
use App\Models\TenantJob;
use App\Services\ExcelService;
use Illuminate\Http\Request as HttpRequest;

class EmployeeController extends Controller
{
    public string $folder;
    public string $route;
    public string $lang;

    public function __construct(
        private Service $service,
        private ExcelService $excelService,
    ) {
        $this->folder = "employee";
        $this->route = "employees";
        $this->lang = "employee";
        $this->setTitle(trans('menu.employee'));
    }

    public function breadcrumb()
    {
        return $this->addBreadcrumb(trans('menu.employee'), route($this->route . '.index'));
    }

    public function index()
    {
        $this->addBreadcrumb(trans('menu.employee'));
        return view('pages.' . $this->folder . '.index', [
            'heads' => Heads::heads(),
        ]);
    }

    public function create()
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.create'));

        $tenantjobs = TenantJob::query()->where('tenant_id', tenant())->get();

        return view('pages.' . $this->folder . '.create', [
            'heads' => Heads::heads(),
            'tenantjobs' => $tenantjobs,
        ]);
    }

    public function store(Request $request)
    {
        $this->service->create(Dto::fromRequest($request));
        $this->success(trans('alert.create'), trans($this->lang . '.created'));
        return redirect()->route($this->route . '.index');
    }

    public function show(Employee $employee)
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.update'));
        return view('pages.' . $this->folder . '.edit', [
            'data' => $employee,
            'heads' => Heads::heads(),
        ]);
    }

    public function update(Employee $employee, Request $request)
    {
        $this->service->update(
            $employee,
            Dto::fromRequest($request)
        );
        $this->success(trans('alert.update'), trans($this->lang . '.updated'));
        return redirect()->route($this->route . '.index');
    }

    public function delete(Employee $employee)
    {
        $this->service->delete($employee);
        $this->success(trans('alert.delete'), trans($this->lang . '.deleted'));
        return redirect()->route($this->route . '.index');
    }

    public function import(HttpRequest $request)
    {
        $this->excelService->import($request, Employee::class, Heads::heads());
        $this->success(trans('alert.import'), trans($this->lang . '.imported'));
        return redirect()->route($this->route . '.index');
    }
}
