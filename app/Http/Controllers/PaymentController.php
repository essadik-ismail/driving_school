<?php

namespace App\Http\Controllers;

//dto & Edir consult
use App\DTO\PaymentDto as Dto;
use App\EditConsult\PaymentEditConsult as EditConsult;

//data and the logic
use App\Models\Payment as ModelTarget;
use App\Models\Payment;
use App\Services\PaymentService as Sercice;
use App\Http\Requests\PaymentRequest as ModelRequest;

//required dependencies
use App\View\Components\Group\BreadCrumbItem;
use App\Http\Controllers\Controller;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public $folder;
    public $route;
    public $langue;
    public function __construct(private Sercice $service)
    {
        $this->folder = "payments";
        $this->route = "payments";
        $this->langue = "payments";
    }

    public function BreadCrumb()
    {
        return [
            new BreadCrumbItem(trans('app.home'), 'dashboard'),
            new BreadCrumbItem(trans($this->langue . '.page_index.page_title'), route($this->route . '.index'))
        ];
    }

    public function index()
    {
        $this->setPageTitle(trans($this->langue . '.page_index.page_title'));
        $this->setPageBreadCrumb($this->BreadCrumb());
        return view('pages.' . $this->folder . '.index', [
            'actions' => EditConsult::actions(),
            'heads' => EditConsult::heads(),
            'data' => ModelTarget::all(),
        ]);
    }

    public function create()
    {
        $this->setPageBreadCrumb([...$this->BreadCrumb(), new BreadCrumbItem('create')]);
        $this->setPageTitle(trans($this->langue . '.page_index.page_title'));

        return view("pages." . $this->folder . ".create", [
            'actions' => EditConsult::actions(),
        ]);
    }

    public function destroy(Payment $payment)
    {
        $this->service->delete(
            $payment
        );
        $this->success(__('app.done'), __($this->langue . '.deleted_notification'));
        return redirect()->route($this->route  . '.index');
    }

    public function destroyGroup(Request $request)
    {
        $this->service->deleteFromArrayOfIds(
            $request->get('ids')
        );
        $this->success(__('app.delete'), __($this->langue . '.selected_deleted_notification'));
    }

    public function store(ModelRequest $request)
    {
        $data = $this->service->create(
            Dto::fromRequest($request)
        );
        $this->success(__('app.create'), __($this->langue . '.created_notification'));
        return redirect()->route($this->route  . '.index');
    }

    public function update(ModelRequest $request, Payment $payment)
    {
        $this->service->update(
            $payment,
            Dto::fromRequest($request)
        );
        $this->success(__('app.update'), __($this->langue . '.updated_notification'));
        return redirect()->route($this->route  . '.index');
    }
}