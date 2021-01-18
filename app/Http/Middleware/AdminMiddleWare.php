<?php

namespace App\Http\Middleware;

use App\Account;
use Closure;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd(session());
        if (session('current_account') !== null) {
            $current_account = Account::find(session('current_account')->id);
            $request->session()->put('current_account', $current_account);
            if (isset($current_account) && $current_account != NULL) {
                $role = $current_account->Role_id;
                if ($role > 1) {
                    return $next($request);
                }
            }
        }
        return redirect('/');
    }
}
