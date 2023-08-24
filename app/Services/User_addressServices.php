<?php
namespace App\Services;

use App\Models\User\UserAddressManage;

class  User_addressServices{

    /**
     * @param $request
     * @param $login_User_id
     * @return array
     */
    public function Change_user_address($request , $login_User_id): array
    {
        $user_address = [
            'user_id' => $login_User_id,
            'billing_address1' => $request->billing_address_1,
            'billing_address2' => $request->billing_address_2,
            'countryId' => $request->billing_country,
            'statesid' => $request->billing_state,
            'city' => $request->billing_city,
            'pincode' => $request->billing_postcode,
            'created_at' => now(),
            'updated_at' => now()
        ];
        UserAddressManage::updateOrCreate(['user_id'=>$login_User_id],$user_address );
        return  ['code' => 200 , 'order_id'=> $user_address->id ,'status' =>true, "message"=> 'User Address Updated Successfully'];
    }

}

?>