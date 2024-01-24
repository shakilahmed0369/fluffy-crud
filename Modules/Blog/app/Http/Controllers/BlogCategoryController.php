<?php

namespace Modules\Blog\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\Paginator;
use Modules\Blog\app\Http\Requests\CategoryRequest;
use Modules\Blog\app\Models\BlogCategory;
use Modules\Blog\app\Models\BlogCategoryTranslation;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Models\Language;
use Modules\Language\App\Traits\GenerateTranslationTrait;

class BlogCategoryController extends Controller
{
    use RedirectHelperTrait, GenerateTranslationTrait;

    public function index()
    {
        abort_unless(checkAdminHasPermission('blog.category.view'), 403);

        Paginator::useBootstrap();

        $categories = BlogCategory::paginate(15);

        return view('blog::Category.index', ['categories' => $categories]);
    }

    public function create()
    {
        abort_unless(checkAdminHasPermission('blog.category.create'), 403);
        return view('blog::Category.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        abort_unless(checkAdminHasPermission('blog.category.store'), 403);
        $category = BlogCategory::create($request->validated());

        $languages = Language::all();

        $this->generateTranslations(
            TranslationModels::BlogCategory,
            $category,
            'blog_category_id',
            $request,
        );

        return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.blog-category.edit', ['blog_category' => $category->id, 'code' => $languages->first()->code]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        abort_unless(checkAdminHasPermission('blog.category.view'), 403);
        return view('blog::category.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_unless(checkAdminHasPermission('blog.category.edit'), 403);
        $code = request('code') ?? getSessionLanguage();
        if (!Language::where('code', $code)->exists()) {
            abort(404);
        }
        $category = BlogCategory::findOrFail($id);
        $languages = allLanguages();
        return view('blog::category.edit', compact('category', 'code', 'languages'));
    }

    public function update(CategoryRequest $request, BlogCategory $blog_category)
    {
        abort_unless(checkAdminHasPermission('blog.category.update'), 403);
        $validatedData = $request->validated();

        $blog_category->update($validatedData);

        $this->updateTranslations(
            $blog_category,
            $request,
            $validatedData,
        );

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.blog-category.edit', ['blog_category' => $blog_category->id, 'code' => $request->code]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        abort_unless(checkAdminHasPermission('blog.category.delete'), 403);
        $blogCategory->translations()->each(function ($translation) {
            $translation->category()->dissociate();
            $translation->delete();
        });

        $blogCategory->delete();

        return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.blog-category.index');
    }

    public function statusUpdate($id)
    {
        abort_unless(checkAdminHasPermission('blog.category.update'), 403);
        $blogCategory = BlogCategory::find($id);
        $status = $blogCategory->status == 1 ? 0 : 1;
        $blogCategory->update(['status' => $status]);

        $notification = trans('admin_validation.Updated Successfully');

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }
}
