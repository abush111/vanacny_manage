@extends('admin.layout.admin')
@section('content')
@section('title','User Edit')
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
       <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
             <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User Managmemnt</span></h4>
             <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>

       </div>

    </div>
    <div class="content">
        <!-- 2 columns form -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Admins Edit</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>

                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admins.update',$admin->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                             <div class="form-group">
                                    <label>First Name</label>
                                    <input id="first_name" name="first_name" type="first_name" class="form-control" value="{{Request::old('first_name') ? : $admin->first_name}}" placeholder="first name">
                                    <span class="{{$errors->has('first_name') ? 'helper-text red-text' : ''}}">{{$errors->first('first_name')}}</span>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input id="last_name" name="last_name" type="last_name" class="form-control" value="{{Request::old('last_name') ? : $admin->last_name}}" placeholder="last name">
                                    <span class="{{$errors->has('last_name') ? 'helper-text red-text' : ''}}">{{$errors->first('last_name')}}</span>
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input name="username" id="username" value="{{Request::old('username') ? : $admin->username}}" type="username" class="form-control" placeholder="user name">
                                    <span class="{{$errors->has('username') ? 'helper-text red-text' : ''}}">{{$errors->first('username')}}</span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input  name="email" id="email" value="{{Request::old('email') ? : $admin->email}}" type="email" class="form-control" placeholder="email">
                                    <span class="{{$errors->has('email') ? 'helper-text red-text' : ''}}">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                </div>

                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                            <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" value="{{Request::old('password') ? : ''}}" class="form-control" placeholder="password">
                                    <span class="{{$errors->has('password') ? 'helper-text red-text' : ''}}">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                                </div>
                                <div class="form-group">
									<label>Roles</label>
									<select class="form-control multiselect" multiple="multiple" name="role[]" data-button-class="btn bg-teal-400" data-fouc>
                                        <option value="" disabled>Choose a role</option>
                                        @foreach($admin->roles()->get() as $role)
                                        @if($roleid <= $role->id)
                                        @if(in_array($role->id, $selectedRole))

                                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                        @else
                                        <option value="{{$role->id}}">{{$role->name}}</option>

                                        @endif
                                        @endif
                                        @endforeach
									</select>
								</div>
                                <div class="form-group">
									<label>Picture</label>
                                    <input type="file" class="form-control-uniform" name="picture"  value="{{old('picture') ? : $admin->picture }}" data-fouc>
                                        <span class="{{$errors->has('picture') ? 'helper-text red-text' : ''}}">{{$errors->has('picture') ? $errors->first('picture') : ''}}</span>
								</div>



                            </fieldset>
                        </div>
                    </div>
                    @method('PUT')
                    @csrf()
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
                        <a href="/admins" class="btn btn-indigo">Cancel <i class="icon-paperplane ml-2"></i></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /2 columns form -->
    </div>
</div>
    <!-- /page header -->
@endsection
