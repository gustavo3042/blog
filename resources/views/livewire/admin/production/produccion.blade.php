<div>
    
    
    <section class="content container-fluid pt-5">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Production </span>

                    </div>
                    <div class="card-body">
                        
                            

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <style>
                                        .tablet {}


                                        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
                                            .tablet {
                                                height: 5rem;
                                                font-size: 2rem;
                                            }
                                        }

                                        .bleft {
                                            border-left: solid 2px !important;
                                        }

                                    </style>
                                    <div class="">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>

                                                    <th class="border" colspan="2">Jornada a Trato</th>
                                                    <th class="bleft border" colspan="2">Jornada al dia</th>
                                                </tr>
                                                <th>Faenero</th>
                                                <th>Asistencia | Permiso </th>

                                                <th width="10%">Cantidad</th>
                                                <th width="10%">Rendimiento</th>

                                                <th class="bleft" width="10%">Pago</th>
                                                <th width="10%">Porcentaje</th>
                                              
                                                <th width="10%">Pago %</th>
                                            </thead>
                                            <tbody>


                                                <input type="hidden" name="check_lists_id" value="{{ $production->id }}">

                                                @foreach ($workersId as $CW)
                                                    <tr>
                                                        <td width="40%"> {{ $CW->name }} {{ $CW->surname }}
                                                            {{ $CW->surname2 }}</td>
                                                        <input type="hidden" name="workers[]" value="{{ $CW->check_lists_workers_id }}">
                                                        <td>

                                                        @if ($CW->presente == 1)
                                                            <span class="badge rounded-pill bg-success">Presente</span>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill bg-danger">Ausente</span>
                                                        @endif

                                                         

                                                        </td>
                                                        <td class="">
                                                            <input class="form-control tablet"
                                                                value="{{ $CW->cantidad ?? '0' }}" type="input"
                                                                name="produccion[]" {{ $CW->presente == 0 ? 'readonly' : '' }}
                                                               >


                                                        </td>
                                                        <td class="">
                                                            <select class="form-control" name="rendimiento[]"
                                                                {{ $CW->presente == 0 ? 'readonly' : '' }}>
                                                                <option value="0"
                                                                    {{ $CW->rendimiento == 0 ? 'selected' : '' }}> Sin
                                                                    Rendimiento </option>
                                                                <option value="0.5"
                                                                    {{ $CW->rendimiento == 0.5 ? 'selected' : '' }}>30
                                                                    Minutos</option>
                                                                <option value="1"
                                                                    {{ $CW->rendimiento == 1 ? 'selected' : '' }}>1 hora
                                                                </option>
                                                                <option value="1.5"
                                                                    {{ $CW->rendimiento == 1.5 ? 'selected' : '' }}>1
                                                                    hora y media</option>
                                                                <option value="2"
                                                                    {{ $CW->rendimiento == 2 ? 'selected' : '' }}>2 horas
                                                                </option>
                                                                <option value="2.5"
                                                                    {{ $CW->rendimiento == 2.5 ? 'selected' : '' }}>2
                                                                    horas y media</option>
                                                                <option value="3"
                                                                    {{ $CW->rendimiento == 3 ? 'selected' : '' }}> 3
                                                                    horas</option>
                                                                <option value="3.5"
                                                                    {{ $CW->rendimiento == 3.5 ? 'selected' : '' }}>3
                                                                    horas y media</option>
                                                                <option value="4"
                                                                    {{ $CW->rendimiento == 4 ? 'selected' : '' }}>4 horas
                                                                </option>
                                                                <option value="4.5"
                                                                    {{ $CW->rendimiento == 4.5 ? 'selected' : '' }}>4
                                                                    horas y media</option>
                                                                <option value="5"
                                                                    {{ $CW->rendimiento == 5 ? 'selected' : '' }}>5 horas
                                                                </option>
                                                                <option value="5.5"
                                                                    {{ $CW->rendimiento == 4.5 ? 'selected' : '' }}>5
                                                                    horas y media</option>
                                                                <option value="6"
                                                                    {{ $CW->rendimiento == 6 ? 'selected' : '' }}>6 horas
                                                                </option>
                                                                <option value="6.5"
                                                                    {{ $CW->rendimiento == 6.5 ? 'selected' : '' }}>6
                                                                    horas y media</option>
                                                                <option value="7"
                                                                    {{ $CW->rendimiento == 7 ? 'selected' : '' }}>7 horas
                                                                </option>
                                                                <option value="7.5"
                                                                    {{ $CW->rendimiento == 7.5 ? 'selected' : '' }}>7
                                                                    horas y media</option>
                                                                <option value="8"
                                                                    {{ $CW->rendimiento == 8 ? 'selected' : '' }}>8 horas
                                                                </option>
                                                                <option value="8.5"
                                                                    {{ $CW->rendimiento == 8.5 ? 'selected' : '' }}>8
                                                                    horas y media</option>
                                                                <option value="9"
                                                                    {{ $CW->rendimiento == 9 ? 'selected' : '' }}>9 horas
                                                                </option>
                                                                <option value="9.5"
                                                                    {{ $CW->rendimiento == 9.5 ? 'selected' : '' }}>9
                                                                    horas y media</option>
                                                                <option value="10"
                                                                    {{ $CW->rendimiento == 10 ? 'selected' : '' }}>10
                                                                    horas</option>
                                                                <option value="10.5"
                                                                    {{ $CW->rendimiento == 10.5 ? 'selected' : '' }}>10
                                                                    horas y media</option>
                                                                <option value="11"
                                                                    {{ $CW->rendimiento == 11 ? 'selected' : '' }}>11
                                                                    horas</option>
                                                                <option value="11.5"
                                                                    {{ $CW->rendimiento == 11.5 ? 'selected' : '' }}>11
                                                                    horas y media</option>
                                                                <option value="12"
                                                                    {{ $CW->rendimiento == 12 ? 'selected' : '' }}>12
                                                                    horas</option>
                                                                <option value="12.5"
                                                                    {{ $CW->rendimiento == 12.5 ? 'selected' : '' }}>12
                                                                    horas y media</option>
                                                                <option value="13"
                                                                    {{ $CW->rendimiento == 13 ? 'selected' : '' }}>13
                                                                    horas</option>
                                                                <option value="13.5"
                                                                    {{ $CW->rendimiento == 13.5 ? 'selected' : '' }}>13
                                                                    horas y media</option>
                                                                <option value="14"
                                                                    {{ $CW->rendimiento == 14 ? 'selected' : '' }}>14
                                                                    horas</option>
                                                                <option value="14.5"
                                                                    {{ $CW->rendimiento == 14.5 ? 'selected' : '' }}>14
                                                                    horas y media</option>
                                                                <option value="15"
                                                                    {{ $CW->rendimiento == 15 ? 'selected' : '' }}>15
                                                                    horas</option>
                                                                <option value="15.5"
                                                                    {{ $CW->rendimiento == 15.5 ? 'selected' : '' }}>15
                                                                    horas y media</option>
                                                            </select>

                                                        </td>


                                                        <td class="bleft">
                                                            <input class="form-control" type="text" name="pagodiario[]"
                                                                value="{{ $CW->pagodiario ?? '' }}"
                                                                {{ $CW->presente == 0 ? 'readonly' : '' }}>
                                                        </td>

                                                        <td>


                                                            <input  value="{{ $CW->porcentaje ?? '0' }}"   type="input" class="form-control tablet" name="porcentaje[]">

                                                        </td>


                                                 

                                                        <td><input name="pagoporcentaje[]" type="text" class="form-control"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                                </div>
                            </div>


                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
