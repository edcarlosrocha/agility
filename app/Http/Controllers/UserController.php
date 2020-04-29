<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function index()
    {
    	$users = UserService::index();
    	return view('home', ['users' => $users]);
    }

    public function filter(Request $request)
    {
    	$params = $request->only('filter');
    	$filter = strip_tags($params['filter']);

    	if (! empty($filter)) {
	    	$users  = UserService::filter($filter);
	    	return view('home', ['users' => $users, 'filter' => $filter]);
    	}

    	return $this->index();
    }
}
