<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - <?php echo ($meta_title); ?> </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/Admin/css/common.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="http://admin.shop.com/Public/Admin/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">

</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('index');?>"> <?php echo mb_substr($meta_title,2,null,'utf-8');?>列表</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta_title); ?> </span>
    <div style="clear:both"></div>
</h1>

    <div id="tabbar-div">
        <p>
            <span class="tab-front">通用信息</span>
            <span class="tab-back">详细描述</span>
            <span class="tab-back">会员价格</span>
            <span class="tab-back">商品属性</span>
            <span class="tab-back">商品相册</span>
            <span class="tab-back">关联文章</span>
        </p>
    </div>
    <div class="main-div">
        <form method="post" action="<?php echo U();?>">
            <table cellspacing="1" cellpadding="3" width="100%">
                <tr>
                    <td class="label">商品名称</td>
                    <td>
                        <input type='text' name='name' maxlength='60' value='<?php echo ($name); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">简称</td>
                    <td>
                        <input type='text' name='short_name' maxlength='60' value='<?php echo ($short_name); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品分类</td>
                    <td>
                        <!--保存父分类的ID-->
                        <input type="hidden"  class="goods_category_id" name="goods_category_id" value="<?php echo ($goods_category_id); ?>">
                        <!--存放父分类名字.-->
                        <input type='text' class="goods_category_name" name='goods_category_name' maxlength='60' value='必须选择最子分类' disabled="disabled"/>
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
                        <ul id="treeDemo" class="ztree"></ul>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品品牌</td>
                    <td>
                        <?php echo arr2select('brand_id',$brands,$brand_id);?>
                        <span    class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">供货商</td>
                    <td>
                         <?php echo arr2select('supplier_id',$suppliers,$supplier_id);?>
                         <span    class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店价格</td>
                    <td>
                        <input type='text' name='shop_price' maxlength='60' value='<?php echo ($shop_price); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">市场价格</td>
                    <td>
                        <input type='text' name='market_price' maxlength='60' value='<?php echo ($market_price); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品LOGO</td>
                    <td>
                        <input type="hidden" class="logo" name="logo" value="<?php echo ($logo); ?>">
                        <input type='file' id="goods_logo" name='goods_logo' maxlength='60'/>
                        <div class="upload-img-box" <?php if(empty($logo)): ?>style="display: none"<?php endif; ?>>
                            <div class="upload-pre-item">
                                <img src="http://itsource-goods.b0.upaiyun.com/<?php echo ($logo); ?>!m">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label">库存</td>
                    <td>
                        <input type='text' name='stock' maxlength='60' value='<?php echo ($stock); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品状态</td>
                    <td>
                        <input type='checkbox' class='goods_status' name='goods_status[]' value='1'/> 推荐商品
                        <input type='checkbox' class='goods_status' name='goods_status[]'  value='2'/> 新品上架
                        <input  type='checkbox' class='goods_status' name='goods_status[]' value='4'/> 热卖商品
                        <input  type='checkbox' class='goods_status' name='goods_status[]' value='8'/> 疯狂抢购
                        <input  type='checkbox' class='goods_status' name='goods_status[]' value='16'/> 猜您喜欢
                        <span  class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">是否显示</td>
                    <td>
                        <input type='radio' class='status' name='status' value='1'/> 是<input type='radio' class='status'
                                                                                             name='status' value='0'/> 否
                        <span class="require-field">*</span>
                    </td>
                </tr>
            </table>


            <table cellspacing="1" cellpadding="3" width="100%" style="display: none">
                <tr>
                    <td colspan="2">
                       <textarea id="intro" name="intro"><?php echo ($intro); ?></textarea>
                    </td>
                </tr>
            </table>

            <table cellspacing="1" cellpadding="3" width="100%"  style="display: none">
                <!--循环出会员级别-->
                <?php if(is_array($memberLevels)): $i = 0; $__LIST__ = $memberLevels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$memberLevel): $mod = ($i % 2 );++$i;?><tr>
                    <td class="label"><?php echo ($memberLevel["name"]); ?></td>
                    <td>
                        <input type='text' name='memberPrices[<?php echo ($memberLevel["id"]); ?>]' maxlength='60' value='<?php echo ($memberPrices[$memberLevel['id']]); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>

            <table cellspacing="1" cellpadding="3" width="100%"  style="display: none">
                <tr>
                    <td class="label">商品属性</td>
                    <td>
                        <input type='text' name='name2' maxlength='60' value='<?php echo ($name); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
            </table>

            <style type="text/css">
                .upload-pre-item{
                    display: block;
                    float: left;
                    margin: 5px;
                    position: relative;
                }
                .upload-pre-item a{
                    position: absolute;
                    right: 0px;
                    top: 0px;
                }
            </style>
            <table cellspacing="1" cellpadding="3" width="100%" style="display: none">
                <tr>
                    <td>
                        <div id="upload-img-box" class="upload-img-box">
                            <!--循环输出每个照片信息-->
                            <?php if(is_array($goodsPhotos)): $i = 0; $__LIST__ = $goodsPhotos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsPhoto): $mod = ($i % 2 );++$i;?><div class="upload-pre-item">
                                    <img src="http://itsource-goods.b0.upaiyun.com/<?php echo ($goodsPhoto["path"]); ?>!m">
                                    <a href="javascript:;" dbId="<?php echo ($goodsPhoto["id"]); ?>">X</a>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <hr/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="file" id="upload-gallery">
                    </td>
                </tr>
            </table>

            <table cellspacing="1" cellpadding="3" width="100%" style="display: none">
                <tr>
                    <td colspan="3">文章标题: <input type="text" name="keyword" class="keyword"><input class="button searchArticle" type="button" value="搜索"></td>
                </tr>
                <tr>
                    <td style="width: 500px"><select class="left" size="10" multiple="multiple" style="width: 500px"></select></td>
                    <td>
                        操作<br/><br/>
                        <input class="left_all_right" type="button" value=">>"><br/><br/>
                        <input  class="left_2_right"  type="button" value=">"><br/><br/>
                        <input   class="right_2_left"   type="button" value="<"><br/><br/>
                        <input class="right_all_left"  type="button" value="<<"><br/>
                    </td>
                    <td>
                        <div class="arcticle_ids">
                            <!--编辑时回显出来-->
                            <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><input type="hidden" name="article_ids[]" value="<?php echo ($article["article_id"]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <select  class="right" size="10" multiple="multiple" style="width: 500px">
                            <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><option value="<?php echo ($article["article_id"]); ?>"><?php echo ($article["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select></td>
                </tr>
            </table>

            <div style="text-align: center">
                <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                <input type="submit" class="button" value=" 确定 "/>
                <input type="reset" class="button" value=" 重置 "/>
            </div>
        </form>
    </div>


<div id="footer">
共执行 1 个查询，用时 0.018952 秒，Gzip 已禁用，内存占用 2.197 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/common.js"></script>
<script type="text/javascript">
    $(function(){
        //选中是否显示
        $('.status').val([<?php echo ((isset($status) && ($status !== ""))?($status):1); ?>]);

    });
</script>

    <script type="text/javascript" src="http://admin.shop.com/Public/Admin/zTree/js/jquery.ztree.core-3.5.js"></script>
    <script type="text/javascript" src="http://admin.shop.com/Public/Admin/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://admin.shop.com/Public/Admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://admin.shop.com/Public/Admin/ueditor/ueditor.all.min.js"> </script>

    <script type="text/javascript">
        $(function(){


              /***************************tab切换效果   开始*******************************************************************/
              //>>1.要完成tab切换的效果
                $('#tabbar-div span').click(function(){
                    //先把白底删除,然后再加上tab-back
                    $('#tabbar-div span').removeClass('tab-front').addClass('tab-back');
                    $(this).removeClass('tab-back').addClass('tab-front');

                    //得到点击的span的索引
                     var index = $(this).index();
                    //先将所有的table隐藏
                    $('.main-div form table').hide();
                    //再span索引对应的table显示出来
                    $('.main-div form>table').eq(index).show();


                    if(index==1){
                        /***************************在线编辑器 开始*******************************************************************/
                        var editor =  UE.getEditor('intro',{    //第一个参数是表单元素的id   第二个参数是关于在线编辑器的配置
                            initialFrameHeight :400
                        });
                        /***************************在线编辑器 结束*******************************************************************/
                    }

                });
            /***************************tab切换效果   结束*******************************************************************/

            /***************************分类树   开始*******************************************************************/
                //树结构的设置
                var setting = {
                    data: {
                        simpleData: {
                            enable: true,
                            pIdKey: "parent_id",
                        }
                    },
                    callback: {
                        beforeClick: function(treeId, treeNode){
                             if(treeNode.isParent){
                                 //显示出一个提示框
                                 layer.msg('必须选中最子分类!', {
                                     time:1000,  //等待时间后关闭
                                     offset: 0,  //设置位置
                                     icon:2,  //设置提示框中的图标
                                 });
                             }

                            //返回true,不让用户选中
                            return  !treeNode.isParent;
                        },
                        onClick: function(event, treeId, treeNode){  //treeNode就是点击的这个节点
                            //将节点的id(就是数据库中的id) 和节点的name复制给  parent_name和parent_id表单元素
                            $('.goods_category_name').val(treeNode.name);
                            $('.goods_category_id').val( treeNode.id);

                        }
                    }
                };
                //树的节点数据
                var zNodes = <?php echo ($zNodes); ?>;

                //找到ul,将ul变成一个树结构
                var treeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);


                <?php if(empty($id)): ?>//表示添加,  展开所有的节点
                        treeObj.expandAll(true);
                <?php else: ?>
                    //表示编辑. 从treeObj中找到需要被选中的节点对象
                    var goods_category_id = <?php echo ($goods_category_id); ?>;
                    var node = treeObj.getNodeByParam('id',goods_category_id); //根据goods_category_id自己的值,找自己对应的节点
                    treeObj.selectNode(node); //通过树对象treeObj 选中 找到的节点node

                    //将选中的节点的名字和id赋值给表单元素
                    $('.goods_category_name').val(node.name);
                    $('.goods_category_id').val( node.id);<?php endif; ?>
            /***************************分类树   结束*******************************************************************/



            /***************************上传插件  开始 *******************************************************************/
            $("#goods_logo").uploadify({
                height        : 30,
                width         : 120,
                'buttonText' : '上传图片', //指定按钮上面的文字
                'debug' : false,  //是否调试
                'fileSizeLimit' : '1MB',   //最大上传大小
                'fileTypeExts' : '*.gif; *.jpg; *.png',  //允许上传的文件
                'formData':{'dir':'itsource-goods'},  //上传文件时额外传递过去的参数---->告知服务器上的IndexController中的index方法将来将文件上传到哪个文件夹下
                // 'fileObjName': 'xxx', //上传该文件时,以什么名字上传..   $_FIELS['Filedata']  . 默认为:Filedata
                'swf'           : 'http://admin.shop.com/Public/Admin/uploadify/uploadify.swf',  //flash插件地址
                'uploader'      : "<?php echo U('Upload/index');?>",     //处理上传插件 上传上来的 文件
                'onUploadSuccess' : function(file, data, response) {  //data就是响应的 上传后的地址
                    $('.upload-img-box').show(); //显示出div
                    $('.upload-img-box .upload-pre-item img').attr('src','http://itsource-goods.b0.upaiyun.com/'+data+'!m');
                    $('.logo').val(data);  //将上传后的路径同时也放到隐藏域中.. 一起提交给服务器.
                },
                'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                    alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                }


            });
            /***************************上传插件 结束*******************************************************************/

            /***************************编辑时选中商品状态 开始*******************************************************************/
            <?php if(!empty($id)): ?>var selectedGoodsStatus = [];
               var goods_status = <?php echo ($goods_status); ?>;
               if(goods_status & 1){
                   selectedGoodsStatus.push(1); //如果商品状态的第一个位上是1. 将1放到数组中
               }

               if(goods_status & 2){
                   selectedGoodsStatus.push(2); //如果商品状态的第一个位上是1. 将1放到数组中
               }

               if(goods_status & 4){
                   selectedGoodsStatus.push(4); //如果商品状态的第一个位上是1. 将1放到数组中
               }

               if(goods_status & 8){
                   selectedGoodsStatus.push(8); //如果商品状态的第一个位上是1. 将1放到数组中
               }
               if(goods_status & 16){
                   selectedGoodsStatus.push(16); //如果商品状态的第一个位上是1. 将1放到数组中
               }

              $('.goods_status').val(selectedGoodsStatus);<?php endif; ?>
            /***************************编辑时选中商品状态 结束*******************************************************************/

            /***************************相册   开始*******************************************************************/
              //>>1.找到上传表单元素,将上传表单元素变成 上传插件
               $('#upload-gallery').uploadify({
                   height        : 30,
                   width         : 120,
                   'buttonText' : '上传图片', //指定按钮上面的文字
                   'debug' : false,  //是否调试
                   'fileSizeLimit' : '1MB',   //最大上传大小
                   'fileTypeExts' : '*.gif; *.jpg; *.png',  //允许上传的文件
                   'formData':{'dir':'itsource-goods'},  //上传文件时额外传递过去的参数---->告知服务器上的IndexController中的index方法将来将文件上传到哪个文件夹下
                   // 'fileObjName': 'xxx', //上传该文件时,以什么名字上传..   $_FIELS['Filedata']  . 默认为:Filedata
                   'swf'           : 'http://admin.shop.com/Public/Admin/uploadify/uploadify.swf',  //flash插件地址
                   'uploader'      : "<?php echo U('Upload/index');?>",     //处理上传插件 上传上来的 文件
                   'onUploadSuccess' : function(file, data, response) {  //data就是响应的 上传后的地址
                       //上传成功之后向
                         var imgHtml = '<div class="upload-pre-item">\
                                 <img src="http://itsource-goods.b0.upaiyun.com/'+data+'!m">\
                               <input type="hidden" name="goods_photo_paths[]" value="'+data+'">\
                               <a href="javascript:;">X</a>\
                               </div>';

                       $('#upload-img-box').append(imgHtml);

                   },
                   'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                       alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                   }
               });

                //删除照片    分两种情况下:  1. 删除时将数据库中也删除.    2. 如果没有在数据库中,只将页面上的照片删除
                $('#upload-img-box').on('click','a',function(){
                        var dbid = $(this).attr('dbid');
                        var that = $(this);  //保存起来在ajax的回调函数中使用..

                        if(dbid){
                            $.post('<?php echo U("GoodsPhoto/remove");?>',{id:dbid},function(data){
                                    if(data.status==0){
                                        //删除失败时, 提示错误信息
                                        layer.msg(data.info,{
                                            icon: 2
                                        });
                                    }else{
                                        //删除数据库中数据成功时,删除页面上的div
                                        that.closest('div').remove();
                                    }
                            });
                        }else{
                            //直接删除div
                            that.closest('div').remove();
                        }
                });
            /***************************相册   结束*******************************************************************/
            /***************************相关文章 开始*******************************************************************/
            $('.searchArticle').click(function(){
                  //根据keyword中的值查询文章内容.   查询文章的标题和id
                var kw = $('.keyword').val();

                $('.left').empty(); //将自己中间的option清空

                $.getJSON('<?php echo U("Article/search");?>',{keyword:kw},function(rows){
                    //将rows中的数据变成option放到 class='left'的下拉框中
                    if(rows){
                        $(rows).each(function(){
                               $('<option value="'+this.id+'">'+this.name+'</option>').appendTo('.left');
                        });
                    }
                });

            });

            //移动相关文章
            // 全部  从  左边  到   右边
            $('.left_all_right').click(function(){
                 $('.left option').appendTo('.right');
                  select2Hidden();
            });
            // 全部  从  右边  到   左边
            $('.right_all_left').click(function(){
                 $('.right option').appendTo('.left');
                 select2Hidden();
            });

            // 将左边选中的放到右边
            $('.left_2_right').click(function(){
                 $('.left option:selected').appendTo('.right');
                select2Hidden();
            });

            // 将右边选中的放到左边
            $('.right_2_left').click(function(){
                 $('.right option:selected').appendTo('.left');
                    select2Hidden();
            });

            $('.left').on('dblclick','option',function(){
                 $(this).appendTo('.right');
                select2Hidden();
            });

            function select2Hidden(){
                //将中间的部分删除
                $('.arcticle_ids').empty();
                //将右边下拉框中的内容放到隐藏域中
                $('.right>option').each(function(){
                    $("<input type='hidden' name='article_ids[]' value='"+this.value+"'>").appendTo('.arcticle_ids');
                });

            }




            /***************************相关文章 结束*******************************************************************/


        });
    </script>

</body>
</html>