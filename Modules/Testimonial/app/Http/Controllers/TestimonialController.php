<?php

namespace Modules\Testimonial\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Testimonial\app\Models\Testimonial;
use Modules\Testimonial\app\Http\Requests\TestimonialCreateRequest;
use Modules\Testimonial\app\Http\Requests\TestimonialUpdateRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Testimonial::all();
		return view('testimonial::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonial::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialCreateRequest $request): RedirectResponse
	{
		$data = new Testimonial();
		$data->name = $request->name;
		$data->title = $request->title;
		$data->review = $request->review;
		$data->status = $request->status;
		$data->save();
		return redirect()->route('admin.testimonial.index');
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
        $data = Testimonial::findOrFail($id);
		return view('testimonial::edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialUpdateRequest $request, $id): RedirectResponse
	{
		$data = Testimonial::findOrFail($id);
		$data->name = $request->name;
		$data->title = $request->title;
		$data->review = $request->review;
		$data->status = $request->status;
		$data->save();
		return redirect()->route('admin.testimonial.index');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Testimonial::findOrFail($id);
		$data->delete();
		return redirect()->route('admin.testimonial.index');
    }
}
