@extends('layouts.app')

@section('content')

<main id="content" class="bg-gray-01">
    <section class="pb-4 page-title shadow">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Book List</li>
                </ol>
                <h1 class="pt-4 fs-30 lh-1 mb-0 text-heading font-weight-600">Complete Bookshelf</h1>
                <span class="heading-divider"></span>
            </nav>
        </div>
    </section>
    <section class="pt-md-4 pb-11 bg-gray-01">
        <div class="container">
            <div class="row">
                @foreach($books as $book)
                    @include('components.bookcard', ['book'=> $book])
                @endforeach
            </div>
        </div>
    </section>

</main>

@endsection