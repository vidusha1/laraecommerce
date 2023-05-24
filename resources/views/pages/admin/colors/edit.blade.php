@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Edit Color
                    <a href="{{ route('colors.index') }}" class="btn btn-sm btn-warning float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/colors/' . $color->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $color->name }}" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="">Code</label>
                        <input type="text" name="code" value="{{ $color->code }}" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="checkbox" name="status" {{ $color->status ? 'checked' : '' }}>Checked=Hidden,
                        Unchecked=Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection