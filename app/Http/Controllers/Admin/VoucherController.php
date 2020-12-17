<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Http\Requests\VoucherRequest;
use Carbon\Carbon;
use Auth;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('viewAny', Voucher::class)) {
            $vouchers = Voucher::all();

            return view('admin.pages.list_voucher', compact('vouchers'));
        } else {
            abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->can('create', Voucher::class)) {
            return view('admin.pages.create_voucher');
        } else {
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherRequest $request)
    {
        if (Auth::guard('admin')->user()->can('create', Voucher::class)) {
            Voucher::create([
                'code' => $request->code,
                'name' => $request->name,
                'formality' => $request->formality,
                'value' => $request->value,
                'value_order' => $request->value_order,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            return redirect()->route('admin.vouchers.index')->with('success', 'Thêm thành công');
        } else {
            abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('admin')->user()->can('update', Voucher::class)) {
            $voucher = Voucher::find($id);
            $startDate = Carbon::parse($voucher->start_date)->format('Y-m-d\TH:i');
            $endDate = Carbon::parse($voucher->end_date)->format('Y-m-d\TH:i');

            return view('admin.pages.edit_voucher', compact('voucher', 'startDate', 'endDate'));
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
    public function update(VoucherRequest $request, $id)
    {
        if (Auth::guard('admin')->user()->can('update', Voucher::class)) {
            $voucher = Voucher::find($id);
            $voucher->update([
                'code' => $request->code,
                'name' => $request->name,
                'formality' => $request->formality,
                'value' => $request->value,
                'value_order' => $request->value_order,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            return redirect()->route('admin.vouchers.index')->with('success', 'Chỉnh sửa thành công');
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
        if (Auth::guard('admin')->user()->can('delete', Voucher::class)) {
            dd("Delete voucher");
        } else {
            abort(401);
        }
    }
}
