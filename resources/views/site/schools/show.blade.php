@extends('layout.master')

@section('content')
    <h3>Members attending {{ $school->name }}</h3>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
