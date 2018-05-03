<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SizeRepository;
use App\Repositories\StoreProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    protected $cateRepository;
    protected $colorRepository;
    protected $sizeRepository;
    protected $productRepository;
    protected $imageRepository;
    protected $storeProductRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ColorRepository $colorRepository,
        SizeRepository $sizeRepository,
        ProductRepository $productRepository,
        ImageRepository $imageRepository,
        StoreProductRepository $storeProductRepository
    ) {
        $this->cateRepository = $categoryRepository;
        $this->sizeRepository = $sizeRepository;
        $this->colorRepository = $colorRepository;
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
        $this->storeProductRepository = $storeProductRepository;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function ajaxServerDataTable()
    {
        $attribute = [
            'id',
            'name',
            'price',
            'category_id',
            'note_1',
            'note_2',
            'note_3',
        ];
        $products = $this->productRepository->getAll($attribute);

        return DataTables::of($products)
            ->addColumn('images', function ($product) {
                return view('admin.product.images', [
                    'product' => $product,
                    'images' => $this->productRepository->getAllImages($product),
                ])->render();
            })
            ->editColumn('category_id', function ($product) {
                return $product->category->name;
            })
            ->addColumn('action', function ($product) {
                return view('admin.product.action', ['product' => $product])->render();
            })
            ->removeColumn('note_1')
            ->removeColumn('note_2')
            ->removeColumn('note_3')
            ->addColumn('note', function ($product) {
                return view('admin.product.note', ['product' => $product])->render();
            })
            ->rawColumns([
                'action',
                'avatar',
                'note',
                'images',
            ])
            ->make();
    }

    public function create()
    {
        $attribute = [
            'id',
            'name',
        ];
        $categories = $this->cateRepository->getCategoryHasSize($attribute);
        $sizes = empty($categories) ? [] : $this->sizeRepository->getSizeOfCategory($categories[0]->id);

        return view('admin.product.create', [
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $this->colorRepository->getAll($attribute),
            'types' => $this->productRepository->getTypeProduct(),
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->only([
                'name',
                'category_id',
                'price',
                'made_in',
                'washing',
                'note_1',
                'note_2',
                'note_3',
            ]);
            $product = $this->productRepository->create($data);

            // Save image
            if (!empty($request->avatar)) {
                $path = $request->file('avatar')->store(config('app.image_path') . $product->id);
                $dataImage = [
                    'link' => $path,
                    'imageable_type' => Product::IMAGE_AVATAR,
                    'imageable_id' => $product->id,
                ];
                $this->imageRepository->create($dataImage);
            }
            for ($i = 1; $i <= Product::IMAGE_NUMBER; $i++) {
                $index = 'image_' . $i;
                if (!empty($request[$index])) {
                    $path = $request->file($index)->store(config('app.image_path'). $product->id);
                    $dataImage = [
                        'link' => $path,
                        'imageable_type' => Product::IMAGE_DESCRIPTION,
                        'imageable_id' => $product->id,
                    ];
                    $this->imageRepository->create($dataImage);
                }
            }

            // Save store product
            $dataStores = [];
            for ($j = 0; $j < count($request->sizes); $j++) {
                $dataStoreItem =  [
                    'color_id' => $request->colors[$j],
                    'number' => $request->numbers[$j],
                    'sale_number' => 0,
                    'size_id' => $request->sizes[$j],
                    'sex' => $request->sex[$j],
                ];
                array_push($dataStores, $dataStoreItem);
            }
            $this->productRepository->createMany($product, $dataStores);
            DB::commit();

            return redirect()->route('products.index')
                ->with('message', trans('admin.product.success_add'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());
            DB::rollback();

            return redirect()->route('products.index')
                ->with('message', trans('admin.product.error_add'));
        }
    }

    public function show()
    {
        return view('admin.product.show');
    }

    public function addProduct($categoryId)
    {
        $attribute = [
            'id',
            'name',
        ];
        $sizes = $this->sizeRepository->getSizeOfCategory($categoryId);

        return view('admin.product.add-product', [
            'sizes' => $sizes,
            'colors' => $this->colorRepository->getAll($attribute),
        ]);
    }
}
