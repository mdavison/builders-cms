<?php namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$activities = Activity::with('user', 'subject')->latest()->limit(20)->get();

        $activities = Activity::with(['user', 'subject' => function($query){
            $query->withTrashed();
        }])->latest()->limit(10)->get();

        return view('admin', compact('activities'));
	}



}
