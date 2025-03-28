<div class="m-3">
    @can('matricular_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.matriculars.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.matricular.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.matricular.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-alunoMatriculars">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.matricular.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricular.fields.aluno') }}
                            </th>
                            <th>
                                {{ trans('cruds.student.fields.serie') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricular.fields.turma') }}
                            </th>
                            <th>
                                {{ trans('cruds.studentClass.fields.serie') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matriculars as $key => $matricular)
                            <tr data-entry-id="{{ $matricular->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $matricular->id ?? '' }}
                                </td>
                                <td>
                                    {{ $matricular->aluno->nome ?? '' }}
                                </td>
                                <td>
                                    @if($matricular->aluno)
                                        {{ $matricular->aluno::SERIE_SELECT[$matricular->aluno->serie] ?? '' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $matricular->turma->nome ?? '' }}
                                </td>
                                <td>
                                    @if($matricular->turma)
                                        {{ $matricular->turma::SERIE_SELECT[$matricular->turma->serie] ?? '' }}
                                    @endif
                                </td>
                                <td>
                                    @can('matricular_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.matriculars.show', $matricular->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('matricular_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.matriculars.edit', $matricular->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('matricular_delete')
                                        <form action="{{ route('admin.matriculars.destroy', $matricular->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('matricular_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.matriculars.massDestroy') }}",
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
  let table = $('.datatable-alunoMatriculars:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection