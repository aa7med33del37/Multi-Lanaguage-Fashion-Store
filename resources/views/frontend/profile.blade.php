@extends('frontend.layouts.main')
@php
    if (app()->getLocale() == 'en') {
        $lang = 'en';
    }
    if (app()->getLocale() == 'ar') {
        $lang = 'ar';
    }
@endphp
@section('styles')
    <style>
        /* SECTION VERTICAL TABS */
        #experienceTab.nav-pills .nav-link.active {
            color: #000 !important;
            background-color: transparent;
            border-radius: 0px;
            font-weight: bold;
            /* border-right: 3px solid #c96; */
        }
        .nav-border-right { border-right: 2px solid #8892B0 !important; }
        .nav-border-right.active { border-right: 3px solid #c96 !important; }
        .nav-border-left { border-left: 3px solid #8892B0 !important; }
        .nav-border-left.active {border-left: 3px solid #c96 !important; }
        #experienceTab.nav-pills .nav-link {
            border-radius: 0px;
            /* width: 170px !important; */
        }
        .date-range {
            letter-spacing: 0.01em;
            color: #8892B0;
        }

        .card { color: #504b4b }
    </style>
@endsection
@section('title', $lang == 'ar' ? 'الصفحة الشخصية' : 'Profile')
@section('content')
<main class="main">

    <div class="page-content">
        <div class="container">
            <hr class="mt-3 mb-5 mt-md-1">
            <div class="container">
                <div class="row p-5">
                    <div class="col-md-3 mb-3">
                      <ul class="nav nav-pills flex-column" id="experienceTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active {{ $lang == 'ar' ? 'nav-border-right' : 'nav-border-left' }}" id="profile-tab" data-toggle="tab" href="#snit" role="tab" aria-controls="profile" aria-selected="true">@lang('frontend.Update Profile')</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{ $lang == 'ar' ? 'nav-border-right' : 'nav-border-left' }}"  id="password-tab" data-toggle="tab" href="#devs" role="tab" aria-controls="password" aria-selected="false">@lang('frontend.Update Password')</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{ $lang == 'ar' ? 'nav-border-right' : 'nav-border-left' }}"  id="address-tab" data-toggle="tab" href="#addr" role="tab" aria-controls="address" aria-selected="false">@lang('user.Addresses')</a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-9">
                        <div class="tab-content" id="experienceTabContent">
                            <div class="tab-pane fade show active text-left text-light" id="snit" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="ml-auto mr-auto">
                                    <div class="text-center">
                                        <h2 class="title mb-1">@lang('frontend.Update Profile')</h2>
                                    </div><!-- End .text-center -->

                                    <form action="{{ route('profile.update') }}" class="contact-form mb-2" method="POST">
                                        @csrf
                                        <div class="row" style="text-align: start">
                                            <div class="col-12">
                                                <label for="cemail"> @lang('user.Email') </label>
                                                <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly id="cemail" placeholder="@lang('common.Required')" required>
                                            </div><!-- End .col-sm-4 -->

                                            <div class="col-12">
                                                <label for="name"> @lang('user.Name') </label>
                                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" id="name" placeholder="@lang('common.Required')" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div><!-- End .col-sm-4 -->

                                            <div class="col-12">
                                                <label for="cphone"> @lang('user.Phone') </label>
                                                <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone ?? '' }}" id="cphone" placeholder="@lang('common.Optional')">
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div><!-- End .col-sm-4 -->
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                                <span>@lang('common.Update')</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .text-center -->
                                    </form>
                                    <!-- End .Update Profile form -->
                                </div><!-- End -->
                            </div>

                            <div class="tab-pane fade text-left text-light" id="devs" role="tabpanel" aria-labelledby="password-tab">
                                <div class="ml-auto mr-auto">
                                    <div class="text-center">
                                        <h2 class="title mb-1">@lang('frontend.Update Password')</h2>
                                    </div><!-- End .text-center -->

                                    <form action="{{ route('profile.update.password') }}" method="POST" class="contact-form mb-2">
                                        @csrf
                                        <div class="row" style="text-align: start">
                                            <div class="col-12">
                                                <label for="password"> @lang('user.Old Password') </label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="@lang('common.Required')" required>
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="new-password"> @lang('user.New Password') </label>
                                                <input type="password" class="form-control" id="new-password" name="new_password" placeholder="@lang('common.Required')" required>
                                                @error('new_password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="confirm-password"> @lang('user.Confirm Password') </label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder="@lang('common.Required')" required>
                                                @error('confirm_password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                                <span>@lang('common.Update')</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .text-center -->
                                    </form>
                                    <!-- End .Update Profile form -->
                                </div><!-- End -->
                            </div>

                            <div class="tab-pane fade text-left text-light" id="addr" role="tabpanel" aria-labelledby="address-tab">
                                <div class="ml-auto mr-auto">
                                    <div class="text-center">
                                        <h2 class="title mb-1">@lang('user.Addresses')</h2>
                                    </div><!-- End .text-center -->
                                    <div class="row">
                                        @php
                                            $num = 0;
                                        @endphp
                                        @forelse ($addresses as $addressItem)
                                        <div class="col-12 col-md-4">
                                            <div class="card mb-4">
                                                <div class="card-header text-center">
                                                    ({{ $num+=1 }})
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><b>@lang('user.Phone')</b>: {{ $addressItem->phone }}</li>
                                                    <li class="list-group-item"><b>@lang('user.Governorate')</b>: {{ $lang == 'ar' ? $addressItem->governorate->gov_ar : $addressItem->governorate->gov_en }}</li>
                                                    <li class="list-group-item"><b>@lang('user.City')</b>:{{ $lang == 'ar' ? $addressItem->govCity->city_ar : $addressItem->govCity->city_en }}</li>
                                                    <li class="list-group-item"><b>@lang('user.Address')</b>:{{ $addressItem->address }}</li>
                                                    <li class="list-group-item"><b>@lang('user.Pincode')</b>:{{ $addressItem->pincode ?? '' }}</li>
                                                    <li class="list-group-item"><b>@lang('user.Company')</b>:{{ $addressItem->company ?? '' }}</li>
                                                    <li class="list-group-item">
                                                        <a href="{{ route('profile.address.delete', $addressItem->id) }}" class="btn btn-outline-danger">@lang('common.Delete')</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                    </div>

                                    <div style="text-align: start">
                                        <button id="new_address_btn" class="mt-4 mb-5 btn btn-outline-primary">@lang('user.Add New Addresss')</button>
                                    </div>
                                    <div class="row">
                                        <div id="new_address" class="new-address col-12 hide">
                                            <h2 class="checkout-title text-center font-weight-bold"> @lang('user.Add New Addresss') </h2><!-- End .checkout-title -->
                                            <form action="{{ Route('profile.new_address') }}" method="POST">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label> @lang('common.Name') * </label>
                                                        <input type="text" class="form-control"  name="name" required>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label> @lang('user.Phone') *</label>
                                                        <input type="tel" class="form-control" name="phone" required>
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- End .row -->

                                                <div class="row">
                                                    <div class="col-6">
                                                        <label> @lang('user.Governorate') *</label>
                                                        <select id="gov_dropdown" name="governorate_id" class="form-control">
                                                            <option value="">@lang('frontend.Select')</option>
                                                            @foreach ($governorates as $gov)
                                                                <option value="{{ $gov->id }}">{{ $lang == 'ar' ? $gov->gov_ar : $gov->gov_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('governorate_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label> @lang('user.City') *</label>
                                                        <select id="city_dropdown" name="city" class="form-control">
                                                        </select>
                                                        @error('city')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label> @lang('user.Pincode') </label>
                                                        <input type="text" class="form-control" name="pincode" placeholder="@lang('common.Optional')">
                                                        @error('pincode')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label> @lang('user.Company') </label>
                                                        <input type="text" class="form-control" name="company" placeholder="@lang('common.Optional')">
                                                        @error('company')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- End .row -->


                                                <label> @lang('user.Address') *</label>
                                                <textarea class="form-control" name="address" placeholder="@lang('common.Required')" required placeholder="@lang('common.Required')"></textarea>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="text-center">
                                                    <button class="btn btn-danger">@lang('common.Add')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- End -->
                            </div>
                      </div><!--tab content end-->
                    </div><!-- col-md-8 end -->
                </div>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#new_address_btn').click(function () {
                $(this).addClass('hide');
                $('#new_address').removeClass('hide');
            });

            $('#gov_dropdown').on('change', function() {
                var governorate_id = this.value;
                $("#city_dropdown").html('');
                $.ajax({
                    url:"{{url('profile/get-city-by-governorate')}}",
                    type: "POST",
                    data: {
                        governorate_id: governorate_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#city_dropdown').html('<option value="">@lang('frontend.Select')</option>');
                        $.each(result.cities,function(key,value){
                            $("#city_dropdown").append('<option value="'+value.id+'">'+value.city_{{ app()->getLocale() }}+'</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
