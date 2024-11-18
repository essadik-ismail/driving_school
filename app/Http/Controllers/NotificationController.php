<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\MyDatabaseNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $this->resetBreadcrumbs();
        $this->setTitle('Notifications');
        $this->addBreadcrumb('notifications');
        $notifications = Auth::user()->notifications()->paginate(10);
        return view('notification.index', [
            'notifications' => $notifications,
        ]);
    }

    public function addNotification(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'url' => 'required|url',
            // 'date' => 'required|date|after:today',
        ]);

        $data = [
            'message' => $request->input('message'),
            'url' => $request->input('url'),
            // 'date' => Carbon::parse($request->input('date')),
        ];

        Auth::user()->notify(new MyDatabaseNotification($data));

        return back()->with('success', 'Notification added successfully!');
    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
        }
        $this->success('Mark As Read', 'notification mark as read successfuly');
        return redirect()->back();
    }
}
