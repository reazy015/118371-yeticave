<nav class="nav">
    <ul class="nav__list container">
        <?php foreach($categories as $category) :?>
        <li class="nav__item">
            <a href="all-lots.html"><?=$category;?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>

<form class="form form--add-lot container <?= (count($errors)>0 )? 'form--invalid' : '' ; ?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?= isset($errors['name'])? 'form__item--invalid' : ''  ; ?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="name" placeholder="Введите наименование лота" required value="<?=$lot['name'];?>">
            <span class="form__error"><?= isset($errors['name'])? $errors['name'] : ''  ; ?></span>
        </div>
        <div class="form__item <?= isset($errors['category'])? 'form__item--invalid' : ''  ; ?>"">
            <label for="category">Категория</label>
            <select id="category" name="category" required>
                <option><?= isset($lot['category']) ? $lot['category'] : 'Выберите категорию';?></option>
                <option>Доски и лыжи</option>
                <option>Крепления</option>
                <option>Ботинки</option>
                <option>Одежда</option>
                <option>Инструменты</option>
                <option>Разное</option>
            </select>
            <span class="form__error"><?= isset($errors['category']) ? $errors['category'] : '' ;?></span>
        </div>
    </div>
    <div class="form__item form__item--wide <?= isset($errors['message'])? 'form__item--invalid' : ''  ; ?>"">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"  required><?=$lot['message'];?></textarea>
        <span class="form__error"><?= isset($errors['message'])? $errors['message'] : ''  ; ?></span>
    </div>
    <div class="form__item form__item--file <?= isset($errors['img_url'])? 'form__item--invalid' : ''  ; ?>""> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" value="" name="img_url" value="<?=$lot['img_url'];?>" required>
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
        <span class="form__error"><?= isset($errors['category']) ? $errors['img_url'] : '' ;?></span>
    </div>
    <div class="form__container-three ">
        <div class="form__item form__item--small <?= isset($errors['price'])? 'form__item--invalid' : ''  ; ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="price" placeholder="0"  value="<?=$lot['price']?>" required>
            <span class="form__error"><?= isset($errors['price'])? $errors['price'] : ''  ; ?></span>
        </div>
        <div class="form__item form__item--small <?= isset($errors['lot-step'])? 'form__item--invalid' : ''  ; ?>"">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0"  value="<?=$lot['lot-step']?>" required>
            <span class="form__error"><?= isset($errors['lot-step'])? $errors['lot-step'] : ''  ; ?></span>
        </div>
        <div class="form__item <?= isset($errors['lot-date'])? 'form__item--invalid' : ''  ; ?>"">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date"  value="<?=$lot['lot-date']?>" required>
            <span class="form__error"><?= isset($errors['lot-date']) ? $errors['lot-date'] : ''  ; ?></span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>