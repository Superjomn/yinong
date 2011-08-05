后台建设：
用户数据库：
create table user(
    id          int(7) auto_increment primary key, #用户的表示
    user_name   char(10),       #昵称
    real_name   char(7),        #真实姓名
    sex         char(2),        #性别
    study_num   char(12),       #学号
    xueyuan     char(15),       #学院
    xiaoqu      char(4),        #校区
    connect     char(13),       #联系方式
    photo       text,           #头像
    birthday    datetime,       #生日
    email       char(20),       #邮箱
    about_me    text,           #简单介绍
    new_pwd     char(15),       #密码
	level 		int(2)			#等级设置 0 1 2 3  0为冻结用户
);
//后台添加新宝贝
////添加四视图
    通过iframe 加入裁切页面，将地址储存在session，通过Ajax取回地址，在后台显示出来。
    yn-admin/core/img_select.php


发布新商品：
create table goods(
    id          int(7) auto_increment primary key,#宝贝id
    name        char(20),    #宝贝名称
    leftimg     text,   #左视图
    fronimg     text,   #前视图
    topimg      text,   #上视图
    backimg     text,   #下视图
    #################################
    description text,       #描述
    sort        char(6),    #类别
    tag         char(30),   #标签
    old         char(5),    #几成新
    sendto      char(6),    #发布地址
	date		char(20),	#发布时间
    status      char(4),    #状态  draft on  complete hold back 草稿 发布 成交 待审  驳回
    ############################
    owner       char(15),   #拥有者
    ownerid     int(6),      #拥有者id
    #############################
    exchangefor char(30),   #换取的物品
    miaoshu     text,       #换取物品的描述
    price       char(10)    #价格	
);

回复设置:
create table comment(
    id  int(7)  auto_increment  primary key,
    goodid  int(7),         #目标宝贝
    fromname    char(15),   #评论人
    fromid      int(7),     #评论人的id
    comment     text,       #评论内容
    status      char(9),    #评论状态  on rubbish  正常  垃圾箱
    date        datetime,   #评论时间
	touserid	int(7),
    kind        char(10)    #评论类别 comment  lookfor  reply 留言回复
);

求购信息
create table lookfor(
    id int(7) auto_increment   primary key,
    fromname    char(15),
    fromid      int(7),
    name        char(20),   #求购物品名称
    description text,       #求购物品描述
    tag         char(40),   #标签
    sort        char(10),    #类别
    status      char(20),    #状态 on back
    date        char(30)    #发布日期
);


全站设置
create table ynoption(
	name char(20),	#选项名称
	value	char(20)	#值
);
#初始化值
insert into ynoption (name,value) values('pingbi','on');			#屏蔽搜索引擎选项 on of
insert into ynoption (name,value) values('automail','off' );		#使用邮件同步发送留言
insert into ynoption (name,value) values('ind_belly_num','6' );	#前台显示二手货数目
insert into ynoption (name,value) values('ind_lookfor_num','9' );	#主页求购信息数
insert into ynoption (name,value) values('ind_pic_num','5' );		#主页图片展示数
insert into ynoption (name,value) values('ind_user_num','9' );		#主页用户数
insert into ynoption (name,value) values('back_belly_num','7' );	#后台显示每页二手货数目
insert into ynoption (name,value) values('back_lookfor_num','7' );		#后台显示每页求购信息数
insert into ynoption (name,value) values('base_path','http://localhost:8080/yinong');#基础路径


函数库设置：
    对于前台展品显示：
    while循环
    get_name()          //取回宝贝名称
    get_description()   //取回描述
    get_leftimg()       //取回左视图
    get_old()           //取回几成新

待解决问题
用户头像

#默认广告设置
insert into ynoption (name,value) values('adv','adv.gif');

    