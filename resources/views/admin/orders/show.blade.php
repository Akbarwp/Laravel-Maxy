@extends('admin.layouts.admin')

@section('title', __('views.admin.orders.show.title', ['no_faktur' => $order->no_faktur]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_1') }}</th>
                <td>{{ $order->no_faktur }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_2') }}</th>
                <td>{{ $order->id_m_vendor }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_3') }}</th>
                <td>{{ $order->id_user_verifikasi }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_4') }}</th>
                <td>{{ $order->jumlah }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_5') }}</th>
                <td>{{ $order->ppn_percent }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_6') }}</th>
                <td>{{ $order->pp_nominal }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_7') }}</th>
                <td>{{ $order->total }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_8') }}</th>
                <td>{{ $order->status }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_9') }}</th>
                <td>{{ $order->tanggal }}</td>
            </tr>
            
            <tr>
                <th>{{ __('views.admin.orders.show.table_header_10') }}</th>
                <td>{{ $order->tanggal_dibutuhkan }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.orders.show.table_header_11') }}</th>
                <td>{{ $order->created_at }} ({{ $order->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.orders.show.table_header_12') }}</th>
                <td>{{ $order->updated_at }} ({{ $order->updated_at->diffForHumans() }})</td>
            </tr>
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('views.admin.orders.show.back') }}</a>
    </div>
@endsection
