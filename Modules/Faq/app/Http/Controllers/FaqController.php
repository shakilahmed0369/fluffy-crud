<?php

namespace Modules\Faq\app\Http\Controllers;

use App\Enums\RedirectType;
use Modules\Faq\app\Models\Faq;
use App\Traits\RedirectHelperTrait;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Modules\Language\app\Models\Language;
use Modules\Faq\app\Http\Requests\FaqRequest;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class FaqController extends Controller
{
    use RedirectHelperTrait, GenerateTranslationTrait;

    public function index()
    {
        abort_unless(checkAdminHasPermission('faq.view'), 403);
        Paginator::useBootstrap();
        $faqs = Faq::with('translation')->paginate(15);
        return view('faq::index', compact('faqs'));
    }

    public function create()
    {
        abort_unless(checkAdminHasPermission('faq.create'), 403);
        return view('faq::create');
    }

    public function store(FaqRequest $request)
    {
        abort_unless(checkAdminHasPermission('faq.store'), 403);

        $faq = Faq::create($request->validated());

        $languages = allLanguages();

        $this->generateTranslations(
            TranslationModels::Faq,
            $faq,
            'faq_id',
            $request,
        );

        return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.faq.edit', ['faq' => $faq->id, 'code' => $languages->first()->code]);
    }

    public function show($id)
    {
        abort_unless(checkAdminHasPermission('faq.view'), 403);
        return view('faq::show');
    }

    public function edit($id)
    {
        abort_unless(checkAdminHasPermission('faq.edit'), 403);

        $code = request('code') ?? getSessionLanguage();

        abort_unless(Language::where('code', $code)->exists(), 404);

        $faq = Faq::with('translation')->findOrFail($id);
        $languages = allLanguages();
        return view('faq::edit', compact('faq', 'code', 'languages'));
    }

    public function update(FaqRequest $request, $id)
    {
        abort_unless(checkAdminHasPermission('faq.update'), 403);

        $faq = Faq::findOrFail($id);

        $validatedData = $request->validated();

        $faq->update($validatedData);

        $this->updateTranslations(
            $faq,
            $request,
            $validatedData,
        );

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.faq.edit', ['faq' => $faq->id, 'code' => $request->code]);
    }

    public function destroy($id)
    {
        abort_unless(checkAdminHasPermission('faq.delete'), 403);

        $faq = Faq::findOrFail($id);

        $faq->translations()->each(function ($translation) {
            $translation->faq()->dissociate();
            $translation->delete();
        });

        $faq->delete();

        return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.faq.index');
    }

    public function statusUpdate($id)
    {
        abort_unless(checkAdminHasPermission('faq.update'), 403);

        $faq = Faq::find($id);
        $status = $faq->status == 1 ? 0 : 1;
        $faq->update(['status' => $status]);

        $notification = trans('admin_validation.Updated Successfully');

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }
}
