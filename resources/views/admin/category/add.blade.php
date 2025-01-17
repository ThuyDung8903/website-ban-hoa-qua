@extends('layouts.admin')
@section('main-content')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                            Category
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Default Bootstrap Form Controls-->
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-header row align-items-center justify-content-between pt-3">
                            <div class="col-auto">Add a new category</div>
                            <div class="col-12 col-xl-auto">
                                <a class="btn btn-sm btn-outline-blue-soft text-primary"
                                        href="{{ route('admin.category.list') }}">
                                    <i class="me-1" data-feather="arrow-left"></i>
                                    Back to Categories List
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h5 class="alert-heading">Alert!</h5>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close" aria-hidden="true"></button>
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <h5 class="alert-heading">Alert!</h5>
                                    {{ session('success') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close" aria-hidden="true"></button>
                                </div>
                            @endif
                            <!-- Component Preview-->
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form enctype="multipart/form-data" action="{{ route('admin.category.do-add') }}"
                                            method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input class="form-control" id="name" name="name" type="text"
                                                    placeholder="Input name category" value="{{ old('name') }}"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="parent_id">Parent category</label>
                                            <select class="form-control" id="parent_id" name="parent_id">
                                                <option value="0" {{ old('parent_id') == 0 ? 'selected' : '' }}>--None--</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image">Image</label>
                                            <input class="form-control" type="file" name="image" id="image"
                                                    value="{{ old('image') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="5"
                                                    placeholder="Input description"
                                                    value="{{ old('description') }}"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="meta_description">Meta_description</label>
                                            <input class="form-control" id="meta_description" name="meta_description"
                                                    type="text"
                                                    placeholder="Input meta_description"
                                                    value="{{ old('meta_description') }}"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <input class="form-control" id="slug" name="slug" type="text"
                                                    placeholder="Input slug" value="{{ old('slug') }}"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="meta_title">Meta_title</label>
                                            <input class="form-control" id="meta_title" name="meta_title" type="text"
                                                    placeholder="Input meta_title" value="{{ old('meta_title') }}"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="meta_keywords">Meta_keywords</label>
                                            <input class="form-control" id="meta_keywords" name="meta_keywords"
                                                    type="text"
                                                    placeholder="Input meta_keywords"
                                                    value="{{ old('meta_keywords') }}"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" id="show" type="radio" name="status"
                                                        checked value="1">
                                                <label class="form-check-label" for="show">Show</label>
                                            </div>
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" id="hidden" type="radio" name="status"
                                                        value="0">
                                                <label class="form-check-label" for="hidden">Hidden</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection