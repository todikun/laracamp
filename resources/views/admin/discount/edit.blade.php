@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card mt-3">
                <div class="card-header">
                    Update discount: {{ $discount->name }}
                </div>
                <div class="card-body">
                    @include('components.alert')
                    <form action="{{ route('admin.discount.update', $discount->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $discount->id }}">
                        <div class="form-group mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="{{ old('name') ?: $discount->name }}" required />
                            @if ($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" class="form-control {{$errors->has('code') ? 'is-invalid' : ''}}" name="code" value="{{ old('code') ?: $discount->code }}" required />
                            @if ($errors->has('code'))
                            <p class="text-danger">{{$errors->first('code')}}</p>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" name="description" cols="0" rows="2">{{ old('description') ?: $discount->description }}</textarea>
                            @if ($errors->has('description'))
                            <p class="text-danger">{{$errors->first('description')}}</p>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Percentage</label>
                            <input type="number" class="form-control" name="percentage" min="1" max="100" value="{{ old('percentage') ?: $discount->percentage }}" required />
                            @if ($errors->has('percentage'))
                            <p class="text-danger">{{$errors->first('percentage')}}</p>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
