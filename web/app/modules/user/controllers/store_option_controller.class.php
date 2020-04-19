<?php
namespace app\user;
use \yangzie\YZE_Resource_Controller;
use \yangzie\YZE_Request;
use \yangzie\YZE_Redirect;
use \yangzie\YZE_Session_Context;
use \yangzie\YZE_RuntimeException;
use \yangzie\YZE_JSON_View;

/**
*
* @version $Id$
* @package user
*/
class Store_Option_Controller extends YZE_Resource_Controller {
    public function index(){
        $request = $this->request;
        //$this->layout = 'tpl name';
        $this->set_view_data('yze_page_title', '店铺配置');
    }

    public function post_first_product(){
        $request = $this->request;
        $this->layout = '';
        $store_option = Store_Option_Model::get_by_fp_id($request->get_from_post('first_product_id'));
        return YZE_JSON_View::success($this);
    }

    public function exception(YZE_RuntimeException $e){
        $request = $this->request;
        $this->layout = 'error';
        //处理中出现了异常，如何处理，没有任何处理将显示500页面
        //如果想显示get的返回内容可调用 :
        $this->post_result_of_json = YZE_JSON_View::error($this, $e->getMessage());
        //通过request->the_method()判断是那个方法出现的异常
        //return $this->wrapResponse($this->yourmethod())
    }
}
?>