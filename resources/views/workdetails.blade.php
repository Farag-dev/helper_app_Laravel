@extends('layouts.app')

@section('content')
 <!-- Start Personal Profile -->
 <div class="personal-profile pb-5" dir="rtl">
    <div class="container-fluid p-5 pb-4">
      <h1 class="heading fw-bolder">معرض الاعمال  </h1>
    </div>
    <div class="container-fluid p-sm-3 p-0">
      <div
        class="d-lg-flex d-block justify-content-lg-between justify-content-center align-items-start"
        dir="rtl"
      >
        <div
          class="personal-profile-section bg-white text-center pt-4 pb-0 p-0 me-lg-4 me-0 mb-lg-0 mb-4 col-lg-3 col-12"
        >
          <div class="user-personal-profile pb-2">
            @foreach ($infos as $info)
            @if (Auth::user()->id == $info->User_id)
            <img class="personal-profile-img" src="{{ Storage::url($info->profile_image) }}" alt="" />

            @endif
            @endforeach

           <a href="{{ route('home') }}"><p class="user-name mt-3 mb-2">{{ auth()->user()->fname }} {{ auth()->user()->lname}}</p></a>

          </div>
          <div class="settings-personal-profile text-end">

            <div
              class="d-flex justify-content-end flex-column align-items-start"
            >

            </div>
          </div>
        </div>
        <div
          class="personal-profile-form-section bg-white text-center p-5 pb-3 ms-lg-5 ms-0 col-lg-8 col-12"
        >
        <img class="w-50 h-50" src="{{ Storage::url($work->image1)}}" alt="" />
        <p>{{ $work->description }}</p>
        <h6> التكلفه المتوقعه : {{ $work->budget }} جنيه</h6>
        <a class="text-center" href="{{ route('works_edit', ['id'=>$work->id]) }}"><i class="fa fa-edit text-warning"></i></a>
        <td>
         <button  class="text-center me-2" style="background-color: rgba(250, 250, 250, 0); border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $work->id }}">
             <i class="fa fa-trash text-center text-danger "></i>
 </button>
         <form action="{{ route('works_delete', ['id'=>$work->id]) }}" method="post">
             @csrf
             @method('DELETE')

             <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $work->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">انتظر</h5>
<button  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
هل أنت متاكد من حذف العمل؟
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-outline-danger"> delete</button>
</div>
</div>
</div>
</div>

            </div>

        </div>
      </div>
    </div>
  </div>
  <!-- End Personal Profile -->
@endsection
