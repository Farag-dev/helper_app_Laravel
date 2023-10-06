@extends('layouts.app')

@section('content')
 <!-- Start Personal Profile -->
 <div class="personal-profile pb-5" dir="rtl">
    <div class="container-fluid p-5 pb-4">
      <h1 class="heading fw-bolder"> إضافة البيانات </h1>
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


           <a href="{{ route('home') }}"><p class="user-name mt-3 mb-2">{{ auth()->user()->fname }} {{ auth()->user()->lname}}</p></a>
            <hr />
            <a class="text-decoration-none" href="{{ route('edit_info_page', ['id'=>$info->id]) }}">
              <i class="fa-solid fa-user-pen ms-1"></i>
              <span>تعديل الملف الشخصي</span>
            </a>
            @endif
            @endforeach
          </div>
          <div class="settings-personal-profile text-end">
            <hr />
            <h5 class="p-3 pb-2 pt-0 fw-bold">إعدادات</h5>
            <div
              class="d-flex justify-content-end flex-column align-items-start"
            >
              <a
                class="text-decoration-none me-0 p-3 w-100 active"
                href="personal-profile.html"
                ><i class="fa-solid fa-user"></i> ملفك الشخصي</a
              >
              <a class="text-decoration-none me-0 p-3 w-100" href="#"
                ><i class="fa-solid fa-bell"></i> تنبيهاتي</a
              >
            </div>
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

          <form method="post"enctype="multipart/form-data" action="{{ route('store_info_page') }}" >
            @csrf

            <label class="file-input text-end p-2 pe-3 rounded-4 w-100">
              <input
                type="file"
                class="file w-100"
                id="file"
                name="profile_image"
                accept="image/*"
                class="@error('profile_image') is-invalid @enderror"
              />
              <label for="file">إضافة صورة</label>
              @error('profile_image')
            <div class="alert m-0 p-0 text-danger" >{{ $message }}</div>
          @enderror
            </label>
            <div class="job-name col-12 text-end mt-3">
              <label
                class="d-flex justify-content-start align-items-start mb-2"
                for="jobName"
                >المسمى الوظيفي<i class="fa-solid fa-star-of-life"></i
              ></label>
              <input
                class="col-12 p-2 pe-3 rounded-3 @error('job') is-invalid @enderror"
                type="text"
                name="job"
                id="jobName"
                placeholder=""
              />
              <small class="text-black-50"
                >أدرج عنوانا موجزا يصف مهنتك بشكل دقيق.</small
              >
              @error('job')
            <div class="alert m-0 p-0 text-danger" >{{ $message }}</div>
          @enderror
            </div>

              <div class="job-name col-12 text-end mt-3">
                <label
                  class="d-flex justify-content-start align-items-start mb-2"
                  for="location"
                  > محل الاقامة<i class="fa-solid fa-star-of-life"></i
                ></label>
                <input
                  class="col-12 p-2 pe-3 rounded-3 @error('location') is-invalid @enderror"
                  type="text"
                  name="location"
                  id="location"
                  placeholder=""
                />
                @error('location')
                <div class="alert m-0 text-danger" >{{ $message }}</div>
              @enderror
            </div>
            <div class="job-name col-12 text-end mt-3">
                <label
                  class="d-flex justify-content-start align-items-start mb-2"
                  for="number"
                  >  رقم التليفون<i class="fa-solid fa-star-of-life"></i
                ></label>
                <input
                  class="col-12 p-2 pe-3 rounded-3 @error('number') is-invalid @enderror"
                  type="text"
                  name="number"
                  id="number"
                  placeholder=""
                />
                @error('number')
                <div class="alert m-0 p-0 text-danger" >{{ $message }}</div>
              @enderror

            </div>
            <div class="job-details col-12 text-end mt-3">
              <label
                class="d-flex justify-content-start align-items-start mb-2"
                for="jobDetails"
                >النبذة التعريفية
              </label>
              <textarea
                class="col-12 p-2 pe-3 rounded-3 @error('experience') is-invalid @enderror"
                name="experience"
                id="jobDetails"
                placeholder=""
                rows="5"
              ></textarea>
              @error('experience')
              <div class="alert m-0 p-0 text-danger" >{{ $message }}</div>
            @enderror
            </div>
            <div class="job-skills col-12 text-end mt-3">
              <label
                class="d-flex justify-content-start align-items-start mb-2"
                for="jobSkills"
                >المهارات</label
              >
              <input
                class="col-12 p-2 pe-3 rounded-3 @error('skills') is-invalid @enderror"
                type="text"
                name="skills"
                id="jobSkills"
                placeholder=""
              />
              <small class="text-black-50"
                >أضف المهارات ذات الصلة بمجال تخصصك</small
              >
              @error('skills')
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
