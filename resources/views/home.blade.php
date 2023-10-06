@extends('layouts.app')

@section('content')
 <!-- Start Profile -->
 <div
 class="profile container d-flex justify-content-end align-items-center flex-column mb-4"
 dir="rtl"
>

@foreach ($infos as $info)
@if (Auth::user()->id == $info->User_id)

<img class="profile-img" src="{{ Storage::url($info->profile_image) }}" alt="" />
@endif
@endforeach

        <p class="mt-2 mb-1">{{ auth()->user()->fname }} {{ auth()->user()->lname}}</p>

@foreach ($infos as $info)
@if (Auth::user()->id == $info->User_id)
 <div class="job text-black-50 mt-0">
   <i class="fa-solid fa-user"></i>
   {{ $info->job }}
 </div>
 <div class="job text-black-50 mt-0">
    <i class="fa-solid fa-location-pin"></i>
    {{ $info->location }}
  </div>

@endif
@endforeach


</div>
@if (session('success'))
         <div class="alert alert-success text-center text-success">
                <h1>{{ session('success') }}</h1>
         </div>
 @endif
<!-- End Profile -->
<!-- Start Tab -->
<div class="tab">
 <div
   class="d-flex flex-md-row flex-column flex-column-reverse justify-content-between"
   dir="rtl"
 >
   <div class="nav nav-tabs p-0 mt-3" id="myTab" role="tablist">
     <div class="nav-item" role="presentation">
       <button
         class="nav-link text-black fw-bolder active"
         id="home-tab"
         data-bs-toggle="tab"
         data-bs-target="#home-tab-pane"
         type="button"
         role="tab"
         aria-controls="home-tab-pane"
         aria-selected="true"
       >
         <i class="fa-solid fa-user"></i>
         الملف الشخصي
       </button>
     </div>
     <div class="nav-item" role="presentation">
       <button
         class="nav-link text-black fw-bolder"
         id="profile-tab"
         data-bs-toggle="tab"
         data-bs-target="#profile-tab-pane"
         type="button"
         role="tab"
         aria-controls="profile-tab-pane"
         aria-selected="false"
       >
         <i class="fa-solid fa-briefcase"></i>
         معرض الأعمال
       </button>
     </div>
   </div>
   <div
     class="tab-buttons tab-buttons-flex d-flex flex-sm-row flex-column justify-content-center align-items-center pb-3 ms-sm-5 ms-0"
   >
     <a href="{{ route('info_page') }}" class="btn sign edit ms-sm-3 ms-0 mb-sm-0 mb-3">
       <i class="fa-solid fa-file-pen ms-2"></i>
       تعديل الملف الشخصي
     </a>
     <button class="btn sign call-me">
       <i class="fa-solid fa-paper-plane ms-2"></i>
       كلمني
     </button>
   </div>
 </div>
 <div class="tab-content m-0 p-xl-5 p-4 pe-4" id="myTabContent" dir="rtl">
   <div
     class="tab-pane fade show active row p-0"
     id="home-tab-pane"
     role="tabpanel"
     aria-labelledby="home-tab"
     tabindex="0"
   >

     <div class="row d-flex justify-content-around">
       <div class="write-about col-xl-7 col-12">
        @foreach ($infos as $info)
        @if (Auth::user()->id == $info->User_id)
         <div class="bg-white mb-4  " >
           <p class="pt-2 pb-0 p-4 fw-bolder">نبذة عنى</p>
           <hr class="mb-0 mt-0" />
           <p class="w-100 h-100 p-2 " name="about-me" id="">
            {{ $info->experience }}
           </p>
         </div>
         <div class="bg-white ">
           <p class="pt-2 pb-0 p-4 fw-bolder">مهاراتى</p>
           <hr class="mb-0 mt-0" />
           <p
             class="w-100 h-100 p-2 border-0"
             name="about-me"
             id=""
           > {{ $info->skills }}</p>
         </div>

@endif
@endforeach

       </div>
       <div class="statistics mt-xl-0 mt-4 col-xl-4 col-12">
         <div class="bg-white">
           <p class="pt-2 pb-0 p-4 fw-bolder">إحصائيات</p>
           <hr class="mb-0 mt-0" />
           <div
             class="d-flex justify-content-between align-items-center pe-3 ps-3 p-4 fw-bolder"
           >
             <div>التقييمات</div>
             <div dir="ltr">
               <i class="fa-solid fa-star"></i>
               @foreach ($infos as $info)
                @if (Auth::user()->id == $info->User_id)
                {{ $info->rate }}
                @endif
                @endforeach

             </div>
           </div>
           <div
             class="d-flex justify-content-between align-items-center pe-3 ps-3 p-0 fw-bolder"
           >
             <p>عدد المهام التى تم تنفيذها</p>
             <p class="calculated bg-secondary text-white pt-2 pb-2 p-4">
               لم يحسب بعد
             </p>
           </div>
           <div
             class="d-flex justify-content-between align-items-center pe-3 ps-3 p-0 fw-bolder"
           >
             <p>عدد المهام الحالية</p>
             <p class="calculated bg-secondary text-white pt-2 pb-2 p-4">
               لم يحسب بعد
             </p>
           </div>
           <div
             class="d-flex justify-content-between align-items-center pe-3 ps-3 p-0 fw-bolder"
           >
             <p>معدل التسليم بالموعد</p>
             <p class="calculated bg-secondary text-white pt-2 pb-2 p-4">
               لم يحسب بعد
             </p>
           </div>
           <hr class="mb-0 mt-0" />
           <div
             class="d-flex justify-content-between align-items-center pe-3 ps-3 pt-2 pb-0 fw-bolder"
           >
             <p>تاريخ التسجيل</p>

                <p>{{ Auth::user()->created_at }}</p>


           </div>
           <div
             class="d-flex justify-content-between align-items-center pe-3 ps-3 p-0 fw-bolder"
           >
             <p>اخر تواجد</p>
             <p> <?php echo date("Y-m-d") ?></p>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div
     class="tab-pane fade"
     id="profile-tab-pane"
     role="tabpanel"
     aria-labelledby="profile-tab"
     tabindex="0"
   >
   <div
     class="tab-buttons tab-buttons-flex d-flex flex-sm-row flex-column justify-content-center align-items-center pb-3 ms-sm-5 ms-0"
   >
     <a href="{{ route('works_form', ['id'=>$info->id]) }}" class="btn sign edit ms-sm-3 ms-0 mb-sm-0 mb-3">
       <i class="fa-solid fa-file-upload ms-2"></i>
       إضافة عمل
     </a>
   </div>
   @if (count($works)>0)

     <div class="row d-flex justify-content-start">
        @foreach ($works as $work)
        @if (Auth::user()->id == $work->User_id)
        <a
         class="business-exhibition text-decoration-none text-black d-flex flex-column justify-content-center align-items-center col-xl-3 col-lg-4 col-md-5 col-12"
         href="{{ route('works_details', ['id'=>$work->id]) }}"
       >
         <div class="business-img bg-white rounded-2 p-2 mb-1">
           <img class="" style="width:250px; height: 250px;" src="{{ Storage::url($work->image1)}}" alt="" />
         </div>

       </a>
       @endif


    @endforeach


    </div>


</div>


       @else
<h1 class="alert alert-danger text-center text-danger">لا يوجد أعمال بعد </h1>
@endif



     </div>
   </div>
 </div>
</div>
<!-- End Tab -->
@endsection
