@extends('admin.layouts.admin')

@section('title', __('views.admin.purchase.order.lines.edit.title', ['id' => $purhcaseOrderLine->id]))

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route' => ['admin.purchase.order.lines.update', $purhcaseOrderLine->id], 'method' => 'put', 'class' => 'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product">
                    {{ __('views.purchase.order.lines.create.product') }}
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="product" name="product" class="select2" style="width: 100%" autocomplete="off">
                        <option selected value="{{ $purhcaseOrderLine->id }}">{{ $purhcaseOrderLine->product->product_name }}</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qty">
                    {{ __('views.admin.purchase.order.lines.create.qty') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="qty" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('qty')) parsley-error @endif" name="qty" required value="{{ $purhcaseOrderLine->qty }}">
                    @if ($errors->has('qty'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('qty') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">
                    {{ __('views.admin.purchase.order.lines.create.price') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="price" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('price')) parsley-error @endif" name="price" required value="{{ $purhcaseOrderLine->price }}">
                    @if ($errors->has('price'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('price') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount">
                    {{ __('views.admin.purchase.order.lines.create.discount') }}
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="discount" type="number" class="form-control col-md-7 col-xs-12 @if ($errors->has('discount')) parsley-error @endif" name="discount" required value="{{ $purhcaseOrderLine->discount }}">
                    @if ($errors->has('discount'))
                        <ul class="parsley-errors-list filled">
                            @foreach ($errors->get('discount') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('views.admin.purchase.order.lines.edit.cancel') }}</a>
                    <button type="submit" class="btn btn-warning"> {{ __('views.admin.purchase.order.lines.edit.update') }}</button>
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
