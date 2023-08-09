<?php

namespace App\Http\Controllers;

use App\Models\limits;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    //
    public function index() {
        if ( $this->get_role() === false ) {
            return '404';
        }
        $users = User::all();
        return view( 'users.index', compact( 'users' ) );
    }

    public function edit( $id ) {
        if ( $this->get_role() === false ) {
            return '404';
        }
        $user = User::find( $id );
        return view( 'users.edit', compact( 'user' ) );
    }

    public function update( Request $request, $id ) {
        if ( $this->get_role() === false ) {
            return '404';
        }
        $user       = User::find( $id );
        $user->name = $request->name;
        $user->emails = $request->email;
        $user->save();
        return redirect()->route( 'users.index' )->with( 'success', 'User updated successfully!' );
    }

    public function destroy( $id ) {
        if ( $this->get_role() === false ) {
            return '404';
        }

        User::destroy( $id );
        return redirect()->route( 'users.index' )->with( 'success', 'User deleted successfully!' );
    }

    public function save_limit( Request $request ) {
        if ( $this->get_role() === false ) {
            return '404';
        }
        limits::truncate();
        limits::create( [
            'user_type'  => 'registered',
            'user_limit' => $request->input( 'reg_limit' ),
        ] );
        limits::create( [
            'user_type'  => 'guest',
            'user_limit' => $request->input( 'gest_limit' ),
        ] );

        $limit = limits::all();
        $main  = [];
        foreach ( $limit as $single ) {
            $main[ $single->user_type ] = $single->user_limit;
        }

        return view( 'setting', compact( 'main' ) )->with( 'success', 'Added successfully!' );
    }

    public function viewlimt() {
        if ( $this->get_role() === false ) {
            return '404';
        }
        $limit              = limits::all();
        $main['registered'] = '';
        $main['guest']      = '';
        foreach ( $limit as $single ) {
            $main[ $single->user_type ] = $single->user_limit;
        }
        return view( 'setting', compact( 'main' ) );

    }

    public static function get_role() {
        $user = auth()->user();
        if(!empty($user->role)){
            if ( $user->role === 'admin' ) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }

    }

}
