# 考虑到与SQLite兼容的MySQL设计 #

  * 价格类 decimal(10,2)
  * 重量类 decimal(6 ,3)
  * 是否类 tinyint(1)
  * 参数类 varchar(254) 注：SQLite的char最大为254，MySQL的char最大为255
  * 网址类 varchar(254) 注：SQLite的char最大为254，MySQL的char最大为255
如果表中有如下类型的字段： VARCHAR，TEXT，BLOB。只要你包括了其中一个这些字段，那么这个表就不是“固定长度静态表”了，这样，MySQL 引擎会用另一种方法来处理。所以char(254)不一定具有实际意义，除非一个表的所有字段都是定长字段。
还有一个关于varchar的问题是，varchar他既然可以自动适应存储空间，那我varchar(8)和varchar(255)存储应该都是一样的，那每次表设计的时候往大的方向去好了，免得以后不够用麻烦。这个思路对吗？答案是否定的。mysql会把表信息放到内存中（查询第一次后，就缓存住了，linux下很明显，但windows下似乎没有，不知道为啥），这时内存的申请是按照固定长度来的，如果varchar很大就会有问题。所以还是应该按需索取。

  * image 处理过的图
  * thumb 缩略图
  * original 原始图



# 一些常用参数的标准英文表达 #

Add your content here.  Format your content with:
  * quantity 数量
  * model 型号、规格
  * price 价格
  * added 添加
  * modified 修订、修改
  * available 可用
  * status 状态
  * manufacturers 直译制造商，我的理解是生产商，生产了创意或产品的企业，产品的归宿不一定是生产者
  * brand 品牌，同一个manufacturers旗下可以有多个品牌，其生产商代码相同
  * description (desc) 介绍
  * information (infor）信息
  * category 分类
  * count 计数
  * weight 重量
  * extension 扩展