<?php

namespace App\Http\Controllers;

use App\Models\Prestador;
use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramaController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$programas = Programa::get();
        $programas = Auth::user()->programas()->get();

        return  view('programa.programaIndex', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('programa.programaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string','min:5', 'max:255'],
            'titular' => ['required', 'string','min:5', 'max:255'],
            'dependencia' => 'required|string|min:5|max:255',
            'folio' => 'required|integer|min:1',
            'dependencia' => 'required|string|min:4|max:6',
        ]);
        $request->merge(['user_id' => Auth::id()]);
        Programa::create($request->all());
        return redirect()->route('programa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        $prestadores = Prestador::get();
        return view('programa.programaShow',compact('programa', 'prestadores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        return view('programa.programaForm', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        $request->validate([
            'nombre' => ['required', 'string','min:5', 'max:255'],
            'titular' => ['required', 'string','min:5', 'max:255'],
            'dependencia' => 'required|string|min:5|max:255',
            'folio' => 'required|integer|min:1',
            'dependencia' => 'required|string|min:4|max:6',
        ]);
        Programa::where('id', $programa->id)->update($request->except('_token', '_method'));

        return redirect()->route('programa.show', $programa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();
        return redirect()->route('programa.index');
    }
    /**Agrega un prestador a un programa
     *@param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function agregaPrestador(Request $request, Programa $programa){
        $programa->prestadores()->sync($request->prestador_id);

        return redirect()->route('programa.show',$programa);
    }
}
