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
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use App\Filament\Auth\CustomRegister;

class PemohonPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('pemohon')
            ->path('pemohon')
            ->maxContentWidth('full')
            ->sidebarWidth('auto')
            ->sidebarCollapsibleOnDesktop(true)
            ->brandLogo(asset('storage/img/logo_smg.png'))
            ->login()
            ->registration(CustomRegister::class)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Pemohon/Resources'), for: 'App\\Filament\\Pemohon\\Resources')
            ->discoverPages(in: app_path('Filament/Pemohon/Pages'), for: 'App\\Filament\\Pemohon\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Pemohon/Widgets'), for: 'App\\Filament\\Pemohon\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn(): string => Blade::render('@wirechatStyles'),
            )
            ->renderHook(
                PanelsRenderHook::BODY_END,
                fn(): string => Blade::render('@wirechatAssets'),
            )
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
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make('Dashboard')
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-home')
                                // ->isActiveWhen(fn(): bool => request()->routeIs('filament.pemohon.pages.dashboard'))
                                ->url(fn(): string => Dashboard::getUrl()),
                            NavigationItem::make('Chat')
                                ->icon('heroicon-o-chat-bubble-left')
                                ->url(fn(): string => '/pemohon/chat'),
                        ]),
                ]);
            })
        ;
    }
}
