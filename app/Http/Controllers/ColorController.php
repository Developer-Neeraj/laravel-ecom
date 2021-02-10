<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index() {
        $result["data"] = Color::all();
        return view('admin/color', $result);
    }

    public function manage_color(Request $request, $id='') {
        if($id>0) {
            $arr = Color::where(["id"=>$id])->get();
            $result['color'] = $arr['0']->color;
            $result['id'] = $arr['0']->id;
        } else {
            $result['color'] = '';
            $result['id'] = 0;
        }
        return view('admin/manage_color', $result);
    }

    public function manage_color_process(Request $request) {
        // return $request->post();
        $request->validate([
            'color' => 'required|unique:colors,color,'.$request->post('id'),
        ]);
        
        if($request->post('id')>0) {
            $model = Color::find($request->post('id'));
            $msg = "Color Update";
        } else {
            $model = new Color;
            $msg = "Color Inserted";
        }

        $model->color = $request->post('color');
        $model->status = '1';
        $model->save();
        $request->session()->flash("message", $msg);
        return redirect('admin/color');
    }

    public function delete(Request $request, $id) {
        $model = Color::find($id);
        $model->delete();
        $request->session()->flash("message", "Color Delete Success");
        return redirect('admin/color');
    }
    public function status(Request $request, $type ,$id) {
        $model = Color::find($id);
        $model->status = $type;
        $model->save();
        $request->session()->flash("message", "Color Status Success");
        return redirect('admin/color');
    }
}
