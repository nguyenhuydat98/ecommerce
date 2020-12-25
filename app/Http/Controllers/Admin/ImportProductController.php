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
use Session;

class ImportProductController extends Controller
{
    public function getViewImportProduct($id)
    {
        if (Auth::guard('admin')->user()->role_id == config('setting.role.management') || Auth::guard('admin')->user()->role_id == config('setting.role.admin_product')) {
            $supplier = Supplier::findOrFail($id);
            $productInformations = ProductInformation::all();

            $listImport = [];
            if (Session::has('import')) {
                $session = Session::get('import');
                foreach ($session as $item) {
                    if ($item['supplier_id'] == $id) {
                        $product = Product::where('product_information_id', $item['product_information_id'])
                            ->where('color_id', $item['color_id'])
                            ->first();
                        array_push($listImport, [
                            'product_name' => $product->productInformation->name,
                            'color' => $product->color->name,
                            'quantity' => $item['quantity'],
                            'import_price' => $product->import_price,
                        ]);
                    }
                }
            }

            return view('admin.pages.import_product', compact('supplier', 'productInformations', 'listImport'));
        } else {
            abort(403);
        }

    }

    public function addToListImport(ImportProductRequest $request, $id)
    {
        $product = Product::where('product_information_id', $request->product_information_id)
            ->where('color_id', $request->color_id)
            ->first();
        if ($product) {
            $listImport = Session::get('import');
            if ($listImport) {
                foreach ($listImport as $key => $item) {
                    if ($item['supplier_id'] == $id) {
                        if ($item['product_information_id'] == $request->product_information_id && $item['color_id'] == $request->color_id) {
                            $listImport[$key]['quantity'] += $request->quantity;
                            Session::put('import', $listImport);
                            Session::save();

                            return redirect()->back()->with('success', 'Đã thêm vào danh sách');
                        }
                    }
                }
                Session::push('import', [
                    'supplier_id' => $id,
                    'product_information_id' => $request->product_information_id,
                    'quantity' => (int) $request->quantity,
                    'color_id' => $request->color_id,
                ]);
                Session::save();
            } else {
                Session::put('import', [
                    [
                        'supplier_id' => $id,
                        'product_information_id' => $request->product_information_id,
                        'quantity' => (int) $request->quantity,
                        'color_id' => $request->color_id,
                    ],
                ]);
                Session::save();
            }

            return redirect()->back()->with('success', 'Đã thêm vào danh sách');
        } else {
            dd("Lỗi khi nhập hàng");
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
            abort(403);
        }
    }

    public function deleteImport($supplierId)
    {
        $supplier = Supplier::findOrFail($supplierId);
        $listImport = [];
        if (Session::has('import')) {
            $session = Session::get('import');
            foreach ($session as $item) {
                if ($item['supplier_id'] != $supplier->id) {
                    array_push($listImport, $item);
                }
            }
            Session::put('import', $listImport);
            Session::save();
        }

        return redirect()->back()->with('success', 'Đã làm mới danh sách');
    }

    public function importProduct($supplierId)
    {
        // $listImport = [];
        // $listItem = Session::get('import');
        // foreach ($listItem as $item) {
        //     if ($item['supplier_id'] == $supplierId)
        // }
    }
}
