@extends('layouts.app')

@section('content')
 <!-- Start Personal Profile -->
 <div class="personal-profile pb-5" dir="rtl">
    <div class="container-fluid p-5 pb-4">
      <h1 class="heading fw-bolder">تعديل عملك </h1>
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

        </div>
        <div
          class="personal-profile-form-section bg-white text-center p-5 pb-3 ms-lg-5 ms-0 col-lg-8 col-12"
        >
        @if (session('success'))
                    <div class="alert alert-success text-center text-success">
                            <h1>{{ session('success') }}</h1>
                    </div>
                    @endif

          <form method="post"enctype="multipart/form-data" action="{{ route('works_update', ['id'=>$work->id]) }}" >
            @csrf
            @method("PUT")
            <label class="file-input text-end p-2 pe-3 rounded-4 w-100 mb-2">
              <input
                type="file"
                class="file w-100"
                id="file"
                name="image1"
                accept="image/*"
                class="@error('image1') is-invalid @enderror"
              />
              <label for="file">إضافة صورة</label>
              @error('image1')
            <div class="alert m-0 p-0 text-danger" >{{ $message }}</div>
          @enderror

            </label>


            <div class="job-details col-12 text-end mt-3">
              <label
                class="d-flex justify-content-start align-items-start mb-2"
                for="jobDetails"
                >النبذة التعريفية عن العمل
              </label>
              <textarea
                class="col-12 p-2 pe-3 rounded-3 @error('description') is-invalid @enderror"
                name="description"
                id="jobDetails"
                placeholder=""
                rows="5"
              >{{ $work->description }}</textarea>
              @error('description')
              <div class="alert m-0 p-0 text-danger" >{{ $message }}</div>
            @enderror
            </div>
            <div class="job-skills col-12 text-end mt-3">
              <label
                class="d-flex justify-content-start align-items-start mb-2"
                for="jobSkills"
                >التكلفه</label
              >
              <input
                class="col-12 p-2 pe-3 rounded-3 @error('budget') is-invalid @enderror"
                type="number"
                value="{{ $work->budget }}"
                name="budget"
                id="jobSkills"
                placeholder=""
              />
              <small class="text-black-50"
                >أضف  الميزانبة المتوقعه   </small
              >
              @error('budget')
              <div class="alert m-0 p-0 text-danger" >{{ $message }}</div>
            @enderror
            </div>
            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            <div class="text-start">
              <button type="submit" class="save">حفظ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Personal Profile -->
@endsection
