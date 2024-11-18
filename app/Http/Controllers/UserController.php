<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    
    /**
     * Display user members of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $title = "User Members";
        $description = "Some description for the page";
        return view('pages.applications.user.member',compact('title','description'));
    }

    /**
     * Display user grid of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function grid(){
        $title = "User Grid";
        $description = "Some description for the page";
        return view('pages.applications.user.grid',compact('title','description'));
    }

    /**
     * Display user list of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function list(){
        $title = "User List";
        $description = "Some description for the page";
        return view('pages.applications.user.list',compact('title','description'));
    }

    /**
     * Display user grid style of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function gridStyle(){
        $title = "User Grid Style List";
        $description = "Some description for the page";
        return view('pages.applications.user.grid_style',compact('title','description'));
    }

    /**
     * Display user group of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function userGroup(){
        $title = "User Group List";
        $description = "Some description for the page";
        return view('pages.applications.user.user_group',compact('title','description'));
    }

    /**
     * Display user add of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function add(){
        $title = "User Add";
        $description = "Some description for the page";
        return view('pages.applications.user.add',compact('title','description'));
    }

    /**
     * Display user table of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function table(){
        $title = "User Data Table";
        $description = "Some description for the page";
        return view('pages.applications.user.data_table',compact('title','description'));
    }
}