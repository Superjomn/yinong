SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(7) NOT NULL auto_increment,
  `goodid` int(7) default NULL,
  `fromname` char(15) default NULL,
  `fromid` int(7) default NULL,
  `comment` text,
  `status` char(9) default NULL,
  `date` datetime default NULL,
  `touserid` int(7) default NULL,
  `kind` char(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=6 ;

INSERT INTO `comment` (`id`, `goodid`, `fromname`, `fromid`, `comment`, `status`, `date`, `touserid`, `kind`) VALUES
(1, 6, 'superjom', 1, ' 我看了，我的挺好的啊。\n想不想看看？', 'on', '2010-10-10 04:22:01', 1, 'lookfor'),
(2, 5, 'superjom', 1, ' 我看了，挺好的啊。 \n我有一辆，你要不要试试啊？', 'on', '2010-10-10 04:23:39', 1, 'lookfor'),
(3, 5, 'lavender', 1, ' 我也有一辆，你可以看看，很快的车子啊。', 'on', '2010-10-10 04:27:00', 1, 'lookfor'),
(4, 1, 'lavender', 3, ' 我也想看看，咱们约个时间吧。', 'on', '2010-10-10 04:28:25', 1, 'lookfor'),
(5, 1, 'superjom', 1, ' 我也有哦。 我也想看看。', 'on', '2010-10-10 04:29:16', 1, 'lookfor');

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(7) NOT NULL auto_increment,
  `name` char(20) default NULL,
  `leftimg` text,
  `fronimg` text,
  `topimg` text,
  `backimg` text,
  `description` text,
  `sort` char(6) default NULL,
  `tag` char(30) default NULL,
  `old` char(5) default NULL,
  `sendto` char(6) default NULL,
  `date` char(20) default NULL,
  `status` char(4) default NULL,
  `owner` char(15) default NULL,
  `ownerid` int(6) default NULL,
  `exchangefor` char(30) default NULL,
  `miaoshu` text,
  `price` char(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=25 ;

INSERT INTO `goods` (`id`, `name`, `leftimg`, `fronimg`, `topimg`, `backimg`, `description`, `sort`, `tag`, `old`, `sendto`, `date`, `status`, `owner`, `ownerid`, `exchangefor`, `miaoshu`, `price`) VALUES
(1, '禅意行囊', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677093.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677154.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677173.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677202.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^楷体^><font class=^Apple-style-span^ color=^#990000^>禅意行囊</font></font></span><div><font class=^Apple-style-span^ face=^楷体^><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ color=^#990000^>人生的智慧书。</font></span></font></div><div><font class=^Apple-style-span^ face=^楷体^><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><br></span></font></div>', '图书资料', '禅意行囊 智慧', '6成新', '学友火炬', '', 'draf', 'superjom', 1, '', '', ''),
(2, '智慧行囊', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^>智慧行囊</span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^楷体^><font class=^Apple-style-span^ color=^#9900FF^>人生的智慧书</font></font></span></div>', '图书资料', '智慧行囊 智慧', '9成新', '学友火炬', '', 'comp', 'superjom', 1, '', '', ''),
(3, '智慧行囊', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^>智慧行囊</span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^楷体^><font class=^Apple-style-span^ color=^#9900FF^>人生的智慧书</font></font></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '以物易物', '', 'on', 'superjom', 1, '鼠标', '好用的鼠标啊。', ''),
(4, '智慧行囊', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^>智慧行囊</span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^楷体^><font class=^Apple-style-span^ color=^#9900FF^>人生的智慧书</font></font></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '以物易物', '', 'draf', 'superjom', 1, '鼠标', '好用的鼠标啊。', ''),
(5, '智慧行囊', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^>智慧行囊</span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^楷体^><font class=^Apple-style-span^ color=^#9900FF^>人生的智慧书</font></font></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '以物易物', '', 'comp', 'superjom', 1, '鼠标', '好用的鼠标啊。', ''),
(6, '智慧行囊', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^>智慧行囊</span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^楷体^><font class=^Apple-style-span^ color=^#9900FF^>人生的智慧书</font></font></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '跳蚤市场', '', 'on', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(7, '智慧行囊', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^>智慧行囊</span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^楷体^><font class=^Apple-style-span^ color=^#9900FF^>人生的智慧书</font></font></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '跳蚤市场', '', 'draf', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(8, '智慧行囊', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^>智慧行囊</span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^楷体^><font class=^Apple-style-span^ color=^#9900FF^>人生的智慧书</font></font></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '以物易物', '', 'draf', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(9, '软件设计师教程', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ color=^#0000CC^><b><i>《软件设计师教程》</i></b></font></span><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^><br></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '以物易物', '', 'comp', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(24, '碎花裙', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677884.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684010.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684037.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684060.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div>', '图书资料', '连衣裙', '8成新', '学友火炬', '', 'draf', 'superjom', 1, '', '', ''),
(11, '软件设计师教程', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ color=^#0000CC^><b><i>《软件设计师教程》</i></b></font></span><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^><br></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '学友火炬', '', 'on', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(22, '连衣裙', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677884.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684010.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684037.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684060.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div>', '生活/女生专', '连衣裙', '8成新', '学友火炬', '', 'on', 'superjom', 1, '', '', ''),
(13, '软件设计师教程', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677363.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ color=^#0000CC^><b><i>《软件设计师教程》</i></b></font></span><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^><br></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '以物易物', '', 'back', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(15, '软件设计师教程', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677771.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ color=^#0000CC^><b><i>《软件设计师教程》</i></b></font></span><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^><br></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '以物易物', '', 'on', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(17, '软件设计师教程', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677771.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ color=^#0000CC^><b><i>《软件设计师教程》</i></b></font></span><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^><br></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '学友火炬', '', 'on', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(19, '软件设计师教程', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677771.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677395.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677413.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677432.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ color=^#0000CC^><b><i>《软件设计师教程》</i></b></font></span><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^>软件设计师</span></div><div><span class=^Apple-style-span^ style=^font-size: xx-large;^><br></span></div>', '文具用品', '智慧行囊 智慧', '9成新', '跳蚤市场', '', 'on', 'superjom', 1, '鼠标', '好用的鼠标啊。', '25元'),
(23, '碎花裙', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286677884.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684010.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684037.jpg', 'http://localhost:8080/yinong/yn-admin/small_image/thumbnail_1286684060.jpg', '<span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div><div><span class=^Apple-style-span^ style=^font-size: -webkit-xxx-large;^><font class=^Apple-style-span^ face=^黑体^><font class=^Apple-style-span^ color=^#0033FF^>很漂亮的连衣裙啊！</font></font></span></div>', '生活/女生专', '连衣裙', '8成新', '以物易物', '', 'back', 'superjom', 1, '毛毛熊', '', '');

CREATE TABLE IF NOT EXISTS `lookfor` (
  `id` int(7) NOT NULL auto_increment,
  `fromname` char(15) default NULL,
  `fromid` int(7) default NULL,
  `name` char(20) default NULL,
  `description` text,
  `tag` char(40) default NULL,
  `sort` char(10) default NULL,
  `status` char(20) default NULL,
  `date` char(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=9 ;

INSERT INTO `lookfor` (`id`, `fromname`, `fromid`, `name`, `description`, `tag`, `sort`, `status`, `date`) VALUES
(1, 'superjom', 1, '自行车', '<p>最好能用的。 </p><p>我比较喜欢红色的啊，你们可以看看，有没有红色的自行车。</p><p>我看看吧。 </p><p>便宜一点就最好了。</p>', '自行车', '生活/女生专区', 'on', '2010/10/10'),
(2, 'superjom', 1, '自行车', '<p>最好能用的。 </p><p>我比较喜欢红色的啊，你们可以看看，有没有红色的自行车。</p><p>我看看吧。 </p><p>便宜一点就最好了。</p>', '自行车', '图书资料', 'on', '2010/10/10'),
(3, 'superjom', 1, '红色自行车', '<p>最好能用的。 </p><p>我比较喜欢红色的啊，你们可以看看，有没有红色的自行车。</p><p>我看看吧。 </p><p>便宜一点就最好了。</p>', '自行车 红色', '生活/女生专区', 'on', '2010/10/10'),
(4, 'superjom', 1, '蓝色自行车', '<p>最好能用的。 </p><p>我比较喜欢红色的啊，你们可以看看，有没有红色的自行车。</p><p>我看看吧。 </p><p>便宜一点就最好了。</p>', '自行车 蓝色', '图书资料', 'on', '2010/10/10'),
(5, 'superjom', 1, '自行车', '<p>最好能用的。 </p><p>我比较喜欢红色的啊，你们可以看看，有没有红色的自行车。</p><p>我看看吧。 </p><p>便宜一点就最好了。</p>', '绿色 自行车', '生活/女生专区', 'on', '2010/10/10'),
(8, 'superjom', 1, '英语四级词汇书', '<p>英语四级词汇书</p>', '四级 词汇', '图书资料', 'on', '2010/10/10'),
(7, 'superjom', 1, '研究生词汇书', '<p>研究生词汇书</p>', '研究生 词汇', '图书资料', 'on', '2010/10/10');

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(7) NOT NULL auto_increment,
  `user_name` char(10) default NULL,
  `real_name` char(7) default NULL,
  `sex` char(2) default NULL,
  `study_num` char(12) default NULL,
  `xueyuan` char(15) default NULL,
  `xiaoqu` char(4) default NULL,
  `connect` char(13) default NULL,
  `photo` text,
  `birthday` datetime default NULL,
  `email` char(20) default NULL,
  `about_me` text,
  `new_pwd` char(15) default NULL,
  `level` int(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=9 ;

INSERT INTO `user` (`id`, `user_name`, `real_name`, `sex`, `study_num`, `xueyuan`, `xiaoqu`, `connect`, `photo`, `birthday`, `email`, `about_me`, `new_pwd`, `level`) VALUES
(2, 'chunwei', '严春维', '男', '0810030214', '理学院', '东校区', '110', 'http://localhost:8080/yinong/yn-admin/image/host/8', '2000-02-09 00:00:00', 'superjom@gmail.com', '飞向太平洋', '511541', NULL),
(3, 'lavender', '严春霞', '男', '0810030214', '理学院', '东校区', '110', 'http://localhost:8080/yinong/yn-admin/image/host/4', '2000-02-09 00:00:00', 'superbaby@gmail.com', '哈哈', '511541', 1),
(4, 'superbaby', '黄玲玲', '女', '0810030214', '理学院', '东校区', '110', 'http://localhost:8080/yinong/yn-admin/image/host/4', '2000-02-09 00:00:00', 'superjohn@gmail.com', '哈哈', '511541', 1),
(1, 'superjom', '严春伟', '男', '0810030214', '理学院', '东校区', '13581835648', 'http://localhost:8080/yinong/yn-admin/image/host/1', '0000-00-00 00:00:00', 'superjom@sohu.com', '我是阳光少年！', '511541', NULL),
(5, 'Tom Green', '小红', '女', '0810030214', '水院', '东校区', '110', 'http://localhost:8080/yinong/yn-admin/image/host/6', '1990-02-06 00:00:00', 'superking@gmail.com', '哈哈', '511541', 1),
(6, 'small key', '小绿', '男', '0810030214', '水院', '东校区', '110', 'http://localhost:8080/yinong/yn-admin/image/host/5', '1990-02-06 00:00:00', 'smallkey@gmail.com', '哈哈', '511541', 1),
(7, 'small dell', '小绿', '男', '0810030214', '水院', '东校区', '110', 'http://localhost:8080/yinong/yn-admin/image/host/1', '1990-02-06 00:00:00', 'smalldel@gmail.com', '哈哈', '511541', 1),
(8, 'small cool', '小绿', '男', '0810030214', '水院', '东校区', '110', 'http://localhost:8080/yinong/yn-admin/image/host/11', '1990-02-06 00:00:00', 'smallcool@gmail.com', '哈哈', '511541', 1);

CREATE TABLE IF NOT EXISTS `ynoption` (
  `name` char(20) default NULL,
  `value` char(20) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

INSERT INTO `ynoption` (`name`, `value`) VALUES
('pingbi', 'on'),
('automail', 'off'),
('ind_belly_num', '6'),
('ind_lookfor_num', '9'),
('ind_pic_num', '5'),
('ind_user_num', '9'),
('back_belly_num', '7'),
('back_lookfor_num', '7');

CREATE TABLE IF NOT EXISTS `yn_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL auto_increment,
  `comment_id` bigint(20) unsigned NOT NULL default '0',
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `yn_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL auto_increment,
  `comment_post_ID` bigint(20) unsigned NOT NULL default '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL default '',
  `comment_author_url` varchar(200) NOT NULL default '',
  `comment_author_IP` varchar(100) NOT NULL default '',
  `comment_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL default '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL default '0',
  `comment_approved` varchar(20) NOT NULL default '1',
  `comment_agent` varchar(255) NOT NULL default '',
  `comment_type` varchar(20) NOT NULL default '',
  `comment_parent` bigint(20) unsigned NOT NULL default '0',
  `user_id` bigint(20) unsigned NOT NULL default '0',
  PRIMARY KEY  (`comment_ID`),
  KEY `comment_approved` (`comment_approved`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `yn_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'WordPress 先生', '', 'http://wordpress.org/', '', '2010-10-10 04:06:54', '2010-10-10 04:06:54', '嗨，这是一条评论。<br />要删除一条评论，请先登录系统，查看这篇文章的评论，然后您可以看到编辑或者删除评论的选项。', 0, '1', '', '', 0, 0);

CREATE TABLE IF NOT EXISTS `yn_links` (
  `link_id` bigint(20) unsigned NOT NULL auto_increment,
  `link_url` varchar(255) NOT NULL default '',
  `link_name` varchar(255) NOT NULL default '',
  `link_image` varchar(255) NOT NULL default '',
  `link_target` varchar(25) NOT NULL default '',
  `link_description` varchar(255) NOT NULL default '',
  `link_visible` varchar(20) NOT NULL default 'Y',
  `link_owner` bigint(20) unsigned NOT NULL default '1',
  `link_rating` int(11) NOT NULL default '0',
  `link_updated` datetime NOT NULL default '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL default '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `yn_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_visible`, `link_owner`, `link_rating`, `link_updated`, `link_rel`, `link_notes`, `link_rss`) VALUES
(1, 'http://codex.wordpress.org/', 'Documentation', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(2, 'http://wordpress.org/news/', 'WordPress Blog', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', 'http://wordpress.org/news/feed/'),
(3, 'http://wordpress.org/extend/ideas/', 'Suggest Ideas', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(4, 'http://wordpress.org/support/', 'Support Forum', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(5, 'http://wordpress.org/extend/plugins/', 'Plugins', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(6, 'http://wordpress.org/extend/themes/', 'Themes', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(7, 'http://planet.wordpress.org/', 'WordPress Planet', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '');

CREATE TABLE IF NOT EXISTS `yn_options` (
  `option_id` bigint(20) unsigned NOT NULL auto_increment,
  `blog_id` int(11) NOT NULL default '0',
  `option_name` varchar(64) NOT NULL default '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL default 'yes',
  PRIMARY KEY  (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=130 ;

INSERT INTO `yn_options` (`option_id`, `blog_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 0, 'siteurl', 'http://localhost:8080/yinong/blog', 'yes'),
(2, 0, 'blogname', '易农博文', 'yes'),
(3, 0, 'blogdescription', '又一个 WordPress 站点', 'yes'),
(4, 0, 'users_can_register', '0', 'yes'),
(5, 0, 'admin_email', 'superjom@gmail.com', 'yes'),
(6, 0, 'start_of_week', '1', 'yes'),
(7, 0, 'use_balanceTags', '0', 'yes'),
(8, 0, 'use_smilies', '1', 'yes'),
(9, 0, 'require_name_email', '1', 'yes'),
(10, 0, 'comments_notify', '1', 'yes'),
(11, 0, 'posts_per_rss', '10', 'yes'),
(12, 0, 'rss_use_excerpt', '0', 'yes'),
(13, 0, 'mailserver_url', 'mail.example.com', 'yes'),
(14, 0, 'mailserver_login', 'login@example.com', 'yes'),
(15, 0, 'mailserver_pass', 'password', 'yes'),
(16, 0, 'mailserver_port', '110', 'yes'),
(17, 0, 'default_category', '1', 'yes'),
(18, 0, 'default_comment_status', 'open', 'yes'),
(19, 0, 'default_ping_status', 'open', 'yes'),
(20, 0, 'default_pingback_flag', '1', 'yes'),
(21, 0, 'default_post_edit_rows', '10', 'yes'),
(22, 0, 'posts_per_page', '10', 'yes'),
(23, 0, 'date_format', 'Y 年 m 月 d 日', 'yes'),
(24, 0, 'time_format', 'a g:i', 'yes'),
(25, 0, 'links_updated_date_format', 'Y 年 m 月 d 日 H:i:s', 'yes'),
(26, 0, 'links_recently_updated_prepend', '<em>', 'yes'),
(27, 0, 'links_recently_updated_append', '</em>', 'yes'),
(28, 0, 'links_recently_updated_time', '120', 'yes'),
(29, 0, 'comment_moderation', '0', 'yes'),
(30, 0, 'moderation_notify', '1', 'yes'),
(31, 0, 'permalink_structure', '', 'yes'),
(32, 0, 'gzipcompression', '0', 'yes'),
(33, 0, 'hack_file', '0', 'yes'),
(34, 0, 'blog_charset', 'UTF-8', 'yes'),
(35, 0, 'moderation_keys', '', 'no'),
(36, 0, 'active_plugins', 'a:0:{}', 'yes'),
(37, 0, 'home', 'http://localhost:8080/yinong/blog', 'yes'),
(38, 0, 'category_base', '', 'yes'),
(39, 0, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(40, 0, 'advanced_edit', '0', 'yes'),
(41, 0, 'comment_max_links', '2', 'yes'),
(42, 0, 'gmt_offset', '0', 'yes'),
(43, 0, 'default_email_category', '1', 'yes'),
(44, 0, 'recently_edited', '', 'no'),
(45, 0, 'template', 'twentyten', 'yes'),
(46, 0, 'stylesheet', 'twentyten', 'yes'),
(47, 0, 'comment_whitelist', '1', 'yes'),
(48, 0, 'blacklist_keys', '', 'no'),
(49, 0, 'comment_registration', '0', 'yes'),
(50, 0, 'rss_language', 'en', 'yes'),
(51, 0, 'html_type', 'text/html', 'yes'),
(52, 0, 'use_trackback', '0', 'yes'),
(53, 0, 'default_role', 'subscriber', 'yes'),
(54, 0, 'db_version', '15477', 'yes'),
(55, 0, 'uploads_use_yearmonth_folders', '1', 'yes'),
(56, 0, 'upload_path', '', 'yes'),
(57, 0, 'blog_public', '1', 'yes'),
(58, 0, 'default_link_category', '2', 'yes'),
(59, 0, 'show_on_front', 'posts', 'yes'),
(60, 0, 'tag_base', '', 'yes'),
(61, 0, 'show_avatars', '1', 'yes'),
(62, 0, 'avatar_rating', 'G', 'yes'),
(63, 0, 'upload_url_path', '', 'yes'),
(64, 0, 'thumbnail_size_w', '150', 'yes'),
(65, 0, 'thumbnail_size_h', '150', 'yes'),
(66, 0, 'thumbnail_crop', '1', 'yes'),
(67, 0, 'medium_size_w', '300', 'yes'),
(68, 0, 'medium_size_h', '300', 'yes'),
(69, 0, 'avatar_default', 'mystery', 'yes'),
(70, 0, 'enable_app', '0', 'yes'),
(71, 0, 'enable_xmlrpc', '0', 'yes'),
(72, 0, 'large_size_w', '1024', 'yes'),
(73, 0, 'large_size_h', '1024', 'yes'),
(74, 0, 'image_default_link_type', 'file', 'yes'),
(75, 0, 'image_default_size', '', 'yes'),
(76, 0, 'image_default_align', '', 'yes'),
(77, 0, 'close_comments_for_old_posts', '0', 'yes'),
(78, 0, 'close_comments_days_old', '14', 'yes'),
(79, 0, 'thread_comments', '1', 'yes'),
(80, 0, 'thread_comments_depth', '5', 'yes'),
(81, 0, 'page_comments', '0', 'yes'),
(82, 0, 'comments_per_page', '50', 'yes'),
(83, 0, 'default_comments_page', 'newest', 'yes'),
(84, 0, 'comment_order', 'asc', 'yes'),
(85, 0, 'sticky_posts', 'a:0:{}', 'yes'),
(86, 0, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(87, 0, 'widget_text', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(88, 0, 'widget_rss', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(89, 0, 'timezone_string', '', 'yes'),
(90, 0, 'embed_autourls', '1', 'yes'),
(91, 0, 'embed_size_w', '', 'yes'),
(92, 0, 'embed_size_h', '600', 'yes'),
(93, 0, 'page_for_posts', '0', 'yes'),
(94, 0, 'page_on_front', '0', 'yes'),
(95, 0, 'yn_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(96, 0, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(97, 0, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 0, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 0, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(100, 0, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(101, 0, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:19:"primary-widget-area";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:21:"secondary-widget-area";a:0:{}s:24:"first-footer-widget-area";a:0:{}s:25:"second-footer-widget-area";a:0:{}s:24:"third-footer-widget-area";a:0:{}s:25:"fourth-footer-widget-area";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(102, 0, 'cron', 'a:3:{i:1286734155;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1286777410;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(103, 0, '_transient_doing_cron', '1286692612', 'yes'),
(128, 0, '_site_transient_timeout_theme_roots', '1286705370', 'yes'),
(129, 0, '_site_transient_theme_roots', 'a:15:{s:9:"B-NewsCms";s:7:"/themes";s:15:"Caffine/Caffine";s:7:"/themes";s:8:"Furvious";s:7:"/themes";s:17:"GameDine/Gamedine";s:7:"/themes";s:13:"KiaMag/KiaMag";s:7:"/themes";s:8:"arjuna-x";s:7:"/themes";s:9:"atahualpa";s:7:"/themes";s:5:"benny";s:7:"/themes";s:16:"german-newspaper";s:7:"/themes";s:13:"glowing-amber";s:7:"/themes";s:5:"goocn";s:7:"/themes";s:4:"keko";s:7:"/themes";s:16:"kubrick-on-crack";s:7:"/themes";s:9:"twentyten";s:7:"/themes";s:7:"xiaohan";s:7:"/themes";}', 'yes'),
(106, 0, 'zh_cn_language_pack_enable_backend_style_modifications', '1', 'yes'),
(107, 0, '_site_transient_update_core', 'O:8:"stdClass":3:{s:7:"updates";a:0:{}s:15:"version_checked";s:5:"3.0.1";s:12:"last_checked";i:1286690956;}', 'yes'),
(108, 0, 'current_theme', 'Twenty Ten', 'yes'),
(109, 0, '_site_transient_update_plugins', 'O:8:"stdClass":1:{s:12:"last_checked";i:1286690986;}', 'yes'),
(110, 0, 'widget_pages', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(111, 0, 'widget_calendar', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(112, 0, 'widget_links', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(113, 0, 'widget_tag_cloud', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(114, 0, 'widget_nav_menu', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(115, 0, '_site_transient_update_themes', 'O:8:"stdClass":1:{s:12:"last_checked";i:1286691018;}', 'yes'),
(116, 0, 'dashboard_widget_options', 'a:4:{s:25:"dashboard_recent_comments";a:1:{s:5:"items";i:5;}s:24:"dashboard_incoming_links";a:5:{s:4:"home";s:33:"http://localhost:8080/yinong/blog";s:4:"link";s:109:"http://blogsearch.google.com/blogsearch?scoring=d&partner=wordpress&q=link:http://localhost:8080/yinong/blog/";s:3:"url";s:142:"http://blogsearch.google.com/blogsearch_feeds?scoring=d&ie=utf-8&num=10&output=rss&partner=wordpress&q=link:http://localhost:8080/yinong/blog/";s:5:"items";i:10;s:9:"show_date";b:0;}s:17:"dashboard_primary";a:7:{s:4:"link";s:24:"http://cn.wordpress.org/";s:3:"url";s:29:"http://cn.wordpress.org/feed/";s:5:"title";s:22:"WordPress China 博客";s:5:"items";i:2;s:12:"show_summary";i:1;s:11:"show_author";i:0;s:9:"show_date";i:1;}s:19:"dashboard_secondary";a:7:{s:4:"link";s:28:"http://planet.wordpress.org/";s:3:"url";s:33:"http://planet.wordpress.org/feed/";s:5:"title";s:29:"其它 WordPress 相关新闻";s:5:"items";i:5;s:12:"show_summary";i:0;s:11:"show_author";i:0;s:9:"show_date";i:0;}}', 'yes'),
(117, 0, '_transient_timeout_feed_26445ed4a605015f78cbf85cd62546fa', '1286734215', 'no'),
(118, 0, '_transient_feed_26445ed4a605015f78cbf85cd62546fa', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:1:"\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:0:"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:60:"link:http://localhost:8080/yinong/blog/ - Google Blog Search";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:112:"http://blogsearch.google.com/blogsearch?scoring=d&ie=ISO-8859-1&num=10&q=link:http://localhost:8080/yinong/blog/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:94:"Your search - <b>link:http://localhost:8080/yinong/blog/</b> - did not match any documents.   ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://a9.com/-/spec/opensearch/1.1/";a:3:{s:12:"totalResults";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:10:"startIndex";a:1:{i:0;a:5:{s:4:"data";s:1:"1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:12:"itemsPerPage";a:1:{i:0;a:5:{s:4:"data";s:2:"10";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:9:{s:4:"date";s:29:"Sun, 10 Oct 2010 06:10:10 GMT";s:6:"pragma";s:8:"no-cache";s:7:"expires";s:29:"Fri, 01 Jan 1990 00:00:00 GMT";s:13:"cache-control";s:25:"no-cache, must-revalidate";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"set-cookie";s:143:"PREF=ID=bc3c64620105f9b0:NW=1:TM=1286691010:LM=1286691010:S=emcHqqW-oG3ajQDC; expires=Tue, 09-Oct-2012 06:10:10 GMT; path=/; domain=.google.com";s:22:"x-content-type-options";s:7:"nosniff";s:6:"server";s:4:"bsfe";s:16:"x-xss-protection";s:13:"1; mode=block";}s:5:"build";s:14:"20090627192103";}', 'no'),
(119, 0, '_transient_timeout_feed_mod_26445ed4a605015f78cbf85cd62546fa', '1286734215', 'no'),
(120, 0, '_transient_feed_mod_26445ed4a605015f78cbf85cd62546fa', '1286691015', 'no'),
(121, 0, 'can_compress_scripts', '1', 'yes'),
(127, 0, 'category_children', 'a:0:{}', 'yes'),
(122, 0, '_transient_timeout_plugin_slugs', '1286777448', 'no'),
(123, 0, '_transient_plugin_slugs', 'a:4:{i:0;s:19:"akismet/akismet.php";i:1;s:17:"cforms/cforms.php";i:2;s:9:"hello.php";i:3;s:27:"wp-pagenavi/wp-pagenavi.php";}', 'no');

CREATE TABLE IF NOT EXISTS `yn_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL auto_increment,
  `post_id` bigint(20) unsigned NOT NULL default '0',
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

INSERT INTO `yn_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_edit_last', '1'),
(3, 3, '_edit_lock', '1286691032'),
(17, 10, '_edit_lock', '1286697387'),
(12, 7, '_edit_lock', '1286692249'),
(6, 3, '_wp_old_slug', ''),
(7, 1, '_edit_lock', '1286692171'),
(8, 1, '_edit_last', '1'),
(11, 7, '_edit_last', '1'),
(16, 10, '_edit_last', '1'),
(15, 7, '_wp_old_slug', ''),
(20, 10, '_wp_old_slug', '');

CREATE TABLE IF NOT EXISTS `yn_posts` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `post_author` bigint(20) unsigned NOT NULL default '0',
  `post_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL default '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL default 'publish',
  `comment_status` varchar(20) NOT NULL default 'open',
  `ping_status` varchar(20) NOT NULL default 'open',
  `post_password` varchar(20) NOT NULL default '',
  `post_name` varchar(200) NOT NULL default '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL default '0000-00-00 00:00:00',
  `post_content_filtered` text NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL default '0',
  `guid` varchar(255) NOT NULL default '',
  `menu_order` int(11) NOT NULL default '0',
  `post_type` varchar(20) NOT NULL default 'post',
  `post_mime_type` varchar(100) NOT NULL default '',
  `comment_count` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

INSERT INTO `yn_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2010-10-10 04:06:54', '2010-10-10 04:06:54', '欢迎使用 WordPress。这是系统自动生成的演示文章。编辑或者删除它，开始您的博客！', 'Hello world！', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2010-10-10 06:29:29', '2010-10-10 06:29:29', '', 0, 'http://localhost:8080/yinong/blog/?p=1', 0, 'post', '', 1),
(2, 1, '2010-10-10 04:06:54', '2010-10-10 04:06:54', '这里是 <strong>关于</strong> 页面，是一个 WordPress 页面样例，您可以编辑本页面，写上您和网站的信息以便读者了解您。您可以创建任意多的页面或者子页面，并在 WordPress 里管理所有这些。', '关于', '', 'publish', 'open', 'open', '', '关于', '', '', '2010-10-10 04:06:54', '2010-10-10 04:06:54', '', 0, 'http://localhost:8080/yinong/blog/?page_id=2', 0, 'page', '', 0),
(3, 1, '2010-10-10 06:10:31', '2010-10-10 06:10:31', '', '大猪猪', '', 'publish', 'open', 'open', '', '%e5%a4%a7%e7%8c%aa%e7%8c%aa', '', '', '2010-10-10 06:10:31', '2010-10-10 06:10:31', '', 0, 'http://localhost:8080/yinong/blog/?p=3', 0, 'post', '', 0),
(4, 1, '2010-10-10 06:10:27', '2010-10-10 06:10:27', '', '大猪猪', '', 'inherit', 'open', 'open', '', '3-revision', '', '', '2010-10-10 06:10:27', '2010-10-10 06:10:27', '', 3, 'http://localhost:8080/yinong/blog/?p=4', 0, 'revision', '', 0),
(5, 1, '2010-10-10 04:06:54', '2010-10-10 04:06:54', '欢迎使用 WordPress。这是系统自动生成的演示文章。编辑或者删除它，开始您的博客！', 'Hello world！', '', 'inherit', 'open', 'open', '', '1-revision', '', '', '2010-10-10 04:06:54', '2010-10-10 04:06:54', '', 1, 'http://localhost:8080/yinong/blog/?p=5', 0, 'revision', '', 0),
(6, 1, '2010-10-10 06:30:32', '2010-10-10 06:30:32', '欢迎使用 WordPress。这是系统自动生成的演示文章。编辑或者删除它，开始您的博客！', 'Hello world！', '', 'inherit', 'open', 'open', '', '1-autosave', '', '', '2010-10-10 06:30:32', '2010-10-10 06:30:32', '', 1, 'http://localhost:8080/yinong/blog/?p=6', 0, 'revision', '', 0),
(7, 1, '2010-10-10 06:30:47', '2010-10-10 06:30:47', '大大老那个', '哈哈，我来啦。', '', 'publish', 'open', 'open', '', '%e5%93%88%e5%93%88%ef%bc%8c%e6%88%91%e6%9d%a5%e5%95%a6%e3%80%82', '', '', '2010-10-10 06:30:47', '2010-10-10 06:30:47', '', 0, 'http://localhost:8080/yinong/blog/?p=7', 0, 'post', '', 0),
(8, 1, '2010-10-10 06:30:41', '2010-10-10 06:30:41', '', '哈哈，我来啦。', '', 'inherit', 'open', 'open', '', '7-revision', '', '', '2010-10-10 06:30:41', '2010-10-10 06:30:41', '', 7, 'http://localhost:8080/yinong/blog/?p=8', 0, 'revision', '', 0),
(9, 1, '2010-10-10 06:31:50', '2010-10-10 06:31:50', '大大老那个', '哈哈，我来啦。', '', 'inherit', 'open', 'open', '', '7-autosave', '', '', '2010-10-10 06:31:50', '2010-10-10 06:31:50', '', 7, 'http://localhost:8080/yinong/blog/?p=9', 0, 'revision', '', 0),
(10, 1, '2010-10-10 06:33:45', '2010-10-10 06:33:45', '', '达达狼', '', 'publish', 'open', 'open', '', '%e8%be%be%e8%be%be%e7%8b%bc', '', '', '2010-10-10 06:36:52', '2010-10-10 06:36:52', '', 0, 'http://localhost:8080/yinong/blog/?p=10', 0, 'post', '', 0),
(11, 1, '2010-10-10 06:33:40', '2010-10-10 06:33:40', '', '达达狼', '', 'inherit', 'open', 'open', '', '10-revision', '', '', '2010-10-10 06:33:40', '2010-10-10 06:33:40', '', 10, 'http://localhost:8080/yinong/blog/?p=11', 0, 'revision', '', 0),
(12, 1, '2010-10-10 06:33:45', '2010-10-10 06:33:45', '', '达达狼', '', 'inherit', 'open', 'open', '', '10-revision-2', '', '', '2010-10-10 06:33:45', '2010-10-10 06:33:45', '', 10, 'http://localhost:8080/yinong/blog/?p=12', 0, 'revision', '', 0);

CREATE TABLE IF NOT EXISTS `yn_terms` (
  `term_id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(200) NOT NULL default '',
  `slug` varchar(200) NOT NULL default '',
  `term_group` bigint(10) NOT NULL default '0',
  PRIMARY KEY  (`term_id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `yn_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, '未分类', '%e6%9c%aa%e5%88%86%e7%b1%bb', 0),
(2, '链接表', '%e9%93%be%e6%8e%a5%e8%a1%a8', 0),
(3, 'superjom', 'superjom', 0),
(4, 'lavender', 'tgsr', 0);

CREATE TABLE IF NOT EXISTS `yn_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL default '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL default '0',
  `term_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `yn_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 2, 0),
(2, 2, 0),
(3, 2, 0),
(4, 2, 0),
(5, 2, 0),
(6, 2, 0),
(7, 2, 0),
(1, 1, 0),
(3, 1, 0),
(1, 3, 0),
(10, 4, 0),
(7, 3, 0);

CREATE TABLE IF NOT EXISTS `yn_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL auto_increment,
  `term_id` bigint(20) unsigned NOT NULL default '0',
  `taxonomy` varchar(32) NOT NULL default '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL default '0',
  `count` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `yn_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 2),
(2, 2, 'link_category', '', 0, 7),
(3, 3, 'category', '', 0, 2),
(4, 4, 'category', '', 0, 1),
(5, 5, 'category', '', 0, 0);

CREATE TABLE IF NOT EXISTS `yn_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) unsigned NOT NULL default '0',
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

INSERT INTO `yn_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', ''),
(2, 1, 'last_name', ''),
(3, 1, 'nickname', 'superjom'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'aim', ''),
(10, 1, 'yim', ''),
(11, 1, 'jabber', ''),
(12, 1, 'yn_capabilities', 'a:1:{s:13:"administrator";s:1:"1";}'),
(13, 1, 'yn_user_level', '10');

CREATE TABLE IF NOT EXISTS `yn_users` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `user_login` varchar(60) NOT NULL default '',
  `user_pass` varchar(64) NOT NULL default '',
  `user_nicename` varchar(50) NOT NULL default '',
  `user_email` varchar(100) NOT NULL default '',
  `user_url` varchar(100) NOT NULL default '',
  `user_registered` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL default '',
  `user_status` int(11) NOT NULL default '0',
  `display_name` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `yn_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'superjom', '$P$BxA7268lweVuHWSpuCWLSC644.cINf/', 'superjom', 'superjom@gmail.com', '', '2010-10-10 04:06:54', '', 0, 'superjom');
