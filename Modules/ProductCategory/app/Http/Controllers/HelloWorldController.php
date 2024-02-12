<?php

namespace Modules\ProductCategory\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ProductCategory\app\Models\HelloWorld;
use Modules\ProductCategory\app\Http\Requests\HelloWorldCreateRequest;
use Modules\ProductCategory\app\Http\Requests\HelloWorldUpdateRequest;

class HelloWorldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HelloWorld::all();
		return view('productcategory::HelloWorld.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productcategory::HelloWorld.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HelloWorldCreateRequest $request): RedirectResponse
	{
		$data = new HelloWorld();
		$data->category = $request->category;
		$data->save();
		return redirect()->route('admin.hello-world.index');
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
        $data = HelloWorld::findOrFail($id);
		return view('productcategory::HelloWorld.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HelloWorldUpdateRequest $request, $id): RedirectResponse
	{
		$data = HelloWorld::findOrFail($id);
		$data->category = $request->category;
		$data->save();
		return redirect()->route('admin.hello-world.index');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = HelloWorld::findOrFail($id);
		$data->delete();
		return redirect()->route('admin.hello-world.index');
    }
}
