<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Size;
use App\Models\Admin\Brand;
use App\Models\Admin\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\ProductColor;
use App\Models\Admin\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $parentCategories = Category::where('status', '1')->where('parent_id', '0')->get();
        $brands = Brand::where('status', '1')->get();
        $colors = Color::all();
        return view('admin.product.create', compact('parentCategories', 'brands', 'colors'));
    }

    public function store(ProductFormRequest $request)
    {

        $validated_data = $request->validated();
        $product = new Product();

        $product->category_id = $validated_data['category_id'] ?? NULL;
        $product->title_en = $validated_data['title_en'];
        $product->title_ar = $validated_data['title_ar'];

        $check = Product::where('slug', Str::slug($validated_data['title_en']))->exists();
        if ($check) {
            $product->slug = Str::slug($validated_data['title_en']) . '-' . Str::slug(Str::random(5));
        } else {
            $product->slug = Str::slug($validated_data['title_en']);
        }
        $product->brand = $validated_data['brand'] ?? NULL;
        $product->original_price = $validated_data['original_price'];
        $product->selling_price = $validated_data['selling_price'];
        $product->quantity = $validated_data['quantity'] ?? NULL;
        $product->small_desc_en = $validated_data['small_desc_en'];
        $product->long_desc_en = $validated_data['long_desc_en'] ?? NULL;
        $product->small_desc_ar = $validated_data['small_desc_ar'];
        $product->long_desc_ar = $validated_data['long_desc_ar'] ?? NULL;
        $product->meta_title = $validated_data['meta_title'] ?? $validated_data['title_en'];
        $product->trending = $request->trending ? '1' : '0';
        $product->featured = $request->featured ? '1' : '0';;
        $product->status = $request->status ? '1':  '0';
        $product->save();

        $i = 1;
        if ($request->hasFile('image')) {
            $path = 'uploads/products/';
            foreach($request->file('image') as $imgFile) {
                $ext = $imgFile->getClientOriginalExtension();
                $fileName = time() . $i++ . '.' . $ext;
                $imgFile->move($path, $fileName);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image'      => $path . $fileName,
                ]);
            }
        }

        if ($request->colors) {
            foreach($request->colors as $key => $color) {
                $product->productColors()->create([
                    'color_id' => $color,
                    'product_id' => $product->id,
                    'quantity' => $request->color_size_quantity[$key] ?? '0',
                ]);
            }
        }

        return redirect()->route('products.index')->with('success_msg', __('message.Data Added'));
    }

    public function edit(Product $product)
    {
        $parentCategories = Category::where('status', '1')->where('parent_id', '0')->get();
        $brands = Brand::where('status', '1')->get();
        $colors = Color::all();
        return view('admin.product.edit', compact('product', 'parentCategories', 'brands', 'colors'));
    }

    public function update(ProductFormRequest $request, Product $product)
    {
        $validated_data = $request->validated();

        $product->title_en = $validated_data['title_en'];
        $product->title_ar = $validated_data['title_ar'];
        $check = Product::where('slug', Str::slug($validated_data['title_en']))->exists();
        if ($check) {
            $product->slug = Str::slug($validated_data['title_en']) . '-' . Str::slug(Str::random(5));
        } else {
            $product->slug = Str::slug($validated_data['title_en']);
        }
        $product->category_id = $validated_data['category_id'] ?? NULL;
        $product->brand = $validated_data['brand'] ?? NULL;
        $product->original_price = $validated_data['original_price'];
        $product->selling_price = $validated_data['selling_price'];
        $product->quantity = $validated_data['quantity'] ?? NULL;
        $product->small_desc_en = $validated_data['small_desc_en'];
        $product->long_desc_en = $validated_data['long_desc_en'] ?? NULL;
        $product->small_desc_ar = $validated_data['small_desc_ar'];
        $product->long_desc_ar = $validated_data['long_desc_ar'] ?? NULL;
        $product->meta_title = $validated_data['meta_title'] ?? $validated_data['title_en'];
        $product->trending = $request->trending ? '1' : '0';
        $product->featured = $request->featured ? '1' : '0';;
        $product->status = $request->status ? '1':  '0';
        $product->update();

        $i = 1;
        if ($request->hasFile('image')) {
            $path = 'uploads/products/';
            foreach($request->file('image') as $imgFile) {
                $ext = $imgFile->getClientOriginalExtension();
                $fileName = time() . $i++ . '.' . $ext;
                $imgFile->move($path, $fileName);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image'      => $path . $fileName,
                ]);
            }
        }

        if ($request->colors) {
            foreach($request->colors as $key => $color) {
                $check = $product->productColors()->where('color_id', $color)->exists();
                if ($check) {
                    $product->productColors()->where('color_id', $color)->update([
                        'quantity' => $request->color_size_quantity[$key] ?? '0',
                    ]);
                } else {
                    $product->productColors()->create([
                        'color_id' => $color,
                        'product_id' => $product->id,
                        'quantity' => $request->color_size_quantity[$key] ?? '0',
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success_msg', __('message.Data Updated'));
    }

    public function removeImage($imageId)
    {
        $image = ProductImage::where('id', $imageId)->first();
        if ($image) {
            if (File::exists($image->image)) {
                File::delete($image->image);
            }
            ProductImage::where('id', $imageId)->delete();
            return redirect()->back()->with('success_msg', 'Image Removed Successfully');
        } else {
            return redirect()->back()->with('error_msg', __('message.Something Wrong'));
        }
    }

    public function updateProductColorQty(Request $request, $product_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
        ->productColors()->where('id', $product_color_id)->first();

        $productColorData->update([
            'quantity' => $request->qty,
        ]);

        return response()->json(['message' => 'Product Color Quantity Updated']);
    }

    public function deleteColorQty($product_color_id)
    {
        ProductColor::findOrFail($product_color_id)->delete();
    }

    public function destroy(Product $product)
    {
        if ($product) {
            if ($product->productImages()) {
                $productImages = ProductImage::where('product_id', $product->id)->get();
                foreach ($productImages as $imageItem) {
                    if (File::exists($imageItem->image)) {
                        File::delete($imageItem->image);
                    }
                }
                ProductImage::where('product_id', $product->id)->delete();
            }

            if ($product->productColors()) {
                ProductColor::where('product_id', $product->id)->delete();
            }

            $product->delete();
            return redirect()->route('products.index')->with('success_msg', __('message.Data Deleted'));
        } else {
            return redirect()->route('products.index')->with('error_msg', 'Something went wrong');
        }

    }
}
