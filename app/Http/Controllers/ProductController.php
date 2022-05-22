<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPodcast;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //
    public function newTest()
    {

            $object = array('message' => 'yes');
            echo json_encode($object);
    }

    public function test()
    {
        $data = array(
            'message' => 'codexworld',
            'address' => 'fsfs',
        );
        echo json_encode($data);
    }

    public function index()
    {
        try {
            return Product::all();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'price' => 'required',
            ]);
            return Product::create($request->all());
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy(int $id)
    {
        return Product::destroy($id);
    }

    public function search($name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
