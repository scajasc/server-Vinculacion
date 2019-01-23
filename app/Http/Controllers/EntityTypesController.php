<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Http\Request;


class EntityTypesController extends Controller
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

    public function createEntityType(Request $request)
    {
        try{
            //solo data si nio quiero enviar objetos
            $data = $request->json()->all();
            $dataEntityType = $data['$entityType'];
            //DB::beginTransaction();
            $entityType= EntityType::create([
                'name_type' => strtoupper($dataEntityType['name_type']) //$dataEntityType['name']
            ]);

            //DB::commit();
            return response()->json(['$entityType' => $entityType], 201);

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

    //
}
