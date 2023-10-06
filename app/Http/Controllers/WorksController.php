<?php

namespace App\Http\Controllers;

use App\Models\Works;
use Illuminate\Http\Request;
use App\Models\Info;
class WorksController extends Controller
{
    public function index()
    {


    }


    public function create()
    {
        $infos=Info::all();
        return view('addwork',compact('infos'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                "description"=>['required','between:200,350'],
                'image1'=>["mimes:png,jpg,svg,jpeg ",'required'],
                'budget'=>['required'],
            ],[
                'description.required'=>'يجب ادخال نبذة تعرفية ',
                'description.between'=>'يجب ان لا تقل عن 200 حرف و الا تزيد عن 350 حرف',
                'image1'=>'يجب اخنيار صوره ',
                'skills.string'=>'يجب ان تكون نص فقط',
                'budget.required'=>'يجب ادخال الميزانية  ',
            ]
        );


            $path=$request->image1->store('public/works_images');
            $work=Works::create([
                'image1'=>$path ,
                'description'=> $request->description,
                'budget'=> $request->budget,
                'user_id'=>$request->user_id,
            ]);



        return  redirect()->route('works_form',['id'=>$work->user_id])->with('success','تم الاضافة بنجاح');
    }


    public function show($id)
    {
        $work=Works::find($id);
        $infos=Info::all();
        return view('workdetails',compact('work','infos'));
    }

    public function edit($id)
    {
        $work=Works::find($id);
        $infos=Info::all();
        return view('editwork',compact('work','infos'));
    }

    public function update(Request $request, $id)
    {
        $work=Works::find($id);
        if($request->has('image1')){
            $path=$request->image1->store('public/works_images');
        }else{
            $path=$work->image1;

        }

        $request->validate(
            [
                "description"=>['required','between:200,350'],
                'image1'=>["mimes:png,jpg,svg,jpeg "],
                'budget'=>['required'],
            ],[
                'description.required'=>'يجب ادخال نبذة تعرفية ',
                'description.between'=>'يجب ان لا تقل عن 200 حرف و الا تزيد عن 350 حرف',
                'image1'=>'يجب اخنيار صوره ',
                'skills.string'=>'يجب ان تكون نص فقط',
                'budget.required'=>'يجب ادخال الميزانية  ',
            ]
        );

        $work->description=$request->description;
        $work->budget=$request->budget;
        $work->user_id=$request->user_id;
        $work->image1 =$path;
        $work->save();

        return redirect()->route('works_edit', ['id'=>$work->id])->with('success','تم تحديث البيانات');
    }

    public function destroy($id)
    {
        $work=Works::find($id)->delete();
        return redirect()->route('home')->with('success','تم إزالة العمل بنجاح');
    }
}
