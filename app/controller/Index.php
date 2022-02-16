<?php
namespace app\controller;

use app\BaseController;
use fast\Http;
use LZCompressor\LZString;
class Index extends BaseController
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V' . \think\facade\App::version() . '<br/><span style="font-size:30px;">14载初心不改 - 你值得信赖的PHP框架</span></p><span style="font-size:25px;">[ V6.0 版本由 <a href="https://www.yisu.com/" target="yisu">亿速云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ee9b1aa918103c4fc"></think>';
    }

    public function hello($name = 'ThinkPHP6')
    {
       
        $tongbu_url = "https://www3.wipo.int/branddb/jsp/select.jsp";
       // $search_str='{"p":{"search":{"sq":[{"te":"benz","fi":"BRAND"}]}},"type":"brand","la":"en","qi":"1-kK37hbpy1+jLIvMTWa9nwurOgr9d9zCcRCanexGYX/U=","queue":1,"_":"11569"}';
       $search_str='{"p":{"search":{"sq":[{"te":"benz","fi":"BRAND"}]}},"type":"brand","la":"en","qi":"2-rzDiQNIGO61a43rb803958EmRDV3/Dhlk1QASstewcA=","queue":1,"_":"11569"}';
       $search=LZString::compressToBase64($search_str);
       // var_dump( $search);exit;
       $op[CURLOPT_USERAGENT]="UA";
        // $op['CURLOPT_HTTPHEADER']=array(
        //     'Host:www3.wipo.int', 
        //     'Origin:https://www3.wipo.int' //模拟浏览器CORS跨域请求
        //   );
        //  var_dump($op);exit;
        $headers = [
            'Host:www3.wipo.int',
            'Origin:https://www3.wipo.int' ,
            'Referer:https://www3.wipo.int/branddb/en/' 
        ];
          $op[CURLOPT_HTTPHEADER]=$headers;

        $result = Http::sendRequest($tongbu_url, 'qz='. $search, 'POST',   $op);
        var_dump($result);exit;
    }
}
