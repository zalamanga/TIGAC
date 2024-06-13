@props(['title', 'statistics', 'colorTheme', "icon" => ""])

<div class="col-6 col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body px-4 py-4-5">
        <div class="row">
          <div
            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
          >
            <div class="stats-icon {{ $colorTheme }} mb-2">
                <div>
                    <i class="{{ $icon }}"></i>
                </div>
            </div>
          </div>
          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
            <h6 class="text-muted font-semibold">
              {{ $title }}
            </h6>
            <h6 class="font-extrabold mb-0">{{ $statistics }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>