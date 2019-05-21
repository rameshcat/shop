<?php include ROOT.'/views/layouts/headerAdmin.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <a href="<?php echo Helper::uriLink('adminProduct');?>" name="edit">Управление товарами</a><br/>
                <a href="<?php echo Helper::uriLink('adminCategory');?>" name="history">Управление категориями</a><br/>
                <a href="<?php echo Helper::uriLink('adminOrder');?>" name="history">Управление заказами</a>
            </div>
        </div>
</section>
<?php include ROOT.'/views/layouts/footer.php'; ?>
