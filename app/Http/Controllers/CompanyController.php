<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;

use App\Company;

class CompanyController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function getCompanyDetails( Request $request ){
      $token = $request->header('Authorization');
      $companyDetails = Company::where('token', $token)->first();
      if( $companyDetails ){
        return array( 'data' => $companyDetails,'status' => true, 'message' => 'Success.' );
      }else{
        return array( 'status' => false, 'message' => 'Failed. Something went wrong.' );
      }
      return $data;
    }

    public function updateUser( Request $request ){
      $data = array();
      
      $update_data = array(
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'address' => $request->get('address'),
        'contact_number' => $request->get('contact_number'),
        'photo' => $request->get('photo'),
        'nature_of_business' => $request->get('nature_of_business'),
        'latitude' => $request->get('latitude'),
        'longitude' => $request->get('longitude'),
        'activated' => 1,
      );

      $count = User::where('id', '!=', $request->get('user_id'))
                    ->where('email', '=', $request->get('email'))->count();
      if($count > 0) {
        $data['status'] = false;
        $data['message'] = 'Email already taken.';
        return $data;
      }

      $result = User::where('id', $request->get('user_id'))->update($update_data);
      if($result) {
        $data['status'] = true;
        $data['message'] = 'Successfully updated.';
      } else {
        $data['status'] = false;
        $data['message'] = 'Failed';
      }
      return $data;
    }

    public function updatePassword( Request $request ){
      $data = array();

      $count = User::where('id', '=', $request->get('id'))
                  ->where('password', '=', md5($request->get('password')) )
                  ->count();
      
      if($count == 0) {
        $data['status'] = false;
        $data['message'] = 'Incorrect Password.';
        return $data;
      }

      $update_data = array(
        'password' => md5($request->get('new_password')),
      );

      $result = User::where('id', $request->get('id'))->update($update_data);
      if($result) {
        $data['status'] = true;
        $data['message'] = 'Successfully updated.';
      } else {
        $data['status'] = false;
        $data['message'] = 'Failed';
      }
      return $data;
    }


}


