@extends('layout.master')

@section('content')
    <h3>Add new member</h3>

    @if ($errors->count())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @elseif (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('members.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="schools" class="form-label">Schools</label>
            <!-- I could have probably done a nicer multi select, but thought I'd keep it simple -->
            <select class="form-select" multiple name="schools[]" id="schools" required>
                @foreach ($schools as $schoolSelect)
                    <option value="{{ $schoolSelect->id }}">{{ $schoolSelect->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Member</button>
    </form>
@endsection
