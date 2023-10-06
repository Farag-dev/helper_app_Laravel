@extends('layouts.app')

@section('content')
 <!-- Start Create Account -->
 <div class="create-account container text-center mt-5 mb-5">
    <div class="row fw-bolder d-flex justify-content-center" dir="rtl">
      <h1 class="heading fw-bolder">إنشاء حساب جديد</h1>
      <form
      method="POST" action="{{ route('register') }}"
        class="create-account-form d-flex flex-column align-items-center col-xxl-5 col-xl-6 col-lg-7 col-md-9 col-11 pt-4 pb-5 mt-3"
      >
      @csrf
        <div class="first-name col-xl-9 col-10 text-end mt-3">
          <label
            class="d-flex justify-content-start align-items-start mb-2 col-sm-2 col-3"
            for="fName"
            >الاسم<i class="fa-solid fa-star-of-life"></i
          ></label>
          <input
            class="col-12 @error('fname') is-invalid @enderror"
            type="text"
            id="fName"
            placeholder="اكتب اسمك باللغة العربية"name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus
          />
          @error('fname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="last-name col-xl-9 col-10 text-end mt-3">
          <label
            class="d-flex justify-content-start align-items-start mb-2 col-md-3 col-sm-4 col-7"
            for="lName"
            >اسم العائلة<i class="fa-solid fa-star-of-life"></i
          ></label>
          <input
            class="col-12 @error('lname') is-invalid @enderror"
            type="text"
            name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus
            id="lName"
            placeholder="اكتب اسم العائلة باللغة العربية"
          />
          @error('lname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="email col-xl-9 col-10 text-end mt-3">
          <label
            class="d-flex justify-content-start align-items-start mb-2 col-xl-4 col-sm-4 col-8  @error('email') is-invalid @enderror"
            for="email"
            ><span>البريد الإلكتروني</span
            ><i class="fa-solid fa-star-of-life"></i
          ></label>
          <input
            class="col-12"
            type="email"
            name="email" value="{{ old('email') }}" required autocomplete="email"
            id="email"
            placeholder="أدخل البريد الإلكتروني الخاص بك"
          />
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ "الرجاء كتابة البريد بشكل صحيح "}}</strong>
          </span>
      @enderror
        </div>
        <div class="password col-xl-9 col-10 text-end mt-3">
          <label
            class="d-flex justify-content-start align-items-start mb-2 col-md-3 col-sm-4 col-7"
            for="password"
            >كلمة المرور<i class="fa-solid fa-star-of-life"></i
          ></label>
          <input
            class="col-12 @error('password') is-invalid @enderror"
            type="password"
            name="password" required autocomplete="new-password"
            id="password"
            placeholder="أدخل كلمة المرور الخاص بك"
          />
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ 'كلمة المرور يجب أن تكون أكثر من 8 رموز ' }}</strong>
          </span>
      @enderror
        </div>
        <div class="password col-xl-9 col-10 text-end mt-3">
            <label
              class="d-flex justify-content-start align-items-start mb-2 col-md-3 col-sm-4 col-7"
              for="password-confirm"
              >تاكيد كلمة المرور <i class="fa-solid fa-star-of-life"></i
            ></label>
            <input
              class="col-12 @error('password') is-invalid @enderror"
              type="password"
              name="password_confirmation" required autocomplete="new-password"
              id="password-confirm"
              placeholder="أدخل كلمة المرور الخاص بك"
            />
          </div>
        <div class="sign-div col-lg-4 col-md-6 col-8 mt-4">
          <button class="sign" type="submit">تسجيل</button>
        </div>
      </form>
    </div>
  </div>
  <!-- End Create Account -->

@endsection
