@extends('layout')

@section('main-body')
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
     <div class="row">
         <div class="col-lg-6 col-md-6 col-12">
             <div class="form-group inflanar-form-input mg-top-20">
                 <label>{{__('admin.Name')}}*</label>
                 <input class="ecom-wc__form-input" type="text" name="name" placeholder="{{__('admin.Name')}}" value="{{ $user->name }}">
             </div>
         </div>

         <div class="col-lg-6 col-12">
             <div class="form-group inflanar-form-input mg-top-20">
                 <label>{{__('admin.Email')}}*</label>
                 <input class="ecom-wc__form-input" type="email" name="email" placeholder="{{__('admin.Email')}}" value="{{ $user->email }}" readonly>
             </div>
         </div>

         <div class="col-lg-6 col-12">
             <div class="form-group inflanar-form-input mg-top-20">
                 <label>{{__('admin.Phone')}}*</label>
                 <input class="ecom-wc__form-input" type="text" name="phone" placeholder="{{__('admin.Phone')}}" value="{{ $user->phone }}">
             </div>
         </div>

         <div class="col-12">
            <div class="form-group inflanar-form-input mg-top-20">
                <label>{{__('admin.Address')}}*</label>
                <input class="ecom-wc__form-input" type="text" name="address" placeholder="{{__('admin.Address')}}" value="{{ $user->address }}">
            </div>
        </div>

     </div>
      <!-- Submit Button -->
      <div class="form-group mg-top-40">
         <button type="submit" class="inflanar-btn"><span>{{__('admin.Update Profile')}}</span></button>
     </div>
 </form>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>




 <form action="{{ route('user.update-password') }}" method="POST">
    @csrf
    <div class="form-group inflanar-form-input">
        <label>{{__('admin.Current Password')}}*</label>
        <input class="inflanar-signin__form-input"  id="password-field" type="password" name="current_password">
    </div>
    <div class="form-group inflanar-form-input mg-top-20">
        <label>{{__('admin.New Password')}}*</label>
        <input class="inflanar-signin__form-input" placeholder="" id="password-field" type="password" name="password">
    </div>
    <div class="form-group inflanar-form-input mg-top-20">
        <label>{{__('admin.Confirm Password')}}*</label>
        <input class="inflanar-signin__form-input" placeholder="" id="password-field" type="password" name="password_confirmation" >
    </div>
    <div class="inflanar__item-button--group mg-top-50">
        <button class="inflanar-btn" type="submit">{{__('admin.Update Password')}}</button>
        <a href="" class="inflanar-btn inflanar-btn__cancel"><span>{{__('admin.Cancel')}}</span></a>
    </div>
</form>

@endsection


