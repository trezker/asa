Since it took me a while to get this.
To get into a password protected mysql db.

export MYSQL_PWD=thepassword
sqitch deploy target_name

Given that the target has been configured like 
uri = db:mysql://root:@localhost/dbname
Use the sqitch-target tool
