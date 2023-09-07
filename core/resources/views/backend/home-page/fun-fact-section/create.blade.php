<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add Counter Information') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form create" action="{{ route('admin.home_page.store_counter_info', ['language' => request()->input('language')]) }}" method="post">
          @csrf
          <input type="hidden" name="theme_version" value="{{ $themeInfo->theme_version }}">

          <div class="form-group">
            <label for="">{{ __('Language') . '*' }}</label>
            <select name="language_id" class="form-control">
              <option selected disabled>{{ __('Select a Language') }}</option>
              @foreach ($langs as $lang)
                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
              @endforeach
            </select>
            <p id="err_language_id" class="mt-1 mb-0 text-danger em"></p>
          </div>

          @if ($themeInfo->theme_version == 3)
            <div class="form-group">
              <label for="">{{ __('Icon') . '*' }}</label>
              <div class="btn-group d-block">
                <button type="button" class="btn btn-primary iconpicker-component">
                  <i class="fa fa-fw fa-heart"></i>
                </button>
                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fa-car" data-toggle="dropdown"></button>
                <div class="dropdown-menu"></div>
              </div>

              <input type="hidden" id="inputIcon" name="icon">
              <p id="err_icon" class="mt-1 mb-0 text-danger em"></p>

              <div class="text-warning mt-2">
                <small>{{ __('Click on the dropdown icon to select an icon.') }}</small>
              </div>
            </div>

            <div class="form-group">
              <label>{{ __('Icon Color') . '*' }}</label>
              <input class="jscolor form-control ltr" name="color">
              <p id="err_color" class="mt-1 mb-0 text-danger em"></p>
            </div>
          @endif

          <div class="form-group">
            <label for="">{{ __('Title') . '*' }}</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Title">
            <p id="err_title" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for="">{{ __('Amount') . '*' }}</label>
            <input type="number" class="form-control ltr" name="amount" placeholder="Enter Amount">
            <p id="err_amount" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for="">{{ __('Serial Number') . '*' }}</label>
            <input type="number" class="form-control ltr" name="serial_number" placeholder="Enter Serial Number">
            <p id="err_serial_number" class="mt-1 mb-0 text-danger em"></p>
            <p class="text-warning mt-2 mb-0">
              <small>{{ __('The higher the serial number is, the later the info will be shown.') }}</small>
            </p>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="submitBtn" type="button" class="btn btn-primary btn-sm">
          {{ __('Save') }}
        </button>
      </div>
    </div>
  </div>
</div>
