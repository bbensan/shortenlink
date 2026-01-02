# Dashboard Usage Guide

## Breadcrumb Usage

Untuk menggunakan breadcrumb dinamis di halaman dashboard, set breadcrumbs di method `mount()` atau `render()` pada Livewire component:

```php
public function mount()
{
    $this->breadcrumbs = [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Dashboard', 'url' => route('dashboard-home')],
        ['label' => 'Current Page', 'url' => '#'], // Last item tidak perlu URL
    ];
}

public function render()
{
    return view('livewire.dashboard.your-view')
        ->layout('layouts.dashboard', [
            'breadcrumbs' => $this->breadcrumbs,
        ]);
}
```

Atau jika menggunakan controller biasa:

```php
return view('dashboard.your-view', [
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Dashboard', 'url' => route('dashboard-home')],
        ['label' => 'Current Page'],
    ]
])->layout('layouts.dashboard');
```

## Navbar Usage

Untuk menampilkan navbar di dashboard, set `$showNavbar = true` saat render:

```php
return view('livewire.dashboard.your-view')
    ->layout('layouts.dashboard', [
        'showNavbar' => true,
        'breadcrumbs' => $this->breadcrumbs,
    ]);
```

## Theme Switcher

Theme switcher sudah terintegrasi di sidebar dan mobile nav. Untuk menambahkannya di tempat lain:

```blade
@livewire('components.theme-switcher')
```

## Mobile Navigation

Mobile bottom navigation sudah otomatis muncul di semua halaman dashboard pada layar mobile (< 768px).

