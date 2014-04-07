<?php
 
class HostnameController extends \BaseController {
 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the hostnames
		$hostnames = Hostname::all();

		// load the view and pass the hostnames
		return View::make('hostnames.index')
			->with('hostnames', $hostnames);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id='')
	{
		return View::make('hostnames.create')->with('us_id',$id);
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
			'hostname'       => 'url'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('hostnames/create/'.Input::get('us_id'))
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$hostname = new Hostname;
			$hostname->us_id      = Input::get('us_id');
			$hostname->hostname = Input::get('hostname');
			$hostname->block 	= Input::get('block');
			$hostname->save();

			// redirect
			Session::flash('message', 'Successfully created!');
			return Redirect::to('hostnames/'.Input::get('us_id'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $hostnames = Hostname::all();
		$hostnames = Hostname::where('us_id', '=', $id)->get();
		// load the view and pass the hostnames
		return View::make('hostnames.show')->with(array('hostnames'=> $hostnames,'id'=>$id));
	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			// get the Hostname
		$hostname = Hostname::find($id);

		// show the edit form and pass the Hostname
		return View::make('hostnames.edit')->with('hostname', $hostname);
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
			'hostname'       => 'url'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('hostnames/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$hostname = Hostname::find($id);
			$hostname->us_id      = Input::get('us_id');
			$hostname->hostname = Input::get('hostname');
			$hostname->block 	= Input::get('block');
			$hostname->save();

			// redirect
			Session::flash('message', 'Successfully updated!');
			return Redirect::to('hostnames/'.Input::get('us_id'));
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
		$hostname = Hostname::find($id);
		$uid	=	$hostname['us_id'];
		$hostname->delete();

		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('hostnames/'.$uid);
	}

}