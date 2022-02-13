@extends('master')

@section('content')

<div class="" style="text-align:center">
          <br/>
             <h3> Edit Region</h3>

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
          <form method="post" action="{{ route('region.update', $id) }}">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="PATCH" />
              <div class="row form-group-row">
                      <label for="region_id" class="col-sm-4 col-form-label">Zone Code</label>
                      <div class="col-sm-8">
                          <input type="text" name="region_id" class="form-control" id="region_id" value="{{$id}}"  disabled/>
                      </div>
              </div>
              <br/>
              <div class="row form-group-row">
                      <label for="region_name" class="col-sm-4 col-form-label">Region Name</label>
                      <div class="col-sm-8">
                          <input type="text" name="region_name" class="form-control" id="region_name" value="{{$region->region_name}}" placeholder="Enter zone long description" />
                      </div>
              </div>
              <br/>
              <div class="row form-group row">
                            <label for="zone_code" class="col-sm-4 col-form-label">Zone</label>
                            <div class="col-sm-8">
                                @php $zones = \App\Models\Zone::all(); @endphp
                                <select class="form-control aiz-selectpicker" name="zone_code" required>
                                    @foreach ($zones as $zone)
                                        <option value="{{$zone->id}}" @if($region->zone_code == $zone->id) selected @endif>{{$zone->zone_s_description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
              <br/>
              <div class=" row form-group-row">
                          <input type="submit" class="btn btn-success" value="Edit" />
             </div>


          </form>
</div>

@endsection