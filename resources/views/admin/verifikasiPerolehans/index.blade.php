@extends('layouts.admin')
@section('content')
@can('verifikasi_perolehan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.verifikasi-perolehans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.verifikasiPerolehan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.verifikasiPerolehan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-VerifikasiPerolehan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.verifikasiPerolehan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.verifikasiPerolehan.fields.verificator') }}
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
                            {{ trans('cruds.inputPerolehan.fields.nomorhp') }}
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($input_perolehans as $key => $item)
                                    <option value="{{ $item->namadonatur }}">{{ $item->namadonatur }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($verifikasiPerolehans as $key => $verifikasiPerolehan)
                        <tr data-entry-id="{{ $verifikasiPerolehan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $verifikasiPerolehan->id ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->namadonatur ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->zakatprofesi ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->zakatmaal ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->infaq ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->sedekah ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->wakafpendidikan ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->wakafproduktif ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->infaqkesehatan ?? '' }}
                            </td>
                            <td>
                                {{ $verifikasiPerolehan->verificator->nomorhp ?? '' }}
                            </td>
                            <td>
                                @can('verifikasi_perolehan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.verifikasi-perolehans.show', $verifikasiPerolehan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('verifikasi_perolehan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.verifikasi-perolehans.edit', $verifikasiPerolehan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('verifikasi_perolehan_delete')
                                    <form action="{{ route('admin.verifikasi-perolehans.destroy', $verifikasiPerolehan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('verifikasi_perolehan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.verifikasi-perolehans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-VerifikasiPerolehan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
})

</script>
@endsection