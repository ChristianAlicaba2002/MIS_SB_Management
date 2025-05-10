<?php

namespace App\Http\Controllers\Products;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Domain\Product\Product;
use App\Models\ArchiveProducts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Application\Product\RegisterProduct;

class ProductsController extends Controller
{
    public function __construct(private RegisterProduct $registerProduct)
    {
        return $this->registerProduct = $registerProduct;
    }

    public function Products(Products $products)
    {
        $item = $products->all();

        return Response()->json([
            'status' => true,
            'message' => 'Item Retrieved Successfully',
            'data' => $item
        ]);
    }

    public function read(int $Itemcode)
    {
        $item = Products::where('Itemcode', $Itemcode)->get();
        if (!$item) {
            return Response()->json([
                'status' => false,
                'message' => 'Item not found'
            ]);
        }

        return Response()->json([
            'status' => true,
            'message' => 'Item Retrieved Successfully',
            'data' => $item
        ]);
    }

    public function create(Request $request)
    {
        $sanitized = array_map('trim', $request->all());

        $validator = Validator::make($sanitized, [
            'Item_Name' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'Category' => 'required|string|max:50',
            'Unit_Price' => 'required|numeric',
            'Quantity' => 'required|numeric',
            'Image' => 'required|nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->route('products')->with('error' ,$validator->errors());
        }

        $itemCode = $this->generateRandomItemCode();
        while (Products::where('Itemcode', $itemCode)->exists()) {
            $itemCode = $this->generateRandomItemCode();
        }

        if($request->hasFile('Image')) {
            $file = $request->file('Image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['Image'] = $filename;
        }

        $result = $this->registerProduct->create(
            $itemCode,
            $request->Item_Name,
            $request->Description,
            $request->Category,
            $request->Unit_Price,
            $request->Quantity,
            $data['Image']
        );

        return redirect()->route('products')->with('success' , 'Product Created Successfully');
    }

    public function update(Request $request, int $Itemcode)
    {
        $item = Products::where('Itemcode', $Itemcode)->first();

        if (!$item) {
            return redirect()->route('products')->with('error' ,'Item not found');
        }

        $sanitized = array_map('trim', $request->all());

        $validator = Validator::make($sanitized, [
            'Item_Name' => 'required|string|min:1|max:255',
            'Description' => 'required|string|min:5|max:255',
            'Category' => 'required|string|min:5|max:50',
            'Unit_Price' => 'required|numeric',
            'Quantity' => 'required|numeric',
            'Image' => 'required|nullable'
        ]);


        if ($validator->fails()) {
            return redirect()->route('products')->with('error' , $validator->errors());
        }

        $data = [
            'Item_Name' => $request->Item_Name,
            'Description' => $request->Description,
            'Category' => $request->Category,
            'Unit_Price' => $request->Unit_Price,
            'Quantity' => $request->Quantity,
            'Image' => $item->Image
        ];

        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $destinationPath = 'images';
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $data['Image'] = $imageName;
        }

        DB::table('products')->where('Itemcode', $Itemcode)->update($data);

        return redirect()->route('products')->with('success', 'Updated Product Successfully');

    }

    public function archive(int $Itemcode)
    {
        $item = Products::where('Itemcode', $Itemcode)->first();

        if (!$item) {
            return redirect()->route('products')->with('error' ,'Item not found');
        }

        $this->registerProduct->delete($Itemcode);

        $archive = ArchiveProducts::create([
            'Itemcode' => $item->Itemcode,
            'Item_Name' => $item->Item_Name,
            'Description' => $item->Description,
            'Category' => $item->Category,
            'Unit_Price' => $item->Unit_Price,
            'Quantity' => $item->Quantity,
            'Image' => $item->Image,
        ]);

        return redirect()->route('products')->with('success' , 'Archived Created Successfully');
    }

    public function restore(int $Itemcode)
    {
        $item = ArchiveProducts::where('Itemcode', $Itemcode)->first();

        if (!$item) {
            return redirect()->route('archive-products')->with('error' ,'Item not found');
        }

        DB::table('archive_products')->where('Itemcode' , $Itemcode)->delete();

        DB::table('products')->insert([
            'Itemcode' => $item->Itemcode,
            'Item_Name' => $item->Item_Name,
            'Description' => $item->Description,
            'Category' => $item->Category,
            'Unit_Price' => $item->Unit_Price,
            'Quantity' => $item->Quantity,
            'Image' => $item->Image,
        ]);

        return redirect()->route('archive-products')->with('success' , 'Restore Product Successfully');
    }

    public function delete(int $Itemcode)
    {
        $item = ArchiveProducts::where('Itemcode', $Itemcode)->first();

        if (!$item) {
            return redirect()->route('archive-products')->with('success' , 'Item not found');
        }

        DB::table('archive_products')->where('Itemcode' , $Itemcode)->delete();

        return redirect()->route('archive-products')->with('success' , 'Deleted Successfully Created');
    }

    public function generateRandomItemCode()
    {
        $id = random_int(111111, 999999);

        return $id;
    }
}
