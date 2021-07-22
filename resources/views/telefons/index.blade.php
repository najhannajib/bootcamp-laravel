@extends('layouts.base')

@section('title', 'Page Title')

@section('content')
<div class="container mt-4">

<h3>Out of Topics</h3><br>
<h5>Planet in Starwars</h5>


<table class="table">
<thead>
<tr>
<th>Name</th>
<th>Rotation</th>
<th>Diameter</th>
<th>Climate</th>
<th>Terrain</th>
</tr>

</thead>
@foreach ($starwars as $planets)
<tbody>
<tr>
<td>{{ $planets ['name']}}</td>
<td>{{ $planets ['rotation_period']}}</td>
<td>{{ $planets ['diameter']}}</td>
<td>{{ $planets ['climate']}}</td>
<td>{{ $planets ['terrain']}}</td>
</tr>
</tbody>

@endforeach
</table>
<br><br>

<h3 class="text-center">List of phone:</h3>

<ul>
    @foreach ($telefons as $telefon)
        <li>Name: {{$telefon->nama}} </li>
        <li>Price: {{$telefon->harga}} </li>
        <li>Brand: {{$telefon->jenama}} </li>
        <li>Model number: {{$telefon->no_model}}</li>
        <li>Serial number: {{$telefon->no_serial}}</li>
        <br><br>
    @endforeach
</ul>

<div class="col-5">
<form method="POST" action="/telefons">
    @csrf
    <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama">
    </div>
    <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="text" class="form-control" name="harga">
    </div>
    <div class="mb-3">
    <label class="form-label">Brand</label>
    <input type="text" class="form-control" name="jenama">
    </div>
    <div class="mb-3">
    <label class="form-label">Model Number</label>
    <input type="text" class="form-control" name="no_model">
    </div>
    <div class="mb-3">
    <label class="form-label">Serial Number</label>
    <input type="text" class="form-control" name="no_serial">
    </div>
    <!-- Name: <input type="text" name="nama"><br>
    Price: <input type="number" name="harga"><br>
    Brand: <input type="text" name="jenama"><br>
    Model Number: <input type="text" name="no_model"><br>
    Serial Number: <input type="text" name="no_serial"><br> -->


    <input type="hidden" name="kedai_id" value=1>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
</div>


<br><br>

<div class="container mt-5">
        <form action="\fails" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </div>

</div>

@stop