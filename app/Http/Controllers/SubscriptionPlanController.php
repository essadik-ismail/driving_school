<?php

namespace App\Http\Controllers;

use App\DTO\SubscriptionPlanDto as Dto;
use App\Heads\SubscriptionPlanHeads as Heads;
use App\Http\Requests\SubscriptionPlanRequest as Request;
use App\Services\SubscriptionPlanService as Service;
use App\Models\SubscriptionPlan;

use App\Services\ExcelService;
use Illuminate\Http\Request as HttpRequest;

class SubscriptionPlanController extends Controller
{
    public string $folder;
    public string $route;
    public string $lang;

    public function __construct(
        private Service $service,
        private ExcelService $excelService,
    ) {
        $this->folder = "subscriptionplan";
        $this->route = "subscriptionplans";
        $this->lang = "subscriptionplan";
        $this->setTitle(trans('menu.subscriptionplan'));
    }

    public function breadcrumb()
    {
        return $this->addBreadcrumb(trans('menu.subscriptionplan'), route($this->route . '.index'));
    }

    public function index()
    {
        $this->addBreadcrumb(trans('menu.subscriptionplan'));
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

    public function show(SubscriptionPlan $subscriptionPlan)
    {
        $this->breadcrumb()->addBreadcrumb(trans('app.update'));
        return view('pages.' . $this->folder . '.edit', [
            'data' => $subscriptionPlan,
            'heads' => Heads::heads(),
        ]);
    }

    public function update(SubscriptionPlan $subscriptionPlan, Request $request)
    {
        $this->service->update(
            $subscriptionPlan,
            Dto::fromRequest($request)
        );
        $this->success(trans('alert.update'), trans($this->lang . '.updated'));
        return redirect()->route($this->route . '.index');
    }

    public function delete(SubscriptionPlan $subscriptionPlan)
    {
        $this->service->delete($subscriptionPlan);
        $this->success(trans('alert.delete'), trans($this->lang . '.deleted'));
        return redirect()->route($this->route . '.index');
    }

    public function import(HttpRequest $request)
    {
        $this->excelService->import($request, SubscriptionPlan::class, Heads::heads());
        $this->success(trans('alert.import'), trans($this->lang . '.imported'));
        return redirect()->route($this->route . '.index');
    }
}
