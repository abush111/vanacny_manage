 <div class="row">
          <div class="col-md-4">
             <div class="col-md-12">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Name</label>
                    <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($roles)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
        </div>
            </div>
           <div class="form-group col-md-4  {{ $errors->has('description') ? 'has-error' : '' }}">
            <div class="col-md-12">
            <label for="description" class="col-md-2 control-label">Description</label>
            <div class="col-md-12">
                <textarea class="form-control" name="description" cols="20" rows="1" id="description" minlength="1" maxlength="1000">{{ old('description', optional($roles)->description) }}</textarea>
                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
            </div>
            </div>
          </div>
            <div class="form-group col-md-4 {{ $errors->has('display_name') ? 'has-error' : '' }}">
           <label for="display_name" class="control-label">Display Name</label>
             <div>
        <input class="form-control" name="display_name" type="text" id="display_name" value="{{ old('display_name', optional($roles)->display_name) }}" minlength="1" placeholder="Enter display name here...">
        {!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

 </div>


<!-- for making dual list box  -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Choose permission</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                

                   <div {{ $errors->has('permission') ? 'has-error' : '' }}">
        <label for="permission" class="col-md-12 control-label">Permission</label>
        <div class="col-md-12">
            <select  class="select2 form-control select2-multiple "  multiple="multiple" id="permission" name="permission[]">

@foreach($permissions as $permission)

                        @if(in_array($permission->id, $selectedPermission))
                        <option value="{{$permission->id}}" selected>{{$permission->name}}</option>
                        @else
                        <option value="{{$permission->id}}">{{$permission->name}}</option>

                        @endif

                        @endforeach
            </select>
        </div>
    </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

    

        <!-- /.row -->


