<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Purchase System SNE | Item Page</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        </head>
        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Purchase System SNE | item Page</h2>
                        </div>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('items.create') }}"> Create item</a>
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
            <th>Item Name</th>
            <th>Type</th>
            <th>Unit</th>
            <th width="280px">Action</th>
            </tr>
            @foreach ($items as $item)
            <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->unit }}</td>
            <td>
            <form action="{{ route('items.destroy',$item->id) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
            @endforeach
            </table>
            {!! $items->links() !!}
        </body>
    </html>
