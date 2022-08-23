<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Item Form - Purchase System SNE</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add New Item</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>item Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="item Name">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Type:</strong>
            <input type="text" name="type" class="form-control" placeholder="Type">
            @error('type')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Unit:</strong>
            <input type="text" name="unit" class="form-control" placeholder="Unit">
            @error('unit')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>