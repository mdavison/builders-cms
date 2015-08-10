<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\User;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {

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
		$users = User::all();
        return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->validate($request, User::$rules);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        return redirect('users')->with('message', 'New user was created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);

        return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

        if (is_null($user))
        {
            return redirect('users');
        }

        return view('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        // Add exception to 'unique' for updating the current user
        User::$rules['email'] = 'required|email|unique:users,email,' . $id;

        // Password not required. Only add rules if they enter something.
        // Otherwise, password does not get changed
        $password = $request->get('password');
        if ( ! empty($password) ) {
            User::$rules['password'] = 'confirmed|min:4';
        } else {
            User::$rules['password'] = '';
        }

        $this->validate($request, User::$rules);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        // Only change the password if they entered something
        if ( ! empty($password) ) {
            $user->password = Hash::make($password);
        }
        $user->update();

        return redirect('users')->with('message', 'User was updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
        $user->delete();

        return redirect('users')->with('message', $user->name . ' was deleted.');
	}


}
