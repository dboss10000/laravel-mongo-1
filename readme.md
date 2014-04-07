Laravel mongodb demo application.

Read, Update, Delete Application with following dataset:

{ "_id" : ObjectId("52733912a3e4852b01b7acd9"), "uid" : 5650, "networks" : [ { "nid" : 1, "n_name"
: "home", "n_ip" : "1.2.3.4", "n_status" : 1 }, { "nid" : 3, "n_name" : "work", "n_ip" : "8.8.8.8",
"n_status" : 0 } ], "hostnames" : [ { "hostname" : "ip.unotelly.com", "block" : 1 }, { "hostname" :
"nba.com", "block" : 0 }, { "hostname" : "facebook.com", "block" : 1 } ] }

User Inputs:
uid int
,
networks {
nid int
n_name varchar
n_ip varchar
n_status boolean
},
hostnames {
hostname: varchar
block: boolean
}
