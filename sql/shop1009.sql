使用数据库的前提:
mysql -uroot -padmin

create database shop1009 default charset utf8;

表的规范:
	    1. 所有的表的编码都必须是utf8编码
		  2. 所有的表中如果需要主键,该主键的名字id,并且自增
		  3. name:   表示名字或者是标题
		  4. sort:   排序.   使用排序这个字段可以将常用的数据排前供用户方便选择
		  5. intro:  简介.   只要有关简介的字段全部使用
		  6. status:  状态
						   -1: 删除  :    select * from 表名 where status =-1 ;   表示在回收站中显示        
							  1: 正常状态   select * from 表名 where status  = 1;   表示在前台显示
						    0: 禁用       select  * from 表名 where  status > -1 表示在后台列表中显示


1. 供应商表(supplier)
  create table supplier(
         id smallint unsigned primary key auto_increment,
         name varchar(100) not null default '' comment '供应商名称',
         sort tinyint unsigned  not null default 20 comment '排序',
         intro text comment '供应商简介@textarea',
         status tinyint not null default 1 comment '是否显示@radio|1=是&0=否'
    )engine MyISAM default charset utf8 comment '供应商';

insert into supplier values(null,'成都供应商',20,'成都供应商',1);
insert into supplier values(null,'重庆供应商',20,'重庆供应商',1);
insert into supplier values(null,'北京供应商',20,'北京供应商',1);
insert into supplier values(null,'上海供应商',20,'上海供应商',1);
insert into supplier values(null,'深圳供应商',20,'深圳供应商',1);
insert into supplier values(null,'广州供应商',20,'广州供应商',1);


2. 品牌(brand)
create table brand(
	 id smallint unsigned primary key auto_increment,
	 name varchar(100) not null default '' comment '品牌名称',
	 url varchar(100) not null default '' comment '品牌网址',
	 logo varchar(50) not null default '' comment '品牌LOGO@file',
	 sort tinyint unsigned  not null default 20 comment '排序',
	 intro text comment '品牌简介@textarea',	
	 status tinyint not null default 1 comment '是否显示@radio|1=是&0=否'
)engine MyISAM default charset utf8 comment '商品品牌';


insert into brand values(null,'长虹','www.changhong.com','',20,'长虹',1);
insert into brand values(null,'海尔','www.haier.com','',20,'海尔',1);
insert into brand values(null,'小米','www.mi.com','',20,'小米',1);


3. 商品分类(goods_category)
create table goods_category(
	 id smallint unsigned primary key auto_increment,
	 name varchar(100) not null default '' comment '分类名称',
	 parent_id smallint unsigned not null default 0 comment '父分类',
	 lft smallint unsigned not null  default 0 comment '左边界',
   rgt smallint unsigned not null default 0 comment '右边界',
	 level tinyint unsigned not null default 0 comment '层级',
	 intro text comment '分类简介@textarea',	
	 status tinyint not null default 1 comment '是否显示@radio|1=是&0=否'
)engine MyISAM default charset utf8 comment '商品分类';


insert into goods_category values(1,'平板电视',9,3,4,3,'平板电视',1);
insert into goods_category values(2,'空调',9,5,6,3,'空调',1);
insert into goods_category values(3,'小太阳',4,12,13,4,'小太阳',1);
insert into goods_category values(4,'取暖器',5,11,14,3,'取暖器',1);
insert into goods_category values(5,'生活电器',8,10,19,2,'生活电器',1);
insert into goods_category values(6,'净化器',5,15,16,3,'净化器',1);
insert into goods_category values(7,'加湿器',5,17,18,3,'加湿器',1);
insert into goods_category values(8,'家用电器',0,1,20,1,'家用电器',1);
insert into goods_category values(9,'大家电',8,2,9,2,'大家电',1);
insert into goods_category values(10,'冰箱',9,7,8,3,'冰箱',1);

查询叶子节点
select * from goods_category  where lft+1 = rgt;


查询生活电器的左右边界查询出它的所有子孙分类
select * from goods_category where lft>10 and rgt<19


根据小太阳的左右边界查询出它的祖父节点
select * from goods_category where lft<12 and rgt>13


对分类中的数据进行排序
select * from goods_category  order by lft;

4. 商品(goods)
create table goods(
	 id bigint unsigned primary key auto_increment,
	 name varchar(100) not null default '' comment '商品名称',
	 short_name varchar(50) not null default '' comment '简称',
	 sn char(17) not null default '' comment '货号',    # 20160115000000006
	 goods_category_id smallint unsigned not null default 0 comment '商品分类',
	 brand_id smallint unsigned not null default 0 comment '商品品牌',
	 supplier_id smallint unsigned not null default 0 comment '供货商',
	 shop_price decimal(9,2) unsigned not null default 0 comment '本店价格',
   market_price decimal(9,2) unsigned not null default 0 comment '市场价格',
	 logo varchar(50) not null default '' comment '商品LOGO@file',
	 stock  int  not null default 0 comment '库存',
	 goods_status int unsigned  not null default 0 comment '商品状态@radio|1=精品&2=新品&4=热销',
	 status tinyint not null default 1 comment '是否显示@radio|1=是&0=否',
	 index (goods_category_id),
	 index (brand_id),
	 index (supplier_id),
	 index (goods_status),
	 index (shop_price)
)engine InnoDB default charset utf8 comment '商品';


5. 商品简介(goods_intro)
create table goods_intro(
	goods_id bigint  unsigned primary key,
	intro text comment '简介@textarea'
)engine InnoDB default charset utf8 comment '商品简介';

6. 会员级别(member_level)
create table member_level(
	 id tinyint unsigned primary key auto_increment,
	 name varchar(100) not null default '' comment '会员级别名称',
	 low int unsigned not null default 0 comment '最低积分',
	 high int unsigned not null  default 0 comment '最高积分',
	 discount tinyint  not null  default 100 comment '折扣',
	 intro text comment '会员级别简介@textarea',	
	 status tinyint not null default 1 comment '是否显示@radio|1=是&0=否',
	 index(low,high)
)engine MyISAM default charset utf8 comment '会员级别';


7. 商品会员价格(goods_member_price)
create table goods_member_price(
	goods_id   bigint  unsigned  not null default 0 comment '商品ID',
	member_level_id tinyint unsigned not null default 0 comment '会员级别ID',
	price decimal(9,2) not null default 0 comment '会员价格',
  index(goods_id,member_level_id)
)engine INNODB default charset utf8 comment '商品会员价格';


8. 商品照片表(goods_photo)
create table goods_photo(
  id  bigint  unsigned  primary key auto_increment comment '相片ID',
	goods_id   bigint  unsigned  not null default 0 comment '商品ID',
	path varchar(50) not null default '' comment '照片地址',
  index (goods_id)
)engine INNODB default charset utf8 comment '商品照片表';
drop table goods_photo;



9. 文章分类(article_category)
create table article_category(
	 id smallint unsigned primary key auto_increment,
	 name varchar(100) not null default '' comment '分类名称',
	 intro text comment '分类简介@textarea',	
   is_help tinyint not null default 1 comment '帮助分类@radio|1=是&0=否',
	 status tinyint not null default 1 comment '是否显示@radio|1=是&0=否'
)engine MyISAM default charset utf8 comment '文章分类';

10. 文章(article)
create table article(
	 id int unsigned primary key auto_increment,
	 name varchar(100) not null default '' comment '文章名称',
   article_category_id smallint not null default 0 comment '文章分类ID',
	 inputtime int not null default 0 comment '录入时间',
	 status tinyint not null default 1 comment '是否显示@radio|1=是&0=否',
	 index(article_category_id)
)engine MyISAM default charset utf8 comment '文章';

11. 文章(article_content)
create table article_content(
	 article_id int unsigned primary key,
	 content text comment '文章内容'
)engine MyISAM default charset utf8 comment '文章';

12. 商品相关文章表(goods_article)
create table goods_article(
	 goods_id bigint unsigned not null default 0 comment '商品ID', 
	 article_id int unsigned  not null default 0 comment '文章ID',
	 index(goods_id)
)engine InnoDB default charset utf8 comment '商品相关文章表';


13. 会员表(member)
create table member(
	 id int unsigned primary key auto_increment,
	 username varchar(50) not null default '' comment '用户名' unique,
	 `password` char(32) not null default '' comment '密码',
	 salt char(6) not null default '' comment '盐',
	 email varchar(50) not null default '' comment 'Email' unique,
	 tel   varchar(50) not null default '' comment '电话' unique,
	 score int unsigned not null default 0 comment '当前积分',
	 total_score int unsigned not null default 0 comment '累计积分',
	 regtime int unsigned not null default 0 comment '注册时间',
	 last_login_time int unsigned not null default 0 comment '最后登录时间',
	 last_login_ip bigint  not null default 0 comment '最后登录IP',
	 reg_ip bigint  not null default 0 comment '注册时的IP',
	 status tinyint not null default 0 comment '会员状态 -1: 删除  0: 锁定|未激活  1:正常',
	 index(status)
)engine MyISAM default charset utf8 comment '会员表';


14. 购物车表(shopping_car)
create table shopping_car(
	 id int unsigned primary key auto_increment,
	 member_id int unsigned not null default 0 comment '会员ID',
	 goods_id  int unsigned not null default 0 comment '商品ID',
	 num int 	unsigned  not null default 0 comment '数量',
	 index(member_id)
)engine InnoDB default charset utf8 comment '购物车表';

alter table shopping_car add index(goods_id)

15. 地区表(area)
CREATE TABLE `area` (
  `id` mediumint(6) NOT NULL,
  `name` varchar(100) NOT NULL comment '名称',
  `parent_id` mediumint(6) NOT NULL comment '父地区',
  PRIMARY KEY (`id`),
	index (parent_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

alter table area  add index(parent_id);

https://github.com/leohuangyi/administrative/blob/master/sql/all.sql



16. 收货地址表(address)
create table address(
	 id int unsigned primary key auto_increment,
	 member_id int unsigned not null default 0 comment '会员ID',
	 name varchar(20) not null default '' comment '收货人姓名',
	 province_id mediumint unsigned not null default 0 comment '省份ID',
   province_name varchar(20)  not null default '' comment '省份名称',
   city_id mediumint unsigned not null default 0 comment '城市ID',
   city_name varchar(20)  not null default '' comment '城市名称',
	 area_id mediumint unsigned not null default 0 comment '区县ID',
   area_name varchar(20)  not null default '' comment '区县名称',
	 detail_address varchar(255) not null default '' comment '详细地址',
	 tel varchar(11) not null default '' comment '手机号',
	 is_default tinyint not null default 0 comment '是否默认 1:默认 0:不默认',
	 index(member_id)
)engine MyISAM default charset utf8 comment '地址表';



17.送货方式(delivery)
create table delivery(
	 id tinyint unsigned primary key auto_increment,
	 name varchar(100) not null default '' comment '送货方式名字',
	 price decimal(9,2) not null default 0 comment '运费',
	 is_time  tinyint unsigned not null default 0  comment '是否支持送货时间@radio|0=不支持&1=支持',
	 intro text comment '简介@textarea',	
	 status tinyint not null default 1 comment '是否显示@radio|1=是&0=否'
)engine MyISAM default charset utf8 comment '送货方式';

alter table delivery add column is_default tinyint not null default 0 comment '是否默认 1:默认 0:不默认';


18.支付方式(pay_type)
drop table pay_type
create table pay_type(
	 id tinyint unsigned primary key auto_increment,
	 name varchar(100) not null default '' comment '支付方式名称',
	 intro text comment '简介@textarea',	
	 is_default tinyint not null default 0 comment '是否默认@radio|1=默认&0=不默认',
	 status tinyint not null default 1 comment '是否显示@radio|1=是&0=否'
)engine MyISAM default charset utf8 comment '支付方式';


19. 订单表(order_info)
create table order_info(
	 id int unsigned primary key auto_increment,
	 member_id int unsigned not null default 0 comment '会员ID',
   sn char(19) not null default '' comment '订单号',   #时间+ 当前ID
	 name varchar(20) not null default '' comment '收货人姓名',
	 province_id mediumint unsigned not null default 0 comment '省份ID',
   province_name varchar(20)  not null default '' comment '省份名称',
   city_id mediumint unsigned not null default 0 comment '城市ID',
   city_name varchar(20)  not null default '' comment '城市名称',
	 area_id mediumint unsigned not null default 0 comment '区县ID',
   area_name varchar(20)  not null default '' comment '区县名称',
	 detail_address varchar(255) not null default '' comment '详细地址',
	 tel varchar(11) not null default '' comment '手机号',
	 delivery_id tinyint not null default 0 comment '送货方式',
   delivery_name varchar(100) not null default '' comment '送货方式名字',
	 delivery_price decimal(9,2) not null default 0 comment '运费',
	 delivery_time  tinyint not null default 1 comment '送货时间',
   pay_type_id tinyint not null default 0 comment '支付方式ID',
	 pay_type_name varchar(100) not null default '' comment '支付方式名称',
	 invoice_id int unsigned not null default 0 comment '发票ID',
	 inputtime int unsigned not null default 0 comment '下单时间',
	 order_status tinyint unsigned not null default 0 comment '订单状态',
   shipping_status tinyint unsigned not null default 0 comment  '物流状态',
	 pay_status tinyint unsigned not null default 0 comment '支付状态',
	 total_price decimal unsigned not null default 0 comment '金额',
   index(member_id)
)engine InnoDB default charset utf8 comment '订单表';


20. 订单明细(order_info_item)
drop table order_info_item;
create table order_info_item(
	 id int unsigned primary key auto_increment,
	 order_info_id int unsigned not null default 0 comment '订单ID', 
	 goods_id int unsigned not null default 0 comment '商品ID',
   name varchar(255)  not null default '' comment '商品名称',
	 logo varchar(255)  not null default '' comment '商品LOGO',
	 num int unsigned not null default 0 comment '数量',
	 price decimal(9,2) unsigned not null default 0 comment '价格',
	 index(order_info_id)
)engine InnoDB default charset utf8 comment '订单明细表';



21. 发票表(invoice)
create table invoice(
	 id int unsigned primary key auto_increment,
	 name varchar(200) not null default '' comment '发票抬头',  #个人: 当前登陆用户名   单位: 用户录入的单位名称
	 content text comment '内容',   # 明细: 当前购买的内容
	 order_info_id int unsigned not null default 0 comment '订单ID',
	 total_price decimal unsigned not null default 0 comment '金额',
	 index(order_info_id)
)engine InnoDB default charset utf8 comment '发票表';









