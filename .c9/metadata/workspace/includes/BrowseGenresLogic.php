{"filter":false,"title":"BrowseGenresLogic.php","tooltip":"/includes/BrowseGenresLogic.php","undoManager":{"mark":9,"position":9,"stack":[[{"start":{"row":6,"column":0},"end":{"row":10,"column":0},"action":"insert","lines":["include 'includes/config.php';","","","$dataObj = DataAccess::setConnectionInfo(Array(\"host\"=>\"DBHOST\", \"database\"=>\"DBNAME\", \"user\"=>\"DBUSER\", \"pass\"=>\"DBPASS\", \"charset\"=>\"DBCHAR\"));",""],"id":2}],[{"start":{"row":10,"column":0},"end":{"row":14,"column":23},"action":"remove","lines":["","","$dataAccess = new DataAccess();","","$dataAccess->connect();"],"id":5}],[{"start":{"row":9,"column":145},"end":{"row":10,"column":0},"action":"remove","lines":["",""],"id":6}],[{"start":{"row":9,"column":145},"end":{"row":10,"column":0},"action":"remove","lines":["",""],"id":7}],[{"start":{"row":12,"column":21},"end":{"row":12,"column":32},"action":"remove","lines":["$dataAccess"],"id":8},{"start":{"row":12,"column":21},"end":{"row":12,"column":29},"action":"insert","lines":["$dataObj"]}],[{"start":{"row":12,"column":30},"end":{"row":12,"column":39},"action":"remove","lines":[">getPDO()"],"id":9}],[{"start":{"row":12,"column":29},"end":{"row":12,"column":30},"action":"remove","lines":["-"],"id":10}],[{"start":{"row":14,"column":0},"end":{"row":15,"column":0},"action":"remove","lines":["",""],"id":11}],[{"start":{"row":13,"column":0},"end":{"row":14,"column":0},"action":"remove","lines":["",""],"id":12}],[{"start":{"row":9,"column":145},"end":{"row":10,"column":0},"action":"remove","lines":["",""],"id":13}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":13,"column":27},"end":{"row":13,"column":27},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1479028732866,"hash":"ebb9ea71704bac1d3f21ea0c822b765503909aaa"}