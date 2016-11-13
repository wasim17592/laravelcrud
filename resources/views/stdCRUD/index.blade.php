@extends('layouts.app')

@extends('layouts.default')

@section('content1')
    <div class="panel-heading"></div>

    <div class="panel-body">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/home') }}">Home</a>


                <a class="btn btn-success" href="{{ route('stdCRUD.create') }}"> Create New Entry for Student</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($items as $key => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('stdCRUD.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('stdCRUD.edit',$item->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['stdCRUD.destroy', $item->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
        </div>
    </div>

    {!! $items->render() !!}

@endsection