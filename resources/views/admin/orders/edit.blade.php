@extends('admin.layouts.admin')

@section('title', __('views.admin.orders.edit.title', ['no_faktur' => $order->no_faktur]))

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route' => ['admin.orders.update', $order->no_faktur], 'method' => 'put', 'class' => 'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">
                    {{ __('views.admin.orders.create.tanggal') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="tanggal" type="date" class="form-control col-md-7 col-xs-12 @if ($errors->has('tanggal')) parsley-error @endif" name="tanggal" required value="{{ $order->tanggal }}">
                    @if ($errors->has('tanggal'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('tanggal') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_dibutuhkan">
                    {{ __('views.admin.orders.create.tanggal_dibutuhkan') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="tanggal_dibutuhkan" type="date" class="form-control col-md-7 col-xs-12 @if ($errors->has('tanggal_dibutuhkan')) parsley-error @endif" name="tanggal_dibutuhkan" required value="{{ $order->tanggal_dibutuhkan }}">
                    @if ($errors->has('tanggal_dibutuhkan'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('tanggal_dibutuhkan') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_m_vendor">
                    {{ __('views.admin.orders.create.id_m_vendor') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="id_m_vendor" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('id_m_vendor')) parsley-error @endif" name="id_m_vendor" required value="{{ $order->id_m_vendor }}">
                    @if ($errors->has('id_m_vendor'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('id_m_vendor') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_user_verifikasi">
                    {{ __('views.admin.orders.create.id_user_verifikasi') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="id_user_verifikasi" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('id_user_verifikasi')) parsley-error @endif" name="id_user_verifikasi" required value="{{ $order->id_user_verifikasi }}">
                    @if ($errors->has('id_user_verifikasi'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('id_user_verifikasi') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah">
                    {{ __('views.admin.orders.create.jumlah') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="jumlah" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('jumlah')) parsley-error @endif" name="jumlah" required value="{{ $order->jumlah }}">
                    @if ($errors->has('jumlah'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('jumlah') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ppn_percent">
                    {{ __('views.admin.orders.create.ppn_percent') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="ppn_percent" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('ppn_percent')) parsley-error @endif" name="ppn_percent" required value="{{ $order->ppn_percent }}">
                    @if ($errors->has('ppn_percent'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('ppn_percent') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp_nominal">
                    {{ __('views.admin.orders.create.pp_nominal') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="pp_nominal" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('pp_nominal')) parsley-error @endif" name="pp_nominal" required value="{{ $order->pp_nominal }}">
                    @if ($errors->has('pp_nominal'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('pp_nominal') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total">
                    {{ __('views.admin.orders.create.total') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="total" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('total')) parsley-error @endif" name="total" required value="{{ $order->total }}">
                    @if ($errors->has('total'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('total') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">
                    {{ __('views.admin.orders.create.status') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="status" type="text" class="form-control col-md-7 col-xs-12 @if ($errors->has('status')) parsley-error @endif" name="status" required value="{{ $order->status }}">
                    @if ($errors->has('status'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('status') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('views.admin.orders.edit.cancel') }}</a>
                    <button type="submit" class="btn btn-warning"> {{ __('views.admin.orders.edit.update') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection
