<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Http\Requests;
use App\Http\Requests\PessoaForm;


class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return response()->json(['pessoas' => $pessoas]);
    }

    /**
     * @param PessoaForm $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PessoaForm $request)
    {
        if($request->ajax())
        {
            $pessoa = new Pessoa();
            $pessoa->nome = $request->input('nome');
            $pessoa->save();
            return response()->json(['message' => 'Salvo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoa::find($id);
        return response()->json(['pessoa' => $pessoa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaForm $request, $id)
    {
        if($request->ajax())
        {
            $pessoa = Pessoa::find($id);
            $pessoa->nome = $request->input('nome');
            $pessoa->save();
            return response()->json(['message' => 'Atualizado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->delete();
        return response()->json(['message' => 'Removido']);
    }
}
