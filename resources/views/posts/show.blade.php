@extends("posts.app")



@section("name")
{{ "show" }}
@endsection


@section("content")
        <div class="py mt-3">
            <div class="container">
                <div class="row">
                        <div class="card mt-2">
                            <div class="card-header">
                                Post info
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Id: {{ $post->id}}</h5>
                                <p></p>
                                <p class="card-text ">Title: {{ $post->title}}</p>
                                <p class="card-text">Description: {{$post->description}}</p>
                                <p class="card-text">Created At: {{$post->created_at}}</p>
                                <p class="card-text">Updated At: {{$post->updated_at}}</p>
                            </div>
                            <div class="card-header mt-2">
                                Creator info
                            </div>
                            <div class="card-body">
                                
                                <h5 class="card-title">Name: {{ $post->user->name }}</h5>
                                <p></p>
                                <p class="card-text">Email: {{ $post->user->email }}</p>
                                <p class="card-text">Created At: {{ $post->user->created_at }}</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
@endsection



