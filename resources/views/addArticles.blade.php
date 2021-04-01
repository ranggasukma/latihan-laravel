@extends('layouts.master')
@section('title','Halaman Tambah Tamu')
@section('container')
<div class="container">
    <h3 class="text-center mt-3">GUEST FORM</h3>
    <hr />
    <form method="POST" action="/store">
        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTitle" placeholder="Name" name="title" required />
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="address" class="form-control" id="inputArticle" placeholder="Address" name="article" required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10"> <select name="category_id" class="form-control category" required>
            <option value="">Select Category</option>
            @foreach($category as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
            </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="SAVE" />
            </div>
        </div>
    </form>
    <table class="table">
        <thead class="thead-dark">
            <th>NO</th>
            <th>Title</th>
            <th>Body</th>
            <th>Category</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($articles as $key=>$article)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->article}}</td>
                <td>{{$article->category['title']}}</td>
                <td><a href="/delete/{{ $article->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus data ini?')">
                        <i class="fas fa-trash"></i>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection()


