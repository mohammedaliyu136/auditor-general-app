            <aside :class="{ 'w-full md:w-64': sidebarOpen, 'w-0 md:w-16 hidden md:block': !sidebarOpen }"
                class="bg-sidebar text-sidebar-foreground border-r border-gray-200 dark:border-gray-700 sidebar-transition overflow-hidden">
                <!-- Sidebar Content -->
                <div class="h-full flex flex-col">
                    <!-- Sidebar Menu -->
                    <nav class="flex-1 overflow-y-auto custom-scrollbar py-4">
                        <ul class="space-y-1 px-2">
                            <!-- Dashboard -->
                            <x-layouts.sidebar-link href="{{ route('dashboard') }}" icon='fas-house'
                                :active="request()->routeIs('dashboard*')">Dashboard</x-layouts.sidebar-link>

                            <!-- Auditor General -->
                            <x-layouts.sidebar-two-level-link-parent title="Auditor General" icon="fas-file-invoice"
                                :active="request()->routeIs('audit-data.*') || request()->routeIs('audit-line-items.*')">
                                <x-layouts.sidebar-two-level-link href="{{ route('audit-data.index') }}" icon='fas-table'
                                    :active="request()->routeIs('audit-data.*')">{{ __('Audit Data') }}</x-layouts.sidebar-two-level-link>
                                <x-layouts.sidebar-two-level-link href="{{ route('audit-line-items.index') }}" icon='fas-list'
                                    :active="request()->routeIs('audit-line-items.*')">{{ __('Audit Line Items') }}</x-layouts.sidebar-two-level-link>
                            </x-layouts.sidebar-two-level-link-parent>

                            <!-- DSA -->
                            <x-layouts.sidebar-two-level-link-parent title="DSA" icon="fas-database"
                                :active="request()->routeIs('dsa-data.*') || request()->routeIs('dsa-variables.*')">
                                <x-layouts.sidebar-two-level-link href="{{ route('dsa-data.index') }}" icon='fas-table'
                                    :active="request()->routeIs('dsa-data.*')">{{ __('DSA Data') }}</x-layouts.sidebar-two-level-link>
                                <x-layouts.sidebar-two-level-link href="{{ route('dsa-variables.index') }}" icon='fas-list'
                                    :active="request()->routeIs('dsa-variables.*')">{{ __('DSA Variables') }}</x-layouts.sidebar-two-level-link>
                            </x-layouts.sidebar-two-level-link-parent>

                            <!-- Budget -->
                            <x-layouts.sidebar-two-level-link-parent title="Budget" icon="fas-wallet"
                                :active="request()->routeIs('budget-data.*') || request()->routeIs('economic-codes.*') || request()->routeIs('subprogramme-codes.*')">
                                <x-layouts.sidebar-two-level-link href="{{ route('budget-data.index') }}" icon='fas-table'
                                    :active="request()->routeIs('budget-data.*')">{{ __('Budget Data') }}</x-layouts.sidebar-two-level-link>
                                <x-layouts.sidebar-two-level-link href="{{ route('economic-codes.index') }}" icon='fas-code'
                                    :active="request()->routeIs('economic-codes.*')">{{ __('Economic Codes') }}</x-layouts.sidebar-two-level-link>
                                <x-layouts.sidebar-two-level-link href="{{ route('subprogramme-codes.index') }}" icon='fas-code-branch'
                                    :active="request()->routeIs('subprogramme-codes.*')">{{ __('Subprogramme Codes') }}</x-layouts.sidebar-two-level-link>
                            </x-layouts.sidebar-two-level-link-parent>

                            <!-- MTB -->
                            <x-layouts.sidebar-two-level-link-parent title="MTB" icon="fas-chart-line"
                                :active="request()->routeIs('macro-assumptions.*') || request()->routeIs('revenue-projections.*')">
                                <x-layouts.sidebar-two-level-link href="{{ route('macro-assumptions.index') }}" icon='fas-chart-bar'
                                    :active="request()->routeIs('macro-assumptions.*')">{{ __('Macro Assumptions') }}</x-layouts.sidebar-two-level-link>
                                <x-layouts.sidebar-two-level-link href="{{ route('revenue-projections.index') }}" icon='fas-chart-pie'
                                    :active="request()->routeIs('revenue-projections.*')">{{ __('Revenue Projections') }}</x-layouts.sidebar-two-level-link>
                            </x-layouts.sidebar-two-level-link-parent>

                            <!-- System -->
                            <x-layouts.sidebar-two-level-link-parent title="System" icon="fas-cogs"
                                :active="request()->routeIs('data-import-logs.*') || request()->routeIs('settings.*')">
                                <x-layouts.sidebar-two-level-link href="{{ route('data-import-logs.index') }}" icon='fas-history'
                                    :active="request()->routeIs('data-import-logs.*')">{{ __('Data Import Logs') }}</x-layouts.sidebar-two-level-link>
                                <x-layouts.sidebar-two-level-link href="{{ route('settings.general.edit') }}" icon='fas-wrench'
                                    :active="request()->routeIs('settings.*')">{{ __('General Settings') }}</x-layouts.sidebar-two-level-link>
                            </x-layouts.sidebar-two-level-link-parent>
                        </ul>
                    </nav>
                </div>
            </aside>
