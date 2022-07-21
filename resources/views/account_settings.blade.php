<x-app-layout>
    <x-formcontainer>
        <x-slot name='contenttitle'>Account Setings</x-slot>
        <x-slot name='formcontent'>
            <form class="userinfo form-group" action= {{ url('update-account') }} method="POST">
                {{ csrf_field() }}
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <h4 class="content-subtitle">User Information</h4>
                <div class="row">
                    @foreach ($accountsettings as $info)
                    <div class="col-md-6 mb-2">
                        <label for="fullname" class="field-label">Full Name </label><br>
                        <input type="text" name ="fullname" class="fields" value="{{ $info->name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="fullname" class="field-label"> Department </label><br>
                        <select name="department" class="fields ">
                            <option class='options'value="default">{{ $info->department }}</option>
                            <option class='options'value="DCI">Department of Computing and Informatics</option>
                            <option class='options'value ="DBE">Department of Business Education</option>
                            <option class='options'value="DAS">Department of Arts and Sciences</option>
                            <option class='options'value ="DTE">Departmnt of Teaching Education</option>
                        </select>
                    </div>
                </div>
                <div class="row second mb-3">
                    <div class="col-md-6">
                        <label for="fullname" class="field-label">Position</label><br>
                        <select name="position" class="fields ">
                            <option class='options' value="default">{{ $info->position }}</option>
                            <option class='options' value="rmo">Record Management Officer</option>
                            <option class='options' value ="qa">Quality Assurance Officer</option>
                            <option class='options'value="director">Department Director</option>
                            <option class='options' value ="faculty">Faculty</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="fullname" class="field-label">Email Address [for account recovery] </label><br>
                        <input type="text" class="fields " name="email" value="{{ $info->email }}">
                    </div>
                </div>
                    @endforeach
            </form>
                <form action="{{ url('update-password') }}" method="POST" class="form-group">
                    {{ csrf_field() }}
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="content-subtitle">Change Password</h4>
                        </div>
                        <div class="col-md-8 blueline">
                        </div>
                    </div>
                    <label for="currentpassword" class="field-label">Current Password</label><br>
                    <input type = 'password' class="newpass" name="currentpassword">
                    @if($errors->any('currentpassword'))
                        <span class="text-danger">{{ $errors->first('current password') }}</span>
                    @endif
                    <div class="row newpassword">
                        <div class="col-md-6">
                            <label for="newpassword" class="field-label">New password</label><br>
                            <input type="password" class=" fields" name="newpassword">
                            @if($errors->any('newpassword'))
                                <span class="text-danger">{{ $errors->first('newpassword') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="confirmpassword" class="field-label">Re-eneter password </label><br>
                            <input type="password" class=" fields" name="reenterpassword">
                            @if($errors->any('reenterpassword'))
                                <span class="text-danger">{{ $errors->first('reenterpassword') }}</span>
                            @endif
                        </div>
                    </div>
                    <x-formactions></x-formactions>
                </form>
        </x-slot>
    </x-formcontainer>
</x-app-layout>
{{-- @endsection --}}
