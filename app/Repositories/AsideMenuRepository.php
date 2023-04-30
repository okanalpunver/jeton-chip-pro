<?php

namespace App\Repositories;

class AsideMenuRepository
{
    public function menuList()
    {
        return [
            [
                'title' => 'Dashboard',
                'root' => true,
                'icon' => icon('Layers'),
                'page' => route('admin.dashboard.index'),
                'bullet' => 'dot',
                'active' => is_active('admin.dashboard.*'),
            ],

            ['section' => 'Yönetim'],

            [
                'title' => 'Admin Kullanıcılar',
                'root' => true,
                'icon' => icon('Group'),
                'page' => route('admin.admin.index'),
                'bullet' => 'dot',
                'active' => is_active(['admin.admin.*']),
            ],

            [
                'title' => 'Kullanıcılar',
                'root' => true,
                'icon' => icon('Group'),
                'page' => route('admin.admin.api.nestedUsers'),
                'bullet' => 'dot',
                'active' => is_active(['admin.admin.api.nestedUsers']),
            ],

            [
                'title' => 'Siparişler',
                'root' => true,
                'icon' => icon('Cart#2'),
                'page' => route('admin.order.index'),
                'bullet' => 'dot',
                'active' => is_active(['admin.order.*']),
            ],

            [
                'title' => 'Ödemeler',
                'root' => true,
                'icon' => icon('Wallet'),
                'page' => route('admin.payment.index'),
                'bullet' => 'dot',
                'active' => is_active(['admin.payment.*']),
            ],

            [
                'title' => 'Siteler',
                'root' => true,
                'icon' => icon('Globe'),
                'page' => route('admin.site.index'),
                'bullet' => 'dot',
                'active' => is_active(['admin.site.index', 'admin.site.create', 'admin.site.edit']),
            ],

            ['section' => 'Chip Alış'],

            [
                'title' => 'Alış Fiyatı',
                'root' => true,
                'icon' => icon('Cart#2'),
                'page' => route('admin.seller.buy'),
                'bullet' => 'dot',
                'active' => is_active(['admin.seller.buy']),
            ],
            [
                'title' => 'Satıcılar',
                'root' => true,
                'icon' => icon('Group'),
                'page' => route('admin.seller.index'),
                'bullet' => 'dot',
                'active' => is_active(['admin.seller.index', 'admin.seller.create', 'admin.seller.edit']),
            ],

            ['section' => 'Site Ayarları'],

            [
                'title' => 'Katalog',
                'root' => true,
                'bullet' => 'dot',
                'icon' => icon('Library'),
                'active' => is_active(['admin.site.product.*', 'admin.site.category.*']),
                'submenu' => [
                    [
                        'title' => 'Ürünler',
                        'page' => route('admin.site.product.index'),
                        'active' => is_active(['admin.site.product.*']),
                    ],
                    [
                        'title' => 'Ürün Kategorileri',
                        'page' => route('admin.site.category.index'),
                        'active' => is_active(['admin.site.category.*']),
                    ],
                ]
            ],

            [
                'title' => 'Sayfalar',
                'root' => true,
                'bullet' => 'dot',
                'icon' => icon('Selected-file'),
                'active' => is_active(['admin.site.bank-account.*', 'admin.site.news.*', 'admin.site.testimonial.*', 'admin.site.about.*']),
                'submenu' => [
                    [
                        'title' => 'Banka Hesapları',
                        'page' => route('admin.site.bank-account.index'),
                        'active' => is_active(['admin.site.bank-account.*']),
                    ],
                    [
                        'title' => 'Haberler',
                        'page' => route('admin.site.news.index'),
                        'active' => is_active(['admin.site.news.*']),
                    ],
                    [
                        'title' => 'Yorumlar',
                        'page' => route('admin.site.testimonial.index'),
                        'active' => is_active(['admin.site.testimonial.*']),
                    ],
                    [
                        'title' => 'Hakkımızda',
                        'page' => route('admin.site.about.edit', session()->get('site')),
                        'active' => is_active(['admin.site.about.*']),
                    ]
                ]
            ],


            [
                'title' => 'Ayarlar',
                'root' => true,
                'bullet' => 'dot',
                'icon' => icon('Settings-1'),
                'page' => route('admin.site.edit', session()->get('site')),
                'bullet' => 'dot',
                'active' => is_active(['admin.site.edit']),
            ]

        ];
    }

    public function get()
    {

        return '<ul class="kt-menu__nav ">' . $this->menuListTemplate($this->menuList()) . '</ul>';
    }

    public function menuListTemplate($menuList)
    {
        $menuList = json_decode(json_encode($menuList), FALSE);
        $html = '';

        foreach ($menuList as $child) {
            if (isset($child->section)) {
                $html .= $this->menuItemSectionTemplate($child);
            }

            if (isset($child->separator)) {
                $html .= $this->menuItemSeparatorTemplate();
            }

            if (isset($child->title)) {
                $html .= $this->menuItemTemplate($child, $menuList);
            }
        }

        return $html;
    }

    public function menuSubmenuTemplate($item)
    {
        $html = '<ul class="kt-menu__subnav">';

        foreach ($item->submenu as $child) {
            if (isset($child->section)) {
                $html .= $this->menuItemSectionTemplate($item);
            }

            if (isset($child->separator)) {
                $html .= $this->menuItemSeparatorTemplate();
            }

            if (isset($child->title)) {
                $html .= $this->menuItemTemplate($child, $item);
            }
        }

        return $html;
    }

    public function menuItemTemplate($item, $parentItem)
    {
        return $this->menuItemInnerTemplate($item, $parentItem);
    }

    public function menuItemInnerTemplate($item, $parentItem)
    {
        $class = (isset($item->submenu)) ? 'kt-menu__item kt-menu__item--submenu ' : 'kt-menu__item ';

        $activeClass = (isset($item->submenu)) ? 'kt-menu__item--open kt-menu__item--here' : 'kt-menu__item--active';

        $class = ($item->active) ? $class . $activeClass : $class;

        $html = '<li aria-haspopup="true" class="' . $class . '">';

        if (!isset($item->submenu)) {
            $html .= '<a href="' . $item->page . '" class="kt-menu__link kt-menu__toggle">' .
                $this->menuItemTextTemplate($item, $parentItem) .
                '</a>';
        }

        if (isset($item->submenu)) {
            $html .= '<a href="javascript:;" class="kt-menu__link kt-menu__toggle">' .
                $this->menuItemTextTemplate($item, $parentItem) .
                '</a>';

            $html .= '<div class="kt-menu__submenu">
                        <span class="kt-menu__arrow"></span>' .
                $this->menuSubmenuTemplate($item) .
                '</div>';
        }


        $html .= '</li>';

        return $html;
    }

    public function menuItemTextTemplate($item, $parentItem)
    {
        $html = '';

        if (isset($item->icon)) {
            $html .= '<span class="kt-menu__link-icon">' . $item->icon . '</span>';
        }

        if (isset($parentItem->bullet) && $parentItem->bullet == 'dot') {
            $html .= '<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>';
        }

        if (isset($parentItem->bullet) && $parentItem->bullet == 'line') {
            $html .= '<i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>';
        }

        $html .= '<span class="kt-menu__link-text">' . $item->title . '</span>';

        if (isset($item->badge)) {
            $html .= '<span class="kt-menu__link-badge">
                          <span class="kt-badge ' . $item->badge->type . '">' . $item->badge->value . '</span>
                      </span>';
        }

        if (isset($item->submenu)) {
            $html .= '<i class="kt-menu__ver-arrow la la-angle-right"></i>';
        }

        return $html;
    }

    public function menuItemSeparatorTemplate()
    {
        return '<li class="kt-menu__separator"><span></span></li>';
    }

    public function menuItemSectionTemplate($item)
    {
        return '<li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">' . $item->section . '</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>';
    }
}
