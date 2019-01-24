@include('templates.head')

<div class="container">
    <div class="row">
        @foreach ($releases->albums->items as $album)
            <div class="col-xs-3 mx-4 my-3">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{$album->images[1]->url}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$album->name}}</h5>
                <a href="artistas/{{$album->artists[0]->id}}" class="btn btn-primary">{{$album->artists[0]->name}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- @php
    foreach ($releases->albums->items as $album) {
    echo '<a href="' . $album->external_urls->spotify . '">' . $album->images[1]->url. '</a> <br>';
}
@endphp --}}


@include('templates.footer')