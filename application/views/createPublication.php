<div class="box-create-publication">
    <form class="form-signin" action="/catalog/save" method="post" enctype="multipart/form-data">
    	<? if(isset($_SESSION["createMassege"])): ?>
			<span style="color:green;margin-left:15px">Статья добавлена</span>
	 	<? endif ;?>
	 	<? unset($_SESSION["createMassege"])?> 
        <h1>Добавление статьи</h1>
        <div class="error"></div>
        <div class="form-group form ">
            <label for="header">Введите заголовок статьи</label>
            <input type="text" name="header" id="header" class="form-control" placeholder="заголовок">
        </div>
        <div class="form-group form">
            <label for="short_description">Введите краткое описание (максиммум 100 символов)</label>
            <textarea type="text" name="short_description" id="short_description" class="form-control"placeholder="описание" maxlength="100" rows='3'></textarea>
        </div>
        <div class="form-group form">
            <label for="description">Введите текст статьи</label>
            <textarea type="text" name="description" id="description" class="form-control"placeholder="текст статьи" rows='10'></textarea>
        </div>
        <div class="form-group form">
            <label for="tag">Добавите теги к вашей статье</label>
            <input type="text" name="tag" id="tag" class="form-control" placeholder="joy,cull,sadness" >
        </div>
        <div class="form-group form">
            <label for="img">Добавить изображение</label>
            <input type="file" name="img" id="img" >
        </div>
        <input type="submit" value="Добаить статью" name="submit" class="btn btn-success"
               style="margin-right: 20px">
    </form>
</div>