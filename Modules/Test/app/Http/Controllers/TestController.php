<?php

namespace Modules\Test\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Test\app\Models\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = Test::all();
        return view('test:index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('test:create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = new Test();
		$data->category = $request->category;
		$data->slug = $request->slug;
		$data->status = $request->status;
		$data->description = $request->description;
		$data->save();

		return redirect()->route('test.index');
		
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('$EDIT_VIEW$');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
