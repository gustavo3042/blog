<div class="card">
    <div class="card-body">
        <h2 class="mb-3">Documentos Relacionados</h2>

        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Mensaje') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Documento</th>
                   {{--  <th>Documento</th> --}}
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docs as $file)
                    <tr>
                        <td>{{ $file->id }}</td>
                        <td>
                            @php
                                $extension = pathinfo($file->url, PATHINFO_EXTENSION);
                            @endphp
                            <span class="badge bg-info text-dark">{{ strtoupper($extension) }}</span>
                        </td>
                      {{--   <td>
                            <img href="{{ asset('storage/' . $file->url) }}" target="_blank">
                        </td> --}}
                        <td width="10px">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              
                                <a class="btn btn-success btn-sm" href="{{ asset('storage/' . $file->url) }}" download>
                                    <i class="fa fa-file"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
