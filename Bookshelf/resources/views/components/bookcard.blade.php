<div class="card mb-3 mr-5" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="{{ $book->image_url }}" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text justify">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p>by <strong>{{ $book->author }}</strong></p>
                <p><strong>{{ $book->pages }} pages</strong></p>
            </div>
        </div>
    </div>
</div>