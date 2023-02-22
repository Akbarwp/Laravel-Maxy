<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PurchaseOrderLine;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Facades\Validator;

class PurhcaseOrderController extends Controller
{
    public function getProductList()
    {
        return view('admin.products.index', [
            'products' => Product::paginate(10),
        ]);
    }

    public function getProductShow($id)
    {
        return view('admin.products.index.show', [
            // 
        ]);
    }

    public function getProductEdit($id)
    {
        return view('admin.products.index.edit', [
            // 
        ]);
    }

    public function getProductUpdate($id)
    {
        // 
    
    }
    public function getProductDestroy($id)
    {
        // 
    }



    public function getPurchaseOrderLineList()
    {
        return view('admin.purchaseOrderLines.index', [
            'purchaseOrderLines' => PurchaseOrderLine::paginate(10),
        ]);
    }

    public function getPurchaseOrderLineCreate()
    {
        return view('admin.purchaseOrderLines.create', [
            'products' => Product::orderBy('id', 'asc')->get(),
        ]);
    }

    public function postPurchaseOrderLineInsert(Request $request, PurchaseOrderLine $purchaseOrderLine)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $purchaseOrderLine->product_id = $request->post('product');
        $purchaseOrderLine->qty = $request->post('qty');
        $purchaseOrderLine->price = $request->post('price');
        $purchaseOrderLine->discount = $request->post('discount');
        $purchaseOrderLine->total = ((int)$request->post('qty') * (int)$request->post('price')) - ((int)$request->post('discount') * (int)$request->post('price') / 100);
        $purchaseOrderLine->created_at = new DateTime();
        $purchaseOrderLine->updated_at = new DateTime();

        $purchaseOrderLine->save();

        return redirect()->intended(route('admin.purchase.order.lines'));
    }

    public function getPurchaseOrderLineShow(PurchaseOrderLine $purchaseOrderLine)
    {
        return view('admin.purchaseOrderLines.show', [
            'purhcaseOrderLine' => $purchaseOrderLine,
        ]);
    }

    public function getPurchaseOrderLineEdit(PurchaseOrderLine $purchaseOrderLine)
    {
        return view('admin.purchaseOrderLines.edit', [
            'purhcaseOrderLine' => $purchaseOrderLine,
            'products' => Product::orderBy('id', 'asc')->get(),
        ]);
    }

    public function getPurchaseOrderLineUpdate(Request $request, PurchaseOrderLine $purchaseOrderLine)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $purchaseOrderLine->product_id = $request->post('product');
        $purchaseOrderLine->qty = $request->post('qty');
        $purchaseOrderLine->price = $request->post('price');
        $purchaseOrderLine->discount = $request->post('discount');
        $purchaseOrderLine->total = ((int)$request->post('qty') * (int)$request->post('price')) - ((int)$request->post('discount') * (int)$request->post('price') / 100);

        $purchaseOrderLine->save();

        return redirect()->intended(route('admin.purchase.order.lines'));
    }

    public function getPurchaseOrderLineDestroy(PurchaseOrderLine $purchaseOrderLine)
    {
        $purchaseOrderLine->delete();
        return redirect()->intended(route('admin.purchase.order.lines'));
    }
}
