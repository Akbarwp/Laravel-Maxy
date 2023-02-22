@extends('admin.layouts.admin')

@section('title', __('views.admin.purchase.order.lines.show.title', ['id' => $purhcaseOrderLine->id]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>{{ __('views.admin.purchase.order.lines.show.table_header_1') }}</th>
                <td>{{ $purhcaseOrderLine->product->product_name }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.purchase.order.lines.show.table_header_2') }}</th>
                <td>{{ $purhcaseOrderLine->qty }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.purchase.order.lines.show.table_header_3') }}</th>
                <td>{{ $purhcaseOrderLine->price }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.purchase.order.lines.show.table_header_4') }}</th>
                <td>{{ $purhcaseOrderLine->discount }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.purchase.order.lines.show.table_header_5') }}</th>
                <td>{{ $purhcaseOrderLine->total }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.purchase.order.lines.show.table_header_6') }}</th>
                <td>{{ $purhcaseOrderLine->created_at }} ({{ $purhcaseOrderLine->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.purchase.order.lines.show.table_header_7') }}</th>
                <td>{{ $purhcaseOrderLine->updated_at }} ({{ $purhcaseOrderLine->updated_at->diffForHumans() }})</td>
            </tr>
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('views.admin.purchase.order.lines.show.back') }}</a>
    </div>
@endsection
