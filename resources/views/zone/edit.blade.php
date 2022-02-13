@extends('master')

@section('content')

<div class="" style="text-align:center">
          <br/>
             <h3> Edit Zone</h3>

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
          <form method="post" action="{{ route('zone.update', $id) }}">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="PATCH" />
              <div class="row form-group-row">
                      <label for="zone_id" class="col-sm-4 col-form-label">Zone Code</label>
                      <div class="col-sm-8">
                          <input type="text" name="zone_id" class="form-control" id="zone_id" value="{{$id}}"  disabled/>
                      </div>
              </div>
              <br/>
              <div class="row form-group-row">
                      <label for="zone_l_description" class="col-sm-4 col-form-label">Zone Long Description</label>
                      <div class="col-sm-8">
                          <input type="text" name="zone_l_description" class="form-control" id="zone_l_description" value="{{$zone->zone_l_description}}" placeholder="Enter zone long description" />
                      </div>
              </div>
              <br/>
              <div class="row form-group-row">
                      <label for="zone_s_description" class="col-sm-4 col-form-label">Zone Short Description</label>
                      <div class="col-sm-8">
                          <input type="text" name="zone_s_description" class="form-control" id="zone_s_description" value="{{$zone->zone_s_description}}" placeholder="Enter zone short description" />
                      </div>
              </div>
              <br/>
              <div class=" row form-group-row">
                          <input type="submit" class="btn btn-success" value="Edit" />
             </div>


          </form>
</div>

@endsection