<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    // Правило аутентификации/авторизации
    public function authorize(): bool
    {
        return true;
    }

    // Правила валидации
    public function rules(): array
    {
        return [
            'surname' => 'required|string|max:64',
            'name' => 'required|string|max:64',
            'patronymic' => 'nullable|string|max:64',
            'sex' => 'required|boolean',
            'birthday' => 'required|date:Y-m-d',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:255',
        ];
    }

    // Кастомные сообщения об ошибках валидации
    public function messages(): array {
        return [
            'surname.required' => 'Фамилия обязательна для заполнения',
            'name.required' => 'Имя обязательно для заполнения',
            'sex.required' => 'Пол обязателен для заполнения',
            'birthday.required' => 'Дата рождения обязательна для заполнения',
            'email.required' => 'Электронная почта обязательна для заполнения',
            'password.required' => 'Пароль обязателен для заполнения',
            'surname.max'=> 'Фамилия может содержать максимум 64 символа',
            'name.max'=> 'Имя может содержать максимум 64 символа',
            'patronymic.max'=> 'Отчество может содержать максимум 64 символа',
            'email.max'=> 'Электронная почта может содержать максимум 64 символа',
            'password.max'=> 'Пароль может содержать максимум 64 символа',
            'password.min'=> 'Пароль должен содержать минимум 6 символов',
            'sex.boolean'=> 'Пол должно иметь значение 0 или 1',
            'birthday.date' => 'Дата рождения должна быть в формате YYYY-MM-DD',
            'email.email'=> 'Электронная почта должна соответствовать формату Email адресов',
            'email.unique'=> 'Электронная почта уже используется другим пользователем',
        ];
    }
}




