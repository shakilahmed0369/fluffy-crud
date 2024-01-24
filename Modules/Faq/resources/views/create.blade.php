@extends('admin.master_layout')
@section('title')
    <title>{{ __('admin.Faqs') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('admin.Faqs') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.faq.index') }}">{{ __('admin.Faqs') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('admin.Add Faq') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('admin.Add Faq') }}</h4>
                                <div>
                                    <a href="{{ route('admin.faq.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('admin.Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.faq.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="question">{{ __('admin.Question') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="question" name="question"
                                                    value="{{ old('question') }}" placeholder="Enter question"
                                                    class="form-control">
                                                @error('question')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="answer">{{ __('admin.Answer') }}<span class="text-danger">*</span></label>
                                                <textarea type="text" id="answer" name="answer"
                                                    placeholder="Enter answer" cols="30" rows="30" class="form-control text-area-5">{{ old('answer') }}</textarea>
                                                @error('answer')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center offset-md-2 col-md-8">
                                            <x-admin.save-button :text="__('admin.Save')">
                                            </x-admin.save-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
