<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class ChangelogController extends Controller {
    
    /**
     * Display changelog of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($lang){
        if (! in_array($lang, ['en', 'fr', 'ar'])) {
            abort(400);
        }
        session()->put('locale', $lang);
        App::setLocale($lang);
        return redirect()->back();
    }
}