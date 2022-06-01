<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageServicoController extends Controller
{
    public function index(Request $request) {
        
        $search = $request->search;
        $days_history = $request->days_history;
        

        if ($search || $days_history) {
            $servicos = Servico::where('dono', 'like', '%'.$search.'%')->where('created_at', '>=', Carbon::now()->subDay($days_history))->where('concluido', 0)->orderBy('id', 'DESC')->paginate(15);
            $servicosConcluidos = Servico::where('concluido', 1)->where('created_at', '>=', Carbon::now()->subDay($days_history))->where('dono', 'like', '%'.$search.'%')->orderBy('id', 'DESC')->paginate(15);
            $somaServicos = Servico::where('dono', 'like', '%'.$search.'%')->where('created_at', '>=', Carbon::now()->subDay($days_history))->where('concluido', 0)->sum(DB::raw('valor_receber - valor_cobrar'));
        }
        
        else {
            $servicos = Servico::where('concluido', 0)->orderBy('id', 'DESC')->paginate(15);
            $servicosConcluidos = Servico::where('concluido', 1)->orderBy('id', 'DESC')->paginate(15);
            $somaServicos = Servico::where('concluido', 0)->sum(DB::raw('valor_receber - valor_cobrar'));
        }

        session()->flashInput($request->all());
        
        return view('servicos', ['servicos' => $servicos, 'servicosConcluidos' => $servicosConcluidos, 'somaServicos' => $somaServicos]);
    }
}