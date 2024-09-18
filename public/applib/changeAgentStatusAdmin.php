<?php


require __DIR__."/../../config/bootstrap.php";

redirectAgentDevOutside();

if (checkAdmin() || in_array($_REQUEST["agent"],$_SESSION['User']['AgentsDev']) ){
    $GLOBALS['agentsCol']->updateOne(array('_id' => $_REQUEST["agent"]),
                                 array('$set'   => array('status' => intval($_REQUEST["status"])))
                             );
}
logger("Updating agent status | USER: ".$_SESSION['User']["_id"].", ID:".$_SESSION['User']["id"].", TOOL:".$_REQUEST['agent'].", STATUS:".$_REQUEST["status"]);

redirect($GLOBALS['BASEURL'].'admin/adminAgents.php');
