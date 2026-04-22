<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\HeroBannerService;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    protected $productService;
    protected $productCategoryService;
    protected $productVariantService;
    protected $heroBannerService;

    public function __construct(
        ProductService $productService,
        ProductCategoryService $productCategoryService,
        ProductVariantService $productVariantService,
        HeroBannerService $heroBannerService
    ) {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->productVariantService = $productVariantService;
        $this->heroBannerService = $heroBannerService;
    }

    public function frontEndPage(Request $request)
    {
        $productPageHeroBanners = $this->heroBannerService->getActiveProductPageHeroBanners();
        $nonCollaborationProducts = $this->productService->getIsCollaborationProducts(false);
        $collaborationProducts = $this->productService->getIsCollaborationProducts(true);

        $search     = trim((string) $request->query('q', ''));
        $categoryId = $request->query('category');
        $categories = ProductCategory::orderBy('name')->get();

        $filtered = null;
        if ($search !== '' || $categoryId) {
            $filtered = Product::with(['images', 'productCategory', 'variants'])
                ->when($search !== '', fn ($q) => $q->where('name', 'like', "%{$search}%"))
                ->when($categoryId, fn ($q) => $q->where('product_category_id', $categoryId))
                ->latest()
                ->paginate(12)
                ->withQueryString();
        }

        return view('pages.frontend.product', [
            'productPageHeroBanners'   => $productPageHeroBanners,
            'nonCollaborationProducts' => $nonCollaborationProducts,
            'collaborationProducts'    => $collaborationProducts,
            'categories'               => $categories,
            'search'                   => $search,
            'selectedCategoryId'       => $categoryId,
            'filteredProducts'         => $filtered,
        ]);
    }

    public function productDetailPage($productSlug)
    {
        $product = $this->productService->getProductBySlug($productSlug);
        $relatedProducts = $this->productService->getProducts();

        $reviews       = $product->approvedReviews()->latest()->get();
        $averageRating = $reviews->avg('rating');

        $data = [
            'product'         => $product,
            'relatedProducts' => $relatedProducts,
            'reviews'         => $reviews,
            'averageRating'   => $averageRating,
        ];

        return view('pages.frontend.productDetail', $data);
    }

    public function index(ProductDataTable $dataTable)
    {
        $title = 'Product List';

        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.product.index", $data);
    }

    public function show($productId)
    {
        $title = 'Product Detail.';
        $product = $this->productService->getProductById($productId);
        $productVariants = [];
        $productImages = [];

        foreach ($product->variants as $variant) {
            array_push($productVariants, $variant->name);
        }

        foreach ($product->images as $images) {
            array_push($productImages, $images);
        }

        $data = [
            'title' => $title,
            'product' => $product,
            'productVariants' => $productVariants,
            'productImages' => $productImages
        ];

        return view("pages.admin.product.show", $data);
    }

    public function create()
    {
        $title = 'Add New Product';
        $productCategories = $this->productCategoryService->getProductCategories();
        $productVariants = $this->productVariantService->getAllProductVariant();

        $data = [
            'title' => $title,
            'productCategories' => $productCategories,
            'productVariants' => $productVariants
        ];

        return view("pages.admin.product.create", $data);
    }

    public function store(ProductRequest $productRequest)
    {
        try {
            $productRequest = $productRequest->validated();

            $this->productService->storeProductData($productRequest);

            Alert::success('Success', 'Success Add Product');
            return redirect()->route('admin.products.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Failed to Add a Product');
            return redirect()->route('admin.products.create');
        }
    }

    public function edit($productId)
    {
        $title = 'Product Detail.';
        $product = $this->productService->getProductById($productId);
        $productCategories = $this->productCategoryService->getProductCategories();
        $productVariantSelections = $this->productVariantService->getAllProductVariant();
        $productVariants = [];
        $productImages = [];

        confirmDelete('Delete Product Image', 'are you sure you want to delete?');

        foreach ($product->variants as $variant) {
            array_push($productVariants, $variant->name);
        }

        foreach ($product->images as $images) {
            array_push($productImages, $images);
        }

        $data = [
            'title' => $title,
            'product' => $product,
            'productCategories' => $productCategories,
            'productVariantSelections' => $productVariantSelections,
            'productVariants' => $productVariants,
            'productImages' => $productImages
        ];

        return view("pages.admin.product.show", $data);
    }

    public function update(ProductUpdateRequest $productUpdateRequest, $productId)
    {
        $productData = $productUpdateRequest->validated();

        $this->productService->updateProduct($productId, $productData);
        Alert::success('Success', 'Success Edit Product');
        return redirect()->route('admin.products.index');
    }

    public function destroy($productId)
    {
        $this->productService->deleteProduct($productId);
        Alert::success('Success', 'Success Delete Product');
        return redirect()->route('admin.products.index');
    }

    public function deleteProductImage($productId, $productImageId)
    {
        $this->productService->deleteProductImage($productId, $productImageId);

        return redirect()->back();
    }
}
