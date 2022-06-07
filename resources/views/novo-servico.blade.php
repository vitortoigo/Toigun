@extends('layout.main')
@section('title', 'Toigun | Adicionar serviço')

@section('content')

<form method="post" action="{{ route('novo-servico.enviar') }}">
    <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white">Cadastrar novo serviço</p>
            <div>
                <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-green-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-green-700 hover:bg-green-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Cadastrar</p>
                </button>
            </div>
        </div>
    </div>

    <div class="bg-gray-800  shadow px-4 md:px-10 py-12 md:pt-7 overflow-y-auto">

        @if($errors->any())
        <div class="alert alert-danger">
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
        <div class="alert alert-danger">
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    Sucesso!
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif


        <div class="space-y-4 text-gray-700 flex flex-col">
            @csrf
            <div class="flex flex-wrap -mx-2">
                <div class="w-full px-2 md:w-1/3">
                    <label class="block mb-1 text-white" for="formGridCode_card">Modelo da arma</label>
                    <input name="servico[modelo]" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_card" />
                </div>
                <div class="w-full px-2 md:w-1/3">
                    <label class="block mb-1 text-white" for="formGridCode_name">Marca da arma</label>
                    <input name="servico[marca]" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_name" />
                </div>
                <div class="w-full px-2 md:w-1/3">
                    <label class="block mb-1 text-white" for="formGridCode_last">Dono</label>
                    <input name="servico[dono]" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_last" />
                </div>
            </div>
            <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                <div class="w-full px-2 md:w-1/3">
                    <label class="block mb-1 text-white" for="formGridCode_month">Valor a cobrar</label>
                    <input name="valor_cobrar" class="money w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_month" />
                </div>
                <div class="w-full px-2 md:w-1/3">
                    <label class="block mb-1 text-white" for="formGridCode_year">Valor a receber</label>
                    <input name="valor_receber" class="money w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_year" />
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
