<?php
 
class NetworkController extends \BaseController {
 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		// get all the networks
		$networks = Network::all();
		// $networks = Network::where('uid', '=', $id)->get();
		// load the view and pass the networks
		return View::make('networks.index')->with('networks', $networks);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id='')
	{
		return View::make('networks.create')->with('un_id',$id);
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
			'n_ip'       => 'ip',
			'nid'       => 'numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('networks/create/'.Input::get('un_id'))
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$network = new Network;
			$network->un_id      = Input::get('un_id');
			$network->nid      = Input::get('nid');
			$network->n_name 	= Input::get('n_name');
			$network->n_ip 	= Input::get('n_ip');
			$network->n_status = Input::get('n_status');
			$network->save();

			// redirect
			Session::flash('message', 'Successfully created!');
			return Redirect::to('networks/'.Input::get('un_id'));
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
		
		// $networks = Network::all();
		$networks = Network::where('un_id', '=', $id)->get();
		return View::make('networks.show')->with(array('networks'=> $networks,'id'=>$id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			// get the Network
		$network = Network::find($id);

		// show the edit form and pass the Network
		return View::make('networks.edit')->with('network', $network);
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
			'n_ip'       => 'ip',
			'nid'       => 'numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('networks/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$network = Network::find($id);
			$network->un_id      = Input::get('un_id');
			$network->nid      = Input::get('nid');
			$network->n_name 	= Input::get('n_name');
			$network->n_ip 	= Input::get('n_ip');
			$network->n_status = Input::get('n_status');
			$network->save();

			// redirect
			Session::flash('message', 'Successfully updated!');
			return Redirect::to('networks/'.Input::get('un_id'));
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
		$network = Network::find($id);
		$uid	=	$network['un_id'];
		$network->delete();

		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('networks/'.$uid);
	}

}