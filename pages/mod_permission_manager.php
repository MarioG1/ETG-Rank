<?php

#####################################################
# PermissionsExGui CraftBukkit plugin
#
# Author: NINJ4
# Contributor: Pirmax
# Version: 1.0
# Help: http://pirmax.github.com/PermissionsExGUI/
#####################################################

include("./incl/pexgui.config.php");

if(!($player->get_current_rank() == 'admin' || $player->get_current_rank() == 'owner'))
{
        die("Security Error.");
}

$groups_ary = loadGroups( $mcConn );

//wipeX_header();

?>


<!-- WIPEX by NINJ4. For more information, visit SoftSlayer.com -->
<link rel="stylesheet" type="text/css" href="./images/stylesheet.css" />
<div class="wipex-panel">
        <script type="text/javascript" src="./bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="./bootstrap/js/fonctions.js"></script>
        <div class="finishedOps">
                <div class="inner"><span class="corners-top"><span></span></span>
                        <p class="finishedOps" id="OpsTitle"><h2 id="OpsTitle">Operations Pending:</h2></p>
                        <p class="finishedOps" id="OpsContent"></p>
                        <hr>
                        <div align="right"><span id="submitLoading"></span><a href="javascript:void(0)" class="action ClearPending">Clear Pending Operations</a>&nbsp;<a href="javascript:void(0)" class="action Submit">Apply Changes</a></div>
                <span class="corners-bottom"><span></span></span></div>
        </div>
        <div class="wipex-topbar" align="center">
        <div style="width: 100%; height: 80px; text-align: left; font-family: calibri;">
        <div style="float: right; width: 250px; text-align: right;"><a href="javascript:void(0)" id="showLogs" class="action loadLogs">Show the history of actions</a><?php if(SECURITY_MODULE == 'login-form') { ?><br /><a href="index.php?logout" id="logOut" class="action logOut">Logout manager</a><?php } ?></div>
        <h1 style="margin: 0; padding: 0;">PermissionsExGui</h1>
        <h4 style="margin: 0; padding: 0; display:">Graphical User Interface for CraftBukkit plugin PermissionsEx</h4>
        <h4 style="margin: 0; padding: 0;"><span style="font-size: 80%; color: #FFFFFF;">Previously &#171; wipeX &#187; (produced by NINJ4) &amp; Rebuilt by <a href="http://twitter.com/pirmax" target="_blank" style="text-decoration: underline; color: #FFFFFF;">Pirmax</a> &amp; updated to new Jquery libary by MarioG1</span></h4>
        </div>
        <div class="wipex-container hidden" id="Show">
                <form id="">
                        <table class="wipex-logs" cellspacing="0px">
                                <thead class="logHead">
                                        <tr>
                                                <th>Timestamp</th>
                                                <th>User</th>
                                                <th>Action</th>
                                                <th></th>
                                        </tr>
                                </thead>
                                <tbody class="logs-rows">
                                </tbody>
                        </table>
                        <b><div class="logLoader">
                                        Click to load more logs...
                        </div></b>
                        <div align="right">With Selected:
                                <select id="logAction">
                                        <option value="-1">------------------</option>
                                        <option value="undo">Undo Actions</option>
                                </select>
                        </div>
                </form>
        </div>
        <div class="wipex-container" id="Hide">
                <table class="wipex">
                        <thead>
                                <tr>
                                        <th width="30%">Groups</th>
                                        <th width="30%">Permissions</th>
                                        <th width="30%">Members</th>
                                </tr>
                        </thead>
                        <tr class="selectors">
                                <td>
                                        <select id="column1" name="GroupsList" multiple="multiple" size="20">
                                                <?php
                                                                foreach ( $groups_ary as $group_ary ) {
                                                                        echo "<option class='group' value='". $group_ary['name'] ."'"
                                                                        . ( ( $group_ary['default'] ) ? " style='background-color:yellow;'>Default Group: " : ">" )
                                                                        . $group_ary['name'] ."</option>\n";
                                                                }
                                                ?>
                                        </select>
                                </td>
                                <td>
                                        <select id="column2" name="DataList" multiple="multiple" size="20"></select>
                                </td>
                                <td>
                                        <select id="column3" name="DataList" multiple="multiple" size="20"></select>
                                </td>
                        </tr>
                        <tr>
                                <td class="wipex-info" id="col1Config">
                                        <div align="right" class="tdlink"><a href="javascript:void(0)" class="expand col1">&#171; Expand view &#187;</a></div>
                                        <div class="grpConfig slidePanel">Select the function to apply to the following groups:
                                                <b><div id="selectedGroups">
                                                </div></b>
                                                <a href="javascript:void(0)" id="remGrp" class="action Confirm col1">Remove Groups from Database</a>
                                        </div>
                                        <a href="javascript:void(0)" id="newGrp" class="action Ask col1">Create New Group</a>
                                </td>
                                <td class="wipex-info" id="col2Config">
                                        <div align="right" class="tdlink"><a href="javascript:void(0)" class="expand col2 hidden">&#171; Expand view &#187;</a></div>
                                        <div class="permsConfig slidePanel">Select the function to apply to the following nodes:
                                                <b><div id="selectedPerms">
                                                </div></b>
                                                <a href="javascript:void(0)" id="remPerm" class="action Do col2">Remove Permissions from Group</a>
                                        </div>
                                        <div class="rgAddItems" id="rgPermAdd">
                                                <p><a href="javascript:void(0)" id="addPerm" class="action Ask col2">Add Permissions to Group</a></p>
                                                <p><a href="javascript:void(0)" id="addParent" class="action Ask col2">Add Parents to Group</a></p>
                                                <p><a href="javascript:void(0)" id="setRank" class="action Pop col2">Set Group Rank</a></p>
                                                <p><a href="javascript:void(0)" id="setLadder" class="action Pop col2">Set Group Rank-Ladder</a></p>
                                        </div>
                                </td>
                                <td class="wipex-info" id="col3Config">
                                        <div align="right" class="tdlink"><a href="javascript:void(0)" class="expand col3 hidden">&#171; Expand view &#187;</a></div>
                                        <div class="memberConfig slidePanel">Select the function to apply to the following members:
                                                <b><div id="selectedMembers">
                                                </div></b>
                                                <a href="javascript:void(0)" id="remMem" class="action Do col3">Remove Members from Group</a>
                                        </div>
                                        <div class="rgAddItems" id="rgMemAdd">
                                                <a href="javascript:void(0)" id="addMem" class="action Ask col3">Add Members to Group</a>
                                        </div>
                                </td>
                        </tr>
                </table>
        </div>
        </div>
        <div class="input-overlay">
                <div class="overlay-content">
                        <p class="input-prompt">Please input the name(s) of the <span class="overlay-items"></span>s you would like to <span id="overlay-action">add to the Group</span>.<br />Please input one <span class="overlay-items"></span> per line</p>
                        <div><textarea class="input-area"></textarea></div>
                        <p><a href="javascript:void(0)" id="resetOverlay" class="action">Reset</a> &nbsp; <a href="javascript:void(0)" class="cancelOverlay action">Cancel</a> &nbsp; <a href="javascript:void(0)" id="" class="action AskSubmit">Submit</a></p>
                </div>
        </div>
        <div class="expand-overlay" align="center">
                <div class="expanded-content">
                                <h3 id="expanded-title"></h3>
                                <select id="colExpanded" multiple="multiple">
                                </select>
                                <p id="expandConfig"></p><br /><a href="javascript:void(0)" class="cancelOverlay action">Close Window</a>
                </div>
        </div>

        <div style="float: right; margin: 0; padding: 0; font-size: 75%; color: #333333;">Your version: 1.0 | Last version: 1.0</div>

        <span style="font-size: 75%; color: #333333; margin-left: 20px;">&copy 2012 PermissionsExGui - <a href="http://pirmax.github.com/PermissionsExGUI/" target="_blank">PermissionsExGUI on Github</a></span>

</div>