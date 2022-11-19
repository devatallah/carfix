@extends('portals.admin.app')
@section('title')
    @lang('admins')
@endsection
@section('styles')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">@lang('admins')</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}">@lang('home')</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{url('/admin/admins')}}">@lang('admins')</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section id="">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="head-label">
                                    <h4 class="card-title">@lang('admins')</h4>
                                </div>
                                <div class="text-right">
                                    <div class="form-gruop">
                                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#create_modal"><span><i class="fa fa-plus"></i> @lang('add_new_record')</span>
                                        </button>
                                        <button disabled="" id="delete_btn"
                                                class="delete-btn btn btn-outline-danger">
                                            <span><i class="fa fa-lg fa-trash-alt" aria-hidden="true"></i> @lang('delete')</span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="s_name">@lang('name')</label>
                                                <input id="s_name" type="text" class="search_input form-control"
                                                       placeholder="@lang('name')">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="s_mobile">@lang('mobile')</label>
                                                <input id="s_mobile" type="text" class="search_input form-control"
                                                       placeholder="@lang('mobile')">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="s_email">@lang('email')</label>
                                                <input id="s_email" type="text" class="search_input form-control"
                                                       placeholder="@lang('email')">
                                            </div>
                                        </div>
                                        <div class="col-3" style="margin-top: 20px">
                                            <div class="form-group">
                                                <button  id="search_btn" class="btn btn-outline-info" type="submit">
                                                    <span><i class="fa fa-search"></i> @lang('search')</span>
                                                </button>
                                                <button  id="clear_btn" class="btn btn-outline-secondary" type="submit">
                                                    <span><i class="fa fa-undo"></i> @lang('reset')</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive card-datatable">
                                <table class="table" id="datatable">
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 35px;" aria-label=" Record Id ">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox"
                                                       class="table_ids custom-control-input dt-checkboxes"
                                                       id="select_all">
                                                <label class="custom-control-label" for="select_all"></label>
                                            </div>
                                        </th>
                                        <th>@lang('uuid')</th>
                                        <th>@lang('name')</th>
                                        <th>@lang('email')</th>
                                        <th>@lang('mobile')</th>
                                        <th style="width: 225px;">@lang('actions')</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('create')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="create_form" method="POST"
                          data-reset="true" class="ajax_form form-horizontal" enctype="multipart/form-data"
                          novalidate>
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">@lang('name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('name')"
                                           name="name" id="name">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">@lang('email')</label>
                                    <input type="text" class="form-control" placeholder="@lang('email')"
                                           name="email" id="email">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mobile">@lang('mobile')</label>
                                    <input type="text" class="form-control" placeholder="@lang('mobile')"
                                           name="mobile" id="mobile">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">@lang('password')</label>
                                    <input type="password" class="form-control" placeholder="@lang('password')"
                                           name="password" id="password">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
{{--                            <div class="col-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="permissions" class="col-form-label">@lang('permissions')</label>--}}
{{--                                    <select class="form-control" id="permissions" name="permissions[]"--}}
{{--                                            multiple="multiple" required>--}}
{{--                                        @foreach($permissions as $permission)--}}
{{--                                            <option value="{{$permission->id}}">@lang($permission->name)</option>--}}

{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    <div class="invalid-feedback"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="create_form" class="submit_btn btn btn-primary">
                        <i class="fa fa-spinner fa-spin" style="display: none;"></i>
                        @lang('save')
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">@lang('close')
                    </button>{{--                            <button type="button" form="create_form" class="btn btn-primary">Send message</button>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('edit')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="edit_form" method="POST"
                          data-reset="true" class="ajax_form form-horizontal" enctype="multipart/form-data"
                          novalidate>
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_name">@lang('name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('name')"
                                           name="name" id="edit_name">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_email">@lang('email')</label>
                                    <input type="text" class="form-control" placeholder="@lang('email')"
                                           name="email" id="edit_email">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_mobile">@lang('mobile')</label>
                                    <input type="text" class="form-control" placeholder="@lang('mobile')"
                                           name="mobile" id="edit_mobile">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_password">@lang('password')</label>
                                    <input type="password" class="form-control" placeholder="@lang('password')"
                                           name="password" id="edit_password">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
{{--                            <div class="col-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="edit_permissions" class="col-form-label">@lang('permissions')</label>--}}
{{--                                    <select class="form-control" id="edit_permissions" name="permissions[]"--}}
{{--                                            multiple="multiple" required>--}}
{{--                                        @foreach($permissions as $permission)--}}
{{--                                            <option value="{{$permission->id}}">@lang($permission->name)</option>--}}

{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    <div class="invalid-feedback"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="edit_form" class="submit_btn btn btn-primary">
                        <i class="fa fa-spinner fa-spin" style="display: none;"></i>
                        @lang('save')
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">@lang('close')</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
@section('scripts')
    <script>
        var url = '{{url(app()->getLocale()."/admin/admins")}}/';

        var oTable = $('#datatable').DataTable({
            dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            "oLanguage": {
                @if(app()->isLocale('ar'))
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                },

                @endif// "oPaginate": {"sPrevious": '<-', "sNext": '->'},
                "oPaginate": {
                    // remove previous & next text from pagination
                    "sPrevious": '&nbsp;',
                    "sNext": '&nbsp;'
                }
            },
            'columnDefs': [
                {
                    "targets": 1,
                    "visible": false
                },
                {
                    'targets': 0,
                    "searchable": false,
                    "orderable": false
                },
            ],
            // dom: 'lrtip',
            "order": [[1, 'asc']],
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: '{{ url('/admin/admins/indexTable')}}',
                data: function (d) {
                    d.name = $('#s_name').val();
                }
            },
            columns: [
                {
                    "render": function (data, type, full, meta) {
                        return `<td class="checkbox-column sorting_1">
                                       <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="table_ids custom-control-input dt-checkboxes"
                                         name="table_ids[]" value="` + full.uuid + `" id="checkbox` + full.uuid + `" >
                                    <label class="custom-control-label" for="checkbox` + full.uuid + `"></label>
                                </div></td>`;
                    }
                },

                {data: 'uuid', name: 'uuid'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'mobile', name: 'mobile'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        $(document).ready(function () {
            $(document).on('click', '.edit_btn', function (event) {
                var button = $(this)
                var uuid = button.data('uuid')
                var name = button.data('name')
                var email = button.data('email')
                var mobile = button.data('mobile')
                var image = button.data('image')
                $('#edit_form').attr('action', url + uuid)
                $('#edit_name').val(name)
                $('#edit_email').val(email)
                $('#edit_mobile').val(mobile)
                // var perm_ids = button.data('permissions')+''
                // if (perm_ids.indexOf(",") >= 0){
                //     permissions = (button.data('permissions').split(','))
                //     permissions = permissions.filter(item => item);
                //     console.log(permissions)
                // }
                // $("#edit_permissions").val(permissions).trigger('change');
            });
            $(document).on('click', '#create_btn', function (event) {
                $('#create_form').attr('action', url);
            });
        });

    </script>

@endsection
