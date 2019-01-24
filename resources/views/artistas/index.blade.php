@include('templates.head')
<section class= "artista">

    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{$artist->images[2]->url}}" alt="Foto de artista">
            </div>
            <div class="col-6 nombreArtista">
                <h3>{{$artist->name}}</h3>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Album</th>
                        <th scope="col">Cancion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracks->tracks as $track)
                            <tr>
                            <th scope="row"><img src="{{$track->album->images[2]->url}}" alt="Foto de album"></th>
                            <td>{{$track->album->name}}</td>
                            <td>{{$track->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>





@include('templates.footer')