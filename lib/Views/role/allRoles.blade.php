@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="mb-3">
                    <a href="getPageAddRole" class="btn btn-primary">Добавить роль</a>
                </div>

                <table class="table table-striped">
                    <th style="width: 150px; !important">Роли\Права</th>

                    @foreach ($data['permissions'] as $key => $value)
                        <th style="width: 100px; !important"> {{ $value['permission_name'] ?? "-" }}</th>
                    @endforeach
                    <th style="width: 150px; !important">Удалить роль</th>
                    
                    @foreach ($data['roles'] as $key => $value)

                        <tr>

                            <td>
                                <a href="getPageEditRole?role_id={{$value['id'] ?? '0'}}">{{ $value['role_name'] ?? "-" }}</a>
                            </td>

                            @foreach ($value['status'] as $key => $val)
                                <td>
                                    @if ($val == 1)
                                    <form>
                                        <div class="custom-control custom-switch">
                                            <input class="custom-control-input" type="checkbox" 
                                                    onclick="switchPermission(this)"
                                                    id="role_permis_{{$value['id']}}_{{$key}}" 
                                                    checked>
                                            <label class="custom-control-label" for="role_permis_{{$value['id']}}_{{$key}}"></label>
                                        </div>
                                    </form>
                                    @else
                                    <form>
                                        <div class="custom-control custom-switch">
                                            <input class="custom-control-input" type="checkbox" 
                                                    onclick="switchPermission(this)"
                                                    id="role_permis_{{$value['id']}}_{{$key}}">
                                            <label class="custom-control-label" for="role_permis_{{$value['id']}}_{{$key}}"></label>
                                        </div>
                                    </form>    
                                    @endif
                                </td>
                            @endforeach

                            <td>
                                <input type="button" id="role_{{$value['id']}}" class="btn btn-outline-danger btn-sm"
                                    onclick="deleteRole(this)" value="X">
                            </td>
                        </tr>
                        
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function switchPermission(elem){
        let checkbox = elem.parentNode.children[0];
        
        let idRole = checkbox.id.split("_")[2];
        let idPermission = checkbox.id.split("_")[3];
        let setStatus = Number(checkbox.checked);

        let params = "id_role="+idRole+"&id_permission="+idPermission;

        let action = "onPermissionRole";

        if (setStatus == 0) {
            action = "offPermissionRole";
        }

        fetch(action, {
		  method: 'POST',
		  headers: new Headers({
		     'Content-Type': 'application/x-www-form-urlencoded',
		     "X-CSRF-TOKEN": document.querySelector('meta[name=csrf-token').getAttribute('content')
		   }), 
		  body: params,
		})
		.then((response) => {
		    return response.json();
		})
		.then((data) => {
			console.log(data);
		});
    }

    function deleteRole(elem){
        let idRole = elem.id.split("_")[1];

        let params = "id_role="+idRole;

        fetch("deleteRole", {
		  method: 'POST',
		  headers: new Headers({
		     'Content-Type': 'application/x-www-form-urlencoded',
		     "X-CSRF-TOKEN": document.querySelector('meta[name=csrf-token').getAttribute('content')
		   }), 
		  body: params,
		})
		.then((response) => {
		    return response.json();
		})
		.then((data) => {
			window.location.reload();
		});
    }
</script>

@endsection
