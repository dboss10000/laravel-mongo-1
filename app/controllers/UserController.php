<?php
 
class UserController extends \BaseController {
 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the users
		$users = User::all();
     // load the view and pass the users
		return View::make('users.index')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/users/create.blade.php)
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$rules = array(
			'uid'       => 'numeric|required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('users/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = new User;
			$user->uid      = Input::get('uid');
			$user->save();

			// redirect
			Session::flash('message', 'Successfully created!');
			return Redirect::to('users');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id='')
	{
		
		  $user = User::where('_id', '!=', $id)->with(array('networks', 'hostnames'))->get();
		if($id!='view'){
			$user = User::where('_id', '=', $id)->with(array('networks', 'hostnames'))->get();
		  }
		  
		$myArray=json_decode($user);

		foreach($myArray as $newArr){
			unset($newArr->created_at);
			unset($newArr->updated_at);
			foreach($newArr->networks as $newArr1){
				unset($newArr1->_id);
				unset($newArr1->un_id);
				unset($newArr1->created_at);
				unset($newArr1->updated_at);
			}
			foreach($newArr->hostnames as $newArr2){
				unset($newArr2->_id);
				unset($newArr2->us_id);
				unset($newArr2->created_at);
				unset($newArr2->updated_at);
			}
		}

		 $user	=json_encode($myArray);
		  return View::make('users.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			// get the user
		$user = User::find($id);

		// show the edit form and pass the user
		return View::make('users.edit')
			->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		$rules = array(
			'uid'       => 'numeric|required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('users/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = User::find($id);
			$user->uid      = Input::get('uid');
			$user->save();

			// redirect
			Session::flash('message', 'Successfully updated!');
			return Redirect::to('users');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$user = User::find($id);
		$user->delete();

		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('users');
	}

}