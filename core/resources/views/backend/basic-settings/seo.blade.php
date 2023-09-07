@extends('backend.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('backend.partials.rtl-style')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('SEO Informations') }}</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('Basic Settings') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('SEO Informations') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form action="{{ route('admin.basic_settings.update_seo', ['language' => request()->input('language')]) }}" method="post">
          @csrf
          <div class="card-header">
            <div class="row">
              <div class="col-lg-10">
                <div class="card-title">{{ __('Update SEO Informations') }}</div>
              </div>

              <div class="col-lg-2">
                @includeIf('backend.partials.languages')
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For Home Page') }}</label>
                  <input class="form-control" name="meta_keyword_home" value="{{ $data != null ? $data->meta_keyword_home : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For Home Page') }}</label>
                  <textarea class="form-control" name="meta_description_home" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_home : '' }}</textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For Courses Page') }}</label>
                  <input class="form-control" name="meta_keyword_courses" value="{{ $data != null ? $data->meta_keyword_courses : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For Courses Page') }}</label>
                  <textarea class="form-control" name="meta_description_courses" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_courses : '' }}</textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For Instructors Page') }}</label>
                  <input class="form-control" name="meta_keyword_instructors" value="{{ $data != null ? $data->meta_keyword_instructors : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For Instructors Page') }}</label>
                  <textarea class="form-control" name="meta_description_instructors" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_instructors : '' }}</textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For Blog Page') }}</label>
                  <input class="form-control" name="meta_keyword_blog" value="{{ $data != null ? $data->meta_keyword_blog : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For Blog Page') }}</label>
                  <textarea class="form-control" name="meta_description_blog" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_blog : '' }}</textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For FAQ Page') }}</label>
                  <input class="form-control" name="meta_keyword_faq" value="{{ $data != null ? $data->meta_keyword_faq : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For FAQ Page') }}</label>
                  <textarea class="form-control" name="meta_description_faq" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_faq : '' }}</textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For Contact Page') }}</label>
                  <input class="form-control" name="meta_keyword_contact" value="{{ $data != null ? $data->meta_keyword_contact : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For Contact Page') }}</label>
                  <textarea class="form-control" name="meta_description_contact" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_contact : '' }}</textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For Login Page') }}</label>
                  <input class="form-control" name="meta_keyword_login" value="{{ $data != null ? $data->meta_keyword_login : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For Login Page') }}</label>
                  <textarea class="form-control" name="meta_description_login" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_login : '' }}</textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For Signup Page') }}</label>
                  <input class="form-control" name="meta_keyword_signup" value="{{ $data != null ? $data->meta_keyword_signup : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For Signup Page') }}</label>
                  <textarea class="form-control" name="meta_description_signup" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_signup : '' }}</textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>{{ __('Meta Keywords For Forget Password Page') }}</label>
                  <input class="form-control" name="meta_keyword_forget_password" value="{{ $data != null ? $data->meta_keyword_forget_password : '' }}" placeholder="Enter Meta Keywords" data-role="tagsinput">
                </div>

                <div class="form-group">
                  <label>{{ __('Meta Description For Forget Password Page') }}</label>
                  <textarea class="form-control" name="meta_description_forget_password" rows="5" placeholder="Enter Meta Description">{{ $data != null ? $data->meta_description_forget_password : '' }}</textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">
                  {{ __('Update') }}
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
