<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Purchase System SNE | warehouse Page</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        </head>
        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Purchase System SNE | warehouse Page</h2>
                        </div>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('warehouses.create') }}"> Create warehouse</a>
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
            <th>warehouse Name</th>
            <th>PIC</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Post Code</th>
            <th width="280px">Action</th>
            </tr>
            @foreach ($warehouses as $warehouse)
            <tr>
            <td>{{ $warehouse->id }}</td>
            <td>{{ $warehouse->name }}</td>
            <td>{{ $warehouse->pic }}</td>
            <td>{{ $warehouse->email }}</td>
            <td>{{ $warehouse->phone }}</td>
            <td>{{ $warehouse->address }}</td>
            <td>{{ $warehouse->city }}</td>
            <td>{{ $warehouse->province }}</td>
            <td>{{ $warehouse->post_code }}</td>
            <td>
            <form action="{{ route('warehouses.destroy',$warehouse->id) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('warehouses.edit',$warehouse->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
            @endforeach
            </table>
            {!! $warehouses->links() !!}
        </body>
    </html>
