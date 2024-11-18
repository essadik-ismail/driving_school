<?php

namespace App\Http\Controllers;

use App\DTO\CustomerDto as Dto;
use App\Heads\CustomerHeads as Heads;
use App\Http\Requests\CustomerRequest as Request;
use App\Services\CustomerService as Service;
use App\Models\Customer;

use App\Services\ExcelService;
use Illuminate\Http\Request as HttpRequest;

class CustomerController extends Controller
{
    public string $folder;
    public string $route;
    public string $lang;

    public function __construct(
        private Service $service,
        private ExcelService $excelService,
    ) {
        $this->folder = "customer";
        $this->route = "customers";
        $this->lang = "customer";
        $this->setTitle(trans('menu.customer'));
    }

    public function breadcrumb()
    {
        return $this->addBreadcrumb(trans('menu.customer'), route($this->route . '.index'));
    }

    public function index()
    {
        $this->addBreadcrumb(trans('menu.customer'));
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

    public function show(Customer $customer)
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.update'));
        return view('pages.' . $this->folder . '.edit', [
            'data' => $customer,
            'heads' => Heads::heads(),
        ]);
    }

    public function update(Customer $customer, Request $request)
    {
        $this->service->update(
            $customer,
            Dto::fromRequest($request)
        );
        $this->success(trans('alert.update'), trans($this->lang . '.updated'));
        return redirect()->route($this->route . '.index');
    }

    public function delete(Customer $customer)
    {
        $this->service->delete($customer);
        $this->success(trans('alert.delete'), trans($this->lang . '.deleted'));
        return redirect()->route($this->route . '.index');
    }

    public function import(HttpRequest $request)
    {
        $this->excelService->import($request, Customer::class, Heads::heads());
        $this->success(trans('alert.import'), trans($this->lang . '.imported'));
        return redirect()->route($this->route . '.index');
    }
}
