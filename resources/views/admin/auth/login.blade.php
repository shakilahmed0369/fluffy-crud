

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="shortcut icon"  href=""  type="image/x-icon">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>{{ __('admin.Login') }}</title>

    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link href="{{ asset('backend/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/components.css') }}">
    {{-- @if ($setting->text_direction == 'RTL')
        <link rel="stylesheet" href="{{ asset('backend/css/rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/dev_rtl.css') }}">
        @endif --}}
    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap4-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/dev.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/tagify.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/fontawesome-iconpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/clockpicker/dist/bootstrap-clockpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datetimepicker/jquery.datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/iziToast.min.css') }}">

    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>

</head>

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header"><h4>{{ __('admin.Welcome to Login') }}</h4></div>

                                <div class="card-body">
                                    <form novalidate="" id="adminLoginForm" action="{{ route('admin.store-login') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">{{ __('admin.Email') }}</label>

                                            @if (env('APP_MODE') == 'DEMO')
                                                <input id="email exampleInputEmail" type="email" class="form-control" name="email" tabindex="1" autofocus value="admin@gmail.com">
                                            @else
                                                <input id="email exampleInputEmail" type="email" class="form-control" name="email" tabindex="1" autofocus value="{{ old('email') }}">
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">{{ __('admin.Password') }}</label>
                                                <div class="float-right">
                                                    <a href="{{ route('admin.password.request') }}" class="text-small">
                                                    {{ __('admin.Forgot Password?') }}
                                                    </a>
                                                </div>
                                            </div>
                                            @if (env('APP_MODE') == 'DEMO')
                                                <input id="password exampleInputPassword" type="password" class="form-control" name="password" tabindex="2" value="1234">
                                            @else
                                                <input id="password exampleInputPassword" type="password" class="form-control" name="password" tabindex="2">
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">{{ __('admin.Remember Me') }}</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button id="adminLoginBtn" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('admin.Login') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('backend/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/stisla.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/js/modules-toastr.js') }}"></script>

    <script>
        @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif

</body>
</html>
