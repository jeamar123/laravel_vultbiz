<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;

use App\User;
use App\Company;

class AuthController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getAllUsers( Request $request ){
      $data = User::orderBy('id', 'asc')->get();
      return $data;
    }

    public function userLogin( Request $request ){
      $token = openssl_random_pseudo_bytes(16);
      $token = bin2hex($token);
      $updateArr = array(
        'token' => $token,
      );
      $countUser = User::where('email', '=', $request->get('email'))
                  ->where('password', '=', md5($request->get('password')) )
                  ->count();

      if($countUser > 0) {
        $fetch = User::where('email', '=', $request->get('email'))->get();
        $updateRow = User::where('id', $fetch[0]->id)->update($updateArr);
      }

      if($countUser > 0){
        return array( 'token' => $token, 'status' => true, 'message' => 'Success.' );
      }

      return array( 'status' => false, 'message' => 'Account does not exist.' );
    }

    public function userRegister( Request $request ){
      $count = User::where('email', '=', $request->get('email'))->count();
      if($count > 0) {
        return array( 'status' => false, 'message' => 'Email already taken.' );
      }
      $create = User::create([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'contact_number' => $request->get('mobile'),
        'password' => md5($request->get('password')),
      ]);

      if( $create ){
        return array( 'status' => true, 'message' => 'Registration Successful.' );
      } else {
        return array( 'status' => false, 'message' => 'Failed. Something went wrong.' );
      }
    }





    public function companyLogin( Request $request ){
      $token = openssl_random_pseudo_bytes(16);
      $token = bin2hex($token);
      $updateArr = array(
        'token' => $token,
      );
      $countCompany = Company::where('email', '=', $request->get('email'))
                  ->where('password', '=', md5($request->get('password')) )
                  ->count();

      if($countCompany > 0) {
        $fetch = Company::where('email', '=', $request->get('email'))->get();
        $updateRow = Company::where('id', $fetch[0]->id)->update($updateArr);
      }

      if($countCompany > 0){
        return array( 'token' => $token, 'status' => true, 'message' => 'Success.' );
      }

      return array( 'status' => false, 'message' => 'Account does not exist.' );
    }

    public function companyRegister( Request $request ){
      $count = Company::where('email', '=', $request->get('email'))->count();
      if($count > 0) {
        return array( 'status' => false, 'message' => 'Email already taken.' );
      }
      $create = Company::create([
        'company_name' => $request->get('company_name'),
        'email' => $request->get('email'),
        'contact_number' => $request->get('mobile'),
        'password' => md5($request->get('password')),
      ]);
      
      if( $create ){
        return array( 'status' => true, 'message' => 'Registration Successful.' );
      } else {
        return array( 'status' => false, 'message' => 'Failed. Something went wrong.' );
      }
    }

}