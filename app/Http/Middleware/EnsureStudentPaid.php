<?php

namespace App\Http\Middleware;

use App\Payment;
use Closure;
use Session;

class EnsureStudentPaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Session::forget('error');

        if ($request->route()->id != null) {
            $paid = Payment::where('User_id', $request->user()->id)->where('Course_id', $request->route()->id)->whereDate('P_date', '>=', now()->subMonths(1))->exists();
            $isExpired = Payment::where('User_id', $request->user()->id)->where('Course_id', $request->route()->id)->whereDate('P_date', '<', now()->subMonths(1))->exists();
        } else {
            $paid = Payment::where('User_id', $request->user()->id)->where('Course_id', 1)->whereDate('P_date', '>=', now()->subMonths(1))->exists();
            $isExpired = Payment::where('User_id', $request->user()->id)->where('Course_id', 1)->whereDate('P_date', '<', now()->subMonths(1))->exists();
        }
        $userRoles = $request->user()->roles == 'ROLE_STUDENT';
        if ($paid && $userRoles) {
            return $next($request);
        } elseif ($isExpired && $userRoles) {
            Session::put('error', 'Your subscription has expired!!, Please upgrade!!');
            return back();
        } elseif ($request->user()->roles == 'ROLE_ADMIN') {
            return $next($request);
        } else {
            Session::put('error', 'To access this lesson you have to pay first');
            return back();
        }
    }
}
