<?php

namespace App\Http\Controllers;

use App\Models\worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Psy\debug;

class DipendentiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $workers = DB::table('workers')
            ->join('roles', 'workers.ruolo', '=', 'roles.ruolo')
            ->select('workers.*', 'roles.stipendio_mensile')
            ->get();

        $data = ["workers" => $workers];
        return view('dipendenti',['user' => $user] ,$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = DB::table('roles')
            ->select('roles.*')
            ->get();

        $data = ["roles" => $roles];

        return view('aggiungi', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'ruolo' => 'required',
        ]);
        $worker = new worker();
        $worker->nome = $request->input('nome');
        $worker->cognome = $request->input('cognome');
        $worker->ruolo = $request->input('ruolo');

        $worker->save();

        return redirect()->route('dipendenti')->with('success', 'dipendente aggiunto');

    }

    /**
     * Display the specified resource.
     */
    public function show(worker $worker)
    {
        $worker = DB::table('workers')
            ->join('roles', 'workers.ruolo', '=', 'roles.ruolo')
            ->select('workers.*', 'roles.stipendio_mensile')
            ->where('workers.matricola', $worker->matricola)
            ->first();

        return view('visualizza', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(worker $worker)
    {
        $roles = DB::table('roles')
            ->select('roles.*')
            ->where('roles.ruolo', '!=', $worker->ruolo)
            ->get();

        $data = ["worker" => $worker , "roles" => $roles];

        return view('modifica',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, worker $worker)
    {
        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'ruolo' => 'required',
        ]);
        $worker->nome = $request->input('nome');
        $worker->cognome = $request->input('cognome');
        $worker->ruolo = $request->input('ruolo');

        $worker->save();

       return redirect()->route('dipendenti')->with('success', 'dipendente modificato');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(worker $worker)
    {
        $worker ->delete();
        return redirect()->back();
    }
}
