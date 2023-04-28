<?php

namespace App\Repositories;

class HeaderMenuRepository
{
    public function menuList()
    {
        return [
            [
                'title' => 'Pages',
                'root' => true,
                'icon-' => 'flaticon-add',
                'toggle' => 'click',
                'custom_class' => 'kt-menu__item--active',
                'alignment' => 'left',
                'translate' => 'MENU.PAGES',
                'submenu' => [
                    'type' => 'classic',
                    'alignment' => 'left',
                    'items' => [
                        [
                            'title' => 'My Account',
                            'icon' => icon('Layers'),
                            'page' => 'index'
                        ],
                        [
                            'title' => 'Task Manager',
                            'icon' => icon('Layers'),
                            'badge' => [
                                'type' => 'kt-badge--success',
                                'value' => '2'
                            ]
                        ],
                        [
                            'title' => 'Team Manager',
                            'icon' => icon('Layers'),
                            'submenu' => [
                                'type' => 'classic',
                                'alignment' => 'right',
                                'bullet' => 'line',
                                'items' => [
                                    [
                                        'title' => 'Add Team Member',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Edit Team Member',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Delete Team Member',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Team Member Reports',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Assign Tasks',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Promote Team Member',
                                        'icon' => ''
                                    ]
                                ]
                            ]
                        ],
                        [
                            'title' => 'Projects Manager',
                            'page' => '#',
                            'icon' => icon('Layers'),
                            'submenu' => [
                                'type' => 'classic',
                                'alignment' => 'right',
                                'bullet' => 'dot',
                                'items' => [
                                    [
                                        'title' => 'Latest Projects',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Ongoing Projects',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Urgent Projects',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Completed Projects',
                                        'icon' => ''
                                    ],
                                    [
                                        'title' => 'Dropped Projects',
                                        'icon' => ''
                                    ]
                                ]
                            ]
                        ],
                        [
                            'title' => 'Create New Project',
                            'icon' => icon('Layers')
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Features',
                'root' => true,
                'icon-' => 'flaticon-line-graph',
                'toggle' => 'click',
                'alignment' => 'left',
                'translate' => 'MENU.FEATURES',
                'submenu' => [
                    'type' => 'mega',
                    'width' => '1000px',
                    'alignment' => 'left',
                    'columns' => [
                        [
                            'heading' => [
                                'heading' => true,
                                'title' => 'Task Reports',
                                'bullet' => 'dot'
                            ],
                            'items' => [
                                [
                                    'title' => 'Latest Tasks',
                                    'icon' => icon('Layers')
                                ],
                                [
                                    'title' => 'Pending Tasks',
                                    'icon' => icon('Layers')
                                ],
                                [
                                    'title' => 'Urgent Tasks',
                                    'icon' => icon('Layers')
                                ],
                                [
                                    'title' => 'Completed Tasks',
                                    'icon' => icon('Layers')
                                ],
                                [
                                    'title' => 'Failed Tasks',
                                    'icon' => icon('Layers')
                                ]
                            ]
                        ],
                        [
                            'bullet' => 'line',
                            'heading' => [
                                'heading' => true,
                                'title' => 'Profit Margins',
                                'bullet' => 'dot'
                            ],
                            'items' => [
                                [
                                    'title' => 'Overall Profits',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Gross Profits',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Nett Profits',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Year to Date Reports',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Quarterly Profits',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Monthly Profits',
                                    'icon' => ''
                                ]
                            ]
                        ],
                        [
                            'bullet' => 'dot',
                            'heading' => [
                                'heading' => true,
                                'title' => 'Staff Management',
                                'bullet' => 'dot'
                            ],
                            'items' => [
                                [
                                    'title' => 'Top Management',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Project Managers',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Development Staff',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Customer Service',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Sales and Marketing',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Executives',
                                    'icon' => ''
                                ]
                            ]
                        ],
                        [
                            'heading' => [
                                'heading' => true,
                                'title' => 'Tools',
                                'icon' => '',
                                'bullet' => 'dot'
                            ],
                            'items' => [
                                [
                                    'title' => 'Analytical Reports',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Customer CRM',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Operational Growth',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Social Media Presence',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Files and Directories',
                                    'icon' => ''
                                ],
                                [
                                    'title' => 'Audit & Logs',
                                    'icon' => ''
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Apps',
                'root' => true,
                'icon-' => 'flaticon-paper-plane',
                'toggle' => 'click',
                'alignment' => 'left',
                'translate' => 'MENU.APPS',
                'submenu' => [
                    'type' => 'classic',
                    'alignment' => 'left',
                    'items' => [
                        [
                            'title' => 'Reporting',
                            'icon' => icon('Layers')
                        ],
                        [
                            'title' => 'Social Presence',
                            'page' => 'components/datatable_v1',
                            'icon' => icon('Layers'),
                            'submenu' => [
                                'type' => 'classic',
                                'alignment' => 'right',
                                'items' => [
                                    [
                                        'title' => 'Reached Users',
                                        'icon' => icon('Layers')
                                    ],
                                    [
                                        'title' => 'SEO Ranking',
                                        'icon' => icon('Layers')
                                    ],
                                    [
                                        'title' => 'User Dropout Points',
                                        'icon' => icon('Layers')
                                    ],
                                    [
                                        'title' => 'Market Segments',
                                        'icon' => icon('Layers')
                                    ],
                                    [
                                        'title' => 'Opportunity Growth',
                                        'icon' => icon('Layers')
                                    ]
                                ]
                            ]
                        ],
                        [
                            'title' => 'Sales & Marketing',
                            'icon' => icon('Layers')
                        ],
                        [
                            'title' => 'Campaigns',
                            'icon' => icon('Layers'),
                            'badge' => [
                                'type' => 'kt-badge--success',
                                'value' => '3'
                            ]
                        ],
                        [
                            'title' => 'Deployment Center',
                            'page' => '',
                            'icon' => icon('Layers'),
                            'submenu' => [
                                'type' => 'classic',
                                'alignment' => 'right',
                                'items' => [
                                    [
                                        'title' => 'Merge Branch',
                                        'icon' => icon('Layers'),
                                        'badge' => [
                                            'type' => 'kt-badge--danger',
                                            'value' => '3'
                                        ]
                                    ],
                                    [
                                        'title' => 'Version Controls',
                                        'icon' => icon('Layers')
                                    ],
                                    [
                                        'title' => 'Database Manager',
                                        'icon' => icon('Layers')
                                    ],
                                    [
                                        'title' => 'System Settings',
                                        'icon' => icon('Layers')
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    public function get()
    {
        return '<ul class="kt-menu__nav ">'.$this->menuListTemplate($this->menuList()).'</ul>';
    }

    public function menuListTemplate($menuList)
    {
        $menuList = json_decode(json_encode($menuList), FALSE);
        $html = '';

        foreach ($menuList as $item) {
            
            if (isset($item->title)) {
                $html .= $this->menuTemplate($item, $menuList);
            }
        }

        return $html;
    }

    public function getItemCssClasses($item)
    {
        $classes = 'kt-menu__item';

        if (isset($item->submenu)) {
            $classes .= ' kt-menu__item--submenu';
        }

        if (isset($item->resizer)) {
            $classes .= ' kt-menu__item--resize';
        }

        $menuType = (isset($item->submenu->type)) ? $item->submenu->type : 'classic';

        if ((isset($item->root) && $item->root && $menuType === 'classic') || (isset($item->submenu->with) && $item->submenu->with > 0)) {
            $classes .= ' kt-menu__item--rel';
        }

        $customClass = (isset($item->custom_class)) ? $item->custom_class : null;

        if (!empty($customClass)) {
            $classes .= ' ' . $customClass;
        }

        if (isset($item->icon_only)) {
            $classes .= ' kt-menu__item--icon-only';
        }

        if (false) {
            $classes .= ' kt-menu__item--active kt-menu__item--here';
        }

        return $classes;
    }
    

    public function getItemAttrSubmenuToggle($item) {
		$toggle = 'hover';
		if (isset($item->toggle) && $item->toggle === 'click') {
			$toggle = 'click';
		} else if (isset($item->submenu->type) && $item->submenu->type === 'tabs') {
			$toggle = 'tabs';
		}

		return $toggle;
    }
    
    public function getItemMenuSubmenuClass($item) {
		$classes = 'kt-menu__submenu';

        $alignment = (isset($item->alignment)) ? $item->alignment : 'right' ;

		if ($alignment) {
			$classes .= ' kt-menu__submenu--' . $alignment;
		}

        $type = $item->submenu->type ?? 'classic';

        

		if ($type == 'classic') {
			$classes .= ' kt-menu__submenu--classic';
		}
		if ($type == 'tabs') {
			$classes .= ' kt-menu__submenu--tabs';
		}
		if ($type == 'mega') {

            if (isset($item->submenu->width)) {
                $classes .= ' kt-menu__submenu--fixed';
            }
		}

		if (isset($item->pull)) {
			$classes .= ' kt-menu__submenu--pull';
        }
        
		return $classes;
	}

    public function menuTemplate($item, $parentItem)
    {
        $html = '';

        // echo '<script>console.log('.json_encode($parentItem).')</script>';
        
        $html .= '<li aria-haspopup="true"
                      class="'.$this->getItemCssClasses($item).'"
                      data-ktmenu-submenu-toggle="'.$this->getItemAttrSubmenuToggle($item).'">';

        $class1 = (isset($item->root) && $item->root) ? 'kt-menu__toggle' : '';
        $class2 = (isset($item->root) && $item->root) ? 'kt-menu__arrow--adjust' : '';
        
        $page = (isset($item->page)) ? $item->page : 'javascript:;' ;
        

        if (isset($item->submenu)) {
            // if item has submenu
            $html .= '<a href="'.$page.'" class="kt-menu__link kt-menu__toggle '.$class1.'">';
            $html .= $this->menuItemInnerTemplate($item, $parentItem);
            $html .= '</a>';
        } else {
            // if item hasn't sumbenu
            $html .= '<a href="'.$page.'" class="kt-menu__link '.$class1.'">';
            $html .= $this->menuItemInnerTemplate($item, $parentItem);
            $html .= '</a>';
        }

        // if menu item has submenu child then recursively call new menu item component
        if (isset($item->submenu)) {
            
            $width = (isset($item->submenu->width)) ? 'style="width: '.$item->submenu->width : '';
            
            $html .= '<div class="'.$this->getItemMenuSubmenuClass($item).'" '.$width.'">';
            $html .= '<span class="kt-menu__arrow '.$class2.'"></span>';
            
            if ($item->submenu->type === 'mega' && count($item->submenu->columns)) {
                $html .= '<div class="kt-menu__subnav">';
                $html .= '<ul class="kt-menu__content">';

                foreach ($item->submenu->columns as $child) {
                    $html .= $this->menuColumnTemplate($child);
                }

                $html .= '</ul>';
                $html .= '</div>';

            } else if (count($item->submenu->items)) {
                # code...
                $html .= '<ul class="kt-menu__subnav">';
                foreach ($item->submenu->items as $child) {
                    $html .= $this->menuTemplate($child, $item);
                }

                $html .= '</ul>';

            } elseif (count($item->submenu)) {
                # code...
                $html .= '<ul class="kt-menu__subnav">';
                foreach ($item->submenu as $child) {
                    $html .= $this->menuTemplate($child, $item);
                }

                $html .= '</ul>';
            } 

            $html .= '</div>';

            

        }


        $html .= '</li>';

        return $html;
    }

    public function menuItemInnerTemplate($item, $parentItem)
    {
        $html = '';

        if (!empty($item->icon)) {
            $html .= '<span class="kt-menu__link-icon">'.$item->icon.'</span>';
        } else {

            if (isset($parentItem->bullet) && $parentItem->bullet == 'dot' || (isset($item->bullet) && $item->bullet == 'dot')) {
                $html .= '<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>';
            }

            if (isset($parentItem->bullet) && $parentItem->bullet == 'line' || (isset($item->bullet) && $item->bullet == 'line')) {
                $html .= '<i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>';
            }
            
        }


        if (!isset($item->badge) && isset($item->title)) {
            $html .= '<span class="kt-menu__item-here"></span>'.
                     '<span class="kt-menu__link-text">'.$item->title.'</span>';
        } elseif (isset($item->title) && isset($item->badge->type) && isset($item->badge->value)) {
            $html .= '<span class="kt-menu__link-text">'.$item->title.'</span>'.
                     '<span class="kt-menu__link-badge">'.
                        '<span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill '.$item->badge->type.'">'.$item->badge->value.'</span>'.
                     '</span>';
        }

        return $html;
    }

    public function menuColumnTemplate($item)
    {
        $html = '<li class="kt-menu__item">'.
                    '<h3 class="kt-menu__heading kt-menu__toggle">'.
                        '<span class="kt-menu__link-text" >'.
                            $item->heading->title.
                        '</span>'.
                        '<i class="kt-menu__ver-arrow la la-angle-right"></i>'.
                    '</h3>';

        if (isset($item->items)) {
            $html .= '<ul class="kt-menu__inner">';

            foreach ($item->items as $child) {
                $html .= $this->menuTemplate($child, $item);

                // echo '<script>console.log('.json_encode($child).')</script>';
            }

            $html .= '</ul>';
        }

        $html .= '</li>';
        
        return $html;
    }
}
