        $params = [
                        'search' => [
                                        'name' => $data['search']
                        ],
                        //'limit' => 50,
                        'selectHosts' => [
                                        "hostid",
                                        "host",
                                        "name"
                        ],
                        'output' => ['name', 'graphid','hosts'],
                        'expandName' => true,
                        'templated' => false,
                        'searchByAny' => true
        ];

        $db_graph = API::Graph()->get($params);

        $viewCount = count($db_graph);

        $table = (new CTableInfo())
                        ->setHeader([
                                        _('Graphs'),
                                        _('Host name'),
                                        _('Visible name')
                        ]);

        foreach ($db_graph as $tnum => $graph) {
                        if (isset($graph['graphid'])) {
                                        $graphs_link = new CLink($graph['name'], 'charts.php?graphid='.$graph['graphid']);
                                        $hosts_link = new CLink($graph['hosts'][0]['host'], 'hosts.php?form=update&hostid='.$graph['hosts'][0]['hostid']);
                                        $hosts_visible_link = new CLink($graph['hosts'][0]['name'], 'hosts.php?form=update&hostid='.$graph['hosts'][0]['hostid']);

                                        $table->addRow([
                                                        $graphs_link,
                                                        $hosts_link,
                                                        $hosts_visible_link
                                        ]);
                        }
        }

        $widgets[] = (new CCollapsibleUiWidget(WIDGET_SEARCH_TEMPLATES, $table))
		                ->addClass(ZBX_STYLE_DASHBRD_WIDGET_FLUID)
                        ->setExpanded((bool) CProfile::get('web.search.hats.'.WIDGET_SEARCH_TEMPLATES.'.state', true))
                        ->setHeader(_('Graphs'), [], false, 'search.php')
                        ->setFooter(new CList([_s('Displaying %1$s of %2$s found', $viewCount, count($db_graph))]));
