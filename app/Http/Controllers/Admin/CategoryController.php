<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class CategoryController extends Controller
{
    protected $cateRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->cateRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->cateRepository->getAllCategory();

        return view('admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        try {
            $data = $request->only('name');
            $this->cateRepository->createNewCategory($data);

            return redirect()->route('categories.index')
                ->with('message', trans('admin.category.success_add'));
        } catch (Exception $ex) {
            return redirect()->route('categories.index')
                ->with('error', trans('admin.category.error'));
        }
    }

    public function update(Category $category, CategoryRequest $request)
    {
        try {
            $data = $request->only('name');
            $this->cateRepository->updateCategory($category, $data);

            return redirect()->route('categories.index')
                ->with('message', trans('admin.category.success_update'));
        } catch (Exception $ex) {
            return redirect()->route('categories.index')
                ->with('error', trans('admin.category.error'));
        }
    }

    public function destroy(Category $category)
    {
        try {
            $this->cateRepository->deleleCategory($category);

            return redirect()->route('categories.index')
                ->with('message', trans('admin.category.success_delete'));
        } catch (Exception $ex) {
            return redirect()->route('categories.index')
                ->with('error', trans('admin.category.error'));
        }
    }
}
