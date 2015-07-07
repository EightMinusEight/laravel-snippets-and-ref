<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class BasicController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//
		$basics = Basic::all();

		return view('basics.index', compact('basics'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('basics.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests $request) {
		//$basic = new Basic();

		$input = $request->all();

		$basic = Basic::create($input);

		$basic->save();

		return redirect()->route('basics.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$basic = Basic::findOrFail($id);

		return view('basics.show', compact('basic'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$basic = Basic::findOrFail($id);

		return view('basics.edit', compact('basic'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int     $id
	 * @param Requests $request
	 *
	 * @return Response
	 */
	public function update($id, Requests $request) {
		$basic = Basic::findOrFail($id);

		$basic->fill($request->all());

		$basic->save();

		return redirect()->route('basics.index')->with('message', 'Item updated successfully.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$basic = Basic::findOrFail($id);

		$basic->delete();

		return redirect()->route('basics.index')->with('message', 'Item deleted successfully.');
	}
}
