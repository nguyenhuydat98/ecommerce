<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\ProductInformation;
use App\Models\Product;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\ImportProductRequest;
use Auth;
use DB;
use Illuminate\Support\Facades\Gate;

class ImportProductController extends Controller
{
    public function getViewImportProduct($id)
    {
        if (Auth::guard('admin')->user()->role_id == config('setting.role.management') || Auth::guard('admin')->user()->role_id == config('setting.role.admin_product')) {
            $supplier = Supplier::findOrFail($id);
            $productInformations = ProductInformation::all();

            return view('admin.pages.import_product', compact('supplier', 'productInformations'));
        } else {
            abort(401);
        }

    }

    public function importProduct(ImportProductRequest $request, $id)
    {
        if (Auth::guard('admin')->user()->role_id == config('setting.role.management') || Auth::guard('admin')->user()->role_id == config('setting.role.admin_product')) {
            DB::beginTransaction();
            try {
                $supplier = Supplier::findOrFail($id);
                $product = Product::where('product_information_id', $request->product_information_id)
                    ->where('color_id', $request->color_id)
                    ->first();
                $supplier->products()->attach($product->id, [
                    'admin_id' => Auth::guard('admin')->id(),
                    'quantity' => $request->quantity,
                    'import_price' => $request->import_price,
                ]);
                $product->update([
                    'quantity' => $product->quantity + $request->quantity,
                ]);
                DB::commit();

                return redirect()->route('admin.listImportProduct')->with('success', 'Nhập hàng thành công');
            } catch (Exception $e) {
                DB::rollBack();

                return $e->getMessage();
            }
        } else {
            abort(401);
        }
    }

    public function listImportProduct()
    {
        if (Auth::guard('admin')->user()->role_id == config('setting.role.management') || Auth::guard('admin')->user()->role_id == config('setting.role.admin_product')) {
            $records = DB::table('product_supplier')->orderBy('created_at', 'desc')->get();
            $listImport = [];
            foreach ($records as $record) {
                $admin = Admin::findOrFail($record->admin_id);
                $supplier = Supplier::findOrFail($record->supplier_id);
                $product = Product::findOrFail($record->product_id);
                array_push($listImport, [
                    'admin_name' => $admin->name,
                    'supplier_name' => $supplier->name,
                    'product_name' => $product->productInformation->name,
                    'color' => $product->color->name,
                    'quantity' => $record->quantity,
                    'import_price' => $record->import_price,
                    'created_at' => $record->created_at,
                ]);
            }

            return view('admin.pages.list_import', compact('listImport'));
        } else {
            abort(401);
        }
    }
}
