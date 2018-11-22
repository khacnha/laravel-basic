<?php
namespace App\Traits;

trait Authorizable
{
    /**
     * Set phân quyền gồm 3 nơi: trong controller, trong các view và trong menu sidebar của layout
     * Các method thay thế để phân quyền
     * Ví dụ: StyleController@create => StyleController@store
     * @var array['action khong luu, khi check se kiem tra action luu' => 'action luu trong table permission']
     */
    private $sameMethod = [
        'create' => 'store',
        'edit' => 'update',
        'getGiveRolePermissions' => 'postGiveRolePermissions',
        'getProfile' => 'postProfile',
    ];
    /**
     * Override of callAction to perform the authorization before it calls the action
     * Check phân quyền theo dạng: Controller@method => StyleController@store
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        $currentAction = \Route::currentRouteAction();
        list($controllerFull, ) = explode('@', $currentAction);
        $controller = preg_replace('/.*\\\/', '', $controllerFull);

        $methodPermission = $this->getMethodPermission($controllerFull, $method);
        //$this->authorize($methodPermission);
        $this->authorize($controller."@".$methodPermission);

        return parent::callAction($method, $parameters);
    }

    /**
     * Lấy method cần check phân quyền theo biến $sameMethod
     * Nếu method tương ứng trong sameMethod ko tồn tại thì trả về chính nó
     * @param $controller
     * @param $method
     * @return mixed
     */
    private function getMethodPermission($controller, $method){
        if(key_exists($method, $this->getSameMethod())){
            $methodPermission = array_get($this->getSameMethod(), $method);
            //method thay thế tồn tại
            if(method_exists($controller, $methodPermission)) return $methodPermission;
        }
        return $method;
    }
    private function getSameMethod(){
        return $this->sameMethod;
    }
}
