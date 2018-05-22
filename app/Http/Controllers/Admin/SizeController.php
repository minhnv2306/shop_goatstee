<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SizeRequest;
use App\Models\Size;
use App\Repositories\CategoryRepository;
use App\Repositories\SizeRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class SizeController extends Controller
{
    protected $sizeRepository;
    protected $cateRepository;

    public function __construct(SizeRepository $sizeRepository, CategoryRepository $categoryRepository)
    {
        $this->sizeRepository = $sizeRepository;
        $this->cateRepository = $categoryRepository;
    }

    public function index()
    {
        $this->authorize('view', Size::class);

        $attribute = [
            'name',
            'id',
        ];

        // If category is empty, init size is empty
        $categories = $this->cateRepository->getAll($attribute);
        if ($categories->isEmpty()) {
            $categories = [];
            $sizes = [];
        } else {
            $sizes = $categories[0]->sizes;
        }

        return view('admin.size.index', [
            'categories' => $categories,
            'sizes' => $sizes,
        ]);
    }

    public function store(SizeRequest $request)
    {
        $this->authorize('store', Size::class);

        try {
            $data = $request->only('name', 'category_id');
            $this->sizeRepository->create($data);

            return redirect()->route('sizes.index')
                ->with('message', trans('admin.size.success_add'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('colors.index')
                ->with('error', trans('admin.size.error'));
        }
    }

    public function update(SizeRequest $request, Size $size)
    {
        $this->authorize('update', Size::class);

        try {
            $data = $request->only('name');
            $this->sizeRepository->update($size, $data);

            return redirect()->route('sizes.index')
                ->with('message', trans('admin.size.success_update'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('sizes.index')
                ->with('error', trans('admin.size.error'));
        }
    }

    public function destroy(Size $size)
    {
        try {
            if ($this->sizeRepository->delele($size)) {
                return redirect()->route('sizes.index')
                    ->with('message', trans('admin.size.success_delete'));
            } else {
                return redirect()->route('sizes.index')
                    ->with('error', trans('admin.size.error_delete'));
            }
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('sizes.index')
                ->with('error', trans('admin.size.error_delete'));
        }
    }

    /**
     * Get a view contains all size of a category
     * @param $category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSizeOfCategory($categoryId)
    {
        return view('admin.size.size-of-category', [
            'sizes' => $this->sizeRepository->getSizeOfCategory($categoryId),
        ]);
    }
}
