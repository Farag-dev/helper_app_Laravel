@extends('layouts.app')

@section('content')

    <!-- Start Search About Worker Section-->
    <div class="search-about-section pb-5" dir="rtl">
        <div class="d-flex justify-content-between align-items-center p-5 pb-4">
          <h1 class="heading fw-bolder">ابحث عن عمال</h1>
          <button class="d-xl-none d-block filter-btn" dir="ltr">
            <i class="fa-solid fa-sliders"></i>
          </button>
        </div>
        <div
          class="search-about-worker d-flex justify-content-sm-around justify-content-center align-items-start pb-3"
          dir="rtl"
        >
          <!-- *** -->
          <div class="filter col-xl-2 col-12 p-xl-0 p-5">
            <form class="filter-search">
              <div
                class="side-filter d-xl-none d-flex justify-content-between align-items-center col-12"
              >
                <!-- *** -->
                <div
                  class="back d-flex justify-content-between align-items-center"
                >
                  <!-- *** -->
                  <i class="fa-solid fa-chevron-right"></i>
                  عودة
                </div>
                <button class="submit">عرض النتائج</button>
              </div>
              <hr class="d-xl-none d-block" />
              <p class="fw-bolder mb-2">البحث</p>
              <div class="search-filter text-end m-0 mb-3">
                <input
                  class="col-12"
                  type="text"
                  name=""
                  id="searchFilter"
                  placeholder=""
                />
                <!-- *** -->
              </div>
              <p class="fw-bolder mb-2">التخصص</p>
              <div
                class="check-filter d-flex flex-column justify-content-start align-items-start fw-bold m-2"
              >
                <!-- *** -->
                <div class="carpentry col-12">
                  <input class="ms-1" type="checkbox" name="" id="carpentryID" />
                  <label for="carpentryID">نجارة</label>
                </div>
                <div class="electricity">
                  <input
                    class="ms-1"
                    type="checkbox"
                    name=""
                    id="electricityID"
                  />
                  <!-- *** -->
                  <label for="electricityID">كهرباء</label>
                </div>
                <div class="paint">
                  <input class="ms-1" type="checkbox" name="" id="paintID" />
                  <label for="paintID">دهان ونقاشة</label>
                </div>
                <div class="conditioning">
                  <input
                    class="ms-1"
                    type="checkbox"
                    name=""
                    id="conditioningID"
                  />
                  <!-- *** -->
                  <label for="conditioningID">تكييف وتبريد</label>
                </div>
                <div class="decor">
                  <input class="ms-1" type="checkbox" name="" id="decorID" />
                  <label for="decorID">ديكور</label>
                </div>
                <div class="blacksmith">
                  <input class="ms-1" type="checkbox" name="" id="blacksmithID" />
                  <label for="blacksmithID">حدادة</label>
                </div>
                <div class="building">
                  <input class="ms-1" type="checkbox" name="" id="buildingID" />
                  <label for="buildingID">بناء</label>
                </div>
                <div class="plumbing">
                  <input class="ms-1" type="checkbox" name="" id="plumbingID" />
                  <label for="plumbingID">سباكة</label>
                </div>
              </div>

            </form>
          </div>
          <div class="workers bg-white p-0 col-xl-9 col-11">
            <div class="workers-users">
              <div class="card worker pt-3 pb-3 p-0 ">
                @foreach ($infos as $info)

                <div
                  class="row flex-nowrap justify-content-around col-12 m-0 p-0 ps-4 pe-3 mb-2"
                >
                  <!-- *** -->
                  <a
                    class="user-card-avatar d-flex align-items-center justify-content-center"
                    href="#"
                  >
                    <!-- *** -->
                    <img
                      src="{{ Storage::url($info->profile_image) }}"
                      class="user-img-avatar"
                      alt=""
                    />
                    <!-- *** -->
                    
                  </a>
                  <div class="user-body p-0 col-10">
                    <div class="card-body p-0">
                      <div
                        class="d-flex align-items-center justify-content-between"
                      >
                        <!-- *** -->
                        <div
                          class="card-top-title-job col-md-8 col-12 d-flex me-3"
                        >
                          <!-- *** -->
                          <a
                            class="card-title text-decoration-none user-name"
                            href="#"
                          >
                            <!-- *** -->
                            {{ $info->user->fname}} {{ $info->user->lname}}

                          </a>
                          <div
                            class="d-flex justify-content-center align-items-center text-black-50 fw-bolder me-4"
                          >
                            <!-- *** -->
                            <div class="ms-3">
                              <i class="fa-solid fa-star text-warning"></i>
                              <span> {{ $info->rate }} </span>
                            </div>
                            <div>
                              <i class="fa-solid fa-briefcase"></i>
                              <span> {{ $info->job }} </span>
                            </div>
                          </div>
                        </div>
                        <div class="tab-buttons d-md-flex d-none ">
                          <a class="btn sign call-me " href="#">
                            <i class="fa-solid fa-paper-plane ms-1"></i>
                            0{{ $info->number }}
                          </a>
                        </div>
                      </div>
                      <a class="text-decoration-none mt-3" href="#">
                        <p class="card-text me-4">
                            {{ $info->skills }}
                        </p>
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>

            </div>
            <div class="see-more">
              <a
                class="d-flex justify-content-start align-items-center text-black-50 text-decoration-none fw-bolder fs-4 me-4 m-2"
                href="#"
              >
                <!-- *** -->
                <i class="fa-solid fa-angles-right ms-2"></i>
                أعرض المزيد
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- End Search About Worker Section-->







@endsection
