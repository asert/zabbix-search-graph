# zabbix-search-graph
Zabbix mod search for graphs name

# Support

I tested this code with Zabbix 4.0.x, Zabbix 4.2.x, Zabbix 4.4.x

# Install

For install this mod you need edit file **search.php**.

For **Zabbix 4.0.x** added code from file zabbix-v4.0.x-search-graph.php in the end of the file **/usr/share/zabbix/search.php** before these lines:
```
  (new CWidget())
		->setTitle(_('Search').':'.SPACE.$search)
		->addItem(new CDiv($widgets))
		->show();

  require_once dirname(__FILE__).'/include/page_footer.php';
```
For **Zabbix 4.2.x** or later added from file zabbix-v4.x.x-search-graph.php (x.x - you need to use your version) in the end of the file **/usr/share/zabbix/app/views/search.php** before:
```
(new CWidget())
        ->setTitle(_('Search').': '.$data['search'])
        ->addItem(new CDiv($widgets))
        ->show();
```
*P.S. The mode for zabbix 4.2 for good practice need use two files (/usr/share/zabbix/app/controllers/CControllerSearch.php and /usr/share/zabbix/app/views/search.php). I think it is not a good idea to change both of them.*
