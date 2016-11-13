<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/3/16
 * Time: 8:50 PM
 */

@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Info</h2>
            </div>
            <div class="pull-right">


                <a class="btn btn-success" href="{{ route('student.create') }}"> Create New Item</a>

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
            <th>Id</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($items as $key => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->Name }}</td>
                <td>{{ $item->Id }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('student.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('student.edit',$item->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['student.destroy', $item->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {!! $items->render() !!}

@endsection
