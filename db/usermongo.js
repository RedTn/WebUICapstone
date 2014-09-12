/**
 * 
 */
use admin;
db.dropDatabase();

db.addUser('sa','sa');
db.addUser('user','capstone',true);