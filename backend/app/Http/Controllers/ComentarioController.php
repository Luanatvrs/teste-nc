<?php

namespace App\Http\Controllers;

use App\Http\Services\ComentarioService;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $comentarioService;

    public function __construct(ComentarioService $comentarioService)
    {
       $this->comentarioService = $comentarioService;   
    }

    public function index()
    {
        $result = $this->comentarioService->get();
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'message' => 'required|string',
        ]);

        $result = $this->comentarioService->create($validated);

        return response()->json(['message' => 'Comentário Inserido!', 'result'  => $result]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'message' => 'required|string',
        ]);

        $result = $this->comentarioService->update($id, $validated);
        return response()->json(['message' => 'Comentário Atualizado!', 'result'  => $result]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->comentarioService->destroy($id);
        return response()->json(['message' => 'Comentário Excluído!']);
    }
}
