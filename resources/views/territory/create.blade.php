@extends('master')

@section('content')

  <div class="" style="text-align:center">
          <br/>
             <h3> ADD Territory</h3>

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
          <form method="post" action="{{url('territory')}}">
                  <div class="row form-group-row">
                      <label for="territory_id" class="col-sm-4 col-form-label">Territory Code</label>
                      <div class="col-sm-8">
                          <input type="text" name="territory_id" class="form-control" id="territory_id" value="{{$territory_id}}"  disabled/>
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="territory_name" class="col-sm-4 col-form-label">Territtory name</label>
                      <div class="col-sm-8">
                          <input type="text" name="territory_name" class="form-control" id="territory_name" placeholder="Enter region name" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="zone" class="col-sm-4 col-form-label">Zone</label>
                      <div class="col-sm-8">
                        <select  id="zone-dd" class="form-control aiz-selectpicker " required>
                            <option value="">Select Zone</option>
                            @foreach ($zones as $data)
                            <option value="{{$data->id}}">
                                {{$data->zone_s_description}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br/>
                <div class="row form-group-row">
                      <label for="region" class="col-sm-4 col-form-label">Region</label>
                      <div class="col-sm-8">
                        <select id="region-dd" class="form-control aiz-selectpicker " required>
                        <option value="">Select one zone</option>    
                        </select>
                      </div>
             </div>
             <br/>
                
                 
                 <div class=" row form-group-row">
                          <input type="submit" class="btn btn-success" />
                 </div>
          </form>
  </div>
    <script>
        $(document).ready(function () {
            $('#zone-dd').on('change', function () {
                var idZone = this.value;
                $("#region-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-regions')}}",
                    type: "POST",
                    data: {
                        zone_id: idZone,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        alert(result.regions);
                    },
    error: function (request, status, error) {
        alert(request.responseText);
    }
                });
            });
        });
</script>
@endsection