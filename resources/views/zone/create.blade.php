@extends('master')

@section('content')

  <div class="" style="text-align:center">
          <br/>
             <h3> ADD Zone</h3>

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
          <form method="post" action="{{url('zone')}}">
          {{csrf_field()}}
                  <div class="row form-group-row">
                      <label for="zone_id" class="col-sm-4 col-form-label">Zone Code</label>
                      <div class="col-sm-8">
                          <input type="text" name="zone_id" class="form-control" id="zone_id" value="{{$zone_id}}"  disabled/>
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="zone_l_description" class="col-sm-4 col-form-label">Zone Long Description</label>
                      <div class="col-sm-8">
                          <input type="text" name="zone_l_description" class="form-control" id="zone_l_description" placeholder="Enter zone long description" />
                      </div>
                 </div><br/>
                 <div class=" row form-group-row">
                      <label for="zone_s_description" class="col-sm-4 col-form-label">Zone Short Description</label>
                      <div class="col-sm-8">
                          <input type="text" name="zone_s_description" class="form-control" id="zone_s_description" placeholder="Enter zone short description" />
                      </div>
                 </div><br/>
                 <div class=" row form-group-row">
                          <input type="submit" class="btn btn-success" />
                 </div>
          </form>
  </div>

@endsection