<?php

namespace App\Http\Controllers;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $infos=Info::all();
        return view('editdetails',compact('infos'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                 "job"=>["required",'string'],
                "experience"=>['required','between:200,350'],
                'profile_image'=>["mimes:png,jpg,svg,jpeg ",'required'],
                'skills'=>['nullable','string'],
                'location'=>['required','string'],
                'number'=>['required','numeric','digits:11']
            ],[
                'job.required'=>'يجب ادخال المسمى الوظيفى',
                'job.string'=>'المسمى الوظيفى يتكون من نص فقط',
                'experience.required'=>'يجب ادخال نبذة تعرفية ',
                'experience.between'=>'يجب ان لا تقل عن 200 حرف و الا تزيد عن 350 حرف',
                'profile_image'=>'يجب اخنيار صوره شخصية',
                'skills.string'=>'يجب ان تكون نص فقط',
                'location.required'=>'يجب ادخال محل الاقامة',
                'location.string'=>'يجب ان يكون نص',
                'number.required'=>'يجب ادخال رقم التليفون',
                'number.digits'=>'يجب الا يتعدى 11 رقم'
            ]
        );


        $path= $request->profile_image->store('public/profiles_images');

        $info=Info::create([
            'job'=> $request->job,
            'location'=> $request->location,
            'skills'=> $request->skills,
            'experience'=> $request->experience,
            'user_id'=>$request->user_id,
            'number'=>$request->number,
            'profile_image'=>$path ,
        ]);

        return  redirect()->route('info_page')->with('success','تم الاضافة بنجاح');
    }


    public function show(Info $info)
    {
        //
    }


    public function edit($id)
    {

        $infos=Info::all();
        return view ('editdetails2',compact("infos"));
    }


    public function update(Request $request, $id)
    {

        $info=Info::find($id);
        if($request->has('profile_image')){
            $path=$request->profile_image->store('public/profiles_images');
        }else{
            $path=$info->profile_image;

        }

        $request->validate(
            [
                 "job"=>["required",'string'],
                "experience"=>['required','between:200,350'],
                'profile_image'=>["mimes:png,jpg,svg,jpeg "],
                'skills'=>['nullable','string'],
                'location'=>['required','string'],
                'number'=>['required','numeric','digits:11']
            ],[
                'job.required'=>'يجب ادخال المسمى الوظيفى',
                'job.string'=>'المسمى الوظيفى يتكون من نص فقط',
                'experience.required'=>'يجب ادخال نبذة تعرفية ',
                'experience.between'=>'يجب ان لا تقل عن 200 حرف و الا تزيد عن 350 حرف',
                'skills.string'=>'يجب ان تكون نص فقط',
                'location.required'=>'يجب ادخال محل الاقامة',
                'location.string'=>'يجب ان يكون نص',
                'number.required'=>'يجب ادخال رقم التليفون',
                'number.digits'=>'يجب ان يتكون رقم الهاتف من 11 رقم'
            ]
        );

        $info->job=$request->job;
        $info->location=$request->location;
        $info->skills=$request->skills;
        $info->experience=$request->experience;
        $info->user_id=$request->user_id;
        $info->profile_image =$path;
        $info->save();

        return redirect()->route('edit_info_page', ['id'=>$info->id])->with('success','تم تحديث البيانات');
    }


    public function showWorkersList()
    {
        $infos=Info::all();
        return view('workerslist',compact('infos'));
    }

    public function destroy(Info $info)
    {
        //
    }
}
