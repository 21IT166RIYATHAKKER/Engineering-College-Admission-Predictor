CREATE TABLE colleges (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	branch VARCHAR(255) NOT NULL,
	intake INT(11) NOT NULL,
	cutoff INT(11) NOT NULL,
	PRIMARY KEY (id)
);
INSERT INTO colleges (name, branch,intake, cutoff) 
VALUES ('CSPIT', 'Mechanical Engineering',68, 14000),
('CSPIT', 'Computer Engineering',135, 2871),
('CSPIT', 'Electrical Engineering',34, 18000),
('CSPIT', 'Computer Science and Engineering',68, 2176),
('CSPIT', 'Information Technology Engineering',135, 4265),
('CSPIT', 'AI & ML',68, 6734);
CREATE TABLE feedback (
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	message VARCHAR(255) NOT NULL
);