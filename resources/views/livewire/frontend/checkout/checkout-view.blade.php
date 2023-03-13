@php
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }

    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
@endphp
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <form>
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-8">
                            <div id="billing_address" class="billing-address">
                                @foreach ($userAddresses as $item)
                                <table class="table table-bordered text-center">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold"> @lang('user.Name'): </td>
                                            <td> {{ Auth::user()->name }} </td>
                                            <td class="font-weight-bold"> @lang('user.Phone'): </td>
                                            <td> {{ $item->phone }} </td>
                                            <td class="font-weight-bold"> @lang('user.Governorate'): </td>
                                            <td> {{ $lang == 'ar' ? $item->governorate->gov_ar : $item->governorate->gov_en }} </td>
                                            <td class="font-weight-bold"> @lang('user.City'): </td>
                                            <td> {{ $lang == 'ar' ? $item->govCity->city_ar : $item->govCity->city_en }} </td>
                                        </tr>

                                        <tr>
                                            <td class="font-weight-bold"> @lang('user.Pincode'): </td>
                                            <td> {{ $item->pincode }} </td>
                                            <td class="font-weight-bold"> @lang('user.Company'): </td>
                                            <td> {{ $item->company }} </td>
                                            <td class="font-weight-bold"> @lang('user.Address'): </td>
                                            <td> {{ $item->address }} </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <td colspan="5"></td>
                                        <td>
                                            <div class="selecotr-item">
                                                <input type="radio" style="cursor: pointer" id="radio{{ $item->id }}" name="addressSelected" class="selector-item_radio" checked wire:model="addressSelected" value="{{ $item->id }}">
                                                <label style="cursor: pointer" for="radio{{ $item->id }}" class="selector-item_label">@lang('common.Choose')</label>
                                            </div>
                                        </td>
                                    </tfoot>
                                  </table>
                                  @endforeach
                            </div>

                            <div id="new_address" class="new-address hide">
                                <h2 class="checkout-title text-center font-weight-bold"> @lang('frontend.Billing Details') </h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label> @lang('common.Name') * </label>
                                        <input type="text" class="form-control"  name="name" required  wire:model.defer="name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label> @lang('user.Phone') *</label>
                                        <input type="tel" class="form-control" wire:model.defer="phone" name="phone" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label> @lang('user.Governorate') *</label>
                                        <select id="gov_dropdown" class="form-control" wire:model.defer="governorate_id" name="governorate_id" required>
                                            <option value="">@lang('frontend.Select')</option>
                                            @foreach ($governorates as $govItem)
                                                <option value="{{ $govItem->id }}">{{ $lang == 'ar' ? $govItem->gov_ar : $govItem->gov_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label> @lang('user.City') *</label>
                                        <select id="city_dropdown" class="form-control" wire:model.defer="city" name="city" required>
                                            <option value="">@lang('frontend.Select')</option>
                                        </select>
                                    </div>

                                </div><!-- End .row -->


                                <label> @lang('user.Address') *</label>
                                <textarea class="form-control" wire:model.defer="address" name="address" placeholder="@lang('common.Required')" required placeholder="@lang('common.Required')"></textarea>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label> @lang('user.Pincode') </label>
                                        <input type="text" class="form-control" wire:model.defer="pincode" name="pincode" placeholder="@lang('common.Optional')">
                                    </div>

                                    <div class="col-sm-6">
                                        <label> @lang('user.Company') </label>
                                        <input type="text" class="form-control" wire:model.defer="company" name="company" placeholder="@lang('common.Optional')">
                                    </div>
                                </div><!-- End .row -->

                                <label> @lang('Notes') </label>
                                <textarea class="form-control" wire:model.defer="notes" name="notes" cols="30" rows="4" placeholder="@lang('common.Optional')"></textarea>
                            </div>

                            <button id="new_address_btn" class="btn btn-primary">@lang('user.Add New Addresss')</button>
                            <button id="old_address_btn" class="btn btn-primary hide">@lang('user.Choose Addresses')</button>
                        </div>

                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="summary">
                                <h3 class="summary-title text-center"> @lang('frontend.Orders') </h3><!-- End .summary-title -->
                                <h5 class="text-center"> {{ Auth::user()->email }} </h5>
                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th style="text-align: start"> @lang('product.Product') </th>
                                            <th style="text-align: end"> @lang('order.Total') </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cart as $cartItem)
                                            <tr>
                                                <td style="text-align: start">
                                                    <a class="font-weight-bold" href="{{ url('shop/view/' . $cartItem->product->slug) }}">
                                                         {{ $lang == 'ar' ? $cartItem->product->title_ar : $cartItem->product->title_en }} ({{ $cartItem->quantity }})
                                                    </a>
                                                </td>
                                                <td style="text-align: end"> {{ number_format($cartItem->price * $cartItem->quantity, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                            </tr>
                                            @php
                                                $totalAmount += $cartItem->price * $cartItem->quantity;
                                            @endphp
                                        @endforeach

                                        <tr class="summary-total">
                                            <td style="text-align: start"> @lang('order.Total')</td>
                                            <td style="text-align: end"> {{ number_format($totalAmount, 2, '.', ',') }} {{ $lang == 'ar' ? 'ج.م' : 'EGP' }} </td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <button type="button" wire:click="codPlaceOrder" class="mb-3 btn btn-primary btn-order btn-block">
                                        <span class="btn-text"> @lang('order.COD') </span>
                                        <span class="btn-hover-text"> @lang('order.Place Order') </span>
                                    </button>
                                </div>
                            </div><!-- End .summary -->
                        </div><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main>

@section('scripts')

<script>
    $(document).ready(function () {
        $('#new_address_btn').click(function () {
            $('#new_address_btn').addClass('hide');
            $('#old_address_btn').removeClass('hide');
            $('#billing_address').addClass('hide');
            $('#new_address').removeClass('hide');
        });

        $('#old_address_btn').click(function () {
            $('#old_address_btn').addClass('hide');
            $('#new_address_btn').removeClass('hide');
            $('#new_address').addClass('hide');
            $('#billing_address').removeClass('hide');
        });
    });
</script>
<script>
    $('#gov_dropdown').on('change', function () {
        var governorate_id = this.value;
        $('city_dropdown').html('');
        $.ajax({
            url: "{{ url('profile/get-city-by-governorate') }}",
            type: "POST",
            data: {
                governorate_id: governorate_id,
                _token: '{{csrf_token()}}',
            },
            dataType: 'json',
            success: function(result){
                $.each(result.cities,function(key,value){
                    $("#city_dropdown").append('<option value="'+value.id+'">'+value.city_{{ app()->getLocale() }}+'</option>');
                });
            }
        });
    });
</script>
@endsection

