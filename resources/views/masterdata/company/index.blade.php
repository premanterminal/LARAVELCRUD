<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Purchase System SNE | company Page</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        </head>
        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Purchase System SNE | company Page</h2>
                        </div>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('companies.create') }}"> Create company</a>
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
            <th>company Name</th>
            <th>PIC</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Post Code</th>
            <th width="280px">Action</th>
            </tr>
            @foreach ($companies as $company)
            <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->pic }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->phone }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->city }}</td>
            <td>{{ $company->province }}</td>
            <td>{{ $company->post_code }}</td>
            <td>
            <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
            @endforeach
            </table>
            {!! $companies->links() !!}
        </body>
    </html>
