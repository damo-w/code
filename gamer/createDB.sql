create DATABASE if NOT EXISTS gamerDB;
set NAMES utf8;
use gamerDB;
create TABLE if NOT EXISTS user_info (
  user_id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY UNIQUE ,
  user_logname varchar(18) NOT NULL ,
  user_passwd varchar(18) NOT NULL ,
  user_nickname varchar(20),
  user_sex BOOL ,
  user_age NUMERIC,
  user_phone varchar(13),
  user_email varchar (50),
  user_tag varchar(100),
  user_icon varchar(100));
create table if not exists item_info(
  item_id INTEGER AUTO_INCREMENT NOT NULL UNIQUE PRIMARY KEY ,
  item_name varchar(20) NOT NULL UNIQUE ,
  item_msg varchar(100),
  item_rule VARCHAR(10)
);
INSERT INTO item_info (item_name, item_msg, item_rule) VALUES
  ('乒乓球','乒乓球，是一种世界流行的球类体育项目，因其打击时发出“ping pang”的声音而得名。','a|c')
  ,('羽毛球','羽毛球是一项室内，室外兼顾的运动。','a|b')
  ,('中国象棋','中国象棋是起源于中国的一种棋戏，属于二人对抗性游戏的一种，在中国有着悠久的历史。由于用具简单，趣味性强，成为流行极为广泛的棋艺活动。','d')
  ,('围棋','围棋是一种策略性两人棋类游戏，中国古时称“弈”，西方名称“Go”。流行于东亚国家（中、日、韩等），属琴棋书画四艺之一。  围棋起源于中国。','d');
create table if NOT EXISTS format_info(
  format_id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  format_name VARCHAR(20) NOT NULL ,
  format_msg VARCHAR(100)
);
INSERT INTO format_info (format_name, format_msg, format_rule) VALUES ('五局三胜','总共五局，先胜三局者赢'),('三局两胜','总共三局，先胜两局者赢'),('只打一局','一局定输赢');
create table if NOT EXISTS rule_info(
  rule_id VARCHAR(1) NOT NULL PRIMARY KEY ,
  rule_name VARCHAR(20) NOT NULL ,
  rule_msg VARCHAR(100)
);
INSERT INTO rule_info (rule_id, rule_name, rule_msg)
  VALUES ('a','21分制','1、每场比赛采取三局两胜制；2、率先得到21分的一方赢得当局比赛；3、如果双方比分打成20比20，获胜一方需超过对手2分才算取胜；4、如果双方比分打成29比29，则率先得到第30分的一方取胜；5、首局获胜一方在接下来的一局比赛中率先发球；6、当一方在比赛中得到11分后，双方队员将休息1分钟；7、两局比赛之间的休息时间为2分钟。')
    ,('b','15分制','每局为15分，采用每球得分制，即由赢的一方直接得分。')
    ,('c','11分制','一局比赛中，先得11 分的一方为胜方。10 平后，先多得2 分的一方为胜方。')
    ,('d','无积分','没有积分，胜者为赢');
create TABLE IF NOT EXISTS set_info(
  set_id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  set_time DATETIME NOT NULL ,
  playA_id INTEGER NOT NULL ,
  playB_id INTEGER NOT NULL ,
  item_id INTEGER NOT NULL ,
  sys_id VARCHAR(1) NOT NULL ,
  rule_id VARCHAR(1) NOT NULL ,
  playA_result INTEGER NOT NULL ,
  playB_result INTEGER NOT NULL ,
  rounds INTEGER NOT NULL
);
create TABLE IF NOT EXISTS round_info(
  round_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  set_id INTEGER NOT NULL ,
  playA_score INTEGER NOT NULL ,
  playB_score INTEGER NOT NULL
);
