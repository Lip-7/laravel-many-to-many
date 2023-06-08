@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="">
        <form method="POST" action="{{route('admin.projects.store')}}">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label text-capitalize">name</label>
                        <input type="text" value="{{old('name')}}" placeholder="Insert here project's name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="gitUrl" class="form-label text-capitalize">Git Url</label>
                        <input type="text" value="{{old('gitUrl')}}" name="gitUrl" placeholder="Insert here project's git url" class="form-control @error('gitUrl') is-invalid @enderror" id="gitUrl" aria-describedby="gitUrlHelp" required>
                        @error('gitUrl')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="framework_id" class="form-label text-capitalize">framework</label>
                        <select name="framework_id" id="framework_id" class="form-control @error('framework_id') is-invalid @enderror" required>
                            <option value="">Choose a framework</option>
                            @foreach ($frameworks as $fw)
                                <option value="{{$fw->id}}" {{$fw->id == old('framework_id') ? 'selected' : '' }}>
                                    {{$fw->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('framework_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="mb-3">
                        <label for="tecnologies" class="form-label text-capitalize">Select tecnologies</label>
                        <div class="form-group d-flex text-center gap-2 flex-wrap">
                            @foreach ($technologies as $tech)
                                <div class="d-flex flex-column align-items-center">
                                    <label for="" class="form-check-label">{{$tech->name}}</label>
                                    <input type="checkbox" name="technologies[]" value="{{$tech->id}}" class="form-check-input"
                                    {{in_array($tech->id, old('technologies', [])) ? 'checked' : ''}}>
                                </div>
                            @endforeach
                        </div>
                        @error('tecnologies')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="description" class="form-label text-capitalize">description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">@if(old('description')){{old('description')}}@else @endif</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection


