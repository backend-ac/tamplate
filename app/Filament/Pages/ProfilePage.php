<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;

class ProfilePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Мой профиль';
    protected static ?string $title = 'Мой профиль';
    protected static ?string $slug = 'profile';
    protected static ?int $navigationSort = 100;
    protected static string $view = 'filament.pages.profile-page';

    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'email' => auth()->user()->email,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Данные аккаунта')
                    ->description('Обновите данные своей учетной записи')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(User::class, 'email', ignoreRecord: true),
                        TextInput::make('current_password')
                            ->label('Текущий пароль')
                            ->password()
                            ->required()
                            ->dehydrated(false)
                            ->rules(['required_with:new_password'])
                            ->currentPassword(),
                        TextInput::make('new_password')
                            ->label('Новый пароль')
                            ->password()
                            ->dehydrated(fn ($state) => filled($state))
                            ->rules(['confirmed', 'min:8'])
                            ->autocomplete('new-password'),
                        TextInput::make('new_password_confirmation')
                            ->label('Подтверждение пароля')
                            ->password()
                            ->dehydrated(false)
                            ->rules([
                                'required_with:new_password',
                            ])
                            ->autocomplete('new-password'),
                    ])
                    ->columns(2),
            ]);
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $user = auth()->user();

        // Update user data
        $updateData = [
            'email' => $data['email'],
        ];
        
        if (isset($data['new_password'])) {
            $updateData['password'] = Hash::make($data['new_password']);
        }
        
        // Update the user record
        User::where('id', $user->id)->update($updateData);

        Notification::make()
            ->title('Профиль обновлен')
            ->success()
            ->send();
    }

    public function getFormActions(): array
    {
        return [
            \Filament\Forms\Components\Actions\Action::make('save')
                ->label('Сохранить')
                ->action('submit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->check();
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
