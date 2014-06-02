<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "esms";

$con = mysql_connect($host, $user , $password);
if (!$con)
 {die('Could not connect: ' . mysql_error());} 
 	
 	mysql_query("CREATE DATABASE IF NOT EXISTS `esms`");
    mysql_select_db( $database , $con); 
    
	mysql_query("SET character_set_results=utf8", $con);
	mb_language('uni'); 
	mb_internal_encoding('UTF-8');
	mysql_query("set names 'utf8'",$con);



	mysql_query("CREATE TABLE IF NOT EXISTS `esms_users`(
					`userID` bigint(12) NOT NULL AUTO_INCREMENT ,
					`username` varchar(80) NOT NULL,
					`password` varchar(80) NOT NULL,
					`temp_password` varchar(80) NULL,
					`email` varchar(80) NOT NULL,
					`code` varchar(80) NOT NULL,
					`active` int(1) NOT NULL,
					`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					`remember_token` varchar(100) NULL,
					
					PRIMARY KEY(`userID`),
					UNIQUE(`username`,`email`)
					)
					DEFAULT CHARACTER SET = utf8
				");

	mysql_query("CREATE TABLE IF NOT EXISTS `esms_teams` (
					`teamID` bigint(12) NOT NULL AUTO_INCREMENT,
					`tag` varchar(30) NOT NULL,
					`name` varchar(60) NOT NULL,
					`captain` bigint(12) NOT NULL,
					`facebook` varchar(80) NULL,
					`twiter` varchar(80) NULL,
					`website` varchar(80) NULL,
					`about` text NULL,
					`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

					PRIMARY KEY (`teamID`),
					UNIQUE(`name`,`tag`)
					)
					DEFAULT CHARACTER SET = utf8
				");

	mysql_query("CREATE TABLE IF NOT EXISTS `esms_players`(
					`playerID` bigint(12) NOT NULL AUTO_INCREMENT,
					`userID` bigint(12) NOT NULL,
					`name` varchar(60) NULL,
					`last_name` varchar(60) NULL,
					`teamID` bigint(12) NULL,
					`avatar` varchar(255) NULL,
					`bio` varchar(255) NULL,
					`country` varchar(255) NULL,
					`facebook` varchar(80) NULL,
					`twiter` varchar(80) NULL,
					`website` varchar(80) NULL,
					`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

					PRIMARY KEY(`playerID`),
					FOREIGN KEY(`userID`) REFERENCES esms_users(userID) ON DELETE CASCADE ON UPDATE CASCADE,
					FOREIGN KEY(`teamID`) REFERENCES esms_teams(teamID) ON DELETE SET NULL ON UPDATE CASCADE
					)
					DEFAULT CHARACTER SET = utf8
				");

	mysql_query("ALTER TABLE `esms_teams` ADD FOREIGN KEY (`captain`) REFERENCES esms_players(playerID) ");

	mysql_query("CREATE TABLE IF NOT EXISTS `esms_tournaments` (
					`tournamentID` bigint(12) NOT NULL,
					`starting` TIMESTAMP NOT NULL,
					`max_teams` int(5) NULL,
					`winnerID` bigint(12) NULL,
					`second_place` bigint(12) NULL,
					`third_place` bigint(12) NULL,
					`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

					PRIMARY KEY(`tournamentID`),
					FOREIGN KEY(`winnerID`) REFERENCES esms_teams(teamID) ON DELETE NO ACTION ON UPDATE CASCADE,
					FOREIGN KEY(`second_place`) REFERENCES esms_teams(teamID) ON DELETE NO ACTION ON UPDATE CASCADE,
					FOREIGN KEY(`third_place`) REFERENCES esms_teams(teamID) ON DELETE NO ACTION ON UPDATE CASCADE
					)
					DEFAULT CHARACTER SET = utf8
				");

	mysql_query("CREATE TABLE IF NOT EXISTS `esms_matches` (
					`matchID` bigint(12) NOT NULL AUTO_INCREMENT,
					`host` bigint(12) NOT NULL,
					`guest` bigint(12) NOT NULL,
					`winnerID` bigint(12) NOT NULL,
					`time` TIMESTAMP NULL,
					`tournamentID` bigint(12) NOT NULL,
					`tournament_phase` varchar(60) NULL,
					`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

					PRIMARY KEY(`matchID`),
					FOREIGN KEY(`host`) REFERENCES esms_teams(teamID) ON DELETE NO ACTION ON UPDATE CASCADE,
					FOREIGN KEY(`guest`) REFERENCES esms_teams(teamID) ON DELETE NO ACTION ON UPDATE CASCADE,
					FOREIGN KEY(`winnerID`) REFERENCES esms_teams(teamID) ON DELETE NO ACTION ON UPDATE CASCADE,
					FOREIGN KEY(`tournamentID`) REFERENCES esms_tournaments(tournamentID) ON DELETE CASCADE ON UPDATE CASCADE
					)
					DEFAULT CHARACTER SET = utf8
				");
	mysql_query("CREATE TABLE IF NOT EXISTS `esms_players_scores` (
					`locID` bigint(12) NOT NULL AUTO_INCREMENT,
					`tournamentID` bigint(12) NOT NULL,
					`matchID` bigint(12) NOT NULL,
					`playerID` bigint(12) NOT NULL,
					`k` int(5) NULL,
					`d` int(5) NULL,
					`a` int(5) NULL,
					`cs` int(5) NULL,
					`entity` varchar(30) NULL,
					`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

					PRIMARY KEY(`locID`),
					FOREIGN KEY(`tournamentID`) REFERENCES esms_tournaments(tournamentID) ON DELETE CASCADE ON UPDATE CASCADE,
					FOREIGN KEY(`matchID`) REFERENCES esms_matches(matchID) ON DELETE NO ACTION ON UPDATE CASCADE,
					FOREIGN KEY(`playerID`) REFERENCES esms_players(playerID) ON DELETE CASCADE ON UPDATE CASCADE
					)
					DEFAULT CHARACTER SET = utf8
				");