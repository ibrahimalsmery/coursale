@extends('frontend.layout')

@section('pageHeading')
  {{ __('Dashboard') }}
@endsection

@section('content')
  @includeIf('frontend.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => __('Dashboard')])

  <!-- Start User Dashboard Section -->
  <section class="user-dashboard">
    <div class="container">
      <div class="row">
        @includeIf('frontend.user.side-navbar')

        <div class="col-lg-9">
          <div class="row mb-5">
            <div class="col-lg-12">
              <div class="user-profile-details">
                <div class="account-info">
                  <div class="title">
                    <h4>{{ __('Account Information') }}</h4>
                  </div>

                  <div class="main-info">
                    <ul class="list">
                      @if ($authUser->first_name != null && $authUser->last_name != null)
                        <li><span>{{ __('Name') . ':' }}</span></li>
                      @endif

                      <li><span>{{ __('Username') . ':' }}</span></li>

                      <li><span>{{ __('Email') . ':' }}</span></li>

                      @if ($authUser->contact_number != null)
                        <li><span>{{ __('Phone') . ':' }}</span></li>
                      @endif

                      @if ($authUser->address != null)
                        <li><span>{{ __('Address') . ':' }}</span></li>
                      @endif

                      @if ($authUser->city != null)
                        <li><span>{{ __('City') . ':' }}</span></li>
                      @endif

                      @if ($authUser->state != null)
                        <li><span>{{ __('State') . ':' }}</span></li>
                      @endif

                      @if ($authUser->country != null)
                        <li><span>{{ __('Country') . ':' }}</span></li>
                      @endif
                    </ul>

                    <ul class="list">
                      @if ($authUser->first_name != null && $authUser->last_name != null)
                        <li>{{ $authUser->first_name . ' ' . $authUser->last_name }}</li>
                      @endif

                      <li>{{ $authUser->username }}</li>

                      <li>{{ $authUser->email }}</li>

                      @if ($authUser->contact_number != null)
                        <li>{{ $authUser->contact_number }}</li>
                      @endif

                      @if ($authUser->address != null)
                        <li>{{ $authUser->address }}</li>
                      @endif

                      @if ($authUser->city != null)
                        <li>{{ $authUser->city }}</li>
                      @endif

                      @if ($authUser->state != null)
                        <li>{{ $authUser->state }}</li>
                      @endif

                      @if ($authUser->country != null)
                        <li>{{ $authUser->country }}</li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End User Dashboard Section -->
@endsection
