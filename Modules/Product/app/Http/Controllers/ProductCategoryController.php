<?php

namespace Modules\Product\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Product\app\Models\ProductCategory;
use Modules\Product\app\Http\Requests\ProductCategoryCreateRequest;
use Modules\Product\app\Http\Requests\ProductCategoryUpdateRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProductCategory::all();
		return view('product::ProductCategory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product::ProductCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryCreateRequest $request): RedirectResponse
	{
		$data = new ProductCategory();
		$data->name = $request->name;
		$data->status = $request->status;
		$data->save();
		return redirect()->route('admin.product-category.index');
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
        $data = ProductCategory::findOrFail($id);
		return view('product::ProductCategory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryUpdateRequest $request, $id): RedirectResponse
	{
		$data = ProductCategory::findOrFail($id);
		$data->name = $request->name;
		$data->status = $request->status;
		$data->save();
		return redirect()->route('admin.product-category.index');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = ProductCategory::findOrFail($id);
		$data->delete();
		return redirect()->route('admin.product-category.index');
    }
}
