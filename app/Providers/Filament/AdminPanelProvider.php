<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Pages\HomePageSettings;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\PageResource;
use App\Models\JamKerja;
use App\Models\Lokasi;
use App\Models\Pengajuan;
use App\Models\Surat;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use App\Filament\Resources\SuratResource;
use App\Filament\Resources\PengajuanResource;
use App\Filament\Resources\JamKerjaResource;
use App\Filament\Resources\LokasiResource;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->sidebarCollapsibleOnDesktop(true)
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            // ->spa()
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make('Dashboard')
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-home')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn(): string => Dashboard::getUrl()),
                        ]),
                    NavigationGroup::make('Surat')
                        ->items([
                            ...SuratResource::getNavigationItems(),
                            ...PengajuanResource::getNavigationItems(),
                            ...JamKerjaResource::getNavigationItems(),
                            ...LokasiResource::getNavigationItems(),
                        ]),
                    NavigationGroup::make('User Management')
                        ->items([
                            ...UserResource::getNavigationItems(),
                            NavigationItem::make('Roles')
                                ->icon('heroicon-o-user-group')
                                ->isActiveWhen(fn(): bool => request()->routeIs([
                                    'filament.admin.resources.roles.index',
                                    'filament.admin.resources.roles.create',
                                    'filament.admin.resources.roles.view',
                                    'filament.admin.resources.roles.edit'
                                ]))
                                ->url(fn(): string => '/admin/roles'),
                            NavigationItem::make('Permisions')
                                ->icon('heroicon-o-lock-closed')
                                ->isActiveWhen(fn(): bool => request()->routeIs([
                                    'filament.admin.resources.permissions.index',
                                    'filament.admin.resources.permissions.create',
                                    'filament.admin.resources.permissions.view',
                                    'filament.admin.resources.permissions.edit'
                                ]))
                                ->url(fn(): string => '/admin/permissions'),
                        ]),
                ]);
            })
        ;
    }
}
