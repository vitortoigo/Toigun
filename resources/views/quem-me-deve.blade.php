@extends('layout.main')
@section('title', 'Toigun | Quem me deve')

@section('content')

@if($errors->any())
<div class="alert alert-danger mb-10">
    <div role="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Atenção!
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
</div>
@endif

@if (session('success'))
<div class="alert alert-danger mb-10">
    <div role="alert">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Adicionado com sucesso!
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{ session('success') }}</p>
        </div>
    </div>
</div>
@endif

@if (session('pago'))
<div class="alert alert-danger mb-10">
    <div role="alert">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Recebi o pagamento!
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{ session('pago') }}</p>
        </div>
    </div>
</div>
@endif

<div class="px-4 md:px-10 py-4 md:py-7 bg-gray-700 rounded-tl-lg rounded-tr-lg">
    <div class="sm:flex items-center justify-between">
        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white">Novo cadastro (quem me deve)</p>
    </div>
    <form method="post" action="{{ route('quem-me-deve.novo') }}">
        @csrf
        <div class="flex flex-wrap -mx-2 mt-10 items-end">
            <div class="w-full px-2 md:w-1/3">
                <label class="block mb-1 text-white" for="formGridCode_card">Nome de quem me deve</label>
                <input name="qmd[nome]" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text">
            </div>
            <div class="w-full px-2 md:w-1/6">
                <label class="block mb-1 text-white" for="formGridCode_name">Valor à receber</label>
                <input name="valor" class="money w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text">
            </div>
            <button type="submit" class="h-max mt-auto focus:ring-2 focus:ring-offset-2 focus:ring-green-600 inline-flex sm:ml-3 sm:mt-0 items-start justify-start px-6 py-3 bg-green-700 hover:bg-green-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white">Cadastrar</p>
            </button>
        </div>
    </form>
</div>

@if($quem_me_deve->count() > 0)
<div class="px-4 md:px-10 py-4 md:py-7 bg-gray-700 rounded-tl-lg rounded-tr-lg mt-10">
    <div class="sm:flex items-center justify-between">
        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white">Lista de quem me deve</p>
    </div>
</div>
<div class="bg-gray-800  shadow px-4 md:px-10 py-10 md:pt-7 overflow-y-auto">
    <table class="w-full whitespace-nowrap">
        <thead>
            <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-white ">
                <th class="font-normal text-left pl-4">Nome</th>
                <th class="font-normal text-left pl-12">Valor</th>
                <th class="w-1"></th>
            </tr>
        </thead>
        <tbody class="w-full">
            @foreach($quem_me_deve as $qmd)
            <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-white  bg-gray-800  hover:bg-gray-900  border-b border-t border-gray-700 ">
                <td class="pl-4 cursor-pointer">
                    <p class="text-sm font-medium leading-none text-white ">{{ $qmd->nome }}</p>
                </td>
                <td class="pl-12">
                    <p class="text-sm font-medium leading-none text-white ">R${{ $qmd->valor }}</p>
                </td>
                <td class="">
                    <form method="post" action="{{ route('quem-me-deve.concluido', $qmd->id) }}">
                        @csrf
                        @method('delete')
                        <input id="checkConcluido" class="hidden" type="checkbox" name="concluido">
                        <button id="concluido" type="submit" class="focus:ring-2 rounded-md focus:outline-none" role="button" aria-label="options">
                            <svg fill="green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="30px" height="30px">
                                <path d="M32,6C17.641,6,6,17.641,6,32c0,14.359,11.641,26,26,26s26-11.641,26-26C58,17.641,46.359,6,32,6z M45.121,28.121l-13,13 C31.535,41.707,30.768,42,30,42s-1.535-0.293-2.121-0.879l-8-8c-1.172-1.171-1.172-3.071,0-4.242c1.172-1.172,3.07-1.172,4.242,0 L30,34.758l10.879-10.879c1.172-1.172,3.07-1.172,4.242,0C46.293,25.05,46.293,26.95,45.121,28.121z" /></svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        <p class="focus:outline-none text-base sm:text-lg md:text-xl font-bold leading-normal text-white">Total: <span style="color: green">R${{ money_format($qmdSoma) }}</span></p>
    </div>
    <div class="mt-5">
        {{ $quem_me_deve->links() }}
    </div>
</div>
@endif

@endsection
