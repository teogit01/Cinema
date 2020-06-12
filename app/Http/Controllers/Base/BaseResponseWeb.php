<?php

namespace App\Http\Controllers\Base;

use Exception;

class BaseResponseWeb
{
    const SUCCESS = '200';
    const ERROR = '400';
    const EXCEPTION = '500';

    /**
     * Check and return response.
     *
     * @param string $key
     * @param array  $data
     *
     * @return object
     */
    public static function response($key = '', $data = [])
    {
        if (!empty($key)) { // return data and code. nếu $key không rỗng thì trả về mã code và $key => $data
            return [
                'code' => self::SUCCESS,
                $key => $data,
            ];
        } else { // only return code
            return self::SUCCESS;
        }
    }

    /**
     * Return errors response.
     *
     * @param array $errors
     *
     * @return object
     */
    public static function errors($errors)
    {
        return [
            'code' => self::ERROR,
            'errors' => $errors,
        ];
    }

    /**
     * Return exception response.
     *
     * @param array|Exception $exception
     *
     * @return object
     */
    public static function exception()
    {
        return  [
            'code' => self::EXCEPTION,
            'exception' => ['Server error, please show log detail'],
        ];
    }
}
