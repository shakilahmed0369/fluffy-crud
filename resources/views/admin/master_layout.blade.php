@php
    $header_admin = Auth::guard('admin')->user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    @yield('title')

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
    <style>
        .fade.in {
            opacity: 1 !important;
        }

        .tox .tox-promotion,
        .tox-statusbar__branding {
            display: none !important;
        }
    </style>
    @stack('css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="mr-auto form-inline">
                    <ul class="mr-3 navbar-nav">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                        @if (Module::isEnabled('Language') && Route::has('set-language'))
                            <form id="setLanguageHeader" action="{{ route('set-language') }}">
                                <select class="form-control" name="code">
                                    @forelse (allLanguages() as $language)
                                        <option value="{{ $language->code }}"
                                            {{ getSessionLanguage() == $language->code ? 'selected' : '' }}>
                                            {{ $language->name }}
                                        </option>
                                    @empty
                                        <option value="en" {{ getSessionLanguage() == 'en' ? 'selected' : '' }}>
                                            English
                                        </option>
                                    @endforelse
                                </select>
                            </form>
                        @endif
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle">
                        <a target="_blank" href="{{ route('home') }}" class="nav-link nav-link-lg">
                            <i class="fas fa-home"></i> {{ __('admin.Visit Website') }}</i>
                        </a>
                    </li>

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if ($header_admin->image)
                                <img alt="image" src="{{ asset($header_admin->image) }}"
                                    class="mr-1 rounded-circle">
                            @else
                                <img alt="image" src="" class="mr-1 rounded-circle">
                            @endif

                            <div class="d-sm-none d-lg-inline-block">{{ $header_admin->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @adminCan(['admin.profile.view', 'admin.profile.edit'])
                            <a href="{{ route('admin.edit-profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> {{ __('admin.Profile') }}
                            </a>
                            @endadminCan
                            <div class="dropdown-divider"></div>

                            <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger"
                                onclick="event.preventDefault();
                                document.getElementById('admin-logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('admin.Logout') }}
                            </a>

                            {{-- start admin logout form --}}
                            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                            {{-- end admin logout form --}}

                        </div>
        </div>
        </li>

        </ul>
        </nav>

        @include('admin.sidebar')

        @yield('admin-content')

        <footer class="main-footer">
            <div class="footer-left">
                Copy right update korte hobe
            </div>
            <div class="footer-right">
                Version Update korte hobe
            </div>
        </footer>

    </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('admin.Item Delete Confirmation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are You sure want to delete this item ?') }}</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">{{ __('admin.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('admin.Yes, Delete') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('backend/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/stisla.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/js/tagify.js') }}"></script>
    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{ asset('backend/js/fontawesome-iconpicker.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('backend/clockpicker/dist/bootstrap-clockpicker.js') }}"></script>
    <script src="{{ asset('backend/datetimepicker/jquery.datetimepicker.js') }}"></script>
    <script src="{{ asset('backend/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('backend/js/modules-toastr.js') }}"></script>
    <script src="{{ asset('backend/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script>
        @session('messege')
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ $value }}");
                    break;
                case 'success':
                    toastr.success("{{ $value }}");
                    break;
                case 'warning':
                    toastr.warning("{{ $value }}");
                    break;
                case 'error':
                    toastr.error("{{ $value }}");
                    break;
            }
        @endsession
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif

    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ]
                });
                $('#dataTable').DataTable();
                $('.select2').select2();
                $('.sub_cat_one').select2();
                $('.tags').tagify();
                $('.datetimepicker_mask').datetimepicker({
                    format: 'Y-m-d H:i',
                });

                $('.custom-icon-picker').iconpicker({
                    templates: {
                        popover: '<div class="iconpicker-popover popover"><div class="arrow"></div>' +
                            '<div class="popover-title"></div><div class="popover-content"></div></div>',
                        footer: '<div class="popover-footer"></div>',
                        buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' +
                            ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
                        search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
                        iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
                        iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
                    }
                })
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: '-Infinity'
                });
                $('.clockpicker').clockpicker();

            });

            $("#setLanguageHeader").on('change', function(e) {
                this.submit();
            });
        })(jQuery);
    </script>

    @stack('js')

</body>

</html>
