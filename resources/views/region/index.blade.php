@extends('master')

@section('content')
    <div class="col-md-12">
        <br/>
          <h3 align="center"> Region Data </h3>
        <br/>
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('region.create')}}" class="btn btn-primary">Add</a>
            <br />
            <br />
        </div>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Region Code</th>
                <th>Region Name</th>
                <th>Zone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($regions as $row)
            <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['region_name']}}</td>
                <td>@foreach($zones as $zone)
                    @if($row['zone_code'] == $zone['id'])
                       {{$zone['zone_s_description']}}
                    @endif
                    @endforeach
                </td>
                <td><a href="{{ route('region.edit', $row['id']) }}" class="btn btn-success">Edit</a></td>
                <td><form method="post" class="delete_form" action="{{route('region.destroy', $row['id'])}}">
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
                 if(confirm("Are you sure you want to delete this region?"))
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