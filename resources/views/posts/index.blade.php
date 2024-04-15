@extends("posts.app")



@section("name")
{{ "index" }}
@endsection()

@section("content")
        <div class="container mt-4">
            <div class="text-center">
                @auth
                    <a  class="btn btn-success"  href=" {{  route("posts.create")}}">Create post</a>
                @endauth
            </div>
            <div class="mt-4" >
                <table class="table mt-4">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Posted By</th>
                        <th scope="col">Description</th>
                        <th scope="col">created_at</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $x)
                            <tr>
                                <th scope="row">{{ $x->id }}</th>
                                <td>{{ $x->title }}</td>
                                <td>{{ $x->user->name }}</td>
                                <td>{{ $x->description }}</td>
                                <td>{{ $x->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{route("posts.show", $x->id)}}" >view</a>
                                    @auth
                                        <a class="btn btn-primary" href="{{route("posts.edit",  $x->id)}}" >edit</a>
                                        <form style="display:inline;" action="{{route("posts.destroy", $x->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection



