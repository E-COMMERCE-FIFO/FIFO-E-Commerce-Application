<?php

namespace App\Http\Controllers\server;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        $number = 1;
        $supplier = Supplier::all();
        return view('server-side.supplier.index', compact(['supplier', 'number']));

    }
    
    public function create()
    {
        return view('server-side.supplier.create');
    }

       
    public function add(Request $request)
    {
        Supplier::create($request->except('_token', 'submit'));
        return redirect('index');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}
