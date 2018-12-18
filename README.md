# zabbix-search-graph
Zabbix modding search for graphs name

# Support

I tested this code only with Zabbix 4.0.2

# Install

For install this mod you need edit file search.php (default you can found in this "/usr/share/zabbix/search.php"). Addet all code from file zabbix-search-graph.php (it is in this repositorie) in the end of the search.php before this lines:

  (new CWidget())
		->setTitle(_('Search').':'.SPACE.$search)
		->addItem(new CDiv($widgets))
		->show();

  require_once dirname(__FILE__).'/include/page_footer.php';
