<div class="box-registar">
    <form class="form-signin" action="/registration" method="post">
    	<? if(isset($_SESSION["masegeFailLogin"])): ?>
    		<h5 style="color:red">Пользователь с такими данными не найден</h5>
   		 <? endif ;?>
   		 <? unset($_SESSION["masegeFailLogin"])?>
   		 <? if(isset($_SESSION["failRegistration"])): ?>
   		 	<? foreach($_SESSION["failRegistration"] as $error):?>
    		<h5 style="color:red"><?=$error?></h5>
    	<? endforeach;?>
   		 <? endif ;?>
   		 <? unset($_SESSION["failRegistration"])?>     		
        <h1>Регистрация</h1>
        <div class="error"></div>
        <div class="form-group form ">
            <label for="email">Введите ваш email</label>
            <input value="<?if(isset($_COOKIE['email'])) echo$_COOKIE['email'];?>" type="email" name="email" id="email" class="form-control" placeholder="mail@email.com">
        </div>
        <div class="form-group form">
            <label for="name">Введите ваше имя</label>
            <input value="<?if(isset($_COOKIE['name'])) echo$_COOKIE['name'];?>" type="text" name="name" id="name" class="form-control"placeholder="name">
        </div>
        <div class="form-group form">
            <label for="surname">Введите вашу фамилию</label>
            <input value="<?if(isset($_COOKIE['surname'])) echo$_COOKIE['surname'];?>" type="text" name="surname" id="surname" class="form-control"placeholder="surname">
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
            <input value="<?if(isset($_COOKIE['password'])) echo$_COOKIE['password'];?>" type="password" name="password" id="password" class="form-control"placeholder="password">
        </div>
        <div class="form-group form">
            <label for="confirm-password">Введите пароль еще раз</label>
            <input value="<?if(isset($_COOKIE['confirm-password'])) echo$_COOKIE['confirm-password'];?>" type="password" name="confirm-password" id="confirm-password" class="form-control"placeholder="password">
        </div>
        <div class="form-group form">
            <input type="checkbox" name="confirm" id="confirm" >
            <label for="confirm">Я согласен с условиями</label>
        </div>
        <input type="submit" value="Зарегистрироваться" name="submit" class="btn btn-success"
               style="margin-right: 20px">
    </form>
</div>