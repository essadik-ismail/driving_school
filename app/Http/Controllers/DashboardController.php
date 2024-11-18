<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * Display dashbnoard demo one of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->resetBreadcrumbs();
        // $this->setTitle('')
        $title = "Dashboard Demo One";
        $description = "Some description for the page";
        return view('dashboard.demo_one', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo two of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function demoTwo()
    {
        $title = "Dashboard Demo Two";
        $description = "Some description for the page";
        return view('dashboard.demo_two', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo three of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function demoThree()
    {
        $title = "Dashboard Demo Three";
        $description = "Some description for the page";
        return view('dashboard.demo_three', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo four of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function demoFour()
    {
        $title = "Dashboard Demo Four";
        $description = "Some description for the page";
        return view('dashboard.demo_four', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo five of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function demoFive()
    {
        $title = "Dashboard Demo Five";
        $description = "Some description for the page";
        return view('dashboard.demo_five', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo six of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function demoSix()
    {
        $title = "Dashboard Demo Six";
        $description = "Some description for the page";
        return view('dashboard.demo_six', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo seven of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function demoSeven()
    {
        $title = "Dashboard Demo Seven";
        $description = "Some description for the page";
        return view('dashboard.demo_seven', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo eight of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function demoEight()
    {
        $title = "Dashboard Demo Eight";
        $description = "Some description for the page";
        return view('dashboard.demo_eight', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo nine of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function demoNine()
    {
        $title = "Dashboard Demo Nine";
        $description = "Some description for the page";
        return view('dashboard.demo_nine', compact('title', 'description'));
    }

    /**
     * Display dashbnoard demo ten of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function demoTen()
    {
        $title = "Dashboard Demo Ten";
        $description = "Some description for the page";
        return view('dashboard.demo_ten', compact('title', 'description'));
    }
}
