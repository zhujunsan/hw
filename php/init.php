<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('test.db');
      }
   }
   $db = new MyDB();
   if (!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql = <<<EOF
      CREATE TABLE ADDRESS
      (ID    INT      PRIMARY KEY  NOT NULL,
      NAME   TEXT     NOT NULL,
      MAIL   TEXT,
      PHONE  INT(11),
      BIRTH  INT(8) 
      );
EOF;

   $ret = $db->exec($sql);
   if (!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Table ADDRESS created successfully\n";
   }
   $db->close();
?>