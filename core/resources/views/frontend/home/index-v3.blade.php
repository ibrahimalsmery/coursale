@extends('frontend.layout')

@section('pageHeading')
  {{ __('Home') }}
@endsection

@section('metaKeywords')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_keyword_home }}
  @endif
@endsection

@section('metaDescription')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_description_home }}
  @endif
@endsection

@section('content')
@php
    if (!empty($heroInfo)) {
      $heroBg = asset('assets/img/hero-section/' . $heroInfo->background_image);
    } else {
      $heroBg = asset('assets/img/static/hero-3.jpeg');
    }
@endphp
  <!--====== BANNER PART START ======-->
  <section class="banner-area banner-area-3 bg_cover lazy" data-bg="{{ $heroBg }}">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="banner-content text-center">
            <span>{{ !empty($heroInfo->first_title) ? $heroInfo->first_title : '' }}</span>
            <h1 class="title">{{ !empty($heroInfo->second_title) ? $heroInfo->second_title : '' }}</h1>
            <ul>
              @if (!empty($heroInfo->first_button) && !empty($heroInfo->first_button_url))
                <li><a class="main-btn" href="{{ $heroInfo->first_button_url }}">{{ $heroInfo->first_button }}</a></li>
              @endif

              @if (!empty($heroInfo->second_button) && !empty($heroInfo->second_button_url))
                <li><a class="main-btn-2 main-btn" href="{{ $heroInfo->second_button_url }}">{{ $heroInfo->second_button }}</a></li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>

    @if (!empty($heroInfo->image))
      <div class="banner-thumb">
        <img data-src="{{ asset('assets/img/hero-section/' . $heroInfo->image) }}" class="lazy" alt="image">
      </div>
    @endif
  </section>
  <!--====== BANNER PART END ======-->

  <!--====== WE DO/FEATURES PART START ======-->
  @if ($secInfo->features_section_status == 1)
    <section class="we-do-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title section-title-2 text-center">
              <span></span>
              <h3 class="title">{{ !empty($secTitleInfo->features_section_title) ? $secTitleInfo->features_section_title : '' }}</h3>
            </div>
          </div>
        </div>

        @if (count($features) == 0)
          <div class="row text-center">
            <div class="col">
              <h3>{{ __('No Feature Found') . '!' }}</h3>
            </div>
          </div>
        @else
          <div class="row justify-content-center">
            @foreach ($features as $feature)
              @php $color = $feature->background_color; @endphp
              <style>
                .we-do-3 .single-we-do i.icon{{$loop->iteration}}::after {
                  border-top-color: #{{$color}};
                  border-bottom-color: #{{$color}};
                }
              </style>
              <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="single-we-do text-center mt-30">

                  <i class="{{ $feature->icon }} icon{{$loop->iteration}}" style="color: {{ '#' . $color }}"></i>
                  <h4 class="title">{{ $feature->title }}</h4>
                  <p>{{ $feature->text }}</p>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>
  @endif
  <!--====== WE DO/FEATURES PART END ======-->

  <!--====== CATEGORIES PART START ======-->
  @if ($secInfo->course_categories_section_status == 1)
    <div class="services-area-3 bg_cover lazy" @if (!empty($courseCategoryData)) data-bg="{{ asset('assets/img/' . $courseCategoryData->course_categories_section_image) }}" @endif>
      <div class="container">
        @if (count($categories) == 0)
          <div class="row text-center">
            <div class="col">
              <h3 class="text-light mt-30">{{ __('No Course Category Found') . '!' }}</h3>
            </div>
          </div>
        @else
          <div class="row justify-content-center">
            @foreach ($categories as $category)
              <div class="col-lg-3 col-md-6 col-sm-9">
                <a class="single-services text-center mt-30 d-block" href="{{ route('courses', ['category' => $category->slug]) }}">
                  <i class="{{ $category->icon }}" style="color: {{ '#' . $category->color }};"></i>
                  <span>{{ $category->name }}</span>
                </a>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  @endif
  <!--====== CATEGORIES PART END ======-->

  <!--====== ABOUT PART START ======-->
  @if ($secInfo->about_us_section_status == 1)
    <section class="exp-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="exp-thumb mr-50">
              @if (!empty($aboutUsInfo))
                <img data-src="{{ asset('assets/img/about-us-section/' . $aboutUsInfo->image) }}" class="lazy" alt="image">
              @endif
            </div>
          </div>

          <div class="col-lg-6">
            <div class="exp-content-area">
              <div class="top-content">
                <span>{{ !empty($aboutUsInfo->title) ? $aboutUsInfo->title : '' }}</span>
                <h3 class="title">{{ !empty($aboutUsInfo->subtitle) ? $aboutUsInfo->subtitle : '' }}</h3>
                <p>{{ !empty($aboutUsInfo->text) ? $aboutUsInfo->text : '' }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif
  <!--====== ABOUT PART END ======-->

  <!--====== OUR COURSES PART START ======-->
  @if ($secInfo->featured_courses_section_status == 1)
    <section class="our-courses-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title section-title-2">
              <span></span>
              <h3 class="title">{{ !empty($secTitleInfo->featured_courses_section_title) ? $secTitleInfo->featured_courses_section_title : '' }}</h3>

              @if (count($categories) > 0)
                <ul class="nav nav-pills d-flex justify-content-between" id="pills-tab" role="tablist">
                  @foreach ($categories as $category)
                    <li class="nav-item">
                      <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ 'category-' . $category->id . '-tab' }}" data-toggle="pill" href="{{ '#category-' . $category->id }}" role="tab" aria-controls="{{ 'category-' . $category->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->name }}</a>
                    </li>
                  @endforeach
                </ul>
              @endif
            </div>
          </div>
        </div>

        @if (count($categories) == 0)
          <div class="row text-center">
            <div class="col">
              <h3>{{ __('No Featured Course Found') . '!' }}</h3>
            </div>
          </div>
        @else
          <div class="tab-content" id="categories-tabContent">
            @foreach ($categories as $category)
              <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ 'category-' . $category->id }}" role="tabpanel" aria-labelledby="{{ 'category-' . $category->id . '-tab' }}">
                @php $courses = $category->courses; @endphp

                @if (count($courses) == 0)
                  <div class="row text-center">
                    <div class="col">
                      <h3 class="mt-30">{{ __('No Course Found') . '!' }}</h3>
                    </div>
                  </div>
                @else
                  <div class="courses-active-3">
                    @foreach ($courses as $course)
                      <div class="single-courses-3 mt-30">
                        <div class="courses-thumb">
                          <img data-src="{{ asset('assets/img/courses/thumbnails/' . $course->thumbnail_image) }}" class="lazy" alt="image">
                          <a class="courses-overlay d-block" href="{{ route('course_details', ['slug' => $course->slug]) }}">
                            <ul>
                              @if (!is_null($course->average_rating))
                                <li><i class="fas fa-star"></i> <span>{{ $course->average_rating . ' ' . __('Ratings') }}</span></li>
                              @endif

                              <li><p>{{ $category->name }}</p></li>
                            </ul>
                          </a>
                        </div>

                        <div class="courses-content">
                          <a href="{{ route('course_details', ['slug' => $course->slug]) }}">
                            <h5 class="title">{{ strlen($course->title) > 40 ? mb_substr($course->title, 0, 40, 'UTF-8') . '...' : $course->title }}</h5>
                          </a>
                          <p>{!! strlen(strip_tags($course->description)) > 80 ? mb_substr(strip_tags($course->description), 0, 80, 'UTF-8') . '...' : strip_tags($course->description) !!}</p>
                          <ul>
                            <li><i class="fal fa-user"></i>{{strlen($course->instructorName) > 12 ? mb_substr($course->instructorName, 0, 12, 'utf-8') . '...' : $course->instructorName}}</li>
                            <li>
                              @if ($course->pricing_type == 'premium')
                                <p>
                                  <span>{{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}{{ $course->current_price }}{{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}</span>
                                  @if (!empty($course->previous_price))
                                    <del>{{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}{{ $course->previous_price }}{{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}</del>
                                  @endif
                                </p>
                              @else
                                <p>{{ __('Price') . ':' }} <span>{{ __('Free') }}</span></p>
                              @endif
                            </li>
                          </ul>
                        </div>
                      </div>
                    @endforeach
                  </div>
                @endif
              </div>
            @endforeach
          </div>
        @endif
        
        @if (!empty(showAd(3)))
          <div class="text-center mt-5">
            {!! showAd(3) !!}
          </div>
        @endif
      </div>
    </section>
  @endif
  <!--====== OUR COURSES PART END ======-->

  <!--====== NEWSLETTER PART START ======-->
  @if ($secInfo->newsletter_section_status == 1)
    <section class="faq-answer-area faq-answer-area-2 bg_cover lazy" @if (!empty($newsletterData)) data-bg="{{ asset('assets/img/newsletter-section/' . $newsletterData->background_image) }}" @endif>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title section-title-2 text-center">
              <span></span>
              <h3 class="title">{{ !empty($newsletterData->title) ? $newsletterData->title : '' }}</h3>
            </div>
          </div>
        </div>

        <form class="subscriptionForm" action="{{ route('store_subscriber') }}" method="POST">
          @csrf
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="input-box text-center mt-30">
                <input type="email" placeholder="{{ __('Enter Your Email Address') }}" name="email_id">
                <i class="fal fa-envelope"></i>
                <button type="submit">{{ __('Subscribe') }}</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  @endif
  <!--====== NEWSLETTER PART END ======-->

  <!--====== COUNTER INFORMATION PART START ======-->
  @if ($secInfo->fun_facts_section_status == 1)
    <section class="counter-3-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title section-title-2 text-center">
              <span></span>
              <h3 class="title">{{ !empty($factData->title) ? $factData->title : '' }}</h3>
            </div>
          </div>
        </div>

        @if (count($countInfos) == 0)
          <div class="row text-center">
            <div class="col">
              <h3 class="mt-3">{{ __('No Information Found') . '!' }}</h3>
            </div>
          </div>
        @else
          <div class="row justify-content-center">
            @foreach ($countInfos as $countInfo)
              <div class="col-lg-3 col-md-6 col-sm-9">
                <div class="single-counter text-center mt-30">
                  <i class="{{ $countInfo->icon }}" style="color: {{ '#' . $countInfo->color }};"></i>
                  <span><span class="counter">{{ $countInfo->amount }}</span>+</span>
                  <p>{{ $countInfo->title }}</p>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>
  @endif
  <!--====== COUNTER INFORMATION PART END ======-->

  <!--====== BLOG PART START ======-->
  @if ($secInfo->latest_blog_section_status == 1)
    <section class="news-3-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title section-title-2 text-center">
              <span></span>
              <h3 class="title">{{ !empty($secTitleInfo->blog_section_title) ? $secTitleInfo->blog_section_title : '' }}</h3>
            </div>
          </div>
        </div>

        @if (count($blogs) == 0)
          <div class="row text-center">
            <div class="col">
              <h3 class="mt-3">{{ __('No Blog Found') . '!' }}</h3>
            </div>
          </div>
        @else
          <div class="row justify-content-center">
            @foreach ($blogs as $blog)
              <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="single-news mt-30">
                  <a class="news-thumb d-block" href="{{ route('blog_details', ['slug' => $blog->slug]) }}">
                    <img data-src="{{ asset('assets/img/blogs/' . $blog->image) }}" class="lazy" alt="image">
                  </a>

                  <div class="news-content">
                    <ul>
                      <li><i class="fal fa-user"></i> {{ $blog->author }}</li>
                    </ul>
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}">
                      <h3 class="title">{{ strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'UTF-8') . '...' : $blog->title }}</h3>
                    </a>
                    <div class="btns d-flex justify-content-between align-items-center">
                      <a class="category" href="{{route('blogs', ['category' => $blog->categorySlug])}}">{{ $blog->categoryName }}</a>
                      <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}"><i class="fas fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
        @if (!empty(showAd(3)))
          <div class="text-center mt-5">
            {!! showAd(3) !!}
          </div>
        @endif
      </div>
    </section>
  @endif
  <!--====== BLOG PART END ======-->
@endsection
