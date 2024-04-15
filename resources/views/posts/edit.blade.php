@extends("posts.app")



@section("name")
{{ "edit" }}
@endsection


@section("content")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  

    <div class="container mt-4">
        
        <form method="POST" action="{{route("posts.update", $post->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" type="text" value="{{$post->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Post Creator</label>
                <select name="post_creators"  class="form-control">
                    
                    <option value="{{ $post->user->id }}"  > {{ $post->user->name }} </option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Edited By</label>
                <select name="edit_by"  class="form-control">
                    <option value="{{ auth()->user()->id }}" > {{ auth()->user()->name }} </option>
                </select>
            </div>

            <button class="btn btn-success" >Update</button>
        </form>
        
    </div>
    
@endsection

