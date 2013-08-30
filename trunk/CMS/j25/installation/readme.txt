v4检查通过

j25\installation\models\configuration.php
默认管理员ID为42，可直接批量替换为其他值
	替换 42



j25\installation\models\sql\mysql\joomla.sql
分类的“created_user_id”的值为42，需部分替换为上条相应值
	替换 '{"page_title":"","author":"","robots":""}', 42



j25\installation\models\sql\mysql\sample_data.sql
通常不需安装示例内容，即使安装也不用于正式发布，以下信息仅供参考
	示例分类的“created_user_id、modified_user_id”的值为42，需部分替换为上条相应值
		替换 '2011-01-01 00:00:01', 42
		替换 42, 0, '0000-00-00 00:00:00'
	示例文章的“created_by、modified_by”的值为42，需部分替换为上条相应值
		替换 '2011-01-01 00:00:01', 42
		替换 42, 0, '0000-00-00 00:00:00'
	示例链接的“created_by、modified_by”的值为42，需部分替换为上条相应值值为42，需替换为上条相应值
		替换 '2011-01-01 00:00:01', 42
	示例newsfeed的“created_by、modified_by”的值为42，需部分替换为上条相应值



j25\installation\models\sql\mysql\sample_data_zh-CN.sql
简体中文示例数据