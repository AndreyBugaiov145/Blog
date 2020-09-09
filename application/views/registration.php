<div class="box-registar">
    <form class="form-signin" action="/registration" method="post">
        <h1>Регистрация</h1>
        <div class="error"></div>
        <div class="form-group form ">
            <label for="email">Введите ваш email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group form">
            <label for="name">Введите ваше имя</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group form">
            <label for="surname">Введите вашу фамилию</label>
            <input type="text" name="surname" id="surname" class="form-control">
        </div>
        <div class="form-group form">
            <label for="">Выбериет ваш пол</label>
            <select name="gender" id="select" class="form-control form-control-sm">
                <option value="man">Мужской</option>
                <option value="woman">Женский</option>
            </select>
        </div>
        <div class="form-group form">
            <label for="password">Введите пароль</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group form">
            <label for="confirm-password">Введите пароль еще раз</label>
            <input type="password" name="confirm-password" id="confirm-password" class="form-control">
        </div>
        <div class="form-group form">
            <input type="checkbox" name="confirm" id="confirm" class="">
            <label for="confirm">Я согласен с услловиями</label>
        </div>
        <input type="submit" value="Зарегистрироваться" name="submit" class="btn btn-success"
               style="margin-right: 20px">
    </form>
</div>