@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List of Applications') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <div class="alert-text">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    

                    <table class="table">
                    <input class="form-control col-sm-3 float-right" id="searchApplication" type="text" placeholder="Search..">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Submitted by</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="appsTable">
                            @foreach($applications as $application)
                            <tr>
                                <th scope="row">{{ $application->id}}</th>
                                <td>{{ $application->name}}</td>
                                <td>{{ $application->email}}</td>
                                <td>{{ $application->contact}}</td>
                                <td>{{ date('d-M-Y', strtotime($application->created_at)) }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('application.show',$application)}}" role="button"> Show</a>
                                    <a class="btn btn-secondary" href="{{ route('application.edit',$application)}}" role="button"> Edit</a>
                                    <form action="{{ route('application.destroy',$application->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Application?');" type="submit">Delete</button>
                                    </form>                      
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
$(document).ready(function(){
  $("#searchApplication").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#appsTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endpush


