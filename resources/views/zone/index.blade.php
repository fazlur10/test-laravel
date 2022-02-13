@extends('master')

@section('content')
    <div class="col-md-12">
        <br/>
          <h3 align="center"> Zone Data </h3>
        <br/>
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('zone.create')}}" class="btn btn-primary">Add</a>
            <br />
            <br />
        </div>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Zone Code</th>
                <th>Zone Long Description</th>
                <th>Zone Short Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($zones as $row)
            <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['zone_l_description']}}</td>
                <td>{{$row['zone_s_description']}}</td>
                <td><a href="{{ route('zone.edit', $row['id']) }}" class="btn btn-success">Edit</a></td>
                <td><form method="post" class="delete_form" action="{{route('zone.destroy', $row['id'])}}">
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
                 if(confirm("Are you sure you want to delete this zone?"))
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