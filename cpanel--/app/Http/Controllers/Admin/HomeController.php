<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Schedual;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $dashboard = strtolower(Auth::user()->role_key);

        $count = collect([
            'teachers' => User::where('role', User::TEACHER)->count(),
            'students' => User::where('role', User::STUDENT)->count(),
            'grades' => Grade::count(),
        ]);

        $scheduals = Schedual::with('grade')->whereDate('date', today())->get();

        return view("pages.admin.dashboard.{$dashboard}", compact('count', 'scheduals'));
    }
}
