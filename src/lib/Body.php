<?php
/**
 * 描述：
 * Created at 2021/3/11 8:50 by Temple Chan
 */

namespace curl_spear\lib;


class Body implements CurlI
{

    private $data = [];

    public function set($key, $value)
    {
        // TODO: Implement set() method.
        if ($value !== null) {
            $data = [$key => $value];
        } else {
            if (is_array($key) === false) {
                throw new \Exception('设置请求体错误：当仅传入一个参数时该参数必须为数组');
            }

            foreach ($key as $k => $v) {
                $data[$k] = $v;
            }
        }

        $this->data = array_merge($this->data, $data);
    }

    public function get($key = null)
    {
        // TODO: Implement get() method.
        return ($key === null) ?
            $this->data :
            isset($this->data[$key]) === true ? $this->data[$key] : null;
    }

    public function delete($key)
    {
        // TODO: Implement delete() method.
        unset($this->data[$key]);
    }

    public function clear()
    {
        $this->data = [];
    }
}