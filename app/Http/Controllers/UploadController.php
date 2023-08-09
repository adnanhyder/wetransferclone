<?php

namespace App\Http\Controllers;

use App\Models\limits;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller {
    //

    public function upload( Request $request ) {
        $logedin = '';
        if ( isset( Auth::user()->name ) ) {
            $logedin = Auth::user()->name;
        }

        $limit['registered'] = limits::where( 'user_type', 'registered' )->get()->first();
        $limit['guest']      = limits::where( 'user_type', 'guest' )->get()->first();

        if ( $request->hasFile( 'file' ) ) {
            $file     = $request->file( 'file' );
            $fileSize = $file->getSize();
            $fileSize = $fileSize / ( 1024 * 1024 );
            if ( ! empty( $logedin ) ) {
                if ( $fileSize > $limit['registered']->user_limit ) {
                    return response()->json( [ 'code' => 100, 'message' => 'File size exceeds the allowed limit (' . $limit['registered']->user_limit . ' MB). Please register to get higher limits' ] );

                }
            } else {
                if ( $fileSize > $limit['guest']->user_limit ) {
                    return response()->json( [ 'code' => 100, 'message' => 'File size exceeds the allowed limit (' . $limit['guest']->user_limit . ' MB). Please register to get higher limits' ] );

                }
            }

            $currentDate      = Carbon::now()->format( 'd-m-Y' );
            $currentTime      = Carbon::now()->format( 'H_i_s' );
            $originalFileName = $file->getClientOriginalName();
            $cleanFileName    = str_replace( ' ', '_', $originalFileName );
            $fileName         = $currentTime . '_' . md5( $originalFileName ) . '_' . $cleanFileName;
            $path             = $file->storeAs( 'uploads/' . $currentDate, $fileName, 'public' );
            return response()->json( [ 'code' => 200, 'message' => 'File uploaded successfully', 'path' => $path ] );
        }

        return response()->json( [ 'message' => 'No file was uploaded' ], 422 );

    }

}
