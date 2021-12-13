<?php



function unAuthorizedAccess(){

    return response()->json(['message' => 'You are not authorised perform this action'],401);
}
