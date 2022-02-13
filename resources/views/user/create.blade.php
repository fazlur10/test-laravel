@extends('master')

@section('content')

  <div class="" style="text-align:center">
          <br/>
             <h3> ADD User</h3>

          <br/>
          @if(count($errors) > 0)
           <div class="alert alert-danger">
             <ul>
             @foreach($errors->all() as $error)
               <li>{{$error}}</li>
             @endforeach
             </ul>
           </div>
          @endif
          @if(\Session::has('success'))
          <div class="alert alert-success">
             <p>{{ \Session::get('success') }}</p>
          </div>
          @endif
          <form method="post" action="{{url('user')}}">
          {{csrf_field()}}
                  
                 <div class="row form-group-row">
                      <label for="name" class="col-sm-4 col-form-label">Name</label>
                      <div class="col-sm-8">
                          <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="nic" class="col-sm-4 col-form-label">NIC</label>
                      <div class="col-sm-8">
                          <input type="text" name="nic" class="form-control" id="nic" placeholder="Enter NIC" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="address" class="col-sm-4 col-form-label">Address</label>
                      <div class="col-sm-8">
                          <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="mobile" class="col-sm-4 col-form-label">Mobile</label>
                      <div class="col-sm-8">
                          <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="email" class="col-sm-4 col-form-label">Email</label>
                      <div class="col-sm-8">
                          <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" />
                      </div>
                 </div><br/>
                 <div class="row form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                <select class="form-control aiz-selectpicker" name="gender" required>
                                        <option value="male">male</option>
                                        <option value="female">female</option>
                                   
                                </select>
                            </div>
                        </div><br/>
                 
                 <div class="row form-group row">
                            <label for="territtory_code" class="col-sm-4 col-form-label">Territory</label>
                            <div class="col-sm-8">
                                @php $territories = \App\Models\Territory::all(); @endphp
                                <select class="form-control aiz-selectpicker" name="territtory_code" required>

                                    @foreach ($territories as $territory)
                                        <option value="{{$territory->id}}">{{$territory->territtory_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br/>

                 <div class="row form-group-row">
                      <label for="user_name" class="col-sm-4 col-form-label">User Name</label>
                      <div class="col-sm-8">
                          <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Enter User Name" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="passwords" class="col-sm-4 col-form-label">Password</label>
                      <div class="col-sm-8">
                          <input type="password" name="passwords" class="form-control" id="passwords" placeholder="Enter Passwords" />
                      </div>
                 </div><br/>
                        
                 
                 <div class=" row form-group-row">
                          <input type="submit" class="btn btn-success" />
                 </div>
          </form>
  </div>

@endsection