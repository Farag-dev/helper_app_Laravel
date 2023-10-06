@extends('layouts.app')

@section('content')
<!--  reset pass  -->
<div class="create-account container text-center mt-5 mb-5">
    <div class="row fw-bolder d-flex justify-content-center" dir="rtl">
      <h1 class="heading fw-bolder"> استعادة رمز الدخول</h1>
      @if (session('status'))
                        <div class="alert alert-success mt-2 mb-2" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
      <form
      method="get" action="{{ route('reset.password') }}"
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
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </div>
            <div class="sign-div col-lg-4 col-md-6 col-8 mt-4">
                <button class="sign" type="submit">استعادة رمز الدخول</button>
              </div>
      </form>
    </div>
  </div>
  <!--  reset pass -->

@endsection
