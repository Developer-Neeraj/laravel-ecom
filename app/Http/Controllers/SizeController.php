<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index() {
        $result["data"] = Size::all();
        return view('admin/size', $result);
    }

    public function manage_size(Request $request, $id='') {
        if($id>0) {
            $arr = Size::where(["id"=>$id])->get();
            $result['size'] = $arr['0']->title;
            $result['id'] = $arr['0']->id;
        } else {
            $result['size'] = '';
            $result['id'] = 0;
        }
        return view('admin/manage_size', $result);
    }

    public function manage_size_process(Request $request) {
        // return $request->post();
        $request->validate([
            'size' => 'required|unique:sizes,size,'.$request->post('id'),
        ]);
        
        if($request->post('id')>0) {
            $model = Size::find($request->post('id'));
            $msg = "Size Update";
        } else {
            $model = new Size;
            $msg = "Size Inserted";
        }

        $model->size = $request->post('size');
        $model->status = '1';
        $model->save();
        $request->session()->flash("message", $msg);
        return redirect('admin/size');
    }

    public function delete(Request $request, $id) {
        $model = Size::find($id);
        $model->delete();
        $request->session()->flash("message", "Size Delete Success");
        return redirect('admin/size');
    }
    public function status(Request $request, $type ,$id) {
        $model = Size::find($id);
        $model->status = $type;
        $model->save();
        $request->session()->flash("message", "Size Status Success");
        return redirect('admin/size');
    }
}
