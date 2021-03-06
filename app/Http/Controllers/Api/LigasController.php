<?php

namespace App\Http\Controllers\Api;

use App\Models\Ligas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LigasController extends Controller
{

    protected $model;

    /**
     * Contrutor da classe
     *
     * LigasController constructor.
     * @param Ligas $ligas
     */
    public function __construct(Ligas $ligas)
    {
        $this->model = $ligas;
    }

    /**
     * Lista todas as ligas
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $result = $this->model->all();
        return response()->json($result);
    }

    /**
     * Grava os dados da liga.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $result = $this->model->create($request->all());
        return response()->json($result);
    }

    /**
     * Detalhe da liga
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $result = $this->model->findOrFail($id);
        return response()->json($result);
    }

    /**
     * Atualiza os dados da liga
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $result = $this->model->findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }

    /**
     * Exclui liga
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {

            $result = $this->model->findOrFail($id);
            $result->delete();

        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => 'false',
                    'message' => $e->getMessage(),
                    'messageType' => 'error'
                ]
            );
        }

        return response()->json($result);

    }

}
