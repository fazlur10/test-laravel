@extends('master')

@section('content')

  <div class="" style="text-align:center">
          <br/>
             <h3> ADD Region</h3>

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
          <form method="post" action="{{url('region')}}">
          {{csrf_field()}}
                  <div class="row form-group-row">
                      <label for="region_id" class="col-sm-4 col-form-label">Region Code</label>
                      <div class="col-sm-8">
                          <input type="text" name="region_id" class="form-control" id="region_id" value="{{$region_id}}"  disabled/>
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="region_name" class="col-sm-4 col-form-label">Region name</label>
                      <div class="col-sm-8">
                          <input type="text" name="region_name" class="form-control" id="region_name" placeholder="Enter region name" />
                      </div>
                 </div><br/>
                 <div class="row form-group row">
                            <label for="zone_code" class="col-sm-4 col-form-label">Zone</label>
                            <div class="col-sm-8">
                                @php $zones = \App\Models\Zone::all(); @endphp
                                <select class="form-control aiz-selectpicker" name="zone_code" required>
                                    @foreach ($zones as $zone)
                                        <option value="{{$zone->id}}">{{$zone->zone_s_description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                 
                 <div class=" row form-group-row">
                          <input type="submit" class="btn btn-success" />
                 </div>
          </form>
  </div>

@endsection