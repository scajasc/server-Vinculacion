<?php

namespace App\Http\Controllers;

use App\Career;
use App\Entity_type;
use Illuminate\Http\Request;


class EntitiesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAllTypes(Request $request){
        try {
            $entity_types = Entity_type::get();
            return response()->json($entity_types, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 409);
        } catch (\PDOException $e) {
            return response()->json($e, 409);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    public function createEntity(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataEntity = $data['entity'];
            $entity_type = Entity_type::where('id', $dataEntity['entity_type_id'])->first();
            if ($entity_type) {
                $response = $entity_type->entities()->create([
                    'name' => $dataEntity ['name'],
                    'address' => $dataEntity ['address'],
                    'email' => $dataEntity ['email'],
                    'telephone' => $dataEntity ['telephone'],
                ]);
                return response()->json($response, 201);
            } else {
                return response()->json(null, 404);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function updateEntityType(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataEntityType = $data['entity_type'];
            $entityType = Entity_type::findOrFail($dataEntityType ['id'])->update([
                '$entityType' => $dataEntityType ['name_type'],
            ]);
            return response()->json($entityType, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    //
}
