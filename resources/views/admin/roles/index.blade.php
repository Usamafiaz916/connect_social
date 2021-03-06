@extends("admin.layouts.app")

@section("style")
    <link href="admin_assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Roles</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-sm btn-primary create" data-bs-toggle="modal" data-bs-target="#modal" ><i class="bx bx-plus-circle"></i> Role</button>
                </div>
            </div>

            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">All Roles</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->

    <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="modal-form">
                    @csrf
                    <input type="hidden" name="id" value="0" id="id">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bx bx-plus"></i> Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Please type name of role">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="admin_assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="admin_assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>

        $(document).ready(function () {
            var columns=[
                {"data": "id"},
                {"data": "name"},
                {"data": "slug"},
                {"data": "action",orderable: false, searchable: false},

            ];
            var route = '{{ route('roles.fetch')}}';

            InitTable(route,token,columns);

            $('#modal').on('submit','#modal-form',function (e) {
                e.preventDefault();
                var route = '{{route('roles.submit')}}';
                var method = 'POST';
                var data = new FormData(this);
                var next = {'type':'data-table-modal'};
                submit($(this).find('button[type=submit]'),method,route,data,next);
            });
            $(document).on('click','.create',function () {
                $('#id').val(0);
                $('#name').val('');
            });
            $(document).on('click','.delete',function () {
                var id = $(this).attr('data-id');
                var route = '{{route('roles.destroy')}}';
                var next = {'type':'soft-dt'};
                cdelete('Are you sure to delete this role?',id,token,route,next)
            });
            $(document).on('click','.edit',function () {

                $.ajax({
                    type:'POST',
                    url:'{{route('roles.edit')}}',
                    data: {'id':$(this).attr('data-id'),_token:'{{csrf_token()}}'},
                    dataType:'JSON',
                    success:function(data) {
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#modal').modal('show');
                    },
                    error:function (xhr) {
                    }
                });

            });
        });
    </script>
    <script src="{{url('index.js')}}"></script>

@endsection