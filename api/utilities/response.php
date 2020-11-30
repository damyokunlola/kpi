<?php

/**
 * Undocumented function
 *
 * @param [type] $data
 * @param integer $code
 * @param string $message
 * @return void
 */
function success($code = 200, $message = 'success', $data = null)
{
    $res['status'] = true;
    $res['code'] = $code;
    $res['message'] = $message;
    $res['data'] = $data;
    return json_encode($res);
}

/**
 * Undocumented function
 *
 * @param [type] $data
 * @param [type] $curpage
 * @param [type] $total
 * @param [type] $totalpages
 * @param integer $code
 * @param string $message
 * @return void
 */
function paginatedSuccess($data)
{
    $res['status'] = true;
    $res['code'] = 200;
    $res['total'] = $data["total"];
    $res['currentpage'] = $data["currentpage"];
    $res['totalpages'] = $data["totalpages"];
    $res['data'] = $data["data"];
    return json_encode($res);
}

/**
 * Undocumented function
 *
 * @param integer $code
 * @param string $message
 * @return void
 */
function successMessage($code = 200, $message = 'success')
{
    $res['status'] = true;
    $res['code'] = $code;
    $res['message'] = $message;
    return json_encode($res);
}

/**
 * Undocumented function
 *
 * @param integer $code
 * @param string $message
 * @return void
 */
function badRequest($code = 400, $message = 'error')
{
    $res['status'] = false;
    $res['code'] = $code;
    $res['message'] = $message;
    return json_encode($res);
}

/**
 * Undocumented function
 *
 * @param integer $code
 * @param [type] $errors
 * @return void
 */
function validationError($code = 400, $errors)
{
    $res['status'] = false;
    $res['code'] = $code;
    $res['errors'] = $errors;

    return json_encode($res);
}
