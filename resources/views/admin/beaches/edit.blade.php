@extends('layouts.app')

@section('title', 'Edit Beach')

@section('main')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-8">
            <h1>
                Edit {{$beach->name}}
            </h1>
        </div>

        <form class="col-8" action="{{ route('admin.beaches.update', $beach->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">
                    Name
                </label>
                <input type="text" class="form-control" id="name" name="name" value="{{$beach->name}}">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">
                    Location
                </label>
                <input type="text" class="form-control" id="location" name="location" value="{{$beach->location}}">
            </div>
            <div class="mb-3">
                <label for="umbrella_number" class="form-label">
                    Umbrella number
                </label>
                <input type="text" class="form-control" id="umbrella_number" name="umbrella_number" value="{{$beach->umbrella_number}}">
            </div>
            <div class="mb-3">
                <label for="sunbed_price" class="form-label">
                    Sunbed number
                </label>
                <input type="text" class="form-control" id="sunbed_price" name="sunbed_price" value="{{$beach->sunbed_price}}">
            </div>

            <div class="mb-3">
                <label for="umbrella_price_per_day" class="form-label">
                    umbrella price per day
                </label>
                <input type="date" class="form-control" id="umbrella_price_per_day" name="umbrella_price_per_day" value="{{$beach->umbrella_price_per_day}}">
            </div>
            <div class="mb-3">
                <label for="opening_date" class="form-label">
                    Opening date
                </label>
                <input type="text" class="form-control" id="opening_date" name="opening_date" value="{{$beach->opening_date}}">
            </div>
            <div class="mb-3">
                <label for="closing_date" class="form-label">
                    Closing date
                </label>
                <input type="text" class="form-control" id="closing_date" name="closing_date" value="{{$beach->closing_date}}">
            </div>
            <div class="mb-3">
                <label for="beachvolley_court" class="form-label">
                    Beachvolley court
                </label>
                <input type="text" class="form-control" id="beachvolley_court" name="beachvolley_court" value="{{$beach->beachvolley_court}}">
            </div>
             <div class="mb-3">
                <label for="football_court" class="form-label">
                    Football court
                </label>
                <input type="text" class="form-control" id="football_court" name="football_court" value="{{$beach->football_court}}">
            </div>


            <button type="submit" class="btn btn-primary">
                Edit Beach record
            </button>
            <button type="reset" class="btn btn-warning">
                Reset fields
            </button>

        </form>
    </div>
</div>

@endsection
