@extends('layout.main')
@section('title', 'Toigun | Serviços')

@section('content')

@if (session('deletado'))
<div class="alert alert-danger mb-5">
    <div role="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Serviço removido!
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{ session('deletado') }}</p>
        </div>
    </div>
</div>
@endif

@if (session('concluido'))
<div class="alert alert-danger mb-5">
    <div role="alert">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Serviço concluido!
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{ session('concluido') }}</p>
        </div>
    </div>
</div>
@endif

<div class="px-4 md:px-10 py-4 md:py-7 bg-gray-700 rounded-lg mb-10">
    <div class="sm:flex items-center justify-between">
        <form method="get" action="{{ route('servicos') }}" class="flex justify-between w-full">
            <div class="flex">
                <input name="search" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_card" />
                <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-green-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-green-700 hover:bg-green-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Pesquisar</p>
                </button>
            </div>
            <div>
                <select name="days_history" id="days_history" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline">
                    <option disabled selected>Selecione um dia</option>
                    <option value="7" @if (old('days_history')=='7' ) selected @endif>7 Dias</option>
                    <option value="15" @if (old('days_history')=='15' ) selected @endif>15 Dias</option>
                    <option value="30" @if (old('days_history')=='30' ) selected @endif>30 Dias</option>
                    <option value="99999" @if (old('days_history')=='99999' ) selected @endif>Todos registros</option>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="px-4 md:px-10 py-4 md:py-7 bg-gray-700 rounded-tl-lg rounded-tr-lg">
    <div class="sm:flex items-center justify-between">
        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white">Tabela de serviços</p>
        <div>
            <a href="{{ route('novo-servico') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-green-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-green-700 hover:bg-green-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white">Adicionar novo</p>
            </a>
        </div>
    </div>
</div>
@if($servicos->count() > 0)
<div class="bg-gray-800  shadow px-4 md:px-10 py-10 md:pt-7 overflow-y-auto">
    <table class="w-full whitespace-nowrap">
        <thead>
            <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-white ">
                <th class="font-normal text-left pl-4">Arma</th>
                <th class="font-normal text-left pl-12">Dono</th>
                <th class="font-normal text-left pl-12">Valor a cobrar</th>
                <th class="font-normal text-left pl-20">Valor a receber</th>
                <th class="font-normal text-left pl-20">Total de ganhos</th>
                <th class="font-normal text-left pl-20">Data do cadastro</th>
            </tr>
        </thead>
        <tbody class="w-full">
            @foreach($servicos as $servico)
            <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-white  bg-gray-800  hover:bg-gray-900  border-b border-t border-gray-700 ">
                <td class="pl-4 cursor-pointer">
                    <div class="flex items-center">
                        <div class="pl-4">
                            <p class="font-medium">{{$servico->modelo}}</p>
                            <p class="text-xs leading-3 text-gray-200  pt-2">{{ $servico->marca }}</p>
                        </div>
                    </div>
                </td>
                <td class="pl-12">
                    <p class="text-sm font-medium leading-none text-white ">{{ $servico->dono }}</p>
                </td>
                <td class="pl-12">
                    <p class="font-medium">R${{ money_format($servico->valor_cobrar) }}</p>
                </td>
                <td class="pl-20">
                    <p class="font-medium">R${{ money_format($servico->valor_receber) }}</p>
                </td>
                <td class="pl-20">
                    <p class="font-medium">R${{ money_format($servico->valor_receber - $servico->valor_cobrar) }}</p>
                </td>
                <td class="pl-20">
                    <p class="font-medium">{{ $servico->created_at->format('d/m/Y') }}</p>
                </td>
                <td class="px-7 2xl:px-0">
                    <div class="flex">
                        <form method="post" action="{{ route('servico.concluido', $servico->id) }}">
                            @csrf
                            <input id="checkConcluido" class="hidden" type="checkbox" name="concluido">
                            <button id="concluido" type="submit" class="focus:ring-2 rounded-md focus:outline-none" role="button" aria-label="options">
                                <svg fill="green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="30px" height="30px">
                                    <path d="M32,6C17.641,6,6,17.641,6,32c0,14.359,11.641,26,26,26s26-11.641,26-26C58,17.641,46.359,6,32,6z M45.121,28.121l-13,13 C31.535,41.707,30.768,42,30,42s-1.535-0.293-2.121-0.879l-8-8c-1.172-1.171-1.172-3.071,0-4.242c1.172-1.172,3.07-1.172,4.242,0 L30,34.758l10.879-10.879c1.172-1.172,3.07-1.172,4.242,0C46.293,25.05,46.293,26.95,45.121,28.121z" /></svg>
                            </button>
                        </form>
                        <a class="ml-7" href="{{ route('servico.editar', $servico->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512">
                                <path fill="deepskyblue" d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        <p class="focus:outline-none text-base sm:text-lg md:text-xl font-bold leading-normal text-white">Ganhos: <span style="color: {{$somaServicos > 0 ? 'green' : 'red'}}">R${{money_format($somaServicos)}}</span></p>
    </div>
    <div class="mt-5">
        {{ $servicos->links() }}
    </div>
</div>
@endif

@if($servicosConcluidos->count() > 0)
<div class="px-4 md:px-10 py-4 md:py-7 bg-gray-700 rounded-tl-lg rounded-tr-lg mt-10">
    <div class="sm:flex items-center justify-between">
        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white">Serviços concluidos</p>
    </div>
</div>
<div class="bg-gray-800  shadow px-4 md:px-10 py-10 md:pt-7 overflow-y-auto">
    <table class="w-full whitespace-nowrap">
        <thead>
            <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-white ">
                <th class="font-normal text-left pl-4">Arma</th>
                <th class="font-normal text-left pl-12">Dono</th>
                <th class="font-normal text-left pl-12">Valor a cobrar</th>
                <th class="font-normal text-left pl-20">Valor a receber</th>
                <th class="font-normal text-left pl-20">Data da conclusão</th>
            </tr>
        </thead>
        <tbody class="w-full">
            @foreach($servicosConcluidos as $servicoConcluido)
            <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-white  bg-gray-800  hover:bg-gray-900  border-b border-t border-gray-700 ">
                <td class="pl-4 cursor-pointer">
                    <div class="flex items-center">
                        <div class="pl-4">
                            <p class="font-medium">{{$servicoConcluido->modelo}}</p>
                            <p class="text-xs leading-3 text-gray-200  pt-2">{{ $servicoConcluido->marca }}</p>
                        </div>
                    </div>
                </td>
                <td class="pl-12">
                    <p class="text-sm font-medium leading-none text-white ">{{ $servicoConcluido->dono }}</p>
                </td>
                <td class="pl-12">
                    <p class="font-medium">R${{ money_format($servicoConcluido->valor_cobrar) }}</p>
                </td>
                <td class="pl-20">
                    <p class="font-medium">R${{ money_format($servicoConcluido->valor_receber) }}</p>
                </td>
                <td class="pl-20">
                    <p class="font-medium">{{ $servicoConcluido->updated_at->format('d/m/Y') }}</p>

                </td>
                <td class="px-7 2xl:px-0">
                    <form method="post" action="{{ route('servico.delete', $servicoConcluido->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="focus:ring-2 rounded-md focus:outline-none ml-7" role="button" aria-label="options">
                            <svg fill="red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                <path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z" /></svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $servicosConcluidos->links() }}
    </div>
</div>
@endif

@endsection

{{-- <form method="post" action="{{ route('servico.delete', $servico->id) }}">
@csrf
@method('delete')
<button type="submit" class="focus:ring-2 rounded-md focus:outline-none ml-7" role="button" aria-label="options">
    <svg fill="red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
        <path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z" /></svg>
</button>
</form> --}}
