<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;

class AdminProfileController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    { 
        return view('admin.body.update_profile', [
            'request' => $request,
            'admin' => $request->user(),
        ]);
    }
}
