<?php

header("Content-Type: text/html;charset=utf-8");

error_reporting(E_ALL || ~E_NOTICE);

//网站根目录

define('XGROOT', ereg_replace("[/\\]{1,}",'/',substr(XGINC,0,-8) ) );

//API目录

define('XGAPI', ereg_replace("[/\\]{1,}",'/',dirname(__FILE__) ) );

//数据库存放目录

define('XGDATA', XGAPI.'/date');

//模块文件目录

define('XGINC', XGAPI.'/include');

//数据库配置文件

require_once(XGDATA.'/config.php');

//引入数据库类

require_once(XGINC.'/db.class.php');

//常用外部处理函数

require_once(XGINC.'/common.class.php');

//操作说明

// require_once (dirname(__FILE__) . "/include/common.inc.php");
// if($dsql->IsTable('dede_test')){
// //如果存在dede_test表
// //-------------------
// //| 查询一条记录 |
// //| GetOne() |
// //-------------------
// // ↓
// $row = $dsql->GetOne("SELECT * FROM dede_test WHERE id = 3");
// echo "查询id=3的记录:<br />显示结果:";
// print_r($row);
// //-------------------
// //| 查询多条记录 |
// //| Execute() |
// //-------------------
// // ↓
// echo "<hr />查询dede_test表中的所有记录:<br />显示结果:<br />";
// $sql = "SELECT * FROM dede_test";
// $dsql->Execute('me',$sql);
// while($arr = $dsql->GetArray('me'))
// {
// echo "id = {$arr['id']} ,name = {$arr['name']}<br />";
// }
// echo "<hr/>还可以用$dsql->GetObject('me')获取内容到对象,不过调用方法有些不同:";
// $sql = "SELECT * FROM dede_test";
// $dsql->Execute('me',$sql);
// while($dbobj = $dsql->GetObject('me'))
// {
// echo "id = {$dbobj->id} ,name = {$dbobj->name}<br />";
// }
// echo "<hr/>这里查询完了其实还可以用$dsql->GetTotalRow('me')来获取下查询出来的总数:";
// echo $dsql->GetTotalRow('me');
// }
// //-------------------
// //| 表单处理过程 |
// //| 插入-Save() |
// //-------------------
// // ↓
// empty($dopost)? "" : $dopost;
// if($dopost == "save"){
// //如果执行插入操作
// $sql = "INSERT INTO `dede_test` (`name`) VALUES ('{$name}')";
// $dsql->ExecuteNoneQuery($sql); //执行这个插入语句
// $lastInsertID = $dsql->GetLastID(); //获取插入后的最后的ID,然后再传给下一个页面
// ShowMsg("成功增加一条记录内容！","test.php?id={$lastInsertID}");
// exit();
// }
// //-------------------
// //| 表单处理过程 |
// //| 插入-Update() |
// //-------------------
// // ↓
// empty($dopost)? "" : $dopost;
// if($dopost == "update"){
// //如果执行插入操作
// $maintable = '#@__test';
// $dsql->ExecuteNoneQuery("UPDATE `$maintable` SET name=$name WHERE 1");
// ShowMsg("成功更新一条记录内容！","test.php?id={$lastInsertID}");
// exit();
// }
// 
// <!--下面是表单-->
// <hr />
// 用于提交数据的表单:<br />
// <form action="test.php" type="post">
// <input type="hidden" name="dopost" value="save">
// 名称:<input type="text" name="name" value="">
// <input name="提交" type="submit" value="提交">
// </form>
// <!--表单结束-->
// <!--下面是删除-->
// 
// //-------------------
// //| 表单处理过程 |
// //| 删除-Del() |
// //-------------------
// //
// $sql = "SELECT * FROM dede_test";
// $dsql->Execute('me',$sql);
// while($arr = $dsql->GetArray('me'))
// {
// if($id==$arr['id']){
// //如果传递的id值和查询值相同,则高亮显示最后一条插入记录
// echo "<font color='red'>id = {$arr['id']} ,name = {$arr['name']}</font> <a href='test.php?dopost=del&id={$arr['id']}'>[删除]</a> <br />";//这里增加了一个删除的超链接
// }else{
// echo "id = {$arr['id']} ,name = {$arr['name']} <a href='test.php?dopost=del&id={$arr['id']}'>[删除]</a><br />";
// }
// }
// echo "<hr/>";
// //下面试DEL执行过程
// empty($dopost)? "" : $dopost;
// if($dopost == "save"){
// //如果执行插入操作
// $sql = "INSERT INTO `dede_test` (`name`) VALUES ('{$name}')";
// $dsql->ExecuteNoneQuery($sql);
// $lastInsertID = $dsql->GetLastID();
// ShowMsg("成功增加一条记录内容！","test.php?id={$lastInsertID}");
// exit();
// }elseif($dopost == "del"){
// //如果dopost为del,则删除数据
// $id = isset($id) && is_numeric($id) ? $id : 0;
// $sql = "DELETE FROM `dede_test` WHERE (`id`='{$id}')";
// $dsql->ExecuteNoneQuery($sql);
// ShowMsg("成功删除一条记录内容！","test.php");
// exit();
// }
// echo"tips:这里用到了一个ShowMsg()函数,这个是用来返回一个对话框的,详细可以查看下\include\common.func.php的372行相关函数的代码.";
// //删除结束

?>