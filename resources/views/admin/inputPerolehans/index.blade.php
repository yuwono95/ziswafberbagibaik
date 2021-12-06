@extends('layouts.admin')
@section('content')
@can('input_perolehan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.input-perolehans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.inputPerolehan.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'InputPerolehan', 'route' => 'admin.input-perolehans.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.inputPerolehan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-InputPerolehan">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.namadonatur') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.nomorhp') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.zakatprofesi') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.zakatmaal') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.infaq') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.sedekah') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.wakafpendidikan') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.wakafproduktif') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.infaqkesehatan') }}
                    </th>
                    <th>
                        Total
                    </th>
                    <th>
                        {{ trans('cruds.userAlert.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.team') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.namabank') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.buktitransfer') }}
                    </th>
                    <th>
                        {{ trans('cruds.inputPerolehan.fields.verifiedstatus') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
					<td>
					</td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
					<td>
					</td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($banks as $key => $item)
                                <option value="{{ $item->namabank }}">{{ $item->namabank }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($verified_statuses as $key => $item)
                                <option value="{{ $item->status }}">{{ $item->status }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('input_perolehan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.input-perolehans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.input-perolehans.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'namadonatur', name: 'namadonatur' },
{ data: 'nomorhp', name: 'nomorhp' },
{ data: 'zakatprofesi', name: 'zakatprofesi' },
{ data: 'zakatmaal', name: 'zakatmaal' },
{ data: 'infaq', name: 'infaq' },
{ data: 'sedekah', name: 'sedekah' },
{ data: 'wakafpendidikan', name: 'wakafpendidikan' },
{ data: 'wakafproduktif', name: 'wakafproduktif' },
{ data: 'infaqkesehatan', name: 'infaqkesehatan' },
{ data: 'total', name: 'total' },
{ data: 'user', name: 'user.name' },
{ data: 'team', name: 'team.name' },
{ data: 'namabank', name: 'namabank.namabank' },
{ data: 'buktitransfer', name: 'buktitransfer', sortable: false, searchable: false },
{ data: 'verifiedstatus_status', name: 'verifiedstatus.status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-InputPerolehan').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection
