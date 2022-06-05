@include('layouts.header')

<body>
    @include('layouts.menu')

    @if (session()->has('sucesso'))
        <div class=" text-center d-flex justify-content-center mt-5 alert alert-success" role="alert">
            <div class="text-center balaoAlert">{{ session()->get('sucesso') }}</div>
        </div>
    @endif



    <h1 class="titleAdmin h4">Lista dos pets</h1>

    <table class=" m-3 table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Peso</th>
                <th>Id do Tipo</th>
                <th>Id do Usuario </th>


            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
                @php
                    $hoje = Date('Y/m/d');
                    $nascimento = $pet->data_nascimento;
                    $idade = (int) $hoje - (int) $nascimento;
                @endphp

                <td>{{ $pet->id }}</td>
                <td><img src="{{ $pet->imagem }}" style="width:35px"></td>
                <td>{{ $pet->nome }}</td>
                <td>@php
                    echo $idade;
                @endphp</td>
                <td>{{ $pet->peso }}</td>
                <td>{{ $pet->tipo_id }}</td>
                <td>{{ $pet->user_id }}</td>



                </tr>
            @endforeach

        </tbody>
    </table>
    @include('layouts.footer')

</body>

</html>
