@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5 card p-3 ms-5 me-5">
        <form action="addPermission" method="POST" class="row">
            @csrf
            
            <div class="mb-3">
                <lable>Название доступа: </lable>
                <input type="text" name="permission_name" class="form-control">
            </div>

            <div class="mb-3">
                <input type="submit" value="Добавить" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection