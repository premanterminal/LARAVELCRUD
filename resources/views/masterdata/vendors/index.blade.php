<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Purchase System SNE | Vendor Page</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        </head>
        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Purchase System SNE | Vendor Page</h2>
                        </div>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('vendors.create') }}"> Create vendor</a>
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
            <th>S.No</th>
            <th>Vendor Name</th>
            <th>PIC</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Post Code</th>
            <th width="280px">Action</th>
            </tr>
            @foreach ($vendors as $vendor)
            <tr>
            <td>{{ $vendor->id }}</td>
            <td>{{ $vendor->name }}</td>
            <td>{{ $vendor->pic }}</td>
            <td>{{ $vendor->email }}</td>
            <td>{{ $vendor->phone }}</td>
            <td>{{ $vendor->address }}</td>
            <td>{{ $vendor->city }}</td>
            <td>{{ $vendor->province }}</td>
            <td>{{ $vendor->post_code }}</td>
            <td>
            <form action="{{ route('vendors.destroy',$vendor->id) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('vendors.edit',$vendor->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
            @endforeach
            </table>
            {!! $vendors->links() !!}
        </body>
    </html>
