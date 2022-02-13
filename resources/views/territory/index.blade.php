@extends('master')

@section('content')
    <div class="col-md-12">
        <br/>
          <h3 align="center"> Territory Data </h3>
        <br/>
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('territory.create')}}" class="btn btn-primary">Add</a>
            <br />
            <br />
        </div>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Territory Code</th>
                <th>Territory Name</th>
                <th>Zone</th>
                <th>Region</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($territories as $row)
            <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['territtory_name']}}</td>
                <td>@foreach($zones as $zone)
                    @if($row['zone_code'] == $zone['id'])
                       {{$zone['zone_s_description']}}
                    @endif
                    @endforeach
                </td>
                <td>@foreach($regions as $region)
                    @if($row['region_code'] == $region['id'])
                       {{$region['region_name']}}
                    @endif
                    @endforeach
                </td>
                <td><a href="{{ route('territory.edit', $row['id']) }}" class="btn btn-success">Edit</a></td>
                <td><form method="post" class="delete_form" action="{{route('territory.destroy', $row['id'])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form></td>
            </tr>
            @endforeach
        </table>
     </div>

     <script>
         $(document).ready(function(){
             $('.delete_form').on('submit', function(){
                 if(confirm("Are you sure you want to delete this territory?"))
                 {
                     return true;
                 }
                 else
                 {
                     return false;
                 }
             });
         });
     </script>
@endsection