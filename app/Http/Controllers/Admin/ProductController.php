<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use DB;
use Auth;

class ProductController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if (Auth::guard('admin')->user()->can('create', Product::class)) {
            $products = Product::where('product_information_id', $request->product_information_id)->get();
            foreach ($products as $product) {
                if ($product->color_id == $request->color_id) {
                    return redirect()->back()->with('error_color', 'Thất bại! Loại sản phẩm đã tồn tại');
                }
            }
            DB::beginTransaction();
            try {
                $product = Product::create([
                    'product_information_id' => $request->product_information_id,
                    'color_id' => $request->color_id,
                    'quantity' => 0,
                    'unit_price' => $request->unit_price,
                ]);
                foreach ($request->file('images') as $file) {
                    Image::create([
                        'product_id' => $product->id,
                        'image_link' => 'storage/' . $file->getClientOriginalName(),
                    ]);
                    $file->move('storage', $file->getClientOriginalName());
                }
                DB::commit();

                return redirect()->back()->with('done', 'Thao tác thành công!');
            } catch (Exception $e) {
                DB::rollBack();

                return $e->getMessage();
            }
        } else {
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        if (Auth::guard('admin')->user()->can('update', Product::class)) {
            $product = Product::findOrFail($id);
            $product->update([
                'unit_price' => $request->unit_price,
            ]);

            return redirect()->back()->with('done', 'Thao tác thành công!');
        } else {
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->can('delete', Product::class)) {
            DB::beginTransaction();
            try {
                $product = Product::findOrFail($id);
                $product->delete();
                foreach ($product->images as $image) {
                    $image->delete();
                }
                DB::commit();

                return redirect()->back()->with('done', 'Thao tác thành công!');
            } catch (Exception $e) {
                DB::rollBack();

                return $e->getMessage();
            }
        } else {
            abort(401);
        }
    }
}
