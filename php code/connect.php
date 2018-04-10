<?php
$db= new PDO("mysql:dbname=innoattendance;host=localhost","root","") or die("cant connect");
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

//Users table creation.
try{
		
	$sql="DROP TABLE IF EXISTS users;";
	$db->exec($sql);
	
	$sql="CREATE TABLE users(id VARCHAR(255) NOT NULL,
									name VARCHAR(255) NOT NULL,
									surname VARCHAR(255) NOT NULL,
									email  VARCHAR(255) NOT NULL,
									password VARCHAR(255) NOT NULL,
									status VARCHAR(20) NOT NULL,
									PRIMARY KEY(id));";
	$db->exec($sql);								
	print("Users table created successfully.</br>");
}
catch(PDOException $e){
	echo $e->getMessage(); 
}

//groups table creation.
try{
	$sql="DROP TABLE IF EXISTS groups;";
	$db->exec($sql);
	$sql="CREATE TABLE groups(id VARCHAR(255) NOT NULL,
									PRIMARY KEY(id))";
	$db->exec($sql);								
	print("Groups table created successfully.</br>");
}
catch(PDOException $e){
	echo $e->getMessage(); 
}

//in_group table creation.
try{
	$sql="DROP TABLE IF EXISTS in_group;";
	$db->exec($sql);	
	$sql="CREATE TABLE in_group (student_id VARCHAR(255) NOT NULL,
									group_id VARCHAR(255) NOT NULL,
									PRIMARY KEY (student_id,group_id) );";
	$db->exec($sql);								
	print("In_group table created successfully.</br>");
}
catch(PDOException $e){
	echo $e->getMessage(); 
}

//Subjects table creation.
try{
	$sql="DROP TABLE IF EXISTS events;";
	$db->exec($sql);
	
	$sql="DROP TABLE IF EXISTS classes;";
	$db->exec($sql);
	
	$sql="DROP TABLE IF EXISTS courses;";
	$db->exec($sql);	
	
	$sql="DROP TABLE IF EXISTS subjects;";
	$db->exec($sql);	
	
	$sql="CREATE TABLE subjects(id INT,
									name VARCHAR(255) NOT NULL,
									PRIMARY KEY(id) );";
	$db->exec($sql);								
	print("Subjects table created successfully.</br>");
}
catch(PDOException $e){
	echo $e->getMessage(); 
}

//Courses table creation.
try{	
	$sql="CREATE TABLE courses(id INT NOT NULL, 
									name VARCHAR(255) NOT NULL, 
									year INT NOT NULL,
									subject INT NOT NULL,
									PRIMARY KEY(id),
									FOREIGN KEY(subject) REFERENCES subjects(id) ON DELETE CASCADE);";
	$db->exec($sql);								
	print("Courses table created successfully.</br>");
}
catch(PDOException $e){
	echo $e->getMessage(); 
}

//Classes table creation.
try{	
	
	$sql="CREATE TABLE classes(id INT NOT NULL,
									name VARCHAR(255) NOT NULL,
									professor VARCHAR(255) NOT NULL,
									course INT NOT NULL,
									PRIMARY KEY(id),
									FOREIGN KEY(course) REFERENCES courses(id) ON DELETE CASCADE);";
	$db->exec($sql);								
	print("Classes table created successfully.</br>");
}
catch(PDOException $e){
	echo $e->getMessage(); 
}

//In_class table creation.
try{	
	$sql="DROP TABLE IF EXISTS in_class;";
	$db->exec($sql);
	
	$sql="CREATE TABLE in_class (class_id INT NOT NULL,
									group_id VARCHAR(255) NOT NULL,
									PRIMARY KEY(class_id,group_id));";
	$db->exec($sql);								
	print("In_class table created successfully.</br>");
}
catch(PDOException $e){
	echo $e->getMessage(); 
}

//Events table creation.
try{	
	
	$sql="CREATE TABLE events (id INT NOT NULL,
									class INT NOT NULL,
									place VARCHAR(255) NOT NULL,
									attended VARCHAR(255) NOT NULL,
									date VARCHAR(255) NOT NULL, 
									PRIMARY KEY(id),
									FOREIGN KEY (class) REFERENCES classes(id) ON DELETE CASCADE);";
	$db->exec($sql);								
	print("Events table created successfully.</br>");
}
catch(PDOException $e){
	echo $e->getMessage(); 
}

?>