<?php

namespace Modules\PageBuilder\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Traits\RedirectHelperTrait;
use App\Http\Controllers\Controller;
use Modules\PageBuilder\app\Http\Requests\PageRequest;
use Modules\PageBuilder\app\Models\CustomizeablePage;
use Modules\PageBuilder\app\Models\PageItemComponents;

class CustomizeablePageController extends Controller
{
    use RedirectHelperTrait;
    public function index()
    {
        abort_unless(checkAdminHasPermission('page.view'), 403);
        $pages = CustomizeablePage::withCount('items')->paginate(20);
        return view('pagebuilder::pages.index', ['pages' => $pages]);
    }

    public function edit($id)
    {
        abort_unless(checkAdminHasPermission('page.edit'), 403);
        $components = PageItemComponents::all();
        $page = CustomizeablePage::with('items.component')->findOrFail($id);
        return view('pagebuilder::pages.edit', compact('page', 'components'));
    }

    public function update(PageRequest $request, $id)
    {
        abort_unless(checkAdminHasPermission('page.update'), 403);
        $page = CustomizeablePage::findOrFail($id);
        $page->fill($request->validated());
        $page->save();

        return $this->redirectWithMessage(RedirectType::UPDATE->value);
    }

    public function destroy($id)
    {
        abort_unless(checkAdminHasPermission('page.delete'), 403);
        return $this->redirectWithMessage(RedirectType::ERROR->value);
    }

    public function statusUpdate($id)
    {
        if (checkAdminHasPermission('page.update')) {
            $pageItem = CustomizeablePage::find($id);
            $status = $pageItem->status == 1 ? 0 : 1;
            $pageItem->update(['status' => $status]);

            $notification = trans('admin_validation.Updated Successfully');

            return response()->json([
                'success' => true,
                'message' => $notification,
            ]);
        }
        return response()->json([
            'success' => false,
        ], 403);
    }
}
