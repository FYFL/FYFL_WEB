<?PHP
require_once(__DIR__ . "/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('www.fyflnetwork.org/4hbadges');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('fyfladmn@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'fyfl-3.fyflnetwork.org',
                      /*username*/'szk0050',
                      /*password*/'Stoneware!',
                      /*database name*/'FYFL-3',
                      /*table name*/'people3');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>
