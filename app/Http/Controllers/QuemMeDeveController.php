<?php

namespace App\Http\Controllers;

use App\Models\QuemMeDeve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuemMeDeveController extends Controller
{
    public function index() {
        $qmd = QuemMeDeve::orderBy('id', 'DESC')->paginate(10);
        $qmdSoma = QuemMeDeve::sum(DB::raw('valor'));
        return view('quem-me-deve', ['quem_me_deve' => $qmd, 'qmdSoma' => $qmdSoma]);
    }

    public function store(Request $request, QuemMeDeve $qmd) {
        $validator = Validator::make($request->all(), [
            'qmd.nome' => 'required',
            'valor' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->route('quem-me-deve')->withErrors($validator)->withInput();
        }

        else {
            $qmd->valor = money_database($request->valor);
            $qmd->fill(request('qmd'))->save();
            return redirect()->route('quem-me-deve')->with('success', '[Nome: '. $request->qmd['nome'] .' no valor de R$'. $request->valor .'] foi adicionado!');
        }
    }

    public function delete($id) {
        $qmd = QuemMeDeve::find($id);
        $qmd->delete();
        return redirect()->route('quem-me-deve')->with('pago', '[Nome: '. $qmd->nome .', Valor: R$'. $qmd->valor .'] foi recebido com sucesso!');
    }
}