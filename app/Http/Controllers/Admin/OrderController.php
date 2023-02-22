<?php

namespace App\Http\Controllers\admin;

use DateTime;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function getOrderList()
    {
        return view('admin.orders.index', [
            'orders' => Order::paginate(10),
        ]);
    }

    public function getOrderCreate()
    {
        return view('admin.orders.create');
    }

    public function postOrderInsert(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
            'no_faktur' => 'required',
            'id_m_vendor' => 'required',
            'id_user_verifikasi' => 'required',
            'jumlah' => 'required',
            'ppn_percent' => 'required',
            'pp_nominal' => 'required',
            'total' => 'required',
            'status' => 'required',
            'tanggal' => 'required',
            'tanggal_dibutuhkan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $order->no_faktur = $request->post('no_faktur');
        $order->id_m_vendor = $request->post('id_m_vendor');
        $order->id_user_verifikasi = $request->post('id_user_verifikasi');
        $order->jumlah = $request->post('jumlah');
        $order->ppn_percent = $request->post('ppn_percent');
        $order->pp_nominal = $request->post('pp_nominal');
        $order->total = $request->post('total');
        $order->status = $request->post('status');
        $order->tanggal = $request->post('tanggal');
        $order->tanggal_dibutuhkan = $request->post('tanggal_dibutuhkan');
        $order->created_at = new DateTime();
        $order->updated_at = new DateTime();
        $order->created_id = Auth::user()->id;
        $order->updated_id = Auth::user()->id;

        $order->save();

        return redirect()->intended(route('admin.orders'));
    }

    public function getOrderShow(Request $order)
    {
        return view('admin.orders.show', [
            'order' => Order::where('no_faktur', $order->no_faktur)->first(),
        ]);
    }

    public function getOrderEdit(Request $order)
    {
        return view('admin.orders.edit', [
            'order' => Order::where('no_faktur', $order->no_faktur)->first(),
        ]);
    }

    public function getOrderUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_m_vendor' => 'required',
            'id_user_verifikasi' => 'required',
            'jumlah' => 'required',
            'ppn_percent' => 'required',
            'pp_nominal' => 'required',
            'total' => 'required',
            'status' => 'required',
            'tanggal' => 'required',
            'tanggal_dibutuhkan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        Order::where('no_faktur', $request->no_faktur)->update([
            'id_m_vendor' => $request->post('id_m_vendor'),
            'id_user_verifikasi' => $request->post('id_user_verifikasi'),
            'jumlah' => $request->post('jumlah'),
            'ppn_percent' => $request->post('ppn_percent'),
            'pp_nominal' => $request->post('pp_nominal'),
            'total' => $request->post('total'),
            'status' => $request->post('status'),
            'tanggal' => $request->post('tanggal'),
            'tanggal_dibutuhkan' => $request->post('tanggal_dibutuhkan'),
            'updated_at' => new DateTime(),
            'updated_id' => Auth::user()->id,
        ]);

        return redirect()->intended(route('admin.orders'));
    }

    public function getOrderDestroy(Request $order)
    {
        Order::where('no_faktur', $order->no_faktur)->delete();
        return redirect()->intended(route('admin.orders'));
    }
}
