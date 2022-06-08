<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicoController extends Controller
{
    public function index() {
        return view('novo-servico');
    }

    public function store(Request $request, Servico $servico) {

        $validator = Validator::make($request->all(), [
            'servico.modelo' => 'required',
            'servico.marca' => 'required',
            'servico.dono' => 'required',
            'valor_receber' => 'required',
            'valor_cobrar' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/novo-servico')->withErrors($validator)->withInput();
        }

        else {
            $servico->valor_receber = money_database($request->valor_receber);
            $servico->valor_cobrar = money_database($request->valor_cobrar);
            $servico->fill(request('servico'))->save();
            return redirect('/novo-servico')->with('success', 'Serviço adicionado com sucesso!');
        }
    }

    public function delete($id) {
        $servico = Servico::find($id);
        $servico->delete();
        return redirect()->route('servicos')->with('deletado', 'Serviço (Dono: '. $servico->dono .' , Modelo: '. $servico->modelo .') removido com sucesso!');
    }

    public function concluded($id, Request $request) {
        $servico = Servico::find($id);
        $servico->update(['concluido' => $request->concluido ? true : false]);
        return redirect()->route('servicos')->with('concluido', 'Serviço (Dono: '. $servico->dono .' , Modelo: '. $servico->modelo .') foi concluido!');
    }

    public function edit($id, Request $request) {
        $servico = Servico::find($id);
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
            'servico.modelo' => 'required',
            'servico.marca' => 'required',
            'servico.dono' => 'required',
            'valor_receber' => 'required',
            'valor_cobrar' => 'required'
            ]);
            
            $servico->valor_receber = money_database($request->valor_receber);
            $servico->valor_cobrar = money_database($request->valor_cobrar);
            $servico->fill(request('servico'))->save();
            return back();
        }
        if ($request->isMethod('get'))
        {
            return view('novo-servico-editar', ['servico' => $servico]);
        }
        
    }
}