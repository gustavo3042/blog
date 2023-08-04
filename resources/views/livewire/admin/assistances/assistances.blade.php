<div>

<br>
<br>
<br>
    <div class="card">

        <div class="card-body pt-5">

    <div class="box box-info padding-1">
        <div class="box-body">
    
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <th></th>
                        <th>Presente</th>
                        <th>Ausente</th>
                        <th>Motivo</th>
                    </thead>
                    <tbody>
    
                        <input type="hidden" name="check_lists_id" value="{{ $checkList_id }}">
    
                        <?php $i = 0; ?>
    
    
    
                        @foreach ($checkWorkers as $key => $CW)
                        <tr>
                            <td> {{ $CW->name }}</td>
                            <input type="hidden" name="workers[]" value="{{ $CW->idWorkers}}">
    
                            <td>
                                <input class="form-check-input" value="1" type="radio"
                                checked
                                    name="presente[{{ $key }}][]"
                                    id="asistencia{{ $key }}">
                            </td>
                            <td>
                                <input class="form-check-input" value="0" type="radio"
    
                                    name="presente[{{ $key }}][]"
                                    id="asistencia{{ $key }}">
                            </td>
    
    
                            <td>
                                <select name="inasistencia_id[]" class="form-control">
    
                                    @foreach ($absences as $absence)
                                        <option value="{{ $absence->id }}"
                                            {{ $CW->inasistencia_id == $absence->id ? 'selected' : 1 }}>
                                            {{ $absence->name }}
                                        </option>
                                    @endforeach
    
                                </select>
    
                            </td>
    
    
    
                        </tr>
    
                        <?php ++$i; ?>
                    @endforeach
    
    
                    </tbody>
                </table>
            </div>
    
        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</div>
    
    @section('js')
        <script>
            $(":checkbox").on("change", function() {
                var chx = $(this).is(':checked');
                $(this).closest('tr').find('input:text, select').prop("disabled", chx).val("1");
            });
    
        </script>
    
        <script>
    
            function name(params) {
    
            }
        </script>
    @endsection
    


</div>
</div>
