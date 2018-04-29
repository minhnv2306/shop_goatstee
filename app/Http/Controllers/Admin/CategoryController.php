<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    protected $cateRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->cateRepository = $categoryRepository;
    }

    public function index()
    {
        $attribute = [
            'name',
            'id',
        ];
        $categories = $this->cateRepository->getAll($attribute);

        return view('admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        try {
            $data = $request->only('name');
            $this->cateRepository->create($data);

            return redirect()->route('categories.index')
                ->with('message', trans('admin.category.success_add'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('categories.index')
                ->with('error', trans('admin.category.error'));
        }
    }

    public function update(Category $category, CategoryRequest $request)
    {
        try {
            $data = $request->only('name');
            $this->cateRepository->update($category, $data);

            return redirect()->route('categories.index')
                ->with('message', trans('admin.category.success_update'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('categories.index')
                ->with('error', trans('admin.category.error'));
        }
    }

    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            $this->cateRepository->delele($category);
            DB::commit();

            return redirect()->route('categories.index')
                ->with('message', trans('admin.category.success_delete'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());
            DB::rollback();

            return redirect()->route('categories.index')
                ->with('error', trans('admin.category.error'));
        }
    }
}
