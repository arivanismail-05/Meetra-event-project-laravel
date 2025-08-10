
@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">           

            <table id="myTable" class=" myTable">
                <thead>
                    <tr>
                    <th scope="">#</th>
                    <th scope="">email</th>
                    <th scope="">created at</th>
                    <th scope="">Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                </table>
    </div>
</div>




<script>

$(function() {
    let table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.auth.index') }}',
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable: false,
                orderable: false
            },
            {
                data: 'email',
                name: 'email',
            },
            
            {
                data: 'created_at_readable',
                name: 'created_at_readable',
                searchable: false,
                orderable: false
            },
            {
                data: 'actions',
                name: 'actions',
                searchable: false,
                orderable: false,
                render: function(data, type, row){
                    const id = row.id;
                    const editurl = '{{ route('admin.auth.edit',':id')}}'
                    const deleteUrl = '{{ route('admin.auth.destroy' , ':id')}}'

                    return `
                    <div class="flex" >
                    <a href='${editurl.replace(':id',id)}'
                     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">edit</a>
                    <form id='${id}' action="${deleteUrl.replace(':id',id)}"  method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                    class="btn btn-danger">DELETE</button>
                    </form>
                    </div>
                    
                    `;
                }
            },
            
        ]
    });
});
</script>
@endsection