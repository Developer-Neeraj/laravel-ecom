<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $result["data"] = Product::all();
        return view('admin/product', $result);
    }

    public function manage_product(Request $request, $id='') {
        if($id>0) {
            $arr = Product::where(["id"=>$id])->get();
            $result['category_id'] = $arr['0']->category_id;
            $result['name'] = $arr['0']->name;
            $result['images'] = $arr['0']->images;
            $result['slug'] = $arr['0']->slug;
            $result['brand'] = $arr['0']->brand;
            $result['model'] = $arr['0']->model;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['description'] = $arr['0']->description;
            $result['keyword'] = $arr['0']->keyword;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['uses'] = $arr['0']->uses;
            $result['warranty'] = $arr['0']->warranty;
            $result['id'] = $arr['0']->id;
        } else {
            $result['category_id'] = '';
            $result['name'] = '';
            $result['images'] = '';
            $result['slug'] = '';
            $result['brand'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['description'] = '';
            $result['keyword'] = '';
            $result['technical_specification'] = '';
            $result['uses'] = '';
            $result['warranty'] = '';
            $result['id'] = 0;
        }
        $result['category'] = DB::table('categories')->where(['status'=>1])->get();
        $result['size'] = DB::table('sizes')->where(['status'=>1])->get();
        $result['color'] = DB::table('colors')->where(['status'=>1])->get();
        return view('admin/manage_product', $result);
    }

    public function manage_product_process(Request $request) {
        return $request->post();
        die();
        if($request->post('id')>0) {
            $image_validation = "mimes:jpeg,jpg,png";
        } else {
            $image_validation = 'required|mimes:jpeg,jpg,png';
        }
        $request->validate([
            'name' => 'required',
            'images' => $image_validation,
            'slug' => 'required|unique:products,slug,'.$request->post('id'),
        ]);
        
        if($request->post('id')>0) {
            $model = Product::find($request->post('id'));
            $msg = "Product Update";
        } else {
            $model = new Product;
            $msg = "Product Inserted";
        }
        if($request->hasfile('images')) {
            $image = $request->file('images');
            $ext = $image->extension();
            $image_name = time().".".$ext;
            $image->storeAs('/public/media', $image_name);
            $model->images = $image_name;
        }
        $model->category_id = $request->post('category_id');
        $model->name = $request->post('name');
        $model->slug = $request->post('slug');
        $model->brand = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->description = $request->post('description');
        $model->keyword = $request->post('keyword');
        $model->technical_specification = $request->post('technical_specification');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');
        $model->status = '1';
        $model->save();
        $request->session()->flash("message", $msg);
        return redirect('admin/product');
    }

    public function delete(Request $request, $id) {
        $model = Product::find($id);
        $model->delete();
        $request->session()->flash("message", "Product Delete Success");
        return redirect('admin/product');
    }
    public function status(Request $request, $type ,$id) {
        $model = Product::find($id);
        $model->status = $type;
        $model->save();
        $request->session()->flash("message", "Product Status Success");
        return redirect('admin/product');
    }
}
