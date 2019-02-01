<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Http\Request;


class AgreementsController extends Controller
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

    public function getAllAgreements(Request $request){
        try {
            $entities = Entity::get(); //
            return response()->json($entities, 200);
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

    public function createAgreement(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataProject = $data['project'];
            $student = Student::where('id', $dataProject['student_id'])->first();
            $tutor = Tutor::where('id', $dataProject['tutor_id'])->first();
            $coordinator = Coordinator::where('id', $dataProject['coordinator_id'])->first();
            if ($student && $coordinator && $tutor) {
                $response = $student->project()->create([
                    'theme' => $dataProject ['theme'],
                    'hours' => $dataProject ['hours'],
                    'start_date' => $dataProject ['start_date'],
                    'end_date' => $dataProject ['end_date'],
                    'route_file' => $dataProject ['route_file'],
                ]);

                $tutor->project()->save($dataProject['tutor_id']);
                $coordinator->project()->save($dataProject['coordinator_id']);

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

    function updateAgreement(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataEntity = $data['entity'];
            $entity = Entity::findOrFail($dataEntity ['id'])->update([
                'name' => $dataEntity ['name'],
                'address' => $dataEntity ['address'],
                'email' => $dataEntity ['email'],
                'telephone' => $dataEntity ['telephone'],
            ]);
            return response()->json($entity, 201);
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
