@include('admin.layouts.header')

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

  <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 py-1">
                    <h1><i class="fas fa-cog"></i> System Setting</h1>
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @elseif(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ route('admin.setting.setting') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <span class="text text-danger">@error('favicon'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="favicon">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('logo'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="logo">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('bg_image'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="bg_image">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('app_name'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="app_name" value="{{ $getSetting->app_name }}" placeholder="Application Name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('website'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="website" value="{{ $getSetting->website }}" placeholder="Website Link">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-globe"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('release_date'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="release_date" value="{{ $getSetting->release_date }}" placeholder="Date Release">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('developer'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="developer" value="{{ $getSetting->developer }}" placeholder="Name of Developer">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('version'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="version" value="{{ $getSetting->version }}" placeholder="Version">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text text-danger">@error('api'){{ $message }}@enderror</span>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="api" value="{{ $getSetting->api }}" placeholder="API Key">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
  @include('admin.layouts.footer')