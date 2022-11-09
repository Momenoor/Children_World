<?php

namespace App\Http\Controllers\Student;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Schedual;
use App\User;
use Carbon\Carbon;
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

        $scheduals = Schedual::with('grade')->whereBetween('date', [now()->startOfWeek(Carbon::SATURDAY), now()->endOfWeek(Carbon::TUESDAY)])->orderBy('date','ASC')->get();

        return view("pages.student.dashboard.index", compact('scheduals'));
    }
}
