<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);

        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                ]
            ],
            [
                'group_name' => 'admin profile',
                'permissions' => [
                    'admin.profile.view',
                    'admin.profile.edit',
                    'admin.profile.update',
                    'admin.profile.delete',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.view',
                    'admin.create',
                    'admin.store',
                    'admin.edit',
                    'admin.update',
                    'admin.delete',
                ]
            ],
            [
                'group_name' => 'blog category',
                'permissions' => [
                    'blog.category.view',
                    'blog.category.create',
                    'blog.category.translate',
                    'blog.category.store',
                    'blog.category.edit',
                    'blog.category.update',
                    'blog.category.delete'
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    'blog.view',
                    'blog.create',
                    'blog.translate',
                    'blog.store',
                    'blog.edit',
                    'blog.update',
                    'blog.delete'
                ]
            ],
            [
                'group_name' => 'blog Comment',
                'permissions' => [
                    'blog.comment.view',
                    'blog.comment.update',
                    'blog.comment.delete'
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.view',
                    'role.create',
                    'role.store',
                    'role.assign',
                    'role.edit',
                    'role.update',
                    'role.delete',
                ]
            ],
            [
                'group_name' => 'settings',
                'permissions' => [
                    'setting.view',
                    'setting.update',
                ]
            ],
            [
                'group_name' => 'basic payment',
                'permissions' => [
                    'basic.payment.view',
                    'basic.payment.update',
                ]
            ],
            [
                'group_name' => 'contect message',
                'permissions' => [
                    'contect.message.view',
                    'contect.message.delete',
                ]
            ],
            [
                'group_name' => 'currency',
                'permissions' => [
                    'currency.view',
                    'currency.create',
                    'currency.store',
                    'currency.edit',
                    'currency.update',
                    'currency.delete',
                ]
            ],
            [
                'group_name' => 'customer',
                'permissions' => [
                    'customer.view',
                    'customer.bulk.mail',
                    'customer.create',
                    'customer.store',
                    'customer.edit',
                    'customer.update',
                    'customer.delete',
                ]
            ],
            [
                'group_name' => 'language',
                'permissions' => [
                    'language.view',
                    'language.create',
                    'language.store',
                    'language.edit',
                    'language.update',
                    'language.delete',
                    'language.translate',
                    'language.single.translate',
                ]
            ],
            [
                'group_name' => 'menu builder',
                'permissions' => [
                    'menu.view',
                    'menu.create',
                    'menu.store',
                    'menu.edit',
                    'menu.update',
                    'menu.delete',
                ]
            ],
            [
                'group_name' => 'page builder',
                'permissions' => [
                    'page.view',
                    'page.create',
                    'page.store',
                    'page.edit',
                    'page.component.add',
                    'page.update',
                    'page.delete',
                ]
            ],
            [
                'group_name' => 'subscription',
                'permissions' => [
                    'subscription.view',
                    'subscription.create',
                    'subscription.store',
                    'subscription.edit',
                    'subscription.update',
                    'subscription.delete',
                ]
            ],
            [
                'group_name' => 'payment',
                'permissions' => [
                    'payment.view',
                    'payment.update',
                ]
            ],
            [
                'group_name' => 'support ticket',
                'permissions' => [
                    'support.ticket.view',
                    'support.ticket.manage',
                    'support.ticket.delete',
                    'support.ticket.close',
                ]
            ],
            [
                'group_name' => 'newsletter',
                'permissions' => [
                    'newsletter.view',
                    'newsletter.mail',
                    'newsletter.delete',
                ]
            ],
            [
                'group_name' => 'testimonial',
                'permissions' => [
                    'testimonial.view',
                    'testimonial.create',
                    'testimonial.translate',
                    'testimonial.store',
                    'testimonial.edit',
                    'testimonial.update',
                    'testimonial.delete'
                  ]
              ],
          [
                'group_name' => 'faq',
                'permissions' => [
                    'faq.view',
                    'faq.create',
                    'faq.translate',
                    'faq.store',
                    'faq.edit',
                    'faq.update',
                    'faq.delete'
                ]
            ]
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                    'guard_name' => 'admin'
                ]);

                $roleSuperAdmin->givePermissionTo($permission);
            }
        }
    }
}
