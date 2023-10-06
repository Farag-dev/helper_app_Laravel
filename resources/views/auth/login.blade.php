@extends('layouts.app')

@section('content')
<!--  login  -->
<div class="create-account container text-center mt-5 mb-5">
    <div class="row fw-bolder d-flex justify-content-center" dir="rtl">
      <h1 class="heading fw-bolder">تسجيل الدخول</h1>
      <form
      method="POST" action="{{ route('login')}}"
        class="create-account-form d-flex flex-column align-items-center col-xxl-5 col-xl-6 col-lg-7 col-md-9 col-11 pt-4 pb-5 mt-3"
      >
      @csrf
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
              <strong>{{ 'البريد الالكترونى أو كلمة المرور خطأ' }}</strong>
          </span>
      @enderror
        </div>
        <div class="password col-xl-9 col-10 text-end mt-3">
          <label
            class="d-flex justify-content-start align-items-start mb-2 col-md-3 col-sm-4 col-7 "
            for="password"
            >كلمة المرور<i class="fa-solid fa-star-of-life"></i
          ></label>
          <input
            class="col-12 "
            type="password"
            name="password" required
            id="password"
            placeholder="أدخل كلمة المرور الخاص بك"
          />

        </div>
        <div class=" col-xl-9 col-10 text-end mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('تذكرنى') }}
                </label>
            </div>
          </div>
        <div class="sign-div col-lg-4 col-md-6 col-8 mt-4">
          <button class="sign" type="submit">تسجيل</button>
          @if (Route::has('password.request'))
          <a class="btn btn-link mt-3 text-decoration-none" href="{{ route('password.request') }}">
              {{ __(' نسيت كلمة السر؟') }}
          </a>
      @endif
        </div>
      </form>
    </div>
  </div>
  <!--  login -->

@endsection
