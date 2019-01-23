<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Http\Request;


class CareersController extends Controller
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

    public function createCareer(Request $request)
    {
        try{
            //solo data si nio quiero enviar objetos
            $data = $request->json()->all();
            $dataUser = $data['career'];
            //DB::beginTransaction();
            $career = Career::create([
                'name' => strtoupper($dataUser['name'])
            ]);

            //DB::commit();
            return response()->json(['career' => $career], 201);

        }catch (ModelNotFoundException $e) {
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

    public function getAllCareers(Request $request){
        try {
            $careers = Career::get()->first();
            return response()->json($careers, 200);
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

    //
}
