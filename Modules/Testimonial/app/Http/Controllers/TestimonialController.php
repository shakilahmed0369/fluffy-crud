<?php

namespace Modules\Testimonial\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Models\Language;
use Modules\Language\app\Traits\GenerateTranslationTrait;
use Modules\Testimonial\app\Http\Requests\TestimonialRequest;
use Modules\Testimonial\app\Models\Testimonial;

class TestimonialController extends Controller
{
    use RedirectHelperTrait, GenerateTranslationTrait;

    public function index()
    {
        abort_unless(checkAdminHasPermission('testimonial.view'), 403);
        Paginator::useBootstrap();
        $testimonials = Testimonial::with('translation')->paginate(15);
        return view('testimonial::index', compact('testimonials'));
    }

    public function create()
    {
        abort_unless(checkAdminHasPermission('testimonial.create'), 403);
        return view('testimonial::create');
    }

    public function store(TestimonialRequest $request)
    {
        abort_unless(checkAdminHasPermission('testimonial.store'), 403);

        $testimonial = Testimonial::create($request->validated());

        if ($testimonial && $request->hasFile('image')) {
            $file_name = file_upload($request->image, $testimonial->image, 'uploads/custom-images/');
            $testimonial->image = $file_name;
            $testimonial->save();
        }

        $languages = allLanguages();

        $this->generateTranslations(
            TranslationModels::Testimonial,
            $testimonial,
            'testimonial_id',
            $request,
        );

        return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.testimonial.edit', ['testimonial' => $testimonial->id, 'code' => $languages->first()->code]);
    }

    public function show($id)
    {
        abort_unless(checkAdminHasPermission('testimonial.view'), 403);
        return view('testimonial::show');
    }

    public function edit($id)
    {
        abort_unless(checkAdminHasPermission('testimonial.edit'), 403);
        $code = request('code') ?? getSessionLanguage();
        abort_unless(Language::where('code', $code)->exists(), 404);

        $testimonial = Testimonial::findOrFail($id);
        $languages = allLanguages();
        return view('testimonial::edit', compact('testimonial', 'code', 'languages'));
    }

    public function update(TestimonialRequest $request, $id)
    {
        abort_unless(checkAdminHasPermission('testimonial.update'), 403);

        $testimonial = Testimonial::findOrFail($id);

        $validatedData = $request->validated();

        $testimonial->update($validatedData);

        if ($testimonial && $request->hasFile('image')) {
            $file_name = file_upload($request->image, $testimonial->image, 'uploads/custom-images/');
            $testimonial->image = $file_name;
            $testimonial->save();
        }

        $this->updateTranslations(
            $testimonial,
            $request,
            $validatedData,
        );

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.testimonial.edit', ['testimonial' => $testimonial->id, 'code' => $request->code]);
    }

    public function destroy($id)
    {
        abort_unless(checkAdminHasPermission('testimonial.delete'), 403);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->translations()->each(function ($translation) {
            $translation->testimonial()->dissociate();
            $translation->delete();
        });

        if ($testimonial->image) {
            if (File::exists(public_path($testimonial->image))) @unlink(public_path($testimonial->image));
        }
        $testimonial->delete();

        return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.testimonial.index');
    }

    public function statusUpdate($id)
    {
        abort_unless(checkAdminHasPermission('testimonial.update'), 403);
        $testimonial = Testimonial::find($id);
        $status = $testimonial->status == 1 ? 0 : 1;
        $testimonial->update(['status' => $status]);

        $notification = trans('admin_validation.Updated Successfully');

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }
}
