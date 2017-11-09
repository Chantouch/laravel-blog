@foreach($medias as $media)
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
            </a>
        </div>
    </div>
@endforeach

<div class="d-flex justify-content-center">
    {{ $medias->links() }}
</div>

<media csrf="{{ csrf_token() }}" action="/api/v1/medias"></media>