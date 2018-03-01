<?php

namespace App\Search\Foundation;

trait ShouldValidate
{
    /**
     * override this method.
     */
    protected static function rules()
    {
        return [];
    }

    protected static function getValidator($args, $rules, $messages = [])
    {
        return
            app('validator')->make($args, $rules, $messages);
    }

    protected static function getResolver()
    {
        $arguments = func_get_args();

        $rules = call_user_func_array([static::class, 'rules'], $arguments);
        if (sizeof($rules)) {
            $value = array_get($arguments, 1, []);
            $args = [
                strtolower(class_basename(__CLASS__)) => $value,
            ];

            $validator = static::getValidator($args, $rules);

            if ($validator->fails()) {
                return array_get($arguments, 0); // return builder
            }
        }

        return call_user_func_array([static::class, 'applyFilter'], $arguments);
    }
}
