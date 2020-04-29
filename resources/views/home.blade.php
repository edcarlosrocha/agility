<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teste Desenvolvedor | Agility</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <br />
                    <form method="POST" action="/">
                        @csrf()
                        @method('POST')
                        <div class="input-group">
                            <input type="search" name="filter" class="form-control" placeholder="Nome, empresa ou e-mail" value="@isset($filter){{$filter}}@endisset">
                            <div class="input-group-append">
                              <button class="input-group-text">
                                  <span>Filtrar</span>
                              </button>
                            </div>
                          </div>
                    </form>
                </div>
            </div><br />

            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive table-striped table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Empresa</th>
                                <th>E-Mail</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)
                                <tr class="@if($user->customer == 'Agility') font-weight-bold @endif">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->customer }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhum resultado encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
