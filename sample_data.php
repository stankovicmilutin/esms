
ALTER TABLE `esms_teams` MODIFY COLUMN `captain`  bigint(12) NULL AFTER `name`;
 
INSERT INTO `esms_users` (username, password, email, active) VALUES
    ("user1","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user2","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user3","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user4","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user5","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user6","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user7","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user8","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user9","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user10","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user11","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user12","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user13","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user14","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user15","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user16","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user17","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user18","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user19","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user20","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user21","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user22","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user23","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user24","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user25","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1),
    ("user26","$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC","mail@bla.com", 1);


INSERT INTO `esms_teams` (tag,name,facebook,twitter,website,about,avatar,country) VALUES
    ("FNC","Fnatic","www.fb.com/fnatik","www.twitter.com/fnatik","www.fnatic.com","In the 2014 Spring Split, Fnatic saw monumental successes and failures, but ended on a high-note, taking first place for the third split in a row. Following a humbling performance at All-Star, only defeating TPA, Fnatic will take plenty of lessons into the summer split.", "http://localhost/esms/public/uploads/asd2412.jpg", "EU"),
    ("GMB","Gambit Gamming","www.fb.com/gmb","www.twitter.com/gmb","www.gambit.com","The Russians navigated a closely-fought group stage in the Season 3 World Championships only to run into the well-prepared NaJin Black Sword in the quarterfinals. Once debated as the best team in the world during their Moscow 5 days, Gambit’s 2014 spring split playoff implosion leaves their hopes for the summer split and World Championship aspirations shaky and uncertain.", "http://localhost/esms/public/uploads/asd2412.jpg", "Russia"),
    ("C9","Cloud 9","www.fb.com/fnatik","www.twitter.com/fnatik","www.fnatic.com","In the 2014 Spring Split, Fnatic saw monumental successes and failures, but ended on a high-note, taking first place for the third split in a row. Following a humbling performance at All-Star, only defeating TPA, Fnatic will take plenty of lessons into the summer split.", "http://localhost/esms/public/uploads/asd2412.jpg", "EU"),
    ("Dig","Dignitas","www.fb.com/fnatik","www.twitter.com/fnatik","www.fnatic.com","In the 2014 Spring Split, Fnatic saw monumental successes and failures, but ended on a high-note, taking first place for the third split in a row. Following a humbling performance at All-Star, only defeating TPA, Fnatic will take plenty of lessons into the summer split.", "http://localhost/esms/public/uploads/asd2412.jpg", "EU"),
    ("CLG","Counter Logic Gamming","www.fb.com/fnatik","www.twitter.com/fnatik","www.fnatic.com","In the 2014 Spring Split, Fnatic saw monumental successes and failures, but ended on a high-note, taking first place for the third split in a row. Following a humbling performance at All-Star, only defeating TPA, Fnatic will take plenty of lessons into the summer split.", "http://localhost/esms/public/uploads/asd2412.jpg", "EU");


INSERT INTO `esms_players` (userID,name,last_name,nick,teamID,avatar,bio,country,facebook,twitter,website) VALUES
    (1,"Enrique","Mendez","xPeke",1, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Spain","fb.com/123123","tw.com/123213","www.fntic.com"), 
    (2,"Soz","Perez","sOAZ",1, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Spain","fb.com/123123","tw.com/123213","www.fntic.com"), 
    (3,"YEz","Zerez","YellOwStaR",1, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Spain","fb.com/123123","tw.com/123213","www.fntic.com"), 
    (4,"Cy","Cijaez","Cyanide",1, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Spain","fb.com/123123","tw.com/123213","www.fntic.com"), 
    (5,"Rek","Perez","Rekkles",1, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Sweedish","fb.com/123123","tw.com/123213","www.fntic.com"), 
    (6,"Corki","Nami","puzu",1, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Spain","fb.com/123123","tw.com/123213","www.fntic.com"), 
    (7,"Weed","Master","Darien",2, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Russia","fb.com/123123","tw.com/123213","www.gmb.com"), 
    (8,"Lee Sin","Evelyn","Diamond",2, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Russia","fb.com/123123","tw.com/123213","www.gmb.com"), 
    (9,"Alex","Ichatovin","AlexIch",2, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Russia","fb.com/123123","tw.com/123213","www.gmb.com"), 
    (10,"Caitlyn","Lucian","Genja",2, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Russia","fb.com/123123","tw.com/123213","www.gmb.com"), 
    (11,"Thresh","Annie","EdWard",2, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","Russia","fb.com/123123","tw.com/123213","www.gmb.com"), 
    (12,"Daerek","Hart","LemonNation",3, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (13,"Zachary","Scuderi","Sneaky",3, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (14,"William","Hartman","Meteos",3, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (15,"An","Le","Balls",3, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (16,"Hai","Hai","Lam",3, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (17,"Darshan","ZionSpartan","Upadhyaha",4, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (18,"Alberto","Rengifo","Crumbzz",4, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (19,"Danny","Le","Shiphtur",4, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (20,"Michael","Santana","Imaqtpie",4, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (21,"Alan","Nguyen","KiWiKid",4, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (22,"Yiliang","Peng","Doublelift",5, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (23,"Zaqyeru","Black","Aphromoo",5, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (24,"Austin","Shin","Link",5, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"),
    (25,"Marcel","Fledkamp","dexter",5, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com"), 
    (26,"Shin","Woo-Yeong","Seraph",5, "http://localhost/esms/public/uploads/asd2412.jpg", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500","USA","fb.com/123123","tw.com/123213","www.c9.com");


ALTER TABLE `esms_teams` MODIFY COLUMN `captain`  bigint(12) NOT NULL AFTER `name`;