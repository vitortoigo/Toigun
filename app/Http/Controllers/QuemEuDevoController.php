<?php

namespace App\Http\Controllers;

use App\Models\QuemEuDevo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuemEuDevoController extends Controller
{
    public function index() {
        $qed = QuemEuDevo::orderBy('id', 'DESC')->paginate(15);
        $qedSoma = QuemEuDevo::sum(DB::raw('valor'));
        return view('quem-eu-devo', ['quem_eu_devo' => $qed, 'qedSoma' => $qedSoma]);
    }

    public function store(Request $request,  QuemEuDevo $qed) {
        $validator = Validator::make($request->all(), [
            'qed.nome' => 'required',
            'valor' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->route('quem-eu-devo')->withErrors($validator)->withInput();
        }

        else {
            $qed->valor = money_database($request->valor);
            $qed->fill(request('qed'))->save();
            return redirect()->route('quem-eu-devo')->with('success', '[Nome: '. $request->qed['nome'] .' no valor de R$'. $request->valor .'] foi adicionado!');
        }
    }

    public function delete($id) {
        $qed = QuemEuDevo::find($id);
        $qed->delete();
        return redirect()->route('quem-eu-devo')->with('pago', '[Nome: '. $qed->nome .', Valor: R$'. $qed->valor .'] foi pago com sucesso!');
    }
}