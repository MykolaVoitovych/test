<form class='form' id='form' method='POST' enctype='multipart/form-data' action="{{ route('users.store') }}">
    @csrf
    <ul class="form__list">
        <li class="form__item">
            <label class='form__label' for="nickname">Никнейм:</label>
            <input class='form__input'
                   id='nickname' type="text"
                   name="nickname"
                   value="{{ $user->nickname ?? '' }}"
                   @if(isset($user)) disabled @endif
            >
        </li>
        <li class="form__item">
            <label class='form__label' for="name">Имя:</label>
            <input class='form__input'
                   id='name' type="text"
                   name="name"
                   value="{{ $user->name ?? '' }}"
                   @if(isset($user)) disabled @endif
            >
        </li>
        <li class="form__item">
            <label class='form__label' for="surname">Фамилия:</label>
            <input class='form__input'
                   id='surname' type="text"
                   name='surname'
                   value="{{ $user->surname ?? '' }}"
                   @if(isset($user)) disabled @endif
            >
        </li>
        <li class="form__item">
            <label class='form__inline-label' for="avatar">Аватар:</label>
            <input class='form__inline-input'
                   id='avatar' name="avatar"
                   type="file"
                   value='image/jpeg,image/png'
                   @if(isset($user)) disabled @endif
            >
        </li>
        <li class="form__item">
            <label class='form__label' for="phone">Телефон:</label>
            <input class='form__input' id='phone' type="text" name='phone' value="{{ $user->phone ?? '' }}" @if(isset($user)) disabled @endif>
        </li>
        <li class="form__item">
            <div class="form__title">Пол:</div>
            @foreach(\App\Models\User::genders() as $gender)
                <label class='form__inline-label' for="{{ $gender['id'] }}">{{ $gender['title'] }}</label>
                <input class='form__inline-input'
                       name='sex' id='{{ $gender['id'] }}'
                       type="radio"
                       value="{{ $gender['id'] }}"
                       @if(isset($user) && $user->sex == $gender['id']) checked @endif
                       @if(isset($user)) disabled @endif
                >
            @endforeach
        </li>
        <li class="form__item">
            <label class='form__inline-label' for="agreeEmailNotify">Я согласен получать email-рассылку</label>
            <input class='form__inline-input'
                   id='agreeEmailNotify'
                   type="checkbox"
                   name="agree_email_notify"
                   value="1"
                   @if(isset($user) && $user->agree_email_notify) checked @endif
                   @if(isset($user)) disabled @endif
            >
        </li>
        <li class="form__item">
            <button class='form__button' type="submit" @if(isset($user)) disabled @endif>Отправить</button>
        </li>
    </ul>
</form>
