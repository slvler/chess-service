<?php



/**
 * Carbon helper
 *
 * @param $time
 * @param $tz
 *
 * @return Carbon\Carbon
 */
function userDetail()
{

    $variable = session('logUser');
    $result = \App\Models\Login::findOrFail($variable);
    return $result->email;
}


?>
