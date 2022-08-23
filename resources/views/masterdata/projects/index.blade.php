<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Purchase System SNE | Project Page</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        </head>
        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Purchase System SNE | Project Page</h2>
                        </div>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('projects.create') }}"> Create project</a>
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
            <th>Project Name</th>
            <th>PIC</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Post Code</th>
            <th width="280px">Action</th>
            </tr>
            @foreach ($projects as $project)
            <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->pic }}</td>
            <td>{{ $project->email }}</td>
            <td>{{ $project->phone }}</td>
            <td>{{ $project->address }}</td>
            <td>{{ $project->city }}</td>
            <td>{{ $project->province }}</td>
            <td>{{ $project->post_code }}</td>
            <td>
            <form action="{{ route('projects.destroy',$project->id) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
            @endforeach
            </table>
            {!! $projects->links() !!}
        </body>
    </html>
