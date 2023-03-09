<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Validator;

class DeviceController extends Controller
{
    //
    function list($id = null)
    {
        return $id ? Device::find($id) : Device::all();
    }

    /**
     * @param Request $request
     * @return string[]
     */
    function addDevice(Request $request)
    {
        $device = new Device;
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();

        if ($result) {
            return ["Result" => "Data saved successfully"];
        } else {
            return ["Result" => "Operation has failed!"];
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    function deleteDevice($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result) {
            return ["Result" => "Record has been deleted "];
        } else {
            return ["Result" => "Record has not been deleted "];
        }

    }

    /**
     * @param Request $request
     * @return string[]
     */
    function update(Request $request)
    {
        $device = Device::find($request->id);
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Device details is updated successfully"];
        } else {
            return ["Result" => "Device details failed to update"];
        }
    }

    function search($name)
    {
        return Device::where("name", "like", "%" . $name . "%")->get();
    }

    function testValidations(Request $request)
    {
        $rules = array(
            "member_id" => "required|min:2|max:4",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            return ["Result" => "Validation ok, you can now implement the same in the right points"];
        }

    }
}
