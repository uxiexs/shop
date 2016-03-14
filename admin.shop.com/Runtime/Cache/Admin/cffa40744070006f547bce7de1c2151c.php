<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - <?php echo ($meta_title); ?> </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/page.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="http://admin.shop.com/Public/Admin/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">

</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('add');?>">添加<?php echo ($meta_title); ?></a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta_title); ?> </span>
    <div style="clear:both"></div>
</h1>

    <div class="form-div">
        <form  action="<?php echo U();?>" method="get" name="searchForm">
            <img src="http://admin.shop.com/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="search" />
            <input type="text" name="keyword" size="15"  value="<?php echo ($_GET['keyword']); ?>"  placeholder="请输入关键字!"/>

            <input type="hidden" id="goods_category_id" name="goods_category_id"/>
            <input type="text"  size="15"  placeholder="请选择分类" id="citySel" readonly="readonly"/>
            <?php echo arr2select('supplier_id',$suppliers,I('get.supplier_id'));?>
            <?php echo arr2select('brand_id',$brands,I('get.brand_id'));?>
            <input type="submit" value=" 搜索 " class="button" />
        </form>
    </div>


<input type="button" value="删除" class="button ajax-post" url="<?php echo U('changeStatus');?>"/>
<input type="button" value="显示" class="button ajax-post" url="<?php echo U('changeStatus',array('status'=>1));?>"/>
<input type="button" value="隐藏" class="button ajax-post" url="<?php echo U('changeStatus',array('status'=>0));?>"/>


    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>ID <input type="checkbox" class="selectAll"/></th>
                <!--使用注解中的名称生成了表头-->
                <th>商品名称</th>
                <th>简称</th>
                <th>货号</th>
                <th>商品分类</th>
                <th>商品品牌</th>
                <th>供货商</th>
                <th>本店价格</th>
                <th>市场价格</th>
                <th>库存</th>
                <th>新品</th>
                <th>精品</th>
                <th>热销</th>
                <th>是否显示</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                    <td width="30"><?php echo ($row["id"]); ?><input type="checkbox" name="id[]" class="ids" value="<?php echo ($row["id"]); ?>"/></td>
                    <td class="first-cell"><?php echo ($row["name"]); ?></td>
                    <td align="center"><?php echo ($row["short_name"]); ?></td>
                    <td align="center"><?php echo ($row["sn"]); ?></td>
                    <td align="center"><?php echo ($row["goods_category_name"]); ?></td>
                    <td align="center"><?php echo ($row["brand_name"]); ?></td>
                    <td align="center"><?php echo ($row["supplier_name"]); ?></td>
                    <td align="center"><?php echo ($row["shop_price"]); ?></td>
                    <td align="center"><?php echo ($row["market_price"]); ?></td>
                    <td align="center"><?php echo ($row["stock"]); ?></td>
                    <td align="center"><img src="http://admin.shop.com/Public/Admin/images/<?php echo ($row["is_new"]); ?>.gif"/></td>
                    <td align="center"><img src="http://admin.shop.com/Public/Admin/images/<?php echo ($row["is_best"]); ?>.gif"/></td>
                    <td align="center"><img src="http://admin.shop.com/Public/Admin/images/<?php echo ($row["is_hot"]); ?>.gif"/></td>
                    <td align="center"><a class="ajax-get"
                                          href="<?php echo U('changeStatus',array('id'=>$row['id'],'status'=>(1-$row['status'])));?>"><img
                            src="http://admin.shop.com/Public/Admin/images/<?php echo ($row["status"]); ?>.gif"/></a></td>
                    <td align="center">
                        <a href="<?php echo U('edit',array('id'=>$row['id']));?>" title="编辑">编辑</a> |
                        <a class="ajax-get" href="<?php echo U('changeStatus',array('id'=>$row['id']));?>" title="移除">移除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div id="turn-page" class="page">
            <?php echo ($pageHtml); ?>
        </div>
    </div>
    <style type="text/css">
        .ztree{
            margin-top: 10px;
            border: 1px solid #617775;
            background: #f0f6e4;
            width: 220px;
            height: auto;
            overflow-y: scroll;
            overflow-x: auto;
        }
    </style>
    <!--存放下拉框的树结构的div-->
    <div id="menuContent" class="menuContent" style="display:none; position: absolute;">
        <ul id="treeDemo" class="ztree" style="margin-top:0; width:160px;"></ul>
    </div>


<div id="footer">
共执行 3 个查询，用时 0.021251 秒，Gzip 已禁用，内存占用 2.194 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/common.js"></script>

    <script type="text/javascript" src="http://admin.shop.com/Public/Admin/zTree/js/jquery.ztree.core-3.5.js"></script>
    <script type="text/javascript">
        $(function(){


            //ztree树的配置
            var setting = {
                view: {
                    dblClickExpand: false
                },
                data: {
                    simpleData: {
                        enable: true,
                        pIdKey: 'parent_id'       //指定哪个作为作为父节点
                    }
                },
                callback: {
                    'onClick':function(event,treeId,treeNode){
                        //将节点中的id和name分别作为 隐藏域中的内容和 goods_category_id
                        $('#goods_category_id').val(treeNode.id);
                        $('#citySel').val(treeNode.name);
                        hideMenu();
                    }
                }
            };

             //节点数据
            var zNodes =  <?php echo ($zNodes); ?>;

            function showMenu(event) {
                //得到录入框
                var cityObj = $("#citySel");
                //得到录入框的位置
                var cityOffset = $("#citySel").offset();
                //将录入框的位置设置到给ztree
                $("#menuContent").css({left:cityOffset.left + "px", top:cityOffset.top + cityObj.outerHeight() + "px"}).slideDown("fast");
                //在document上绑定鼠标按下事件,   事件处理函数就是让ztree隐藏
                $(window.document).bind("mousedown", onBodyDown);

            }

            function hideMenu() {
                //ztree隐藏
                $("#menuContent").fadeOut("fast");
                //ztree隐藏之后 去掉事件绑定
                $(window.document).unbind("mousedown", onBodyDown);
            }

            function onBodyDown(event) {
                if (!(event.target.id == "menuBtn" || event.target.id == "menuContent" || $(event.target).parents("#menuContent").length>0)) {
                    hideMenu();
                }
            }
            var ztreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            ztreeObj.expandAll(true); //让ztree树展开

             //点击 分类查询的录入框时  显示树结构
            $('#citySel').click(showMenu);


            //如果get中有商品分类的条件
            <?php if(!empty($_GET['goods_category_id'])): ?>var goods_category_id = <?php echo ($_GET['goods_category_id']); ?>;
                var node = ztreeObj.getNodeByParam('id',goods_category_id);
                $('#goods_category_id').val(node.id);
                $('#citySel').val(node.name);<?php endif; ?>

        });
    </script>

</body>
</html>