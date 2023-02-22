@extends('admin.layouts.admin')

@section('title', __('views.admin.orders.index.title'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>@sortablelink('tanggal', __('views.admin.orders.index.table_header_8'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('tanggal_dibutuhkan', __('views.admin.orders.index.table_header_9'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('no_faktur', __('views.admin.orders.index.table_header_0'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('id_m_vendor', __('views.admin.orders.index.table_header_1'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('id_user_verifikasi', __('views.admin.orders.index.table_header_2'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('jumlah', __('views.admin.orders.index.table_header_3'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('ppn_percent', __('views.admin.orders.index.table_header_4'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('pp_nominal', __('views.admin.orders.index.table_header_5'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('total', __('views.admin.orders.index.table_header_6'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('status', __('views.admin.orders.index.table_header_7'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('created_at', __('views.admin.orders.index.table_header_10'), ['page' => $orders->currentPage()])</th>
                    <th>@sortablelink('updated_at', __('views.admin.orders.index.table_header_11'), ['page' => $orders->currentPage()])</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->tanggal }}</td>
                        <td>{{ $order->tanggal_dibutuhkan }}</td>
                        <td>{{ $order->no_faktur }}</td>
                        <td>{{ $order->id_m_vendor }}</td>
                        <td>{{ $order->id_user_verifikasi }}</td>
                        <td>{{ $order->jumlah }}</td>
                        <td>{{ $order->ppn_percent }}</td>
                        <td>{{ $order->pp_nominal }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', [$order->no_faktur]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.orders.index.show') }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.orders.edit', [$order->no_faktur]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.orders.index.edit') }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{ route('admin.orders.destroy', [$order->no_faktur]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.orders.index.delete') }}" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
