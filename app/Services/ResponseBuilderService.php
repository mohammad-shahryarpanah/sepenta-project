<?php


namespace App\Services;
use App\Http\Controllers\Controller;
class ResponseBuilderService extends Controller
{

    const SUCCESS_OPERATION = 'عملیات با موفقیت انجام شد';
    const CATCH_ERROR='اشکال در سیستم !';
    const WRONG_MOBILE = 'شماره موبایل یا کد وارد شده اشتباه می باشد !';




    public static function sendSuccessOrFail($success,$message,$error,$data)
    {
        if ($success === 'false') {
            return response()->json(['status' => 400, 'message' => $message,'success'=>false,'error'=>$error,'data'=>$data], 400);
        } elseif ($success === 'true') {
            return response()->json(['status' => 200, 'message' => $message,'success'=>true,'data'=>$data,'error'=>null], 200);
        }
    }


    public static function sendCatchError($exception)
    {
        if (env('APP_DEBUG')==true) {
            return response()->json(['status' => 500, 'message' => self::CATCH_ERROR, 'success' => false,'data' => $exception->getMessage()], 500);
        }
    }



    public static function sendValidationError($error,$data)
    {
            return response()->json(['status' => 400, 'message' => '','success'=>false,'error'=>$error,'data'=>$data], 400);
    }

}
