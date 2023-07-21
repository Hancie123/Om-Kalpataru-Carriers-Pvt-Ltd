<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityModel;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class activitycontroller extends Controller
{
    public function activity(){



$activity = ActivityModel::orderBy('activity_id', 'desc')
    ->paginate(15); // 10 items per page
        return view('admin/activity_logs',compact('activity'));
    }
}
