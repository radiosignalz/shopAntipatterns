<h2>Корзина</h2>

<?php foreach ($basket as $item):?>
    <div id="">
        <h3><?=$item['name']?></h3>
        <p>price: <?=$item['price']?></p>
        <button>Удалить</button>
    </div>
<?php endforeach;?>