<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

use App\Models\Products;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function ShowAllProducts()
    {
        $products = Products::orderBy('id', 'DESC')->get();;
        return view('dashboard.products', ['products' => $products]);
    }

    public function editProductPage($id)
    {
        $product = new Products();
        $form_data =  $product->getProduct($id)[0]->toArray();
        return view('dashboard.edit_product', ['type' => '', 'message' => '', 'form_data' => $form_data, 'categories' => Categories::all(), 'brands' => Brands::all()]);
    }

    public function editProduct(Request $request){
        $rule = [
            'product' => 'required|unique:products|max:255',
            'alias' => 'required|unique:products|max:255',
            'category' => 'required',
            'brand' => 'required',
            'short_description' => 'max:255',
            'price' => 'numeric',
            'count' => 'numeric',
            'photos.*.file' => 'image|max:1024'
        ];
        $validator = Validator::make($request->all(), $rule);
        $path = 'uploads/images/product';
        $form_data = '';

        if(!$validator->fails()){
            $photos = [];
            foreach($request->photos as $photo){
                $filename = md5(time().rand(1,999)).'.'.$photo->extension();
                $photos[] = $filename;
                $photo->move($path, $filename);
            }

            $product = $request->all();

            Products::update(['product' => $product['product'],
                'alias' => $product['alias'],
                'category_id' => $product['category'],
                'brand_id' => $product['brand'],
                'description' => $product['short_description'],
                'content' => $product['content'],
                'price' => $product['price'],
                'preview' => serialize($photos),
                'count' => $product['count'],
                'rating' => 0]);

            $message = 'Product added successfully';
            $message_type = 'success';
        }else{
            $message = $validator->errors()->all();
            $message_type = 'danger';
            $form_data = $request->all();
        }
        return view('dashboard.edit_product', ['type' => $message_type, 'message' => $message, 'form_data' => $form_data, 'categories' => Categories::all(), 'brands' => Brands::all()]);
    }

    public function addProductPage()
    {
        return view('dashboard.add_product', ['type' => '', 'message' => '', 'categories' => Categories::all(), 'brands' => Brands::all()]);
    }

    public function addProduct(Request $request)
    {
        $rule = [
            'product' => 'required|unique:products|max:255',
            'alias' => 'required|unique:products|max:255',
            'category' => 'required',
            'brand' => 'required',
            'short_description' => 'max:255',
            'price' => 'numeric',
            'count' => 'numeric',
            'photos.*.file' => 'image|max:1024'
        ];
        $validator = Validator::make($request->all(), $rule);

        $path = 'uploads/images/product';
        $form_data = '';

        if(!$validator->fails()){
            $photos = [];
            foreach($request->photos as $photo){
                $filename = md5(time().rand(1,999)).'.'.$photo->extension();
                $photos[] = $filename;
                $photo->move($path, $filename);
            }

            $product = $request->all();

            Products::insert(['product' => $product['product'],
            'alias' => $product['alias'],
            'category_id' => $product['category'],
            'brand_id' => $product['brand'],
            'description' => $product['short_description'],
            'content' => $product['content'],
            'price' => $product['price'],
            'preview' => serialize($photos),
            'count' => $product['count'],
            'rating' => 0]);

            $message = 'Product added successfully';
            $message_type = 'success';
        }else{
            $message = $validator->errors()->all();
            $message_type = 'danger';
            $form_data = $request->all();
        }
        return view('dashboard.add_product', ['form_data' => $form_data,'type' => $message_type, 'message' => $message, 'categories' => Categories::all(), 'brands' => Brands::all()]);
    }
}
