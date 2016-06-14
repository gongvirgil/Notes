# ThinkPHP

## ThinkPHP3.2.3

[ThinkPHP3.2.3完整版下载](http://down.thinkphp.cn/download.php?key=MTQ2MjQzOTY2MY+xf56Yl8jWw3hrysCosKuvonSttIaTqLW2Zt6yiNnZgaGsnIS4us67nnjPv5SGrLyMeKyznJhnx7t3zrF1rJOZf6Gol5em0MR3atyyzIKqr2lsosqK26Sy0abVyHWr1oGle6qZq9zRumN4kse5cqq6e2yrv2a1ncqmZ9/JeqzPkY9lnI61oZ4)
[ThinkPHP3.2.3核心版下载]()












<?php


$where['article.status&category.fid'] =array('0','3','_multi'=>true);
$where['article.status&category.typename'] =array('0','新闻公告','_multi'=>true);
$where['article.status&category.typename'] =array('0','活动资讯','_multi'=>true);
$where['_logic'] = 'or';
$map['_complex'] = $where;

foreach ($card_list as $k => $v) {
    $volume[$k]  = $v['start_time'];
}
array_multisort($volume, SORT_DESC, $card_list);


$where['_string']='FIND_IN_SET("5", area)';

$server = M()->table('mygame_game as game,mygame_server as server');
$map['_string'] = "game.gid=server.gid";
$map['status'] = "0";
$map['is_display'] = 1;
$map['start_time'] = array('lt',strtotime('tomorrow'));
$this->server_list = $server->where($map)->field('server.gid,gamename,game_web,sid,servername,start_time')->order('start_time desc')->limit('60')->select();




{$变量|default="默认值"}
{$Think.const.MODULE_NAME} {$Think.MODULE_NAME} 当前action类名
{$Think.const.ACTION_NAME} {$Think.ACTION_NAME} 当前function函数名

<volist name="server_list" id="list" key="k" mod="10">
<eq name="mod" value="0"><li class="<if condition='$k eq 1'>on</if>" id="server_page_{$k/10-1/10}"><if condition="$k eq $server_count">{$k}<elseif condition="$k-1+10 gt $server_count"/>{$k}-{$server_count}<else />{$k}-{$k-1+10}</if>服</li></eq>
</volist>  

thinkphp cli 模式下 命令执行 `php index.php Index index`

//利用子查询进行查询 
$subQuery = $model->field('id,name')->table('tablename')->group('field')->where($where)->order('status')->buildSql();
$model->table($subQuery.' a')->where()->order()->select() 