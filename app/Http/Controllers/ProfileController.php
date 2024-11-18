<?php

namespace App\Http\Controllers;

use App\DTO\TenantDto;
use App\Http\Requests\TenantRequest;
use App\Models\Tenant;
use App\Models\User;
use App\Services\TenentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct(
        private TenentService $tenentService
        ) 
    {}

    public function index(){
        return view('pages.profile.index');
    }

    public function getInvoice(){
        return view('pages.contracts.invoice');
    }

    public function profile(Request $request){
        User::query()->where('id', auth()->id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back();
    }

    public function pwd(Request $request){
        User::query()->where('id', auth()->id())->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back();
    }

    public function tenant(TenantRequest $tenantRequest){
        $this->tenentService->update(
            Tenant::find(tenant()),
            TenantDto::fromRequest($tenantRequest),
        );
        return redirect()->back();
    }

    public function invoice(Request $request){

    }
}
