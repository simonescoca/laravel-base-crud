@extends('layouts.app')

@section('title', 'Admin Beaches Index')

@section('main')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-12">
            <h1 class="m-3">
                Admin Beach Index Panel
            </h1>
        </div>
    </div>
    <div class="row">
        @if (session('deleted'))
            <div class="col-12">
                <div class="alert alert-warning">
                    {{ session('deleted') }}  has been deleted succesfully
                </div>
            </div>
        @elseif ( session('created'))
            <div class="col-12">
                <div class="alert alert-primary">
                    {{ session('created') }} has been created succesfully
                </div>
            </div>
        @endif
        <div class="col-12">
            <table class="table table-striped table-hover text-center table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">name</th>
                        <th scope="col">location</th>
                        <th scope="col">umbrella_number</th>
                        <th scope="col">sunbed_number</th>
                        <th scope="col">umbrella_price_per_day</th>
                        <th scope="col">opening_date</th>
                        <th scope="col">closing_date</th>
                        <th scope="col">beachvolley_court</th>
                        <th class="col ">football_court</th>
                        <th class="col-2 ">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beachList as $beach)
                        <tr>
                            <th scope="row">
                                {{ $beach->id }}
                            </th>
                            <td>
                                {{ $beach->name  }}
                            </td>
                            <td>
                                {{ $beach->location  }}
                            </td>
                            <td>
                                {{ $beach-> umbrella_number}}
                            </td>
                            <td>
                                {{ $beach->sunbed_number}}
                            </td>
                            <td>
                                {{ number_format($beach->umbrella_price_per_day, 2, '.', ''); }}€
                            </td>
                            <td>
                                {{ $beach->opening_date }}
                            </td>
                            <td>
                                {{ $beach->closing_date}}
                            </td>
                            <td>
                                {{ $beach->beachvolley_court }}
                            </td>
                            <td>
                                {{ $beach->football_court }}
                            </td>

                            <td>
                                <form action="{{ route('admin.beaches.restore', $beach->id) }}" class="d-inline form-restorer" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-warning me-2">
                                        Restore
                                    </button>
                                </form>

                                <form action="{{ route('admin.beaches.hardDelete', $beach->id) }}" class="d-inline form-deleter" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger me-2">
                                        Hard Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {!! $beachList->links() !!}

</div>

@endsection
@section('custom-script-tail')
    <script>
        const restoreFormElements = document.querySelectorAll('form.form-restorer');
        restoreFormElements.forEach(formElement => {
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
                const userConfirmRestore = window.confirm('Are you sure you want to restore this beach?');
                if (userConfirmRestore){
                    this.submit();
                }
            });
        });
        const deleteFormElements = document.querySelectorAll('form.form-deleter');
        deleteFormElements.forEach(formElement => {
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
                const userConfirmDelete = window.confirm('Are you sure you want to delete permantly this beach?');
                if (userConfirmDelete){
                    this.submit();
                }
            });
        });
    </script>
@endsection
