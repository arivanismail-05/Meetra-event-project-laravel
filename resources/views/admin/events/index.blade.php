
@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">           

            <table id="myTable" class=" myTable">
                <thead>
                    <tr>
                    <th scope="">#</th>
                    <th scope="">title</th>
                    <th scope="">body</th>
                    <th scope="">location</th>
                    <th scope="">image</th>
                    <th scope="">Added by </th>
                    <th scope="">start event </th>
                    <th scope="">end event </th>
                    <th scope="">created at</th>
                    <th scope="">deleted at</th>
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
        ajax: '{{ route('admin.events.index') }}',
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable: false,
                orderable: false
            },
            {
                data: 'title',
                name: 'title',
            },
            {
                data: 'body',
                name: 'body',
            },
            {
                data: 'location',
                name: 'location',
            },
            {
                data: 'full_path_image',
                name: 'full_path_image',
                searchable: false,
                orderable: false,
                render: function(data, type, row){
                    return `<img src="${data}" style="width:50px;" >`;
                }
            },
            {
                data: 'admin_id',
                name: 'admin_id',
                searchable: false,
                orderable: false
            },
            {
                data: 'start_event',
                name: 'start_event',
            },
            {
                data: 'end_event',
                name: 'end_event',

            },
            
            {
                data: 'created_at_readable',
                name: 'created_at_readable',
                searchable: false,
                orderable: false
            },
            {
                data: 'deleted_at_readable',
                name: 'deleted_at_readable',
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
                    const editurl = '{{ route('admin.events.edit',':id')}}'
                    const deleteUrl = '{{ route('admin.events.destroy' , ':id')}}'

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