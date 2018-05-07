<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Models\StoreProduct;
use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SizeRepository;
use App\Repositories\StoreProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function store(ProductRequest $request)
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

            /**
             * Step 1: Save images
             */
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

            /**
             * Step 2: Save store product
             */
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

    public function show(Product $product)
    {
        $attribute = [
            'id',
            'name',
        ];
        $categories = $this->cateRepository->getCategoryHasSize($attribute);
        $sizes = empty($categories) ? [] : $this->sizeRepository->getSizeOfCategory($product->category->id);
        $avatar = $this->productRepository->getAvatar($product);
        $images = $this->productRepository->getDescriptionImages($product);

        return view('admin.product.show', [
            'product' => $product,
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $this->colorRepository->getAll($attribute),
            'types' => $this->productRepository->getTypeProduct(),
            'avatar' => $avatar,
            'images' => $images,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
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
            $this->productRepository->update($product, $data);

            /**
             * Step 1: Update images
             */
            // Update avatar
            if (!empty($request->avatar)) {
                $path = $request->file('avatar')->store(config('app.image_path') . $product->id);
                $dataImage = [
                    'link' => $path,
                ];
                $this->imageRepository->update($this->imageRepository->getImage($request->avatar_image_id), $dataImage);
            }

            // Update description image
            for ($i = 1; $i <= Product::IMAGE_NUMBER; $i++) {
                $index = 'image_' . $i;
                $image_id = 'image_' . $i . '_id';

                // If form has file images, update it
                if (!empty($request[$index])) {
                    $path = $request->file($index)->store(config('app.image_path'). $product->id);
                    $dataImage = [
                        'link' => $path,
                        'imageable_type' => Product::IMAGE_DESCRIPTION,
                        'imageable_id' => $product->id,
                    ];

                    // Create or update image (base on image_id - hidden field from form)
                    if (!empty($request[$image_id])) {
                        $imageModel = $this->imageRepository->getImage($request[$image_id]);
                        $this->imageRepository->update($imageModel, $dataImage);
                    } else {
                        $this->imageRepository->create($dataImage);
                    }
                }
            }

            /**
             * Step 2: Update store product
             */
            // Delete store product
            $storeProductsItems = $this->productRepository->getAllStoreProducts($product);
            $storeIdsForm = empty($request->store_ids) ? [] : $request->store_ids;
            foreach ($storeProductsItems as $storeProductsItem) {
                if (!in_array($storeProductsItem->id, $storeIdsForm)) {
                    $this->storeProductRepository->delele($storeProductsItem);
                }
            }

            // Create new store product or update (base on store_ids - hidden field from form)
            for ($j = 0; $j < count($request->sizes); $j++) {
                $storeIds = 'store_ids';
                $dataStoreItem =  [
                    'product_id' => $product->id,
                    'color_id' => $request->colors[$j],
                    'number' => $request->numbers[$j],
                    'sale_number' => 0,
                    'size_id' => $request->sizes[$j],
                    'sex' => $request->sex[$j],
                ];
                if (empty($request[$storeIds][$j])) {
                    $this->storeProductRepository->create($dataStoreItem);
                } else {
                    $storeProductsModel = $this->storeProductRepository->getStorageProduct($request[$storeIds][$j]);
                    $this->storeProductRepository->update($storeProductsModel, $dataStoreItem);
                }
            }
            DB::commit();

            return redirect()->back()->with('message', trans('admin.product.success_update'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());
            DB::rollback();

            return redirect()->back()->with('message', trans('admin.product.error_update'));
        }
    }

    public function destroy(Product $product)
    {
        try {
            $this->productRepository->delele($product);
            return redirect()->route('products.index')
                ->with('message', trans('admin.product.success_delete'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->back()->with('message', trans('admin.product.error_delete'));
        }
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
