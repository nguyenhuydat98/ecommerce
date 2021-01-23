<div class="modal-vouchers">
    <button class="btn_3" data-toggle="modal" id="list-voucher" data-target="#vouchers">{{ trans('user.checkout.choose_voucher') }}</button>
    <div class="wrap-modal-vouchers">
        <div id="vouchers" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Chọn Voucher</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('chooseVoucher') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            @foreach ($vouchers as $voucher)
                                <label class="container" @if ($voucher->start_date >= now() || $valueOrder < $voucher->value_order) id="hide-voucher" @endif>
                                    <span>{{ $voucher->code }}</span>
                                    <span class="content">{{ $voucher->name }}</span>
                                    <span class="content">
                                        @if ($voucher->formality == 0)
                                            Khuyến mại {{ $voucher->value . " %"}} giá trị đơn hàng
                                        @else
                                            Giảm {{ number_format($voucher->value) . " đ" }}
                                        @endif
                                    </span>
                                    <span class="content">
                                        Áp dụng cho đơn hàng từ
                                        <span>{{ number_format($voucher->value_order) . " đ" }}</span>
                                    </span>
                                    @if ($voucher->start_date >= now())
                                        <span class="content">KM từ: {{ date(config('setting.format_date'), strtotime($voucher->start_date)) }}</span>
                                    @else
                                        <span class="content">HSD: {{ date(config('setting.format_date'), strtotime($voucher->end_date)) }}</span>
                                    @endif
                                    <input type="radio" name="code" value="{{ $voucher->id }}"
                                        @if ($voucher->start_date >= now() || $valueOrder < $voucher->value_order) disabled @endif
                                        @if($chooseVoucher)
                                            @if ($chooseVoucher->id == $voucher->id) checked="checked" @endif
                                        @endif
                                        required>
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn_3" id="btn-back" data-dismiss="modal">Quay lại</button>
                            <input type="submit" class="btn_3 @if(!$existVoucher) hide-btn @endif" id="btn-ok" value="OK">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
