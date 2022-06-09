<?php
/**
 *
 * MyBB: Dim - Admin CP
 *
 * Filename: style.php
 *
 * Style Author: Wage & Vintagedaddyo
 *
 * W Site: http://community.mybb.com/user-78269.html
 * V Site: http://community.mybb.com/user-6029.html
 *
 * MyBB Version: 1.8.x
 *
 * Style Version: 1.0
 * 
 */

// Disallow direct access to this file for security reasons

if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

class Page extends DefaultPage
{
	function _generate_breadcrumb()
	{
		if(!is_array($this->_breadcrumb_trail))
		{
			return false;
		}
		$trail = "";
		foreach($this->_breadcrumb_trail as $key => $crumb)
		{
			if($this->_breadcrumb_trail[$key+1])
			{
				$trail .= "<a href=\"".$crumb['url']."\">".$crumb['name']."</a>";
				if($this->_breadcrumb_trail[$key+2])
				{
					$trail .= " &raquo; ";
				}
			}
			else
			{
				$trail .= " &raquo; <span class=\"active\">".$crumb['name']."</span>";
			}
		}
		return $trail;
	}

	/**
	 * Output the page footer.
	 */
	
	function output_footer($quit=true)
	{
		global $mybb, $maintimer, $db, $lang, $plugins;

		$args = array(
			'this' => &$this,
			'quit' => &$quit,
		);

		$plugins->run_hooks("admin_page_output_footer", $args);

		$memory_usage = get_friendly_size(get_memory_usage());

		$totaltime = format_time_duration($maintimer->stop());
		$querycount = $db->query_count;

		if(my_strpos(getenv("REQUEST_URI"), "?"))
		{
			$debuglink = htmlspecialchars_uni(getenv("REQUEST_URI")) . "&amp;debug=1#footer";
		}
		else
		{
			$debuglink = htmlspecialchars_uni(getenv("REQUEST_URI")) . "?debug=1#footer";
		}

		echo "			</div>\n";
		echo "		</div>\n";
		echo "	<br style=\"clear: both;\" />";
		echo "	<br style=\"clear: both;\" />";
		echo "	</div>\n";
		//echo "<div id=\"footer\"><p class=\"generation\">".$lang->sprintf($lang->generated_in, $totaltime, $debuglink, $querycount, $memory_usage)."</p><p class=\"powered\">Powered By <a href=\"http://www.mybb.com/\" target=\"_blank\">MyBB</a>, &copy; 2002-".COPY_YEAR." <a href=\"http://www.mybb.com/\" target=\"_blank\">MyBB Group</a>.</p></div>\n";
		echo "<div id=\"footer\"><p class=\"generation\">".$lang->sprintf($lang->generated_in, $totaltime, $debuglink, $querycount, $memory_usage)."</p><p class=\"powered\">Powered By <a href=\"http://www.mybb.com/\" target=\"_blank\">MyBB</a>, &copy; 2002-".COPY_YEAR." <a href=\"http://www.mybb.com/\" target=\"_blank\">MyBB Group</a> All Rights Reserved.&nbsp;&nbsp;Theme \"Dim ACP\" created by <a href=\"http://community.mybb.com/user-6029.html\" target=\"_blank\"><b>Vintagedaddyo</b></a>&nbsp;&amp;&nbsp;<a href=\"http://community.mybb.com/user-78269.html\" target=\"_blank\"><b>Wage</b></a>.</p></div>\n";
		if($mybb->debug_mode)
		{
			echo $db->explain;
		}
		echo "</div>\n";
		echo "</body>\n";
		echo "</html>\n";

		if($quit != false)
		{
			exit;
		}
	}
}

class SidebarItem extends DefaultSidebarItem
{
}

class PopupMenu extends DefaultPopupMenu
{
}

class Table extends DefaultTable
{
}

class Form extends DefaultForm
{
}

class FormContainer extends DefaultFormContainer
{
}
